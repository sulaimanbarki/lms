@extends('Admin.Dashboard.pages.masterpage')

@section('content')

<!-- content section -->
<div class="container my-3">

    <a href="{{ route('subjects.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i>
        Add Subject
    </a>

    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
    {{-- delete_error message --}}
    @if (session('delete_error'))
        <div class="alert alert-danger my-3">
            {{ session('delete_error') }}
        </div>
    @endif
    <table id="example1" class="table table-bordered table-striped my-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->department->name }}</td>
                    {{-- <td>{{ $subject->department_id }}</td> --}}
                    <td>
                        <a href="/subjects/{{ $subject->id }}/edit" class="btn btn-primary ">Edit</a>
                        <form action="/subjects/{{ $subject->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            {{-- alert befor delte --}}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- End content section -->

@endsection
