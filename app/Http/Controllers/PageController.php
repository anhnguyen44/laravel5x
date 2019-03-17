<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;

class PageController extends Controller
{
    public function getIndex(){
    	$slide = Slide::all();
    	$new_product = Product::where('new',1)->paginate(8);
    	$top_product = Product::where('top',1)->get();
    	// echo "<pre>";
    	// print_r($new_product);
    	// echo "</pre>";
    	// foreach ($new_product as $pro) {
    	// 	echo $pro->name."<br>";
    	// }
    	// return view('page.trangchu',['slide'=>$slide]);
    	return view('page.trangchu',compact('slide','new_product','top_product'));//Méthode 2 
    }

    public function getLoaisanpham($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $name = ProductType::find($type)->name;
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','type','name'));
    }

    public function getChitietsanpham(Request $req){
        $product = Product::find($req->id);
        $autre = Product::where('id','<>',$req->id)->where('id_type',$product->id_type)->paginate(6);
    	return view('page.chitiet_sanpham',compact('product','autre'));
    }

    public function getContact(){
    	return view('page.contact');
    }

    public function getAbout(){
    	return view('page.about');
    }

    public function getAddtocart(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart  = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function deleteProduct($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function checkout(){
        return view('page.checkout');
    }

}
