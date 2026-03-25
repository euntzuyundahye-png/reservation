@extends('permission')

@section('content')

<div class="container">

    <h3 class="mb-3">Data Permission</h3>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="/admin/permission/tambah" class="btn btn-primary mb-3">
        Tambah Permission
    </a>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th width="50">No</th>
                <th>Name</th>
                <th>Slug</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @foreach($permissions as $p)

            <tr>

                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->slug }}</td>

                <td>

                    <a href="/admin/permission/edit/{{ $p->id }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <a href="/admin/permission/delete/{{ $p->id }}" onclick="return confirm('Yakin ingin menghapus?')"
                        class="btn btn-danger btn-sm">
                        Delete
                    </a>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection