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

Auth::routes();


// --------------------------------------- ADMIN -------------------------------------------------//
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/login', 'AdminController@login')->name('admin.login');

    Route::post('/login', 'AdminController@post_login')->name('admin.login');

    Route::get('/register', 'AdminController@register')->name('admin.register');

    Route::post('/register', 'AdminController@post_register')->name('admin.register');

    Route::group(['middleware' => 'admin'], function () {


        // ---- START Admin Dashboard -----//
        Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
        // ---- END Admin Dashboard -----//


        // ---- START Product Category -----//
        Route::resource('category', 'CategoryController');
        Route::get('/change-status-category/{id}', 'CategoryController@change_status')->name('category.change_status');
        Route::get('/change-home-flag-category/{id}', 'CategoryController@change_home_flag')->name('category.change_home_flag');
        // ----END Product Category -----//




        // ---- START Supplier -----//
        Route::resource('supplier', 'SupplierController');
        Route::get('/change-status-supplier/{id}', 'SupplierController@change_status')->name('supplier.change_status');
        // ---- END Supplier -----//




        // ---- START Product -----//
        Route::resource('product', 'ProductController');
        Route::get('/change-status-product/{id}', 'ProductController@change_status')->name('product.change_status');
        Route::get('/change-home-flag-product/{id}', 'ProductController@change_home_flag')->name('product.change_home_flag');
        // ---- END Product -----//



        // ---- START Order -----//
        Route::resource('order', 'OrderController');
        // ---- END Order -----//
    });
});
// ---------------------------------------END ADMIN -------------------------------------------------//








// --------------------------------------- CLIENT -------------------------------------------------//
Route::group(['namespace' => 'Client'], function () {

    //Trang chủ
    Route::get('/', 'HomeController@index')->name('home.index');


    //Đăng nhập / Đăng ký khách hàng
    Route::get('/dang-nhap', 'CustomerController@login')->name('customer.login');
    Route::get('/dang-ky', 'CustomerController@register')->name('customer.register');
    Route::post('/post-login', 'CustomerController@post_login')->name('customer.post_login');
    Route::post('/post-register', 'CustomerController@post_register')->name('customer.post_register');

    Route::group(['middleware' => 'customer'], function () {
        Route::get('/thong-tin-tai-khoan', 'CustomerController@my_account')->name('customer.my_account');
        Route::get('/dang-xuat', 'CustomerController@logout_customer')->name('customer.logout');
        Route::get('/view-order', 'CustomerController@view_order')->name('customer.view_order');
    });


    //Sản phẩm (Product)
    Route::group(['prefix' => 'product'], function () {

        //Xem chi tiết sản phẩm
        Route::get('/{alias}/{id}', 'ProductController@view_detail')->name('product.viewdetail');

        //Tìm kiếm sản phẩm trang Home
        Route::get('/search-keyup-home', 'ProductController@search_keyup_home')->name('product.search_keyup_home');

        //View shop product
        Route::get('/view-all-product', 'ProductController@view_all_product')->name('product.view_all_product');
    });

    
    //Giỏ hàng (Cart)
    Route::group(['prefix' => 'cart'], function () {

        //Thêm sản phẩm vào giỏ hàng
        Route::get('/add/{id}/{quantity}', 'CartController@add_to_cart')->name('cart.add');

        //Xem giỏ hàng
        Route::get('/view', 'CartController@view_cart')->name('cart.view');

        //Cập nhật item giỏ hàng
        Route::get('/update/{id}', 'CartController@update_cart')->name('cart.update');

        //Xoá item trong giỏ hàng
        Route::get('/delete/{id}', 'CartController@delete_cart')->name('cart.delete');

        //Xoá sạch giỏ hàng
        Route::get('/clear', 'CartController@clear_cart')->name('cart.clear');
    });


    //Thanh toán
    Route::get('/checkout', 'PaymentController@checkout')->name('payment.checkout');
    Route::post('/payment', 'PaymentController@payment')->name('payment.payment');
    Route::get('/load-province', 'PaymentController@load_province')->name('payment.load_province');
    Route::get('/load-district', 'PaymentController@load_district')->name('payment.load_district');
    Route::get('/load-precinct', 'PaymentController@load_precinct')->name('payment.load_precinct');
    Route::get('/generate-code', 'PaymentController@generate_code')->name('payment.generate_code');
});
// --------------------------------------- END CLIENT -------------------------------------------------//