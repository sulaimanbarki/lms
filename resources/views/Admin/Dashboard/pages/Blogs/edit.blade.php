@extends('Admin.Dashboard.pages.masterpage')

@section('content')

{{-- edit blog form --}}
<div class="container mt-3">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{ route('blogs.index') }}" class="btn btn-primary">Blogs</a>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{-- <div id="editor"></div> --}}
                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" class="py-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $blog->title }}">
                        </div>
                        {{-- blog thumbnail --}}
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        </div>
                        <div class="form-group mt-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="editor" name="description" rows="20">{{ $blog->body }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}'
                }
            })
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

</div>

@endsection
