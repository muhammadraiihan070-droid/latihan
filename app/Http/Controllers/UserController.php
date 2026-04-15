<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        if ($keyword != '') {
            $users= User::where('name', 'LIKE', "%{$keyword}%")->paginate(3);
        } else {
            $users= User::paginate(3);
        }
        return view('pages.user.indexUser', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('pages.user.showUser', compact('user'));
    }

    public function create()
    {
        return view('pages.createUser');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect('/user')->with('success', 'User created successfully.');
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect('/user')->with('success', 'User deleted successfully.');
        } else {
            return redirect('/user')->with('error', 'User not found.');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.editUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
           
            $user->update($request->all());
            
            return redirect('/user')->with('success', 'User updated successfully.');
        } else {
            return redirect('/user')->with('error', 'User not found.');
        }
    }
}