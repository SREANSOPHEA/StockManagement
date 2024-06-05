<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\select;

class productController extends Controller
{
    public function stock(Request $data){
        $stock = DB::table('product')->join('stock','stock.productID','product.id')->join('category','product.categoryID','category.id')->select('stock.quantity as qty','product.*','category.name as category')->orderByDesc('product.id')->paginate(5);
        if(isset($data->search)){
            $search = $data->search;
            $stock = DB::table('product')->join('stock','stock.productID','product.id')->join('category','product.categoryID','category.id')->select('stock.quantity as qty','product.*','category.name as category')->where('product.name','like',"%$search%")->orderByDesc('product.id')->paginate(5);
        }
        return view('admin.stock',['product'=>$stock]);
    }

    public function viewProduct(Request $data){
        $product = DB::table('product')->join('category','product.categoryID','category.id')->select('product.*','category.name as category')->orderByDesc('product.id')->paginate(5);
      if(isset($data->search)){
        $search = $data->search;
        $product = DB::table('product')->join('category','product.categoryID','category.id')->select('product.*','category.name as category')->where('product.name','like',"%$search%")->orderByDesc('product.id')->paginate(5);
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

            $product = DB::table('product')->limit(1)->orderByDesc('id')->get();
            DB::table('stock')->insert([
                'productID'=>$product[0]->id,
                'quantity'=>0
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

    public function purchase(){
        $product = DB::table('product')->join('category','product.categoryID','category.id')->select('product.*','category.name as category')->get();
        return view('admin.purchase',['product'=>$product]);
    }

    public function purchase1(){
        $product = DB::table('product')->join('category','product.categoryID','category.id')->select('product.*','category.name as category')->get();
        return view('admin.purchase1',['product'=>$product]);
    }

    public function purchaseSubmit(Request $data){
        $subtotal = $data->subtotal;
        $discount = $data->discount;
        $amount = $data->amount;
        if($subtotal == 0) return redirect('/admin/purchase');

        DB::table('purchase')->insert(['subtotal'=>$subtotal,'discount'=>$discount,'amount'=>$amount,'date'=>date('Y-m-d')]);
        $purchaseID = DB::table('purchase')->orderByDesc('id')->limit(1)->get();
        $name = $data->name;
        $id = $data->id;
        $qty = $data->qty;
        $price = $data->price;
        for($i=0;$i<count($name);$i++){
            DB::table('purchasedetail')->insert([
                'purchaseID'=>$purchaseID[0]->id,
                'admin'=> Auth::user()->id,
                'productID' =>$id[$i],
                'sellerID' => 1,
                'quantity' => $qty[$i],
                'price' => $price[$i]
            ]);   

            $stock = DB::table('stock')->where('id',$id[$i])->get();
            $quantity = $qty[$i] + $stock[0]->quantity;
            DB::table('stock')->where('id',$id[$i])->update([
                'quantity'=> $quantity
            ]);
        }
        return redirect('/admin/stock');
        
        // return $data;
    }

    public function purchaseInvoice(){
        $purchase = DB::table('purchase')
        ->join('purchasedetail','purchasedetail.purchaseID','purchase.id')
        ->join('users','users.id','purchasedetail.admin')
        ->select('purchase.id', 'purchase.date', 'users.name', DB::raw('COUNT(purchasedetail.id) as product_count'))
        ->groupBy('purchase.id', 'purchase.date', 'users.name')
        ->orderByDesc('purchase.id')->paginate(5);
        return view('admin.purchaseInvoice',['purchase'=>$purchase]);
    }

    public function purchaseInvoiceDetail($id){
        // return Hash::make($id);
        $detail = DB::table('purchasedetail')
        ->join('purchase','purchase.id','purchasedetail.purchaseID')
        ->join('users','users.id','purchasedetail.admin')
        ->join('product','product.id','purchasedetail.productID')
        ->join('category','category.id','product.categoryID')
        ->select('purchase.id as ID','purchase.*','purchasedetail.*','product.name as product','category.name as category','users.name as admin')
        ->where('purchase.id',$id)
        ->get();
        return view('admin.purchaseInvoiceDetail',['detail'=>$detail]);
    }
}
