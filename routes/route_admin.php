<?php

// C1 ( ko duoc chứng thực nên để ngoài) 
Route::group(['prefix' => 'api-admin','namespace' => 'Admin'], function(){

	Route::get('adminLogin', 'AdminController@getLogin')->name('admin.get.login');
	Route::post('adminLogin', 'AdminController@postLogin');

	Route::get('adminRegister','AdminController@getRegister' )->name('admin.get.register');
	Route::post('adminRegister','AdminController@postRegister' );
	Route::get('adminError','AdminController@error' )->name('admin.get.error');
	


});


Route::group(['prefix' => 'api-admin','namespace' => 'Admin','middleware' =>'auth'], function(){
	// Route::get('/', function(){
	// 	return view('admin.index');
	// });
	Route::get('/', 'AdminController@index')->name('admin.index');
	Route::get('adminLogout', 'AdminController@getLogout')->name('admin.get.logout');
	
	Route::get('profile/{id}','AdminController@profile' )->name('admin.get.profile');
	
	Route::post('profile/{id}','AdminController@updatePassword' );


	Route::group(['prefix' => 'category'], function(){
		Route::get('', 'AdminCategoryController@index')->name('admin.category.index');
		Route::get('danh-muc/{id}', 'AdminCategoryController@view')->name('admin.category.view');

		Route::get('create', 'AdminCategoryController@create')->name('admin.category.create');
		Route::post('create', 'AdminCategoryController@store');

		Route::get('update/{id}', 'AdminCategoryController@edit')->name('admin.category.update');
		Route::post('update/{id}', 'AdminCategoryController@update');

		Route::get('active/{id}', 'AdminCategoryController@active')->name('admin.category.active');
		Route::get('hot/{id}', 'AdminCategoryController@hot')->name('admin.category.hot');

		Route::get('delete/{id}','AdminCategoryController@delete')->name('admin.category.delete');

	});

	Route::group(['prefix' => 'product'], function(){
		Route::get('', 'AdminProductController@index')->name('admin.product.index');
		Route::get('san-pham/{slug}', 'AdminProductController@view')->name('admin.product.view');


		Route::get('create', 'AdminProductController@create')->name('admin.product.create');
		Route::post('create', 'AdminProductController@store');

		Route::get('update/{id}', 'AdminProductController@edit')->name('admin.product.update');
		Route::post('update/{id}', 'AdminProductController@update');

		Route::get('active/{id}', 'AdminProductController@active')->name('admin.product.active');
		Route::get('hot/{id}', 'AdminProductController@hot')->name('admin.product.hot');

		Route::get('delete/{id}','AdminProductController@delete')->name('admin.product.delete');

	});

	Route::group(['prefix' => 'image'], function(){
		Route::get('', 'AdminImageController@index')->name('admin.image.index');
		

	});

	Route::group(['prefix' => 'keyword'], function() {
		Route::get('', 'AdminKeywordController@index')->name('admin.keyword.index');
		Route::get('create', 'AdminKeywordController@create')->name('admin.keyword.create');
		Route::post('create', 'AdminKeywordController@store');

		Route::get('update/{id}', 'AdminKeywordController@edit')->name('admin.keyword.update');
		Route::post('update/{id}', 'AdminKeywordController@update');

		Route::get('hot/{id}', 'AdminKeywordController@hot')->name('admin.keyword.hot');
		
		Route::get('delete/{id}', 'AdminKeywordController@delete')->name('admin.keyword.delete');

	});

	Route::group(['prefix' => 'brand'], function() {
		Route::get('', 'AdminBrandController@index')->name('admin.brand.index');
		Route::get('create', 'AdminBrandController@create')->name('admin.brand.create');
		Route::post('create', 'AdminBrandController@store');

		Route::get('update/{id}', 'AdminBrandController@edit')->name('admin.brand.update');
		Route::post('update/{id}', 'AdminBrandController@update');

		Route::get('hot/{id}', 'AdminBrandController@hot')->name('admin.brand.hot');
		
		Route::get('delete/{id}', 'AdminBrandController@delete')->name('admin.brand.delete');

	});

	Route::group(['prefix' => 'user'], function() {
		Route::get('', 'AdminUserController@index')->name('admin.user.index');
		Route::get('status/{id}', 'AdminUserController@status')->name('admin.user.status');

		Route::get('create', 'AdminUserController@create')->name('admin.user.create');
		Route::post('create', 'AdminUserController@store');

		Route::get('update/{id}', 'AdminUserController@edit')->name('admin.user.update');
		Route::post('update/{id}', 'AdminUserController@update');
		
		Route::get('delete/{id}', 'AdminUserController@delete')->name('admin.user.delete');

	});

	Route::group(['prefix' => 'client'], function() {
		Route::get('', 'AdminClientController@index')->name('admin.client.index');
		Route::get('view/{id}', 'AdminClientController@view')->name('admin.client.view');
		Route::get('status/{id}', 'AdminClientController@status')->name('admin.client.status');
		
		Route::get('delete/{id}', 'AdminClientController@delete')->name('admin.client.delete');

	});

	Route::group(['prefix' => 'rating'], function() {
		Route::get('', 'AdminRatingController@index')->name('admin.rating.index');
		Route::get('delete/{id}', 'AdminRatingController@delete')->name('admin.rating.delete');
		
	});

	Route::group(['prefix' => 'slide'], function(){
		Route::get('', 'AdminSlideController@index')->name('admin.slide.index');

		Route::get('create', 'AdminSlideController@create')->name('admin.slide.create');
		Route::post('create', 'AdminSlideController@store');

		Route::get('update/{id}', 'AdminSlideController@edit')->name('admin.slide.update');
		Route::post('update/{id}', 'AdminSlideController@update');

		Route::get('active/{id}', 'AdminSlideController@active')->name('admin.slide.active');

		Route::get('delete/{id}','AdminSlideController@delete')->name('admin.slide.delete');

	});

	Route::group(['prefix' => 'order'], function() {
		Route::get('', 'AdminOrderController@index')->name('admin.order.index');
		
		Route::get('delete/{id}', 'AdminOrderController@delete')->name('admin.order.delete');
		Route::get('order_detail-delete/{id}', 'AdminOrderController@deleteOrderItem')->name('ajax.admin.order.order_detail.delete');
		Route::get('view-order_detail/{id}', 'AdminOrderController@getOrderDetail')->name('ajax.admin.order.detail');
		Route::get('action/{action}/{id}', 'AdminOrderController@getAction')->name('admin.order.action');


	});

	Route::group(['prefix' => 'role'], function() {
		Route::get('', 'AdminRoleController@index')->name('admin.role.index');
		Route::get('create', 'AdminRoleController@create')->name('admin.role.create');
		Route::post('create', 'AdminRoleController@store');

		Route::get('update/{id}', 'AdminRoleController@edit')->name('admin.role.update');
		Route::post('update/{id}', 'AdminRoleController@update');
		
		Route::get('delete/{id}', 'AdminRoleController@delete')->name('admin.role.delete');

	});

	Route::group(['prefix' => 'menu'], function(){
		Route::get('', 'AdminMenuController@index')->name('admin.menu.index');

		Route::get('create', 'AdminMenuController@create')->name('admin.menu.create');
		Route::post('create', 'AdminMenuController@store');

		Route::get('update/{id}', 'AdminMenuController@edit')->name('admin.menu.update');
		Route::post('update/{id}', 'AdminMenuController@update');

		Route::get('active/{id}', 'AdminMenuController@active')->name('admin.menu.active');
		Route::get('hot/{id}', 'AdminMenuController@hot')->name('admin.menu.hot');

		Route::get('delete/{id}','AdminMenuController@delete')->name('admin.menu.delete');

	});

	Route::group(['prefix' => 'article'], function(){
		Route::get('', 'AdminArticleController@index')->name('admin.article.index');

		Route::get('create', 'AdminArticleController@create')->name('admin.article.create');
		Route::post('create', 'AdminArticleController@store');

		Route::get('update/{id}', 'AdminArticleController@edit')->name('admin.article.update');
		Route::post('update/{id}', 'AdminArticleController@update');

		Route::get('active/{id}', 'AdminArticleController@active')->name('admin.article.active');
		Route::get('hot/{id}', 'AdminArticleController@hot')->name('admin.article.hot');

		Route::get('delete/{id}','AdminArticleController@delete')->name('admin.article.delete');

	});


});

