<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;


// Clients -----------

Route::get('/',[ClientController::class,'index'])->name('homepage');
Route::get('/shop',[ClientController::class,'shop_page']);
Route::get('/product/{id}/{name}',[ClientController::class,'show']);
Route::get('/category/{id}',[ClientController::class,'show_category']);







Route::get('/send_mail',[ClientController::class,'send_mail'])->name('send_mail');



Route::post('/search',[ClientController::class,'search'])->name('search');



Route::get('/category/{id}/{category}',[CategoryController::class,'show']);

Route::get('/contact-us', [ContactController::class, 'create_contact'])->name('create_contact');
Route::post('contact-us',[ContactController::class,'store_contact'])->name('save_contact');

Route::get('/about-us', [ContactController::class, 'about_us'])->name('about_us');

Route::get('/pdf_view', [ContactController::class, 'pdfview1'])->name('pdf_view');

Auth::routes();
Route::middleware(['auth'])->group(function(){

    //==MPESA

    Route::get('get-token', [TransactionController::class, 'getAccessToken']);
    Route::get('stkpush1', [TransactionController::class, 'stkpushForm']);
    Route::post('stkpush', [TransactionController::class, 'stkPush'])->name('stk_push_promt');
    Route::get('stkpush-query/{id}', [TransactionController::class, 'transactionQuery'])->name('stk_query');
    Route::post('savequerydata', [TransactionController::class, 'savequerydata'])->name('savequerydata');

    Route::get('/logout', [HomeController::class, 'getLogout'])->name('logout');

    //=======CART ROUTES =====================
    Route::get('/lm', [ProductController::class, 'productList'])->name('products.list');
    Route::get('/cart', [CartController::class, 'cartList1'])->name('cart.list1');
    Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


    //==================checkout ==============================
    Route::get('/client/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/client/checkout', [CheckoutController::class, 'store_checkout_info'])->name('create.checkout');
    Route::get('/complete_transaction', [CheckoutController::class, 'finishtransaction'])->name('complete_transaction');
    Route::post('/complete_transaction', [CheckoutController::class, 'complete_transaction'])->name('complete_transaction');


    //====================client account ======================

    Route::get('/client/account', [ReportController::class, 'client_account'])->name('client_account');
    Route::get('/client/orders', [ReportController::class, 'client_orders'])->name('client_orders');
    Route::get('/client/order/{id}', [ReportController::class, 'show_client_order'])->name('show_client_order');

 
    
});



Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/admin/admin-panel', [AdminController::class, 'homepage'])->name('admin.panel');

    ///==================admin ====================

    Route::get('/create-product',[AdminController::class,'create']);
    Route::post('create-product',[AdminController::class,'store'])->name('create_product');
    Route::get('/products-listing',[AdminController::class,'productlisting']);
    Route::get('/remove-product/{id}',[AdminController::class,'delete_product'])->name('delete_product');

    Route::get('/products-listing/{id}',[AdminController::class,'adminProduct'])->name('adminProduct');

    Route::get('/update_product/{id}',[AdminController::class,'create_update_product']);
Route::post('/product_update',[AdminController::class,'update_product'])->name('product_update');

    Route::post('create-product-color',[AdminController::class,'store_product_color'])->name('create.product.color');
    Route::post('create-product-size',[AdminController::class,'store_product_size'])->name('create.product.size');
    Route::post('create-product-image',[AdminController::class,'store_product_image'])->name('create.product.image');


    Route::get('create-category',[CategoryController::class,'create'])->name('create-cat');
    Route::post('create-category',[CategoryController::class,'store'])->name('create-category');

    Route::get('/create-location',[CategoryController::class,'create_location'])->name('create-location');
    Route::post('/create-location',[CategoryController::class,'store_location'])->name('create-location');
    Route::get('/remove-category/{id}',[CategoryController::class,'delete_category'])->name('delete_category');

    Route::get('/location/{id}',[CategoryController::class,'delete_location'])->name('delete_location');
    // Route::get('/settings', function () {
    //     return view('admin.settings
    //     ');
    // });

    
    Route::get('/admin/active-admin-orders', [AdminController::class, 'active_admin_orders'])->name('admin.active.orders');

    Route::get('/admin/admin-orders', [AdminController::class, 'admin_orders'])->name('admin.orders');

    Route::get('/orderspdf', [AdminController::class, 'pdfreport'])->name('pdfreport');

    Route::get('admin-order/{id}',[AdminController::class,'show_order'])->name('admin.order');
    Route::post('admin-order/update',[AdminController::class,'update_status'])->name('update.order.status');
    Route::post('admin-order/payment',[AdminController::class,'update_payment'])->name('update.payment.status');

    Route::get('/admin/contacts', [AdminController::class, 'show_contacts'])->name('admin.contacts');
    Route::get('/admin/reviews', [AdminController::class, 'show_reviews'])->name('admin.reviews');
    Route::get('/delete_review/{id}', [AdminController::class, 'delete_review'])->name('delete_review');

    Route::get('/admin/users', [AdminController::class, 'show_users'])->name('admin.users');




});



Route::post('/save_review',[ContactController::class,'store_review'])->name('save_review');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/client', function () {
    return view('client.shop');
});


Route::get('/layout', function () {
    return view('app-layout.index');
});
