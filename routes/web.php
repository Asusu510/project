<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend/pages/home/index');
});

Route::group(['namespace' => 'Frontend'],function (){
	Route::get('','HomeController@index')->name('get.home');

	Route::get('about', 'HomeController@getAbout' )->name('get.about');

	Route::get('blog', 'BlogController@index' )->name('get.blog');
	Route::get('blog/{slug}', 'ArticleController@index' )->name('get.blog.detail');


	Route::get('contact', 'HomeController@getContact' )->name('get.contact');
	Route::post('contact', 'HomeController@postContact' );


	Route::get('register','HomeController@getFormRegister' )->name('get.home.register');
	Route::post('register','HomeController@postRegister' );

	Route::get('login','HomeController@getFormLogin' )->name('get.home.login');
	Route::post('login','HomeController@postLogin' );

	Route::get('logout','HomeController@getLogout' )->name('get.home.logout');
	
	Route::get('reset-password','HomeController@getResetPassword' )->name('get.home.resetPassword');
	Route::post('reset-password','HomeController@checkResetPassword' );

	Route::get('new-password','HomeController@newPassword' )->name('get.home.newPassword');
	Route::post('new-password','HomeController@savePassword' );



	Route::get('category/{slug}','ProductController@category')->name('get.category.list');
	Route::get('product','ProductController@index')->name('get.product.list');
	Route::get('product/{slug}','ProductDetailController@getProductDetail')->name('get.product.detail');
	Route::get('rating-list/{slug}','ProductDetailController@getListRatingProduct')->name('get.rating.product');


	Route::get('cart', 'ShoppingCartController@index')->name('get.shopping.list');

	Route::get('checkout', 'CheckoutController@index')->name('get.shopping.checkout');
	Route::post('checkout', 'CheckoutController@postCheckout');
	Route::get('update_fee', 'CheckoutController@updateShipping' )->name('ajax_get.checkout.update');
	

	
	Route::prefix('shopping')->group(function() {
		Route::get('add/{id}','ShoppingCartController@add')->name('get.shopping.add');
		Route::get('delete/{id}','ShoppingCartController@delete')->name('get.shopping.delete');
		Route::get('deleteAll','ShoppingCartController@deleteAll')->name('get.shopping.deleteAll');	
		Route::get('update/{id}','ShoppingCartController@update')->name('ajax_get.shopping.update');
	
	});
	

});

Route::group(['prefix' => 'account','namespace' => 'User'], function(){
		Route::get('','UserDashboardController@dashboard')->name('get.user.dashboard');
		Route::get('update-info','UserInforController@updateInfo')->name('get.user.update_info');
		Route::post('update-info','UserInforController@saveInfo');

		Route::get('update-pasword','UserInforController@updatePassword')->name('get.user.update_password');
		Route::post('update-pasword','UserInforController@savePassword');

		Route::get('order','UserOrderController@order')->name('get.user.order');
		Route::get('order_detail', 'UserOrderController@getOrderDetail')->name('ajax.user.order.detail');
		
		Route::get('favourite','UserFavouriteController@index')->name('get.user.favourite');


		Route::post('favourite-add/{idProduct}','UserFavouriteController@addFavourite')->name('ajax_get.user.add_favourite');
		Route::get('favourite-delete/{idProduct}','UserFavouriteController@deleteFavourite')->name('get.user.delete_favourite');

		Route::post('rating','UserRatingController@addRatingProduct')->name('ajax_post.user.add_rating');

		

	});


include 'route_admin.php';