@extends('permission')

@section('content')

<div class="container">

    <h3 class="mb-3">Tambah Permission</h3>

    <form action="/admin/permission/store" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Permission</label>

            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>

            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Slug Permission</label>

            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}"
                placeholder="contoh: user.index" required>

            @error('slug')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

        <a href="/admin/permission" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection