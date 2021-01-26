<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index() {

        $users = User::query()->where('id', '!=', Auth::id())->get();
        return view('admin.profiles.users')->with('users', $users);
    }

    public function create(Request $request, User $user) {

        if ($request->isMethod('post')) {

            $user->save();

            return redirect()->route('admin.index', )->with('success', 'Пользователь добавлен!');
        }
        return view('auth.register');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Пользователь удален');
    }

    public function edit(User $user) {
        return view('admin.profiles.userUpdate', [
            'user' => $user
        ]);
    }

// заготовочка на редактирование пользователей, пока только админ-права изменяются
    public function update(Request $request, User $user) {
        if($request->is_admin !== 'on' && Auth::user()->id !== $user->id){
            $user->is_admin = 0;
        } else {
            $user->is_admin = 1;
        }
        $user->fill($request->except(['name', 'password', 'email',]))->save();
        return redirect()->route('admin.users.index')->with('success', 'Права успешно изменены');
    }
}

