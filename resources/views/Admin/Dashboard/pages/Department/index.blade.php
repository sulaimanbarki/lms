@extends('Admin.Dashboard.pages.masterpage')
@section('content')


<!-- /.view all departments in table -->
<div class="container my-3">

    <!-- /.link to create department -->
    <a href="/departments/create" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i>
        Add Department
    </a>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Department List</h3>
                    {{-- display delete error --}}
                    @if (session('delete_error'))
                        <div class="alert alert-danger">
                            {{ session('delete_error') }}
                        </div>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->name }}</td>
                                <td class="">
                                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        {{-- alert warning before deletion --}}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                        {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    @endsection
