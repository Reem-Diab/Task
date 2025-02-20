@extends('front.index')
@section('content')

    <div class="container mt-4">
        <h2>User List App</h2>
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <!-- عرض الأخطاء في حالة حدوثها -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (isset($user))
                    <div class="card-header">Update User</div>
                    <div class="card-body">
                        <form action="{{ url('edit/' . $user->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password (Leave blank if no change)</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save me-2"></i>Update User</button>
                        </form>
                    </div>
                @else
                    <div class="card-header">Add New User</div>
                    <div class="card-body">
                        <form action="{{ url('user') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus me-2"></i>Add User</button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="card mt-4">
                <div class="card-header">User List</div>
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
                                        <form action="{{ url('delete/' . $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash me-2"></i>Delete
                                            </button>
                                        </form>
                                        <a href="{{ url('edit/' . $user->id) }}" class="btn btn-info">
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
