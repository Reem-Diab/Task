<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // عرض جميع المستخدمين أو إضافة مستخدم جديد
    public function index(Request $request)
    {
        // إذا كانت طريقة الطلب POST، فهذا يعني أن المستخدم يضيف مستخدم جديد
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|max:255|unique:users,email',
                'password' => 'required|min:6',
            ]);

            // حفظ المستخدم مع تشفير كلمة المرور
            User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => bcrypt($validated['password']), // تشفير كلمة المرور هنا فقط
            ]);

            return redirect('/user')->with('success', 'User added successfully!');
        }

        // عرض قائمة المستخدمين
        $users = User::all();
        return view('user', compact('users'));
    }

    // عرض نموذج تعديل المستخدم
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $users = User::all();
        return view('user', compact('user', 'users'));
    }

    // تحديث بيانات المستخدم
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'password' => 'nullable|min:6',
        ]);

        $updateData = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ];

        // تحديث كلمة المرور إذا كانت موجودة
        if (!empty($validated['password'])) {
            $updateData['password'] = bcrypt($validated['password']);
        }

        User::where('id', $id)->update($updateData);

        return redirect('/user')->with('success', 'User updated successfully!');
    }

    // حذف المستخدم
    public function delete($id)
    {
        User::destroy($id);
        return redirect('/user')->with('success', 'User deleted successfully!');
    }
}
