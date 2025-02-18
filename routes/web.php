<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'Reem';
    $departments = [
        '01' => 'Technical',
        '02' => 'Financial',
        '03' => 'Sales',
    ];
    return view('about', compact('name', 'departments'));
});

Route::post('/about', function () {
    $name = request('name');
    $departments = [
        '01' => 'Technical',
        '02' => 'Financial',
        '03' => 'Sales',
    ];
    return view('about', compact('name', 'departments'));
});

Route::get('/tasks', function () {
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
});

Route::post('/create', function (Request $request) {
    $task_name = $request->input('name');

    DB::table('tasks')->insert([
        'name' => $task_name,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back();
});

Route::post('/delete/{id}', function($id){
    DB::table('tasks')->where('id', $id)->delete();
    return redirect()->back();
});

Route::get('/edit/{id}', function($id){
    $task = DB::table('tasks')->where('id', $id)->first();
    $tasks = DB::table('tasks')->get();

    return view('tasks', compact('task', 'tasks'));
});

Route::post('/update/{id}', function(Request $request, $id){
    $task_name = $request->input('name');

    DB::table('tasks')->where('id', $id)->update([
        'name' => $task_name,
        'updated_at' => now(),
    ]);

    return redirect('/tasks');
});
