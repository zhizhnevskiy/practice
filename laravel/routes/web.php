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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/test', function () {
//    $count = 20 + 4;
//    $name = 'Yura';
//    return view('test', [
//        'count' => $count,
//        'name' => $name
//    ]);
//})->name('test');

//Route::get('/contact', function () {
//    return view('contact', [
//    ]);
//});
//Route::post('/send-email', function () {
//    if (!empty($_POST)) {
//       dump($_POST);
//    }
//    return "Hiiii";
//});

//Route::match(['post', 'get', 'put'], '/contact', function () {
//    if (!empty($_POST)) {
//        dump($_POST);
//    }
//    return view('contact');
//})->name('contact');
//
//Route::view('simpleView', 'simpleView', [
//    'test' => "Test data"
//]);

//Route::redirect('test', 'simpleView');

//Route::get('post/{id}/{slug}', function ($var, $slug) {
//    return "Post $var | $slug";
//})->where([
//    'id' => '[0-9]+',
//    'slug' => '[A-Za-z0-9-]+'
//]);

//Route::get('post/{id}/{slug?}', function ($var, $slug = null) {
//    return "Post $var | $slug";
//})->name('post');
//
//Route::prefix('admin')->name('admin.')->group(function (){
//    Route::get('posts', function (){
//        return "Post List";
//    });
//    Route::get('post/create', function (){
//        return "Post Create";
//    });
//    Route::get('post/{id}/edit', function ($id){
//        return "Edit post $id";
//    })->name('post');
//});

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/test', 'App\Http\Controllers\Test\TestController@index');
Route::get('/pages/{slug}', 'App\Http\Controllers\PageController@show');

Route::fallback(function () {
//   return redirect()->route('test');
    abort(404, 'Page not found!');
});

Route::resource('admin/posts', 'App\Http\Controllers\PostController', ['parameters' => [
'posts' => 'slug'
]
]);
