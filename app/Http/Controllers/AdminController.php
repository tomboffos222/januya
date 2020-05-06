<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Tree;
use App\Withdraw;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function LoginPage(){
        return view('admin.login');
    }
    public function Login(Request $request){
        $rules = [
            'login' => 'required|max:255',
            'password' => 'required|max:255',
        ];

        $messages = [
            "login.required" => "Введите ваш Логин",
            "password.required" => "Введите пароль",
        ];

        $validator = $this->validator($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());

        } else {
           $admin = Admin::whereLogin($request['login'])->wherePassword($request['password'])->first();
           if (!$admin){
               return back()->withErrors('Неверный логин или пароль');
           }
           session()->put('admin',$admin);
           session()->save();

           return redirect()->route('admin.Users');
        }
    }
    public function Out(Request $request){
        session()->forget('admin');
        return redirect()->route('admin.LoginPage')->withErrors('Вы вышли');
    }
    public function Users(Request $request){
        $data['users'] = User::paginate(10);
        $data['active'] = 'main';

        return view('admin.users',$data);
    }
    public function RegisterUser(Request $request){
        $rules = [
            'user_id' => 'required|exists:users,id',
            'password' => 'required|max:255',
        ];

        $messages = [
            "user_id.required" => "Введите user_id",
            "user_id.exists" => "User не найден",
            "password.required" => "Введите пароль",
        ];

        $validator = $this->validator($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());

        } else {
            $user = User::find($request['user_id']);
            $user->password = $request['password'];
            $user->status = 'registered';
            $user->save();

            $this->AddUserToMatrix($user->id);



            return redirect()->route('admin.Users')->withMessage('зарегистрировано!');
        }
    }
    public function Trees(){
        $data['trees'] = Tree::join('users','users.id','=','trees.user_id')
            ->paginate(9);
        $data['active'] = 'tree';
        return view('admin.trees',$data);
    }
    public function RejectUser($id){
        $user = User::find($id);
        $user->status = 'reject';
        $user->save();

        return redirect()->back();
    }
    public function Tree($userId, $tree =1){
        $active = 'tree';
        $user = Tree::join('users','users.id','trees.user_id')
            ->select('trees.*','name','phone','login','bs_id','prize','email');
        if ($userId){
           $user = $user->find($userId);
        }else{
            $user = $user->first();
        }
        $tree = $tree *5 ;
        return view('admin.tree',['user'=>$user,'tree'=>$tree,'active'=>$active]);
    }
    public function MainTree($userId){
        $data['active'] = 'tree';
        $user = Tree::where('user_id',$userId)->first();
        $counter = Tree::where('parent_id',$user['user_id'])->count();

        $data['line'] = 0;
        while ($counter>0){

            $counter -=5;
            $data['line'] +=1;

        }
        $data['user_id'] = $userId;

        if ($data['line'] == 0){
            $data['line'] +=1;
        }

        return view('admin.tree_router',$data);
    }
    public function Withdraws(){

        $data['withdraws'] = Withdraw::join('users','withdraws.user_id','=','users.id')
            ->orderBy('withdraws.id','desc')
            ->select('withdraws.*','users.phone','users.email','users.login')
            ->paginate(12);
        $data['active'] = 'withdraw';

        return view('admin.withdraws',$data);
    }
    public function WithdrawApprove($id){
        $withdraw = Withdraw::find($id);
        $user = User::find($withdraw['user_id']);
        $user['bill'] = $user['bill'] - $withdraw['amount'];
        $user->save();
        $withdraw['status'] = 'ok';
        $withdraw->save();

        return back()->with('message','Одобрено');
    }
    public function WithdrawReject($id){
        $withdraw = Withdraw::find($id);
        $withdraw['status'] = 'fail';
        $withdraw->save();
        return back()->with('message','Отклонено');
    }
    function AddUserToMatrix($user_id){
        if (Tree::whereUserId($user_id)->exists()){
            return back()->withErrors('Уже зарегистрированы');
        }

        $lastUser = Tree::orderBy('id','desc')->first();
        $neighbours =  Tree::where('parent_id',$lastUser->parent_id)->get();
        if (count($neighbours) < 5){
            $parentUser  = Tree::where('id',$lastUser->parent_id)->first();

            $new = new Tree();
            $new->user_id = $user_id;
            $new->parent_id = $lastUser->parent_id;
            $new->parents = $lastUser->parents;
            $new->row = $parentUser->row + 1;
            $new->save();
        }else{
            $parentUser = Tree::where('id',$lastUser->parent_id)->first();
            $nextUser = Tree::where('row',$parentUser->row)->where('id','>',$parentUser->id)->first();
            if ($nextUser){
                $new = new Tree();
                $new->user_id = $user_id;
                $new->parent_id = $nextUser->id;
                $new->parents = $nextUser->parents.','.$nextUser->id;
                $new->row = $nextUser->row + 1;
                $new->save();
            }else{
                $nextUser = Tree::where('row',$lastUser->row)->first();
                $new = new Tree();
                $new->user_id = $user_id;
                $new->parent_id = $nextUser->id;
                $new->parent_id = $nextUser->id;
                $new->parents = $nextUser->parents.','.$nextUser->id;
                $new->row = $nextUser->row + 1;

                $new->save();
            }
        }
    }


}
