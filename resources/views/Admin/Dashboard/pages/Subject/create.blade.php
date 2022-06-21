@extends('Admin.Dashboard.pages.masterpage')

@section('content')

<!-- content section -->
<div class="container my-3">

    <!-- create subject form -->
    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
        </div>
        <div class="form-group mt-2">
            <label for="department_id">Department</label>
            <select name="department_id" id="department_id" class="form-control">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>


        <div style="text-align: end;">
            <button type="submit" class="btn btn-primary mt-2" >Submit</button>
        </div>

        </div>

    </form>

    </div>
<!-- End content section -->

<!-- End create subject form -->
@endsection
