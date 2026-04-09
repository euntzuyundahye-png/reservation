@extends('user')

@section('content')

<div class="container">

    <h3>Tambah User</h3>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        {{-- NAMA --}}
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- EMAIL --}}
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- PASSWORD --}}
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- KONFIRMASI PASSWORD --}}
        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        {{-- ROLE --}}
        <div class="mb-3">
            <label>Role</label>
            <select name="role_id" class="form-control">
                <option value="">-- Pilih Role --</option>
                @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
                @endforeach
            </select>
            @error('role_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@endsection