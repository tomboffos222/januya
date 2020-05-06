<?php

namespace App\Http\Controllers;

use App\Debt;
use App\Models\Tree;
use App\Models\User;
use App\Tree_operation;
use App\Withdraw;
use foo\bar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{

    public function Home(){
        return view('home');
    }

    public function RegisterPage(){
        return view('register');
    }
    public function RegConsultant($id){
        $data['userId'] = $id;
        return view('register',$data);

    }
    public function Registration($id){
        $data['bs_id'] = $id;
        $data['client_ref']= true;
        return view('register',$data);
    }
    public function RegisterClient(Request $request){
        $rules = [
            'name' => 'required|max:255',
            'login' => 'required|max:255|unique:users,login',
            'zhsn' => 'required|max:14',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'bs_id'=> 'required'

        ];

        $messages = [
            "name.required" => "Введите ваше имя",
            "login.required" => "Введите ваш Логин",
            "login.unique" => "Логин занять,введите другой логин",
            "phone.required" => "Введите телефон номер",


            "zhsn.required" => "Введите ИИН",
            "password.min" => "Пароль должен быть 8 символов",
            "password.required" => "Введите пароль"
        ];
        $validator = $this->validator($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());

        } else {
            $user = new User();
            $user['name'] = $request['name'];
            $user['status']  = 'sent';
            $user['bill'] = 0;
            $user['bs_id'] = $request['bs_id'];
            $user['login'] = $request['login'];
            $user['phone'] = $request['phone'];

            $user['email'] = $request['email'];
            $user['password'] = $request['password'];
            $user['zhsn'] = $request['zhsn'];

//            $lastUser = Tree::where('parents', 'LIKE','%,'.$user['bs_id'] . ',%')->orderBy('id', 'desc')->first();
//            $parents =  explode(',',substr($lastUser['parents'],1));
            $parentConsultant = User::find($request['bs_id']);
            if ($parentConsultant['status'] == 'registered') {
                $parentConsultant['bill'] += 14000;
                $parentConsultant->save();
                $operations = new Tree_operation;
                $operations['user_id'] = $request['bs_id'];
                $operations['description'] = 'Прибыль в 14000тг от клиента '.$user['login'];
                $operations['amount'] = 14000;
                $operations->save();


            }else{
                return back()->withErrors('Ошибка попробуй позже');
            }



            $user->save();



            return redirect()->route('Purchase',$user['id']);
        }
    }
    public function Register(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'login' => 'required|max:255|unique:users,login',
            'zhsn' => 'required|max:14',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'

        ];

        $messages = [
            "name.required" => "Введите ваше имя",
            "login.required" => "Введите ваш Логин",
            "login.unique" => "Логин занять,введите другой логин",
            "phone.required" => "Введите телефон номер",


            "zhsn.required" => "Введите ИИН",
            "password.min" => "Пароль должен быть 8 символов",
            "password.required" => "Введите пароль"
        ];

        $validator = $this->validator($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());

        } else {
            $user = new User();
            $user['name'] = $request['name'];
            $user['status']  = 'sent';
            $user['bill'] = 0;
            $user['login'] = $request['login'];
            $user['phone'] = $request['phone'];

            $user['email'] = $request['email'];
            $user['password'] = $request['password'];
            $user['zhsn'] = $request['zhsn'];

//            $lastUser = Tree::where('parents', 'LIKE','%,'.$user['bs_id'] . ',%')->orderBy('id', 'desc')->first();
//            $parents =  explode(',',substr($lastUser['parents'],1));


            $user->save();



            return redirect()->route('Purchase',$user['id']);
        }
    }
    public function Purchase($id){
        $data['user'] = User::find($id);


        return view('purchase',$data);
    }
    public function Prove($id){
        $user = User::find($id);
        $user['status'] = 'client';
        $user->save();
        for($i=0;$i<=5;$i++){
            $debt = new Debt();
            $debt['user_id'] = $user['id'];
            $debt['status'] = 'wait';
            $debt['amount'] = 50000;
            $numeration = $i+1;
            $debt['description'] = 'Оплата за '.$numeration.' месяц';
            $month = $user->created_at->month;
            $debt['end_time'] = Carbon::create($user->update_at)->addMonths($month + $i)
                ->day($user->updated_at->day)->setTimezone('UTC');;
            $debt->save();



        }
        session()->put('user',$user);

        return redirect()->route('Main');
    }
    public function PayDebt($id){
        $debt = Debt::where('user_id',$id)->where('status','wait')->first();
        $debt['status'] = 'ok';
        $debt->save();
        return back()->with('message','Оплачено');

    }
    public function RegisterConsultant(Request $request){
        $rules = [
            'name' => 'required|max:255',
            'login' => 'required|max:255|unique:users,login',
            'zhsn' => 'required|max:14',
            'phone' => 'required',
            'email' => 'required|email',
            'bs_id' => 'required',
            'password' => 'required|min:8'

        ];

        $messages = [
            "name.required" => "Введите ваше имя",
            "login.required" => "Введите ваш Логин",
            "login.unique" => "Логин занять,введите другой логин",
            "phone.required" => "Введите телефон номер",
            "zhsn.required" => "Введите ИИН",
            "password.min" => "Пароль должен быть 8 символов",
            "password.required" => "Введите пароль",
            "bs_id"=> "required"
        ];
        $validator = $this->validator($request->all(),$rules,$messages);
        if ($validator->fails()){
            return back()->withErrors($validator->errors());
        }else{
            $user = new User();
            $user['name'] = $request['name'];
            $user['status']  = 'registered';
            $user['bill'] = 0;
            $user['zhsn'] = $request['zhsn'];
            $user['login'] = $request['login'];
            $user['phone'] = $request['phone'];
            $user['email'] = $request['email'];
            $user['password'] = $request['password'];
            if ($request['bs_id']){
                $user['bs_id'] = $request['bs_id'];
            }
//            $lastUser = Tree::where('parents', 'LIKE','%,'.$user['bs_id'] . ',%')->orderBy('id', 'desc')->first();
//            $parents =  explode(',',substr($lastUser['parents'],1));


            $user->save();
            if ($user['bs_id']){
                $this->AddUserToMatrix($user['id'], $user['bs_id']);
            }else{
                $this->AddUserToMatrix($user['id'], $user['bs_id']);
            }

            return redirect()->route('LoginPage')->with('message','Ваш запрос отправлен!');

        }
    }

    public function LoginPage(){
    return view('login');
    }

    public function Login(Request $request)
    {
        $rules = [
            'login' => 'required|max:255|exists:users,login',
            'password' => 'required|max:255',
        ];

        $messages = [
            "login.exists" => "Неверный логин",
        ];

        $validator = $this->validator($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());

        } else {
            $user = User::whereLogin($request['login'])->wherePassword($request['password'])
                ->where('status','registered')
                ->orWhere('status','client')
                ->first();

            if (!$user){
                return redirect()->route('LoginPage')->withErrors('Логин или пароль не верно');
            }
            session()->put('user',$user);
            session()->save();

            return redirect()->route('Main');
        }
    }
    public function MainTree($userId){
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
        $data['user'] = User::find($userId);
        $data['user_id'] = $userId;
        $data['active'] = 'tree';

        return view('tree_router',$data);
    }
    public function Out(Request $request){
        session()->forget('user');
        return redirect()->route('LoginPage')->withErrors('Вы вышли');
    }

    public function Main(){
        $user = session()->get('user');
        $user = User::find($user['id']);



        $user->save();
        $data['user'] = User::find($user['id']);
        session()->put('user',$user);
        $data['children'] = Tree::where('parents','LIKE','%'.$user['id'].'%')->count();
        $data['tree'] = Tree::whereUserId($data['user']->id)->first();
        $data['active'] = 'main';
        if ($user['status'] == 'client'){

            $data['time'] = Carbon::now('UTC');
            $month = $user->updated_at->month;



            $data['data'] = Debt::where('user_id',$user['id'])->where('status','wait')->first();
            $data['end'] =Carbon::parse($data['data']['end_time']);


            $data['differ'] = $data['end']->diffInDays();




        }
        return view('main',$data);
    }
    public function Payments(){
        $data['active'] = 'pays';
        $user = session()->get('user');
        $data['debts'] = Debt::where('user_id',$user['id'])->get();

        return view('payments',$data);
    }

    public function Profits(){
        $user = session()->get('user');
        $data['user'] = User::find($user['id']);
        $data['operations'] = Tree_operation::where('user_id',$user['id'])->paginate(12);
        $data['active'] ='profits';
        return view('profits',$data);
    }
    public function Exit(){
        session()->forget('user');
        return redirect()->route('Home')->with('message','Вы вышли');

    }
    public function Tree($userId,$tree=1){
        $user = Tree::join('users','users.id','trees.user_id')
            ->select('trees.*','name','phone','login','bs_id','prize','email');
        if ($userId){
            $user = $user->find($userId);
        }else{
            $user = $user->first();
        }
        $tree = $tree *5 ;
        $active = 'tree';
        return view('tree',['user'=>$user,'tree'=>$tree, 'active'=>$active]);
    }
    function AddUserToMatrix($user_id, $parent_id){
        if (Tree::whereUserId($user_id)->exists()){
            return back()->withErrors('Уже зарегистрированы');
        }else{
            if ($parent_id != null) {
                $parent = Tree::where('user_id',$parent_id)->first();
                $lastUser = Tree::where('parent_id',$parent_id)->orderBy('id','desc')->first();


                if (!$lastUser){
                    $tree = new Tree();
                    $tree['parent_id'] = $parent['user_id'];
                    $tree['user_id'] = $user_id;
                    if($parent['parents'] == ''){
                        $tree['parents'] = ','.$parent['user_id'].',';
                    }else{
                        $tree['parents'] = $parent['parents'].$parent['user_id'].',';
                    }

                    $tree['level'] = 0;
                    $tree['row'] = $parent['row'] +1;
                    $tree['tree'] = 1;
                    $tree->save();
                    $this->Distributor($tree['parents']);

                }else{
                    $childUsers = Tree::where('parent_id',$parent_id)->where('tree',$lastUser['tree'])->count();
                    if ($childUsers>=5){
                        $tree = new Tree();
                        $tree['parent_id'] = $parent['user_id'];
                        $tree['user_id'] = $user_id;
                        if($parent['parents'] == ''){
                            $tree['parents'] = ','.$parent['user_id'].',';
                        }else{
                            $tree['parents'] = $parent['parents'].$parent['user_id'].',';
                        }
                        $tree['row'] = $parent['row']+1;
                        $tree['level'] = 0;
                        $tree['tree'] = $lastUser['tree'] +1;
                        $tree->save();
                        $trees = Tree::where('parent_id',$parent_id)->groupBy('tree')->pluck('tree','tree')->toArray();
                        $counts = [];
                        foreach ($trees as $treeNumber){
                            $childCounts = Tree::where('parents','LIKE','%,'.$parent_id.',%')->where('tree',$treeNumber)->count();
                            $counts[] = $childCounts;
                        }
                        $childCount = Tree::where('parents','LIKE','%,'.$parent_id.',%')->where('tree',$tree['tree'])->count();
                        $this->AchieveGiver($childCount, $parent_id);
                        if (max($counts)<=3125){
                            $this->Distributor($tree['parents']);

                        }

                    }else{
                        $tree = new Tree();
                        $tree['parent_id'] = $parent['user_id'];
                        $tree['user_id'] = $user_id;
                        $tree['parents'] = $lastUser['parents'];
                        $tree['row'] = $parent['row']+1;
                        $tree['level'] = 0;
                        $tree['tree'] = $lastUser['tree'];

                        $tree->save();

                        $trees = Tree::where('parent_id',$parent_id)->groupBy('tree')->pluck('tree','tree')->toArray();
                        $counts = [];
                        foreach ($trees as $treeNumber){
                            $childCounts = Tree::where('parents','LIKE','%,'.$parent_id.',%')->where('tree',$treeNumber)->count();
                            $counts[] = $childCounts;
                        }
                        $childCount = Tree::where('parents','LIKE','%,'.$parent_id.',%')->where('tree',$tree['tree'])->count();
                        $this->AchieveGiver($childCount, $parent_id);
                        if (max($counts)<=3125){
                            $this->Distributor($tree['parents']);

                        }

                    }
                }




            }else{
                $treeUser = new Tree();
                $treeUser['user_id'] = $user_id;
                $treeUser['parent_id'] = null;
                $treeUser['parents'] = '';
                $treeUser['level'] = 0;
                $treeUser['row'] = 0;
                $treeUser['level'] = 0;
                $treeUser['tree'] = 0;
                $treeUser->save();

            }
        }
    }
    function AchieveGiver($count, $parent_id){
        if ($count == 5){
            $user = User::find($parent_id);
            $user['achievement'] = 'Менеджер';
            $user->save();
        }elseif($count == 25){
            $user = User::find($parent_id);
            $user['achievement'] = 'Старший менеджер';
            $user->save();
        }elseif($count == 125){
            $user = User::find($parent_id);
            $user['achievement'] = 'Директор';
            $user->save();
        }elseif($count == 625){
            $user = User::find($parent_id);
            $user['achievement'] = 'Директор по продажам';
            $user->save();
        }elseif($count == 3125){
            $user = User::find($parent_id);
            $user['achievement'] = 'Директор по маркетингуы';
            $user->save();
        }
    }
    function Distributor($parents){
        $parents = explode(',',substr($parents,1));
        array_pop($parents);

        for ($i= 1; $i<=5;$i++){
            if (isset($parents[count($parents)-$i])){
                if($i == 1){

                    $this->Gift($parents[count($parents)-$i],14000);

                }elseif($i ==2 || $i ==4){
                    $this->Gift($parents[count($parents)-$i],4000);
                }elseif($i ==3){
                    $this->Gift($parents[count($parents)-$i],2000);

                }else{
                    $this->Gift($parents[count($parents)-$i],6000);

                }
            }
        }


    }
    function Gift($user_id,$amount ){
        $treeOperation = new Tree_operation();
        $treeOperation['user_id'] = $user_id;
        $treeOperation['amount'] = $amount;
        $treeOperation['description'] = 'За нового консультанта вам начисляется '.$amount.' тг';
        $treeOperation->save();
        $parentUser = User::find($user_id);
        $parentUser['bill'] += $amount;
        $parentUser->save();



    }
    public function Withdraws(){
        $user = session()->get('user');
        $data['user'] = User::find($user['id']);
        $data['withdraws'] = Withdraw::where('user_id',$user['id'])->paginate(6);
        $data['active'] = 'withdraws';
        return view('withdraws',$data);
    }
    public function CreateWithdraw(Request $request){
        $rules = [
          'user_id' => 'required',
          'amount' => 'required',
          'bill' => 'required'
        ];
        $messages = [
            "user_id.required" => "Ошибка",
            "amount.required" => "Введите сумму вывода",
            "bill.required" => "Введите счет"

        ];
        $validator = $this->validator($request->all(),$rules,$messages);
        if ($validator->fails()){
            return back()->withErrors($validator->errors());
        }else{
            $user = User::find($request['user_id']);
            $sum = $user['bill'] - $request['amount'];
            if ($sum>=0) {
                $withdraw = new Withdraw();
                $withdraw['user_id'] = $request['user_id'];

                $withdraw['bill'] = $request['bill'];
                $withdraw['amount'] = $request['amount'];
                $withdraw['status'] = 'wait';
                $withdraw->save();
                return back()->with('message', 'Успешно отправлено');
            }else{
                return back()->withErrors('Недостаточно баланса');
            }
        }
    }
}
