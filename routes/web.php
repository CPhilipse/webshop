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

/* --------------------- Common/User Routes START -------------------------------- */
//Route::get('/', function () {
//    return view('welcome');
//});
Auth::routes([ 'verify' => true ]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//Product Routes
Route::get('/','ProductController@showAllProducts')->name('products');
//Route::get('/product' . $request->productID,'ProductController@showProduct')->name('product');
Route::get('product/{id}','ProductController@showProduct')->name('product');
/* --------------------- Common/User Routes END -------------------------------- */


/* ----------------------- Admin Routes START -------------------------------- */

// all the routes will have admin like /admin/other/route so we can use prefix()
// method and we are also using named routes
// so we need all our route to have “admin.” prefix when naming them.
// Last thing will be the namespace Admin because laravel uses psr-4 autoloading
// and all the classes need to have a namespace
// https://github.com/SagarMaheshwary/laravel-multiauth

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){

    /**
     * Admin Auth Route(s)
     */
    Route::namespace('Auth')->group(function(){

        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Product Routes
        Route::get('/products','ProductsController@showAllProducts')->name('products');
        Route::get('/product','ProductController@showProduct')->name('product');
//         Route::post('/register','RegisterController@register');

    });

    Route::get('/dashboard','HomeController@index')->name('home')->middleware('auth:admin');

    //Put all of your admin routes here...

});

/* ----------------------- Admin Routes END -------------------------------- */
