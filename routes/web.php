<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function(){

 Route::get('/dashboard','Admin\FrontendController@index');
// used to show category page
 Route::get('categories','Admin\CategoryController@index');
 //used to  show add-category page.
  Route::get('add-category','Admin\CategoryController@add');
//insert data into form and submit to the database.
  Route::post('insert-category','Admin\CategoryController@insert');
  //another method to call the controller with it defined above,
  //url to take you to the edit function to display the edit form.
  Route::get('edit-category/{id}',[CategoryController::class,'edit']);

  // main url that takes you to that function that updates.
    Route::put('update-category/{id}',[CategoryController::class,'update']);
    // main url that takes you to that function that deletes.
    Route::get('delete-category/{id}',[CategoryController::class,'destroy']);

    //url to show the product page.
      Route::get('products',[ProductController::class,'index']);
      //url to show add-product page.
      Route::get('add-product',[ProductController::class,'add']);

      //url to insert the product from the form.
      Route::post('insert-product',[ProductController::class,'insert']);

      //url to take you to the edit function to display the edit form.
      Route::get('edit-prod/{id}',[ProductController::class,'edit']);

      // main url that takes you to that function that updates the product.
        Route::put('update-product/{id}',[ProductController::class,'update']);

        // main url that takes you to that function that deletes.
        Route::get('delete-product/{id}',[ProductController::class,'destroy']);





});
