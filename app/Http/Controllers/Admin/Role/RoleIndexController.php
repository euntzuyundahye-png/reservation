<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RoleIndexController extends Controller
{

    public function index()
    {
        $roles = Role::with('permissions')->get();

        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.role.tambah', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);

        if ($request->permission_id) {
            $role->permissions()->sync($request->permission_id);
        }

        return redirect()->route('role.index')
            ->with('success','Role berhasil dibuat');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('admin.role.edit', compact('role','permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->name
        ]);

        $role->permissions()->sync($request->permission_id ?? []);

        return redirect()->route('role.index')
            ->with('success','Role berhasil diupdate');
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return redirect()->route('role.index')
            ->with('success','Role berhasil dihapus');
    }
}