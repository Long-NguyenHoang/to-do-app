<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return "Hello World";
})->name('greeting'); // name of route

Route::get('/greeting/{name}', function ($name) {
    return "Hello $name";
});

Route::get('/hiU', function () {
    return redirect('/greeting');
});

Route::get('/hi2', function () {
    return redirect()->route('greeting'); // redirect to route has name 'greeting'
});

Route::get('/Home', function () {
    return redirect('/');
});
