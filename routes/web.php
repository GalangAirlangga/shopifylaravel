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
    return view('welcome');
})->middleware(['auth.shopify'])->name('home');
Route::get('/home',function (){
    return view('vendor.shopify-app.home.index');
});
Route::get('/shopify/product', function () {
    $shop = Auth::user();
    $request = $shop->api()->rest('GET', '/admin/shop.json');
// $request = $shop->api()->graph('{ shop { name } }');
    echo $request['body']['shop']['name'];
});
