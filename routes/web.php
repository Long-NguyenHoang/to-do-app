<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tasks = Task::latest('title')->get();
    return view('index', ['tasks'=>$tasks]);
});

Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);
    return view('detail', ['task'=>$task]);
})->name('task.detail');

// Route::get('/greeting', function () {
//     return "Hello World";
// })->name('greeting'); // name of route

// Route::get('/greeting/{name}', function ($name) {
//     return "Hello $name";
// });

// Route::get('/hiU', function () {
//     return redirect('/greeting');
// });

// Route::get('/hi2', function () {
//     return redirect()->route('greeting'); // redirect to route has name 'greeting'
// });

// Route::get('/Home', function () {
//     return redirect('/');
// });
