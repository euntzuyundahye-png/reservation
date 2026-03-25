@extends('role')

@section('content')

<div class="container">

    <h3 class="mb-3">Edit Role</h3>

    <form action="/admin/role/update/{{ $role->id }}" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">Nama Role</label>

            <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>

        </div>

        <div class="mb-3">

            <label class="form-label">Permissions</label>

            @foreach($permissions as $p)

            <div class="form-check">

                <input class="form-check-input" type="checkbox" name="permission_id[]" value="{{ $p->id }}"
                    {{ $role->permissions->contains($p->id) ? 'checked' : '' }}>

                <label class="form-check-label">
                    {{ $p->name }} ({{ $p->slug }})
                </label>

            </div>

            @endforeach

        </div>

        <button class="btn btn-success">
            Update
        </button>

        <a href="/admin/role" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection