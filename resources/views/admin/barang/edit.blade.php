@extends('barang')

@section('content')

<div class="container">

    <h3>Edit Barang</h3>

    <form action="{{ route('barang.update',$barang->id) }}" method="POST">
        @csrf

        {{-- ERROR --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ old('harga', $barang->harga) }}" class="form-control">
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@endsection