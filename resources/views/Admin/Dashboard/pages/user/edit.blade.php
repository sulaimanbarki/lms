@extends('Admin.Dashboard.pages.masterpage')

@section('content')

<!-- content section -->
<div class="container my-3">
    {{-- dashboard link --}}
    <a href="{{ route('dashboard') }}" class="btn btn-primary">
        <i class="fas fa-home"></i>
        Dashboard
    </a>
    {{-- edit user form --}}
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $user->name }}">
            {{-- error message --}}
            @error('name')
            <div class="text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>
            {{-- email --}}
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $user->email }}">
                {{-- error message --}}
                @error('email')
                <div class="text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>
            {{-- password --}}
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
            {{-- password_confirmation --}}
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
                    <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>
            {{-- error message --}}
            @error('is_admin')
            <div class="text-red-500">
                {{ $message }}
            </div>
            @enderror
            {{-- submit button --}}
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
        <!-- end form -->
                
</div>
@endsection
