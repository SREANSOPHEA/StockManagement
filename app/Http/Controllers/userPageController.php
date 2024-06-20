<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userPageController extends Controller
{
    public function shop(){
        $product = DB::table('product')->join('stock','stock.productID','product.id')->get();
        return view('user.shop',['product'=>$product]);
    }
}
