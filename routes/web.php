<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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


// lekcije - materija
Route::get('/fun', function () {
    return view('fun');
});

Route::get('/fun2', function () {
    return view('fun2');
});





// lekcije - ajax
Route::get('/ajax_plain', function () {
    return view('ajax.ajax1');
});

Route::get('/ajax_json', function () {
    return view('ajax.ajax2');
});

Route::get('/ajax_api', function () {
    return view('ajax.ajax3');
});

Route::get('/ajax_laravel', function () {
    return view('ajax.ajax4');
});


Route::get('getData' , [Controller::class , 'getData'])->name('getData');


Route::post('ajax_delete' , [Controller::class , 'ajax_delete'])->name('ajax_delete');


Route::post('saveData', [Controller::class , 'saveData'])->name('saveData');


<<<<<<< HEAD
=======
Route::get('probbba' , [Controller::class , 'proba']);

>>>>>>> 84381c71e2fdcf6872ae68ab8b514737524f9d27
// lekcije - Fetch_api
Route::get('/fetch_api', function () {
    return view('fetch_api.fetch_api');
});

// lekcije - ASYNC
Route::get('/async', function () {
    return view('async');
});

Route::get('/async2', function () {
    return view('async2');
});

// lekcije - HIGHER ORDER FUNCTION JS
Route::get('/higher', function () {
    return view('higher_order_function.higher_order_function');
});

// lekcije - WEB KOMPONENTS
Route::get('/web_comp', function () {
    return view('web_comp');
});





// projekti
Route::get('/search', function () {
    return view('projekti.search');
});

Route::get('/weight', function () {
    return view('projekti.weight');
});

Route::get('/booklist', function () {
    return view('projekti.booklist');
});

Route::get('/auto', function () {
    return view('projekti.autocomplete');
});

Route::get('/mark', function () {
    return view('projekti.bookmark');
});

Route::get('/map', function () {
    return view('projekti.googleMap');
});

Route::get('/cookie', function () {
    return view('projekti.cookie');
});

Route::get('/numbers', function () {
    return view('projekti.numbers');
});

Route::get('/modal', function () {
    return view('projekti.modal');
});

Route::get('/speech', function () {
    return view('projekti.speech');
});

Route::get('/cookie_modal', function () {
    return view('projekti.cookie_modal');
});

Route::get('/bread', function () {
    return view('projekti.bread');
});

Route::get('/talk', function () {
    return view('projekti.talk');
});

Route::get('/glass', function () {
    return view('projekti.glass');
});

Route::get('/reddit', function () {
    return view('projekti.reddit');
});

Route::get('/fb_login', function () {
    return view('projekti.fb_login.fb_login');
});

Route::get('/youtube', function () {
    return view('projekti.youtube.youtube');
});








require __DIR__.'/auth.php';
