@extends('barang')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="mb-0">Data Barang</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        {{-- ALERT --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        {{-- BUTTON TAMBAH --}}
        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">
            + Tambah Barang
        </a>

        <div class="card">
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($barangs as $barang)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->stok }}</td>
                            <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>

                            <td>
                                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('barang.delete', $barang->id) }}" method="POST"
                                    style="display:inline-block;" onsubmit="return confirm('Yakin hapus barang?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Data barang belum ada
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

@endsection