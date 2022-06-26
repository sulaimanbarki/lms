@extends('Admin.Dashboard.pages.masterpage')
@section('content')
@if($errors->any())
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
@endif
{{-- form to create department --}}
<div class="container my-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Video</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                        </div>
                        {{-- dropdown subject --}}
                        @php
                            $subjects = \App\Models\Subject::all();
                        @endphp
                        <div class="form-group d-none">
                            <label for="subject_id">Subject</label>
                            <select name="subject_id" id="subject_id" class="form-control">
                                <option value="1">Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter Description"></textarea>
                        </div>
                        {{-- videos url --}}
                        <div class="form-group">
                            {{-- warning text in span --}}
                            <label for="video_url">Video Url</label>
                            <span class="text-danger">(for single video just paste the unique ID of a video and for playlist paste all the IDs of each videos in playlist separated by comma)</span>
                            <input type="text" name="video_url" id="video_url" class="form-control" placeholder="Enter Video Url">
                        </div>
                        {{-- is active --}}
                        <div class="form-group">
                            <label for="is_active">Is Active</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        {{-- is playlist boolean --}}
                        <div class="form-group">
                            <label for="is_playlist">Is Playlist</label>
                            <select name="is_playlist" id="is_playlist" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        {{-- image thumbnail --}}
                        <div class="form-group">
                            <label for="image_thumbnail">Image Thumbnail</label>
                            <input type="file" name="image_thumbnail" id="image_thumbnail" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                Save
                            </button>
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
