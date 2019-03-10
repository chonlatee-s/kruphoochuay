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
    return view('index');
});
Route::get('how', function () {
    return view('how');
});
Route::get('professional', function () {
    return view('professional');
});
Route::get('aboutme', function () {
    return view('aboutme');
});
Route::resource('credits','CreditsController');
Route::resource('contents','ContentsController');
Route::resource('predicts','PredictsController');
Route::resource('tests','TestsController');

Route::get('setup', function () {
    return view('setup');
});