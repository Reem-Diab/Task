@extends('front.index')

@section('content')

<div class="container mt-4">
    <h2>User Management</h2>
    <div class="offset-md-2 col-md-8">
        <div class="card">
            @if (isset($user))
                <div class="card-header">Update User</div>
                <div class="card-body">
                    <form action="{{ url('users/edit/' . $user->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user-name" class="form-label">Name</label>
                            <input type="text" name="name" id="user-name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i>Update User
                            </button>
                            <a href="{{ url('users') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            @else
                <div class="card-header">New User</div>
                <div class="card-body">
                    <form action="{{ url('users/create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user-name" class="form-label">Name</label>
                            <input type="text" name="name" id="user-name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="user-email" class="form-label">Email</label>
                            <input type="email" name="email" id="user-email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="user-password" class="form-label">Password</label>
                            <input type="password" name="password" id="user-password" class="form-control">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Add User
                            </button>
                            <a href="{{ url('users') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            @endif
        </div>

        <div class="card mt-4">
            <div class="card-header">Current Users</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ url('users/delete/' . $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash me-2"></i>Delete
                                        </button>
                                    </form>
                                    <a href="{{ url('users/edit/' . $user->id) }}" class="btn btn-info d-inline">
                                        <i class="fa fa-edit me-2"></i>Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
