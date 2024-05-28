<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class productController extends Controller
{
    public function viewProduct(Request $data){
        $product = DB::table('product')->join('category','product.categoryID','category.id')->select('product.*','category.name as category')->paginate(5);
      if(isset($data->search)){
        $search = $data->search;
        $product = DB::table('product')->join('category','product.categoryID','category.id')->select('product.*','category.name as category')->where('product.name','like',"%$search%")->paginate(5);
      }
        return view('admin.viewProduct',['product'=>$product]);
    }

    public function addProduct(){
        $category = DB::table('category')->get();
        return view('admin.addProduct',['category'=>$category]);
    }

    public function addProductSubmit(Request $data){
        $name = $data->name;
        $price = $data->price;
        $category = $data->category;
        $detail = $data->detail;
        $file = $data->file('image');
        if($price<=0){
            return redirect('/admin/add-product');
        }
        $validate = $this->validateName('product',$name);
        if($validate>0){
            return redirect('/admin/add-product')->with('error','product exist');
        }else{
            $image = $this->uploadImage($file);
            DB::table('product')->insert([
                'name'=>$name,
                'price'=>$price,
                'categoryID'=>$category,
                'detail'=>$detail,
                'image'=>$image
            ]);
            return redirect('/admin/view-product');
        }
    }

    public function editProduct(Request $data){
        $id = $data->id;
        $product = DB::table('product')->find($id);
        $category = DB::table('category')->get();
        return view('admin.editProduct',['product'=>$product,'category'=>$category]);
    }
}
