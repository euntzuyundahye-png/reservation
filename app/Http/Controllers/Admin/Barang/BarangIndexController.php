<?php

namespace App\Http\Controllers\Admin\Barang;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangIndexController extends Controller
{
    public function __construct()
    {
        // ❌ HAPUS middleware

        // ✅ GANTI dengan manual check
        if (!auth()->check()) {
            abort(403, 'Harus login');
        }

        if (auth()->user()->role->name !== 'karyawan') {
            abort(403, 'Akses hanya untuk karyawan');
        }
    }

    public function index()
    {
        $barangs = Barang::latest()->get();
        return view('admin.barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('admin.barang.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok'        => 'required|integer|min:0',
            'harga'       => 'required|integer|min:0'
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'stok'        => $request->stok,
            'harga'       => $request->harga
        ]);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok'        => 'required|integer|min:0',
            'harga'       => 'required|integer|min:0'
        ]);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'stok'        => $request->stok,
            'harga'       => $request->harga
        ]);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil diupdate');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil dihapus');
    }
}