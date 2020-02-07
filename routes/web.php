<?php

use Illuminate\Http\Request;
Route::get('/', function () {
    return view('landingpage');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'PagesController@index')->name('home');

Route::get('/about', 'HomeController@about')->name('about');

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/payment', 'PagesController@payment')->name('paymentform');

Route::post('/submit', 'Formcontroller@submit')->name('paymentform');



Route::get('/terms_and_condition', function () {
	    return view('landingpage');
});

Route::get('/terms_and_condition_washer', function () {
	    return view('landingpage');
});

Route::get('/code_of_conduct', function () {
	    return view('landingpage');
});

Route::get('/privacy_policy', function () {
	    return view('privacy');
});


Route::get('/paymentgateway', 'StripePaymentGatewayController@makepayment');
Route::get('/stripesuccess', 'StripePaymentGatewayController@stripesuccess');
Route::get('/stripefail', 'StripePaymentGatewayController@stripefail');



Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function() {


	/****************     Routes For Account CRUD       ****************/
	Route::get('vehicle_color/datatable', 'VehicleColorController@datatable');
	Route::resource('vehicle_color', 'VehicleColorController');



	Route::get('complains', 'AdminController@complain');
	Route::get('/washer/{id}', 'WasherController@viewwasherdetails');
	Route::get('/activatewasher/{id}', 'WasherController@approvewasherdetails');
	Route::resource('seo', 'SeoController');
	Route::get('requests', 'AdminController@request');
	Route::get('callbacks', 'AdminController@callback');
	Route::get('ondemand', 'AdminController@ondemand');
	Route::get('contacts', 'AdminController@contact');
	Route::get('services','AdminController@service');
	Route::get('slider_images','AdminController@slider_image');
	Route::get('userlists','AdminController@userlist');
	Route::get('washerlists','AdminController@washerlist');
	Route::get('book_car_wash','AdminController@showcarwashbookingform');
	Route::post('book_car_wash','AdminController@savecarwashrequest');


	Route::get('complain_destroy', 'AdminController@complain_destroy');
	Route::get('home', 'AdminController@showhome');
	Route::resource('slider_img', 'SliderController');
	Route::resource('services', 'ServiceController');
	Route::resource('faqs', 'FAQController');
	Route::resource('car_wash', 'CarwashController');
	// Route::resource('car_service', 'CarservicingController');
	Route::resource('cars', 'CarController');
	Route::resource('feedbacks', 'FeedbackController');
	Route::resource('accessories', 'CaraccessoriesController');
	Route::resource('brands', 'BrandController');
	Route::resource('carmodels', 'ModelController');
	Route::get('getmodel/{brand_id}', 'AdminController@model_data');
	// Route::get('template', 'AdminController@template');
	Route::get('users', 'AdminController@showusers');
	Route::get('sendsms', 'AdminController@showsendsms');
	Route::get('pendingorder', 'AdminController@pendingorder');
	Route::resource('promocode', 'PromoCodeAdminController');
	Route::post('sendsms', 'AdminController@sendsms');
	// Route::get('vehicle_types', 'AdminController@showvehiclelist');
	// Route::resource('vehicle_types', 'VehicleAdminController');
	// Route::resource('couponcode', 'CouponAdminController');

});



// for Terms & condition
Route::get('tnc', 'TermController@showtnc');
// for Privacy
Route::get('privacy', 'TermController@showprivacy');

Route::get('addmoney/stripe', array('as' => 'addmoney.paywithstripe','uses' => 'AddMoneyController@payWithStripe'));
Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'AddMoneyController@postPaymentWithStripe'));
Route::get ( '/redirect/{service}', 'SocialLoginController@redirectToProvider' );
Route::get ( '/callback/{service}', 'SocialLoginController@callback' );