<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;


class FronController extends CategoryController
{
    // trên thanh nav view share
    public function _construct()
    {
        $category = App\Category::all();
        View::share('category', $category);

    }
}
//   public function categoryIndex()
//   {
//      $category = Category::all();
//        return view('home.dashboard', compact('category'));
//   }

