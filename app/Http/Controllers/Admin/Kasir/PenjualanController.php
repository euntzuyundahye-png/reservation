<?php

namespace App\Http\Controllers\Admin\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\Barang;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function __construct()
    {
        if (!auth()->check() || auth()->user()->role->name !== 'kasir') {
            abort(403, 'Akses hanya untuk kasir');
        }
    }

    public function index()
    {
        $penjualans = Penjualan::with('barang')->latest()->get();
        return view('admin.kasir.index', compact('penjualans'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('admin.kasir.tambah', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah'    => 'required|integer|min:1'
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($barang->stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak cukup');
        }

        $total = $barang->harga * $request->jumlah;

        Penjualan::create([
            'barang_id'   => $barang->id,
            'jumlah'      => $request->jumlah,
            'total_harga' => $total
        ]);

        // kurangi stok
        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()->route('kasir.index')
            ->with('success', 'Transaksi berhasil');
    }

    // ✅ EDIT
    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $barangs = Barang::all();

        return view('admin.kasir.edit', compact('penjualan', 'barangs'));
    }

    // ✅ UPDATE
    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::findOrFail($id);

        $request->validate([
            'barang_id' => 'required',
            'jumlah'    => 'required|integer|min:1'
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        // balikin stok lama
        $barang->stok += $penjualan->jumlah;

        if ($barang->stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak cukup');
        }

        // kurangi stok baru
        $barang->stok -= $request->jumlah;
        $barang->save();

        $total = $barang->harga * $request->jumlah;

        $penjualan->update([
            'barang_id'   => $barang->id,
            'jumlah'      => $request->jumlah,
            'total_harga' => $total
        ]);

        return redirect()->route('kasir.index')
            ->with('success', 'Penjualan berhasil diupdate');
    }

    // ✅ DELETE
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        // balikin stok
        $barang = Barang::findOrFail($penjualan->barang_id);
        $barang->stok += $penjualan->jumlah;
        $barang->save();

        $penjualan->delete();

        return redirect()->route('kasir.index')
            ->with('success', 'Penjualan berhasil dihapus');
    }
}