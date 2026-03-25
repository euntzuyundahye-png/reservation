@extends('user')

@section('content')

<div class="container">

    <h3>Edit User</h3>

    <form action="{{ route('user.update',$user->id) }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Nama</label>

            <input type="text" name="name" value="{{ $user->name }}" class="form-control">

        </div>

        <div class="mb-3">
            <label>Email</label>

            <input type="email" name="email" value="{{ $user->email }}" class="form-control">

        </div>

        <div class="mb-3">

            <label>Role</label>

            <select name="role_id" class="form-control">

                @foreach($roles as $role)

                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>

                    {{ $role->name }}

                </option>

                @endforeach

            </select>

        </div>

        <button class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('user.index') }}" class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

@endsection