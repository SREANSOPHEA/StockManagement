<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    public function viewCategory(){
        $category = DB::table('category')->paginate(5);
        return view('admin.viewCategory',['category'=>$category]);
    }
    public function addCategory(Request $data){
        $name = $data->name;
        $validate = $this->validateName('category',$name);
        if($validate>0){
            return redirect('/admin/view-categories')->with('error','category exist');
        }else{
            DB::table('category')->insert([
                'name'=>$name,
                'date'=>date("Y/m/d")
            ]);
            return redirect('/admin/view-categories');
        }
    }

    public function editCategory(Request $data){
        $id = $data->id;
        $name = $data->name;
        $validate = $this->validateName('category',$name);
        if($validate>0){
            return redirect('/admin/view-categories')->with('error','category exist');
        }else{
            DB::table('category')->where('id',$id)->update([
                'name'=>$name,
                'date'=>date("Y/m/d")
            ]);
            return redirect('/admin/view-categories');
        }
    }

    public function deleteCategory(Request $data){
        $id = $data->id;
        DB::table('category')->where('id',$id)->delete();
        return redirect('/admin/view-categories');
    }
}
