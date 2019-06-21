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

Route::get('/settings/preferred_communication/view/', 'UserinfoController@viewSettingsPC')
    ->name('settings.preferred_communication');
Route::get('/settings/preferred_communication/store/', 'UserinfoController@storeSettingsPC')
    ->name('settings.preferred_communication.store');

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

Route::post('/buyer-dashboard/order_history', 'BuyerDashboardController@orderHistory')
    ->name('buyer_dashboard.order.history');



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

Route::post('/order/order_details/buyer', 'OrderController@buyerOrderDetais')->name('order.details.buyer');
Route::post('/order/bulkStore', 'OrderController@bulkStore')->name('order.bulkStore');
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
Route::get('/api/buyer_addressed', 'ApiController@buyerAddresses')->name('api.buyer.addresses');
Route::get('/api/session/set_order_date', 'ApiController@setSessionOrderDate')->name('api.session.setOrderDate');
Route::get('/api/session/get_order_date', 'ApiController@getSessionOrderDate')->name('api.session.getOrderDate');

// product export import
Route::get('/my-products/export', 'ProductExcelController@exportToExcel')->name('product.export.excel');
Route::post('/my-products/import', 'ProductExcelController@importFromExcel')->name('product.import.excel');

// PDF Controller
Route::get('/outstanding_pdf/view_html/{invoice}', 'PdfController@viewOI')->name('view.html.oipdf');
Route::get('/pdf/invoice/outstanding/{invoice}', 'PdfController@generateOIpdf')->name('pdf.invoice.outstanding');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
