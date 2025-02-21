<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // عرض جميع المستخدمين
    public function index()
    {
        $users = DB::table('users')->get();
        return view('user', compact('users'));
    }

    // إنشاء مستخدم جديد
    public function create()
    {
        DB::table('users')->insert([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => Hash::make($_POST['password']),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('/users');
    }

    // عرض صفحة تعديل المستخدم
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $users = DB::table('users')->get();
        return view('user', compact('user', 'users'));
    }

    // تحديث اسم المستخدم فقط
    public function update($id)
    {
        DB::table('users')->where('id', $id)->update([
            'name' => $_POST['name'],
            'updated_at' => now()
        ]);
        return redirect('/users');
    }

    // حذف المستخدم
    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users');
    }
}
