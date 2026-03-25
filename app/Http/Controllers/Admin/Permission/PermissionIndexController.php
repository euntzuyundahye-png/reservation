<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionIndexController extends Controller
{

    public function index()
    {
        $permissions = Permission::latest()->get();

        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:permissions,slug'
        ]);

        Permission::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return redirect()->route('permission.index')
            ->with('success','Permission berhasil ditambahkan');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:permissions,slug,' . $permission->id
        ]);

        $permission->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return redirect()->route('permission.index')
            ->with('success','Permission berhasil diupdate');
    }

    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();

        return redirect()->route('permission.index')
            ->with('success','Permission berhasil dihapus');
    }
}