<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes du portfolio de Bobby Bryan
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/skills', function () {
    return view('skills');
});