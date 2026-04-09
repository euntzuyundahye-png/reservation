<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserIndexController extends Controller
{
    public function index()
    {
        $users = User::with('role')->latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.tambah', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'role_id'  => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role_id'  => $request->role_id,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'role_id'  => 'required',
            'password' => 'nullable|min:6|confirmed'
        ]);

        $data = [
            'name'    => $request->name,
            'email'   => $request->email,
            'role_id' => $request->role_id
        ];

        // jika password diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil diupdate');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}