<?php

namespace App\Http\Controllers;

use App\Contac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ContacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            if (Auth::user()){
                $contact = Contac::all();
                return view('contact.index',compact('contact'));
            }
        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contac();
        $contact->name_contact = $request->input('name_contact');
        $contact->address_contact = $request->input('address_contact');
        $contact->phone_contact = $request->input('phone_contact');
        $contact->email = $request->input('email');
        $contact->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới khách hàng thành công');
        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('contact.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contac  $contac
     * @return \Illuminate\Http\Response
     */
    public function show(Contac $contac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contac  $contac
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contac::findOrFail($id);
        return view('contact.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contac  $contac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $contact = Contac::findOrFail($id);
        $contact->name_contact = $request->input('name_contact');
        $contact->address_contact = $request->input('address_contact');
        $contact->phone_contact = $request->input('phone_contact');
        $contact->email = $request->input('email');
        $contact->save();

        Session::flash('success','Chỉnh sửa thành công');
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contac  $contac
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contac::findOrFail($id);
        $contact->delete();
        Session::flash('success', 'Xóa khách hàng thành công');
        return redirect()->route('contact.index');
    }
    public function show_blog(){
        $all_contact = DB::table('contacts')->get();
//       dd($all_contact);
        return view('page.contact.contact',compact('all_contact'));
    }
}
