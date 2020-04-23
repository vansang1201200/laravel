<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use mysql_xdevapi\Table;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }


    // layout trang chủ
    public function getIndex(){
        return view('master');
    }

    public function seach_home(Request $request){
        $keywords = $request->keywords_submit;
        $search_home = DB::table('products')->where('name','like','%'.$keywords.'%')->get();
//        dd($search_home);
        return view('home.seach',compact('search_home'));
    }

    public function all_product(){

        $all_product = DB::table('products')->get();
        return view('page.product.all_product',compact('all_product'));

    }

}
