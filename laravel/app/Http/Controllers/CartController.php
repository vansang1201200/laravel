<?php

namespace App\Http\Controllers;

use App\Product;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;

session_start();
class CartController extends Controller
{
    public function save_cart(Request $request)
    {
       $productId = $request->productid_hidden;
        $quantily = $request->qty;

        $product_info = DB::table('products')->where('id', $productId)->first();
//////        dd($product_info);
////        Cart::add('293ad', 'Product 1', 1, 9.99, 550);
//        Cart::destroy();
       $data['id'] = $product_info->id;
       $data['qty'] = $quantily;
        $data['name'] = $product_info->name;
        $data['price'] =(float) $product_info->price;
        $data['weight'] = (float) $product_info->weight;
        $data['options']['image'] = $product_info->img;
//        dd($data);
        Cart::add($data);
        return Redirect::to('show_cart');
    }

    public  function show_cart()
    {

        return view('page.cart.show_cart');

    }

    public  function delete_to_cart( $rowId)
    {
        Cart::update($rowId,0);
        return Redirect::to('show_cart');
    }
    public function update_cart(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->quantity_cart;
        Cart::update($rowId,$qty);
        return Redirect::to('/show_cart');
    }

}
