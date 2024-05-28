<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        return view('admin.dashboard');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
