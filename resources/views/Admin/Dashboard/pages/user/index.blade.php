@extends('Admin.Dashboard.pages.masterpage')

@section('content')

<!-- content section -->
<div class="container my-3">
    {{-- create user button --}}
    <a href="{{ route('users.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        Create User
    </a>
    {{-- dashboard link --}}
    <a href="{{ route('dashboard') }}" class="btn btn-primary">
        <i class="fas fa-home"></i>
        Dashboard
    </a>
    {{-- display all users --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? "admin" : "" }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Are you shure to delete this record?')" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- pagination --}}
    {{ $users->links() }}
</div>
<!-- Question Answers section -->

<!-- End content section -->
@endsection
