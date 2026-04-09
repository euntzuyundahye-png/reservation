@extends('penjualan')

@section('content')

<div class="container-fluid mt-4">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-sm">

                <div class="card-header">
                    <h4 class="mb-0">Edit Penjualan</h4>
                </div>

                <div class="card-body">

                    {{-- ERROR --}}
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="{{ route('kasir.update', $penjualan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- PILIH BARANG --}}
                        <div class="mb-3">
                            <label class="form-label">Barang</label>
                            <select name="barang_id" class="form-select">
                                @foreach($barangs as $b)
                                <option value="{{ $b->id }}" {{ $penjualan->barang_id == $b->id ? 'selected' : '' }}>
                                    {{ $b->nama_barang }} - Rp {{ number_format($b->harga) }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- JUMLAH --}}
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" value="{{ $penjualan->jumlah }}" class="form-control"
                                placeholder="Masukkan jumlah">
                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-between">

                            <a href="{{ route('kasir.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>

                            <button class="btn btn-warning">
                                Update Transaksi
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection