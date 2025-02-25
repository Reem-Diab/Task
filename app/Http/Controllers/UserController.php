<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // عرض جميع المستخدمين
    public function index()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    // عرض نموذج إضافة مستخدم جديد
    public function createForm()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    // إنشاء مستخدم جديد
    public function create(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/users');
    }

    // عرض صفحة تعديل المستخدم
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $users = User::all();
        return view('user', compact('user', 'users'));
    }

    // تحديث المستخدم (الاسم، البريد الإلكتروني، وكلمة المرور)
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        return redirect('/users');
    }

    // حذف المستخدم
    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/users');
    }
}
