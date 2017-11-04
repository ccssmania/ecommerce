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

Route::get('/', 'MainController@home');

Route::get('/carrito','ShoppingCartsController@index');
Route::post('/carrito','ShoppingCartsController@checkout');
Route::post('/payments','PaymentsController@create');

Route::get('/payments/store', 'PaymentsController@store');
Route::get('/order/view/{id}', 'OrdersController@view');
Auth::routes();
Route::get('/fix','MainController@fix');
Route::resource('products','ProductsController');
/*
	GET/products => index
	POST/products =>store
	GET/products/create =>formulario para crear

	GET /products/:id => mostrar in producto con su ID

	GET/products/:id/edit
*/

Route::resource('in_shopping_carts','InShoppingCartsController', [
		'only' => ['store','destroy']

	]);

Route::resource('compras','ShoppingCartsController', ['only' => ['show']]);
Route::resource('orders','OrdersController', ['only' => ['index', 'update']]);

Route::resource('home', 'MainController',['only' => ['index', 'show']]);

Route::get('products/images/{filename}',function($filename){
	$path = storage_path("app/images/$filename");


	if(!\File::exists($path)) abort(404);
	$file = \File::get($path);
	$type = \File::mimeType($path);

	$response = Response::make($file,200);
	$response->header("Content-Type", $type);

	return $response;
});
Route::get('/banners', 'BannerController@index');
Route::post('/banners', 'BannerController@upload');
Route::get('banners/images/{filename}',function($filename){
	$path = storage_path("app/images/$filename");


	if(!\File::exists($path)) abort(404);
	$file = \File::get($path);
	$type = \File::mimeType($path);

	$response = Response::make($file,200);
	$response->header("Content-Type", $type);

	return $response;
});
Route::get('/about', 'MainController@about');
Route::get('/about/edit', 'MainController@about_edit');
Route::post('/about', 'MainController@store');
Route::post('/about/img', 'MainController@store_img');
Route::get('/perfil', 'MainController@perfil');

