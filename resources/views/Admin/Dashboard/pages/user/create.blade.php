@extends('Admin.Dashboard.pages.masterpage') @section('content')

<!-- content section -->
<div class="container my-3">

    <!-- section questionAnswer -->

    <a href="/dashboard" class="btn btn-primary mx-3 text-blue-500 hover:text-blue-700">
         Dashboard
    </a>
    <form action="/users" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            {{-- error message --}}
            @error('name')
            <div class="text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            {{-- error message --}}
            @error('email')
            <div class="text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            {{-- error message --}}
            @error('password')
            <div class="text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter password confirmation">
            {{-- error message --}}
            @error('password_confirmation')
            <div class="text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- is_admin dropdown --}}
        <div class="form-group">
            <label for="is_admin">Is Admin</label>
            <select class="form-control" id="is_admin" name="is_admin">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
    <!-- end form -->
</div>
@endsection
