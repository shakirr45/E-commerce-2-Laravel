<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//For Home page ====>
Route::get('/',[HomeController::class, 'index']);

// For redirect to home or admin =====>
Route::get('/redirect',[HomeController::class, 'redirect'])->middleware('auth','verified');

//Add products as admin =====>
Route::get('/mens_pro_add_view',[AdminController::class, 'mens_pro_add_view']);
//Add mens product ====>
Route::post('/add_mens_product',[AdminController::class, 'add_mens_product']);
//view mens product ====>
Route::get('/show_mens_item',[AdminController::class, 'show_mens_item']);
//Delete mens product ====>
Route::get('/delete_product/{id}',[AdminController::class, 'delete_product']);

//Add products as admin =====>
Route::get('/womens_pro_add_view',[AdminController::class, 'womens_pro_add_view']);
//Add womens product ====>
Route::post('/add_womens_product',[AdminController::class, 'add_womens_product']);
// //view womens product ====>
Route::get('/show_womens_item',[AdminController::class, 'show_womens_item']);
// //Delete womens product ====>
Route::get('/delete_product_women/{id}',[AdminController::class, 'delete_product_women']);

//Add kids as admin =====>
Route::get('/kids_pro_add_view',[AdminController::class, 'kids_pro_add_view']);
//Add kids product ====>
Route::post('/add_kids_product',[AdminController::class, 'add_kids_product']);
// //view kids product ====>
Route::get('/show_kids_item',[AdminController::class, 'show_kids_item']);
// Delete kids product ====>
Route::get('/delete_kids_product/{id}',[AdminController::class, 'delete_kids_product']);


// Add to Cart for men ====>
Route::post('/add_cart/{id}',[HomeController::class, 'add_cart']);
// Add to Cart for women ====>
Route::post('/add_cart_women/{id}',[HomeController::class, 'add_cart_women']);
// Add to Cart for kids ====>
Route::post('/add_cart_kids/{id}',[HomeController::class, 'add_cart_kids']);
//for show cart =====>
Route::get('/cart_view',[HomeController::class, 'cart_view']);
//Remove Product from cart ====>
Route::get('/delete_cart_data/{id}',[HomeController::class, 'delete_cart_data']);


//for stripe paymentgetway =====>
Route::get('/stripe/{totalprice}',[HomeController::class, 'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');


// For cash order ====>
Route::get('/cash_order',[HomeController::class, 'cash_order']);

//show order as admin ====>
Route::get('/show_order',[AdminController::class, 'show_order']);

// For delivered as admin ====>
Route::get('/delivered/{id}',[AdminController::class, 'delivered']);

//for search ====>
Route::get('/search',[AdminController::class, 'search']);

//for download pdf of order ====>
Route::get('/for_pdf/{id}',[AdminController::class, 'for_pdf']);

//for all product view ====>
Route::get('/all_pro',[HomeController::class, 'all_pro']);

//for all mens product view ====>
Route::get('/mens_all',[HomeController::class, 'mens_all']);

//for all mens product view ====>
Route::get('/womens_all',[HomeController::class, 'womens_all']);

//for all kids product view ====>
Route::get('/kids_all',[HomeController::class, 'kids_all']);

//for sending email ====>
Route::get('/send_mail/{id}',[AdminController::class, 'send_mail']);
Route::post('/send_user_email/{id}',[AdminController::class, 'send_user_email']);

//for view orders as user ====>
Route::get('/view_orders',[HomeController::class, 'view_orders']);

//for cancle order ====>
Route::get('/cancle_order/{id}',[HomeController::class, 'cancle_order']);



























