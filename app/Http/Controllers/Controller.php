<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

abstract class Controller
{
    public function validateName($table,$name){
        $validate = DB::table($table)->where('name',$name)->count();
        return $validate;
    }
    public function uploadImage($file){
        $image = rand(0,9999)."-".$file->getClientOriginalName();
        $file->move('images',$image);
        return $image;
    }
    public function date(){
        date_default_timezone_set('Asia/Phnom_Penh');
        return date('Y-m-d h:i:s');
    }
}
