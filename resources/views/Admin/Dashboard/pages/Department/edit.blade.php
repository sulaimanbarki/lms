@extends('Admin.Dashboard.pages.masterpage')
@section('content')

<div class="container my-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Department</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('departments.update', $department->id) }}" method="POST">
                    {{-- <form action="/departments/{{$department->id }}" method="POST"> --}}
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ $department->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary my-3">Submit</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
{{-- view department --}}

@endsection
