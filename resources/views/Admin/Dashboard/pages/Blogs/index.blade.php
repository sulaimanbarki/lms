@extends('Admin.Dashboard.pages.masterpage')

@section('content')
        <!-- create blog link -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ route('blogs.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Blog</a>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end create blog link --}}
            {{-- table --}}
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Blogs
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->id }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>
                                            <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-primary ">Edit</a>
                                            <form action="/blogs/{{ $blog->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you shure to delete this record?')" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- end table --}}


        {{-- <div id="editor"></div> --}}
@endsection
