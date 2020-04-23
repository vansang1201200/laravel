<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_mail(){
        //send mail
        $to_name = "Van sang";
        $to_email = "levansanglvs9@gmail.com";//send to this email
        $a = Cart::content();
//        dd($a);

        $data = array("name"=>"Mail từ tài khoản khách hàng", "body"=> "mail gửi về hàng hóa",
            "product" => $a); //body of mail.blade.php

                Mail::send('page.mail.send_mail', $data ,function ($message) use ($to_name,$to_email){
                    $message->to($to_email)->subject('test mail nhé');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail
                });
               return  redirect('/')->with('message','');
                //--send mail


    }
}
