<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    retx

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('product', 'ProductController');
Route::group(['prefix' => 'product'], function () {
    Route::get('/','ProductController@index')->name('product.index');
    Route::get('/create','ProductController@create')->name('product.create');
    Route::post('/create','ProductController@store')->name('product.store');
    Route::get('/show/{product}','ProductController@show')->name('product.detail');
    Route::get('/{id}/edit','ProductController@edit')->name('product.edit');
    Route::post('/{id}/edit','ProductController@update')->name('product.update');
    Route::get('/{id}/destroy','ProductController@destroy')->name('product.destroy');
});

Route::get('product_trash', 'ProductController@trash')->name('product.trash');
Route::get('product_restore/{id}', 'ProductController@restore')->name('product.restore');
Route::get('product_restoreAll', 'ProductController@restoreAll')->name('product.restoreAll');
Route::get('product_deleteAll', 'ProductController@deleteAll')->name('product.deleteAll');


Route::group(['prefix' => 'category'], function () {
    Route::get('/','CategoryController@index')->name('category.index');
    Route::get('/create','CategoryController@create')->name('category.create');
    Route::post('/create','CategoryController@store')->name('category.store');
    Route::get('/{id}/edit','CategoryController@edit')->name('category.edit');
    Route::post('/{id}/edit','CategoryController@update')->name('category.update');
    Route::get('/{id}/destroy','CategoryController@destroy')->name('category.destroy');
});

Route::get('category_trash', 'CategoryController@trash')->name('category.trash');
Route::get('category_restore/{id}', 'CategoryController@restore')->name('category.restore');
Route::get('category_restoreAll', 'CategoryController@restoreAll')->name('category.restoreAll');
Route::get('category_deleteAll', 'CategoryController@deleteAll')->name('category.deleteAll');

//tin tức
Route::group(['prefix'=>'blog'], function (){
    Route::get('/','BlogController@index')->name('blog.index');
    Route::get('/create','BlogController@create')->name('blog.create');
    Route::post('/create','BlogController@store')->name('blog.store');
    Route::get('/{id}/edit','BlogController@edit')->name('blog.edit');
    Route::post('/{id}/edit','BlogController@update')->name('blog.update');
    Route::get('/{id}/destroy','BlogController@destroy')->name('blog.destroy');
});
//Route::resource('blog','BlogController');

//blog
Route::get('show-blog','BlogController@show_blog');

//liên hệ
Route::group(['prefix'=>'contact'],function (){
    Route::get('/','ContacController@index')->name('contact.index');
    Route::get('/create','ContacController@create')->name('contact.create');
    Route::post('/create','ContacController@store')->name('contact.store');
    Route::get('/{id}/edit','ContacController@edit')->name('contact.edit');
    Route::post('/{id}/edit','ContacController@update')->name('contact.update');
    Route::get('/{id}/destroy','ContacController@destroy')->name('contact.destroy');
});
//contact
Route::get('show-contact','ContacController@show_blog');


//tìm kiếm
//seachproduct
Route::get('/searchproduct','ProductController@searchProduct');
//seachcategory
Route::get('/searchcategory','CategoryController@searchCategory');
//seach home
Route::post('/search-home','HomeController@seach_home');



//tất cả sản phẩm
Route::get('/all-product','HomeController@all_product');
////show sản phẩm ra trang chủ
Route::get('/','FrontendController@productIndex')->name('index.prodouct');


//show danh mục
//Route::get('/','FronController@categoryIndex')->name('index.category');



//danh muc san pham trang chu
Route::get('/category-product/{id}','CategoryController@show_category');
//chi tiet san pham
Route::get('/product/{id}','FrontendController@show_detail');


//giỏ hàng
//update cart
Route::post('update-cart','CartController@update_cart')->name('update-cart-api');
//add
Route::post('save-cart','CartController@save_cart');
//show
Route::get('show_cart','CartController@show_cart');
//xóa
Route::get('/delete_cart/{rowId}','CartController@delete_to_cart');

//check_uot
//form login
Route::get('checkuot-login','CheckuotController@check_uot_login');
//loguot
Route::get('checkuot-loguot','CheckuotController@checkuot_loguot');
//add
Route::post('add-customer','CheckuotController@add_customer');
//login
Route::post('login-customer','CheckuotController@login_customer');

Route::get('checkuot','CheckuotController@checkuot');
//thanh toán
Route::get('payment','CheckuotController@payment');
//lưu
Route::post('save-checkout-customer','CheckuotController@save_checkout_customer');

//đặt hàng
Route::post('oder-payment','CheckuotController@oder_payment');

//quản lí đơn hàng (oder)
Route::get('manage-oder','CheckuotController@manage_oder');
Route::get('view-oder/{oderId}','CheckuotController@view_oder');

//send mail
Route::get('send-mail','MailController@send_mail');




Auth::routes();



