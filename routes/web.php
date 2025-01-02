<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\productController;
use App\Models\Products;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = Products::all();
    return view('home', ['products' => $products]);
});
Route::get('/home', function () {
    return view('home');
});

Route::post('/register', [userController::class, 'register']);
Route::post('/login', [userController::class, 'login']);
Route::post('/logout', [userController::class, 'logout']);

//products routes
// Route::post('/addProduct', [productController::class, 'addProduct']);
Route::get('/add-product', [ProductController::class, 'create']);  
Route::post('/add-product', [ProductController::class, 'store']);   
Route::get('/edit-product/{id}', [ProductController::class, 'showEditScreen']);
Route::put('/products/{id}', [ProductController::class, 'actuallyUpdateProduct']);
Route::get('/show-product/{id}', [ProductController::class, 'showProduct']);
Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProduct']);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

