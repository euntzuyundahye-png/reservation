@extends('user')

@section('content')

<div class="container">

    <h3>Edit User</h3>

    <form action="{{ route('user.update',$user->id) }}" method="POST">
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

        {{-- NAMA --}}
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
        </div>

        {{-- EMAIL --}}
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
        </div>

        {{-- PASSWORD --}}
        <div class="mb-3">
            <label>Password (Kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control">
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
                @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>

@endsection