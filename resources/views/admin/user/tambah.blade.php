@extends('user')

@section('content')

<div class="container">

    <h3>Tambah User</h3>

    <form action="{{ route('user.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Role</label>

            <select name="role_id" class="form-control">

                <option value="">-- Pilih Role --</option>

                @foreach($roles as $role)

                <option value="{{ $role->id }}">
                    {{ $role->name }}
                </option>

                @endforeach

            </select>

        </div>

        <button class="btn btn-primary">Simpan</button>

        <a href="{{ route('user.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection