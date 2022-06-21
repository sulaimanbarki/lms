@extends('Admin.Dashboard.pages.masterpage')

@section('content')

<!-- content section -->

<div class="container my-3">
    {{-- edit subject form with department --}}
    <form action="{{ route('subjects.update',$subject->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Subject Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $subject->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="department">Department</label>
                    <select name="department_id" id="department" class="form-control">
                        <option value="">Select Department</option>
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ $subject->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <!-- submit button -->
        <div class="mt-3" style="text-align: end;">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection
