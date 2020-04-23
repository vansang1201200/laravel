<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\Promise\all;

use App\Http\Requests\RegisterPost;

class CheckuotController extends Controller
{
    public function check_uot_login(){
        return view('page.checkuot.login_checkuot');
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('customers')->insertGetId($data);
            Session::put('customer_id',$customer_id);
            Session::put('customer_name',$request->customer_name);

            return Redirect::to('/checkuot');

    }
    public function checkuot(){
        return view('page.checkuot.show_checkuot');
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shopping_name'] = $request->shopping_name;
        $data['shopping_nodes'] = $request->shopping_nodes;
        $data['shopping_email'] = $request->shopping_email;
        $data['shopping_phone'] = $request->shopping_phone;
        $data['shopping_address'] = $request->shopping_address;

        $shopping_id = DB::table('shopping')->insertGetId($data);
        Session::put('shopping_id',$shopping_id);

        return Redirect::to('/payment');
    }
    public function payment(){
        return view('page.checkuot.payment');
    }

        public function checkuot_loguot(){
            Session::flush();
            return  Redirect::to('checkuot-login');
        }
        public function login_customer(Request $request){
            $email = $request->email_account;
            $password = md5($request->password_account);
            $resulf = DB::table('customers')->where('customer_email',$email)->
            where('customer_password',$password)->first();

            if ($resulf){
                Session::put('customer_id',$resulf->customer_id);
                return Redirect::to('/checkuot');
            }
            else {
                return Redirect::to('/checkuot-login');
            }
        }


        public function oder_payment(Request $request)
        {
            //cách lấy các trường ra
            //$content = Cart::content();
            //echo $content;

            //insert paymen method
            $data = array();
            $data['payment_method'] = $request->payment_option;
            $data['payment_status'] = 'Đang chờ xử lí';
            $payment_id = DB::table('payments')->insertGetId($data);

            //insert oder
            $oder_date = array();
            $oder_date['customer_id'] = Session::get('customer_id');
            $oder_date['shipping_id'] = Session::get('shopping_id');
            $oder_date['payment_id'] = $payment_id;
//            dd(Cart::priceTotal());
            $oder_date['oder_total'] = (float) Cart::priceTotal();
            $oder_date['oder_status'] = 'Đang chờ xử lí';
            $oder_id = DB::table('oders')->insertGetId($oder_date);
//                dd($oder_id);
            //insert oder_detail
            $content = Cart::content();
            foreach ($content as $v_content) {
                $oder_detail_date = array();
                $oder_detail_date['oder_id'] = $oder_id;
                $oder_detail_date['product_id'] = $v_content->id;
                $oder_detail_date['product_name'] = $v_content->name;
                $oder_detail_date['product_price'] = $v_content->price;
                $oder_detail_date['product_sales_quantity'] = $v_content->qty;
                DB::table('oderdetails')->insert($oder_detail_date);
            }

            if ($data['payment_method'] == 1) {
                Cart::destroy();
                echo 'thanh toán thẻ ATM';

            } elseif ($data['payment_method'] == 2) {
                Cart::destroy();
                return view('page.checkuot.handcash');

            } else {
                Cart::destroy();
                echo 'thẻ ghi nợ';
            }


//            return Redirect::to('/payment');
        }
        public function manage_oder(){
        $all_oder = DB::table('oders')
            ->join('customers' , 'customers.customer_id' ,'=','oders.customer_id')
            ->select('customer_name','oder_total','oder_status','oder_id')
            ->get();

//            $magena_oder = view('magena_oder.magena_oder')->with('all_oder',$all_oder);
//            dd($all_oder);

        return view('magane_oder.magane_oder',compact('all_oder'));
        }

        public function view_oder($oderId){
//        dd($oderId);
            $oder_view = DB::table('oders')
                ->join('customers' , 'customers.customer_id' ,'=','oders.customer_id')
                ->join('shopping','shopping.shopping_id','=','oders.shipping_id')
                ->join('oderdetails','oderdetails.oder_id','=','oders.oder_id')
                ->where('oders.oder_id', $oderId) ->get();

//                ->select('customer_name','oder_total','oder_status','oder_id')

//            dd($oder_view);
            return view('magane_oder.view_oder.view_oder',compact('oder_view'));
        }
}
