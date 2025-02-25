<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // عرض جميع المهام
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    // عرض نموذج إضافة مهمة جديدة
    public function createForm()
    {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    // إنشاء مهمة جديدة
    public function create(Request $request)
    {
        Task::create([
            'name' => $request->name,
        ]);
        return redirect('/tasks');
    }

    // عرض صفحة تعديل المهمة
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $tasks = Task::all();
        return view('tasks', compact('task', 'tasks'));
    }

    // تحديث اسم المهمة فقط
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'name' => $request->name,
        ]);
        return redirect('/tasks');
    }

    // حذف المهمة
    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/tasks');
    }
}
