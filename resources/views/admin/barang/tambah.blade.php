@extends('barang')

@section('content')

<div class="container">

    <h3>Tambah Barang</h3>

    <form action="{{ route('barang.store') }}" method="POST">
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
            <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang') }}">
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ old('stok') }}">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@endsection