<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\View\View;

class FrontendController extends ProductController
{
    public function productIndex(){
        $product = Product::where([
            'pro_hot'=> Product::HOT_OFF,
        ])->get();

        $productHot = Product::where([
            'pro_hot'=> Product::HOT_ON,
        ])->get();

        // có sửa welcome thành home.homeindex
        return view( 'home.dashboard',compact(['product','productHot']));
//        return view( 'master',compact(['product','productHot']));

    }
    //chi tiet san pham
    public function show_detail(Request $re){
        $products = Product::where('id',$re->id)->get();
        $a = null;
        foreach ( $products as $pro) {
            $a = $pro->category_id;
        }

        $products_category = Product::where('category_id', $a)->limit(3)->get();
//        $products_category = Product::where('category_id',$a->category_id)->paginate(3)->get();
//        dd('$products_category');

        return view('page.product.show_detail',compact('products','products_category'));
    }
}

