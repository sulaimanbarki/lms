@extends('Admin.Dashboard.pages.masterpage')
@section('content')


<!-- /.view all departments in table -->
<div class="container my-3">

    <!-- /.link to create video -->
    <a href="{{route('videos.create')}}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i>
        Add Video
    </a>
    {{-- link to dashboard --}}
    <a href="{{route('dashboard')}}" class="btn btn-primary">
        <i class="fas fa-home"></i>
        Dashboard
    </a>
    
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Video</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('videos.update',$video->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{$video->title}}">
                        </div>
                        {{-- subject_id --}}
                        @php
                            $subjects = \App\Models\Subject::all();
                        @endphp
                        <div class="form-group d-none">
                            <label for="subject_id">Subject</label>
                            <select name="subject_id" id="subject_id" class="form-control">
                                {{-- select subject --}}
                                <option value="1">Select Subject</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10"
                                class="form-control">{{$video->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="video_url">Video Url</label>
                            <span class="text-danger">(for single video just paste the unique ID of a video and for playlist paste all the IDs of each videos in playlist separated by comma)</span>
                            <input type="text" name="video_url" id="video_url" class="form-control"
                                value="{{$video->video_url}}">
                        </div>
                        {{-- is active --}}
                        <div class="form-group">
                            <label for="is_active">Is Active</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1" {{$video->is_active == 1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$video->is_active == 0 ? 'selected' : ''}}>Inactive</option>
                            </select>
                        </div>
                        {{-- is playlist --}}
                        <div class="form-group">
                            <label for="is_playlist">Is Playlist</label>
                            <select name="is_playlist" id="is_playlist" class="form-control">
                                <option value="1" {{$video->is_playlist == 1 ? 'selected' : ''}}>Yes</option>
                                <option value="0" {{$video->is_playlist == 0 ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                        {{-- image thumbnail --}}
                        <div class="form-group">
                            <label for="image_thumbnail">Image Thumbnail</label>
                            <input type="file" name="image_thumbnail" id="image_thumbnail" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    @endsection
