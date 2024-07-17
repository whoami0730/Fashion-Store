<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\ContactInfoController;


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


//Website view pages
Route::view('/', 'website.home')->name('home');
Route::view('shop', 'website.shop')->name('shop');
Route::view('product_detail', 'website.product_detail')->name('product_detail');
Route::view('cart', 'website.cart')->name('cart')->middleware('UserGuard');
Route::view('checkout', 'website.checkout')->name('checkout')->middleware('UserGuard');
Route::view('contact', 'website.contact')->name('contact');
Route::view('payment_success', 'website.payment_success')->name('payment_success');
Route::view('productbycategory', 'website.productbycategory')->name('productbycategory');
Route::view('login', 'website.login')->name('login');
Route::view('signup', 'website.signup')->name('signup');
Route::view('profile', 'website.profile')->name('profile')->middleware('UserGuard');
Route::view('order', 'website.order')->name('order');
Route::view('address', 'website.address')->name('address');
Route::view('add_address', 'website.add_address')->name('add_address');
Route::view('edit_address', 'website.edit_address')->name('edit_address');
Route::view('payment', 'website.payment')->name('payment');
Route::view('track_order', 'website.track_order')->name('track_order    ');
Route::view('forgot', 'website.forgot_password')->name('forgot');
Route::view('create_new_password', 'website.create_new_password')->name('create_new_password');
Route::view('search_product', 'website.search_product')->name('search_product');




//Admin view pages
Route::view('dashboard', 'admin.dashboard')->middleware('AdminGuard');
Route::view('category', 'admin.category')->middleware('AdminGuard');
Route::view('product', 'admin.product')->middleware('AdminGuard');
Route::view('admin_login', 'admin.admin_login');
Route::view('contact_info', 'admin.contact_info')->middleware('AdminGuard');
Route::view('order_info', 'admin.order_info')->middleware('AdminGuard');
Route::view('single_order_info', 'admin.single_order_info')->middleware('AdminGuard');
Route::view('tastimonial', 'admin.tastimonial')->middleware('AdminGuard');
Route::view('email', 'email.dispatch')->middleware('AdminGuard');
Route::view('search', 'admin.search')->middleware('AdminGuard');
Route::view('view_product', 'admin.view_product')->middleware('AdminGuard');
Route::view('shipping', 'admin.shipping')->middleware('AdminGuard');



Route::controller(CategoryController::class)->group(function () {

    Route::post('category', 'store')->middleware('AdminGuard');
    Route::get('category', 'index')->middleware('AdminGuard');
    Route::get('edit_category{id}', 'edit')->name('edit_category')->middleware('AdminGuard');
    Route::post('update_category{id}', 'update')->name('update_category')->middleware('AdminGuard');
    Route::get('delete_category{id}', 'delete')->name('delete_category')->middleware('AdminGuard');

    
    

});


Route::controller(ProductController::class)->group(function () {

    Route::post('product', 'store')->middleware('AdminGuard');
    Route::get('product', 'index')->middleware('AdminGuard');
    Route::get('edit_product{id}', 'edit')->name('edit_product')->middleware('AdminGuard');
    Route::post('update_product{id}', 'update')->name('update_product')->middleware('AdminGuard');
    Route::get('delete_product{id}', 'delete')->name('delete_product')->middleware('AdminGuard');
    Route::post('search', 'Search')->name('search')->middleware('AdminGuard');

    // <------------ website Panel ---------->

    Route::get('/', 'ProductHome')->name('home');
    Route::get('shop', 'ProductShop')->name('shop');
    Route::get('productbycategory{category_id}','productbycategory')->name('productbycategory');
    Route::get('productdetail{id}','ProductDetail')->name('product_detail');
    Route::post('productSearch', 'ProductSearch')->name('productSearch');
});

Route::controller(ContactInfoController::class)->group(function () {

    
    Route::get('contact_info', 'index')->middleware('AdminGuard');
    Route::get('delete_contact_info{id}', 'delete')->name('delete_contact_info')->middleware('AdminGuard');

    Route::post('contact', 'store')->name('contact');
    Route::get('contact', 'create')->name('contact');
    
});

Route::controller(ShippingController::class)->group(function () {
    Route::post('shipping', 'store')->name('shipping')->middleware('AdminGuard');
    Route::get('shipping', 'index')->name('shipping')->middleware('AdminGuard');
    Route::get('edit_shipping{id}', 'edit')->name('edit_shipping')->middleware('AdminGuard');
    Route::post('update_shipping{id}', 'update')->name('update_shipping')->middleware('AdminGuard');
    Route::get('delete_shipping{id}', 'delete')->name('delete_shipping')->middleware('AdminGuard');
   
});

Route::controller(AdminController::class)->group(function () {

    Route::post('admin_login', 'admin_login')->name('admin_login');
    Route::get('storageLink', 'StorageLink')->middleware('AdminGuard');
});


// Website Route Controller 

Route::controller(CartController::class)->group(function () {

    Route::post('addtocart', 'store')->name('addtocart')->middleware('UserGuard');
    Route::get('cart', 'ProductCart')->name('cart')->middleware('UserGuard');
    Route::get('delete_cart{product_id}', 'DeleteCart')->name('delete_cart')->middleware('UserGuard');
    Route::get('update_cart_item{cart_id}', 'cartIncrease')->name('update_cart_item')->middleware('UserGuard');
  
});

Route::controller(UserController::class)->group(function () {

    Route::post('signup', 'store')->name('signup');
    Route::post('login', 'UserLogin')->name('login');
    Route::get('profile', 'userInfo')->name('profile')->middleware('UserGuard');
    Route::post('user_update{id}', 'userUpdate')->name('user_update')->middleware('UserGuard');
   
    Route::post('create_new_password', 'UpdatePassword')->name('create_new_password');
    Route::post('verify_email', 'VerifyEmail')->name('verify_email');
});

Route::controller(AddressController::class)->group(function () {

    Route::post('create_address', 'store')->name('create_address')->middleware('UserGuard');
    Route::post('new_address', 'storeNewAddress')->name('new_address')->middleware('UserGuard');
    Route::get('checkout', 'AddressCheckout')->name('checkout')->middleware('UserGuard');
    Route::get('add_address', 'count')->name('add_address')->middleware('UserGuard');
    Route::get('address_delete{id}', 'AddressDelete')->name('address_delete')->middleware('UserGuard');
    Route::get('address', 'addressWebsite')->name('address')->middleware('UserGuard');
    Route::get('edit_address{id}', 'addressEdit')->name('edit_address')->middleware('UserGuard');
    Route::post('update_address{id}', 'addressUpdate')->name('update_address')->middleware('UserGuard');
    
});


Route::controller(RazorpayController::class)->group(function () {

    Route::get('success', 'store')->name('success')->middleware('UserGuard');
    Route::post('makeOrder', 'makeOrder')->name('makeOrder')->middleware('UserGuard');
    
});



Route::controller(OrderController::class)->group(function () {

    Route::get('order_info', 'index')->name('order_info')->middleware('AdminGuard');
    Route::get('SingleOrderDetail{order_id}', 'ShowSingleOrder')->name('SingleOrderDetail')->middleware('AdminGuard');
    Route::get('dispatch{order_id}', 'DispatchOrder')->name('dispatch')->middleware('AdminGuard');
    Route::get('order', 'orderWebsite')->name('order')->middleware('UserGuard');
    Route::get('track_order{order_id}', 'TrackOrder')->name('track_order')->middleware('UserGuard');

    Route::get('dashboard', 'OverviewCount')->name('dashboard')->middleware('AdminGuard');
    
});







 // <------------ User Logout ---------->
Route::get('logout_user', function () {
    if (session()->has('user')) {
        session()->pull('user');
        return redirect('login');
    } else {
        return redirect('login');
    }
})->name('logout_user')->middleware('UserGuard');


 // <------------ Admin Logout ---------->  

Route::get('logout', function () {
    if (session()->has('admin')) {
        session()->pull('admin');
        return redirect('admin_login');
    } else {
        return redirect('admin_login');
    }
})->name('logout')->middleware('AdminGuard');

