@extends('permission')

@section('content')

<div class="container">

    <h3 class="mb-3">Edit Permission</h3>

    <form action="/admin/permission/update/{{ $permission->id }}" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">Nama Permission</label>

            <input type="text" name="name" class="form-control" value="{{ $permission->name }}" required>

        </div>

        <div class="mb-3">

            <label class="form-label">Slug Permission</label>

            <input type="text" name="slug" class="form-control" value="{{ $permission->slug }}" required>

        </div>

        <button class="btn btn-success">
            Update
        </button>

        <a href="/admin/permission" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection