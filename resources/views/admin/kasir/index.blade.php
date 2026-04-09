@extends('penjualan')

@section('content')

<div class="container-fluid mt-4">

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Penjualan</h4>

            <a href="{{ route('kasir.create') }}" class="btn btn-primary">
                + Transaksi
            </a>
        </div>

        <div class="card-body">

            {{-- ALERT SUCCESS --}}
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light text-center">
                        <tr>
                            <th width="50">No</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($penjualans as $p)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $p->barang->nama_barang }}</td>
                            <td class="text-center">{{ $p->jumlah }}</td>
                            <td class="text-end">Rp {{ number_format($p->total_harga) }}</td>

                            <td class="text-center">

                                {{-- EDIT --}}
                                <a href="{{ route('kasir.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('kasir.delete', $p->id) }}" method="POST"
                                    style="display:inline-block;" onsubmit="return confirm('Yakin hapus transaksi?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Data penjualan belum ada
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