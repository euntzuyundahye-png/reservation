@extends('penjualan')

@section('content')

<div class="container-fluid mt-4">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-sm">

                <div class="card-header">
                    <h4 class="mb-0">Tambah Transaksi</h4>
                </div>

                <div class="card-body">

                    {{-- ERROR --}}
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="{{ route('kasir.store') }}" method="POST">
                        @csrf

                        {{-- PILIH BARANG --}}
                        <div class="mb-3">
                            <label class="form-label">Barang</label>
                            <select name="barang_id" class="form-select">
                                @foreach($barangs as $b)
                                <option value="{{ $b->id }}">
                                    {{ $b->nama_barang }} - Rp {{ number_format($b->harga) }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- JUMLAH --}}
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" placeholder="Masukkan jumlah">
                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-between">

                            <a href="{{ route('kasir.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>

                            <button class="btn btn-success">
                                Simpan Transaksi
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection