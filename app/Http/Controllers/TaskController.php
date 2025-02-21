<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    // عرض جميع المهام
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('tasks'));
    }

    // إنشاء مهمة جديدة
    public function create()
    {
        DB::table('tasks')->insert([
            'name' => $_POST['name'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('/tasks');
    }

    // عرض صفحة تعديل المهمة
    public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('task', 'tasks'));
    }

    // تحديث اسم المهمة فقط
    public function update($id)
    {
        DB::table('tasks')->where('id', $id)->update([
            'name' => $_POST['name'],
            'updated_at' => now()
        ]);
        return redirect('/tasks');
    }

    // حذف المهمة
    public function delete($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        return redirect('/tasks');
    }
}
