<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function register(Request $data){
        $name = $data->name;
        $gender = $data->gender;
        $password = $data->password;
        $email = $data->email;
        $validate = $this->validateName('users',$name);
        if($validate>0){
            return redirect('/register')->with('error','user exist');
        }else{
            $date = $this->date();
            $password = Hash::make($password);
            if($gender == 'Male') $profile = "male-user.png";
            else $profile = "female-user.png";
            DB::table('users')->insert([
                'name'=>$name,
                'gender'=>$gender,
                'email'=>$email,
                'password'=>$password,
                'created_at'=>$date,
                'updated_at'=>$date,
                'profile'=>$profile
            ]);
        }
        return redirect('/login');
    }
    public function login(Request $data){
        $name = $data->name;
        $password = $data->password;
        if(Auth::attempt(['name'=>$name,'password'=>$password])){
            return redirect('/admin');
        }else{
            return redirect('/login')->with('error','invalid');
        }
    }

    public function dashboard(){
        $customer = DB::table('customer')->count();
        $product = DB::table('product')->count();
        $expense = DB::table('purchase')->select(DB::raw('sum(amount) as expense'))->first();
        $revenue = DB::table('sale')->select(DB::raw('sum(amount) as revenue'))->first();
        $chart = DB::table('purchase')->get();
        $chart_sale = DB::table('sale')->get();
        return view('admin.dashboard',['customer'=>$customer,'expense'=>$expense->expense,'revenue'=>$revenue->revenue,'product'=>$product,'chart'=>$chart,'chart_sale'=>$chart_sale]);
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function userregister(Request $data){
        $name = $data->name;
        $gender = $data->gender;
        $password = $data->password;
        $email = $data->email;
        $validate = $this->validateName('customer',$name);
        if($validate>0){
            return redirect('/user-register')->with('error','user exist');
        }else{
            if($gender=='Male') $profile = "male-user.png";
            else $profile = "female-user.png";
            DB::table('customer')->insert([
                'name'=>$name,
                'gender'=>$gender,
                'email'=>$email,
                'password'=>$password,
                'profile' =>$profile
            ]);
        }
        return redirect('/user-login');
    }

    public function userlogin(Request $data){
        // return $data;
        $name = $data->name;
        $password = $data->password;
        $check = DB::table('customer')->where([['name',$name],['password',$password]])->get();
        if(count($check)>0){
            $data->session()->put('customerID', $check[0]->id);
            $data->session()->put('customerName', $check[0]->name);
            $data->session()->put('customerProfile', $check[0]->profile);
            return redirect('/');
        }else{
            return redirect('/user-login')->with('error','invalid');
        }
    }

    public function shopSubmit(Request $data){
        // return Session('customerID');
        $discount = $data->discount;
        $amount = $data->amount;
        $subtotal = $data->subtotal;
        if($subtotal == 0){
            return redirect('/shop');
        }

        try{
            if($data->session()->has('customerID')){
            DB::table('sale')->insert(['subtotal'=>$subtotal,'discount'=>$discount,'amount'=>$amount,'date'=>date('Y-m-d')]);
            $purchaseID = DB::table('sale')->orderByDesc('id')->limit(1)->get();
            $name = $data->name;
            $id = $data->id;
            $qty = $data->qty;
            $price = $data->price;
            for($i=0;$i<count($name);$i++){
                DB::table('saledetail')->insert([
                    'saleID'=>$purchaseID[0]->id,
                    'admin'=> Auth::user()->id,
                    'productID' =>$id[$i],
                    'customerID' => Session('customerID'),
                    'quantity' => $qty[$i],
                    'price' => $price[$i]
                ]);   
    
                $stock = DB::table('stock')->where('id',$id[$i])->get();
                $quantity =$stock[0]->quantity - $qty[$i];
                DB::table('stock')->where('id',$id[$i])->update([
                    'quantity'=> $quantity
                ]);
            }
            return redirect('/shop')->with('success','Purchase Successful');
        }else{
            return redirect('/shop')->with('invalid','tv login sin pro');
        }
        }catch(Exception $e){
            return redirect('/shop');
        }
        
        
    }
    public function userlogout(Request $data){
        Session::remove('customerID');
        Session::remove('customerName');
        Session::remove('customerProfile');

        return redirect('/');
    }

    public function accountSetting(){
        return view('admin.accountSetting');
    }
}
