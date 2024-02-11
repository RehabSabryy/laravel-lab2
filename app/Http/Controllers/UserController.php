<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        User::create(
            ['name' => $request->name, 'email' => $request->email]
        );
        return redirect(url('/users'));
    }
    public function show($userId)
    {
        $user = User::findorfail($userId);
        return view('users.show', ['user' => $user]);
    }
    public function edit($userId)
    {
        $user = User::findorfail($userId);
        return view('users.edit', ['user' => $user]);
    }
    public function update(Request $request, $userId)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $user = User::findorfail($userId);
        $user->update(
            ['name' => $request->name, 'email' => $request->email]
        );
        return redirect(url('/users/'));
    }
    public function destroy($userId)
    {
        $user = User::findorfail($userId);
        $user->delete();
        return redirect(url('/users/'));
    }
}
