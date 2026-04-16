<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $users = User::when($keyword, function ($query, $keyword) {
            return $query->where('name', 'like', "%$keyword%");
        })->paginate(5)->withQueryString();

        return view('pages.user.indexUser', compact('users'));
    }

    public function show(int $id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.showUser', compact('user'));
    }

    public function create()
    {
        return view('pages.user.createUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) // 🔥 penting
        ]);

        return redirect('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.editUser', compact('user'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('/user')->with('success', 'User berhasil diupdate');
    }

    public function destroy(int $id) // 🔥 harus destroy
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/user')->with('success', 'User berhasil dihapus');
    }
}