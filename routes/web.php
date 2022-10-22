<?php

use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;


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

Route::get('/admin-login', 'AdminController@login');
Route::get('/admin-index', 'AdminController@admin_index');
Route::get('/productsadmin', 'AdminController@product');
Route::get('/categoryadmin', 'AdminController@category');
Route::post('/categorybook', 'AdminController@categorybook');
Route::post('/loginadmin','AdminController@admin_login');
Route::post('/customeradmin','AdminController@customer');
Route::delete('categoryadmin/{id}', 'AdminController@destroy');
// Ham show ra trang order adminn
Route::get('orderadmin','AdminController@orderadmin');
// ham lay gia tri qua trang update
Route::get('updatecategoryadmin/{id}', 'AdminController@update');
Route::post('update/{id}', 'AdminController@updatename');
Route::post('/productsadmins', 'AdminController@productadmin');
Route::delete('productsadmin/{id}', 'AdminController@deletebook');
Route::get('updatebook/{id}', 'AdminController@updateid');
Route::post('bookadmin/{idbook}', 'AdminController@updatebooks');
// Ham tra ve trang customer trong trang admin
Route::get('customeradmin', 'AdminController@customer_admin');

// Ham update trang thai don hang
Route::post('updatestatus/{idorder}', 'AdminController@updatestatus');


// Ham show tac gia trong trang admin
Route::get('authorviewadmin', 'AdminController@author');

// Ham them tac gia
Route::post('authoradmin', 'AdminController@nameauthor');

//Ham cap nhat tac gia
Route::get('updateauthoradmin/{id}', 'AdminController@updateauthor');

Route::delete('authorviewradmin/{id}', 'AdminController@deleteauthor');

//Ham lay ra gia tri cap nhat tac gia
Route::get('updateauthoradmin/{id}', 'AdminController@update_id_author');
Route::post('updateauthorsadmin/{id}','AdminController@updateauthor');

// Ham xoa don hang
Route::post('destroyorder/{id}', 'CustomerController@destroyorder');

// Ham cap nhat lai mat khau cua nguoi dung
Route::post('change-password/{id}','CustomerController@change_password');


//Customer
// Ham cho dang nhap cua customer
// post luu va thay doi du lieu
Route::get('Customer/home','CustomerController@home');
Route::post('login-customer','CustomerController@login_customer');
Route::get('Customer/indexcustomer','CustomerController@index');
Route::post('signup-customer','CustomerController@signup_customer');
// Ham hien thi san pham khach hang
Route::get('productcustomer/{id}','CustomerController@product');

// Ham chi tiet
Route::get('Customer/detailbook/{id_book}', 'CustomerController@detail_book');

//Ham my account
Route::get('Customer/myaccount', 'CustomerController@myaccount');

//Ham login customer
Route::get('Customer/login', 'CustomerController@login');

//Ham signup customer
Route::get('Customer/signup', 'CustomerController@signup');

//Ham log out customer
Route::get('Customer/logout', 'CustomerController@logout');

//Ham show ra cart cua customer
Route::get('Customer/cart', 'CustomerController@cart');

//Ham them sach vao gio hang
Route::post('Customer/cart/{id_book}', 'CustomerController@addtocart');

// Ham cap nhat lai so luong trong cart
Route::post('Customer/update-cart/{id_book}', 'CustomerController@update_cart');

// Ham add_account
Route::post('Customer/addressOfmyaccout', 'CustomerController@add_address');

// Ham add du lieu vao bang order
Route::post('Customer/adddataOrder', 'CustomerController@adddataOrder');

Route::get('test','CustomerController@test');

// Ham search book
Route::post('Customer/search', 'CustomerController@search');

Route::group([
    'namespace'=>'admin'
],function(){
    Route::group([
        'prefix'=>'category'
    ],function(){
        Route::get('/index',"categorycontroller@index");
    });
});
