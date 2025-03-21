<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tasks = Task::latest('id')->get();
    return view('index', ['tasks'=>$tasks]);
})->name('tasks.index');

Route::get('tasks/create', function () {
    return view('create');
})->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);
    return view('detail', ['task'=>$task]);
})->name('task.detail');

Route::post('tasks', function (Request $request) {
    // dd($request->all());
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|min:3|max:255',
        'long_description' => 'required|min:3|max:255'
    ]);
    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    // $task->completed = false;
    $task->save();
    return redirect()->route('tasks.index');
})->name('tasks.create');

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
