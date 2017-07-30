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

Route::get('/', function () {
    return view('hello');
});

Route::get('cats', function() {
$cats = Hello\Cat::all();
return view('cats.index')->with('cats', $cats);
});

Route::get('cats/breeds/{name}', function($name) {
$breed = Hello\Breed::with('cats')
->whereName($name)
->first();
return view('cats.index')
->with('breed', $breed)
->with('cats', $breed->cats);
});

Route::get('cats/{id}', function($id) {
$cat = Hello\Cat::find($id);
return view('cats.show') ->with('cat', $cat);
});