<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('tasks'));
    }

    public function create(Request $request)
    {
        DB::table('tasks')->insert([
            'name' => $request->input('name'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('/tasks');
    }

    public function delete($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        return redirect('/tasks');
    }

    public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('task', 'tasks'));
    }

    public function update(Request $request, $id){
        DB::table('tasks')->where('id', $id)->update([
            'name' => $request->input('name'),
            'updated_at' => now()
        ]);
        return redirect('/tasks');
    }

}
