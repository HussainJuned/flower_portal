<?php

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

Route::get('/', 'HomeController@intro')->name('intro');

//Route::get('/registration', 'MainController@createRegistration')->name('registration.create');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/my-products', 'SellerDashboardController@myProducts')
    ->name('seller_dashboard.myProducts');

Route::get('/seller-dashboard', 'SellerDashboardController@sellerDashboard')
    ->name('seller_dashboard.seller_dashboard');

Route::get('/buyer-dashboard', 'BuyerDashboardController@dashboard')
    ->name('buyer_dashboard.buyer_dashboard');
Route::get('/buyer-dashboard/order/{order}', 'BuyerDashboardController@viewOrder')
    ->name('buyer_dashboard.order.view');
Route::post('/buyer-dashboard/updateOrderToReceived/{order}', 'BuyerDashboardController@updateOrderStatusToReceived')
    ->name('buyer_dashboard.order.updateToReceived');

Route::post('/seller-dashboard/updateToAccepted/{order}', 'SellerDashboardController@updateToAccepted')
    ->name('seller_dashboard.order.updateToAccepted');
Route::post('/seller-dashboard/updateToShipped/{order}', 'SellerDashboardController@updateToShipped')
    ->name('seller_dashboard.order.updateToShipped');
Route::post('/seller-dashboard/updateToDelivered/{order}', 'SellerDashboardController@updateToDelivered')
    ->name('seller_dashboard.order.updateToDelivered');

Route::get('/seller-dashboard/order/{order}', 'SellerDashboardController@viewOrder')
    ->name('seller_dashboard.order.view');


Route::get('/search-intro', 'SearchController@intro')->name('search.intro');
Route::get('/search/flower', 'SearchController@searchFlower')->name('search.flower');
Route::get('/search/seller', 'SearchController@searchSeller')->name('search.seller');
Route::get('/order/view/{order}', 'OrderController@show')->name('order.view');
Route::post('/order/{product}', 'OrderController@store')->name('order.store');
Route::get('/product-review/', 'ProductReviewController@create')->name('product_review.create');
Route::post('/product-review/{order}/{product}', 'ProductReviewController@store')->name('product_review.store');

Route::post('/buyer-account-review/{order}', 'BuyerAccountReviewController@store')->name('buyer_review.store');

Route::resource('userinfos', 'UserinfoController');
Route::resource('products', 'ProductController');


Route::get('/artisan/migrate_fresh', 'CommandController@migrate_fresh');
Route::get('/artisan/migrate', 'CommandController@migrate');
Route::get('/artisan/config_clear', 'CommandController@config_clear');


// search api
Route::get('/api/flower', 'SearchController@apiFlowerAll')->name('api.flower.all');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
