@extends('Admin.Dashboard.pages.masterpage')
@section('content')


<div class="container my-3">

    <a href="{{route('videos.create')}}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i>
        Add Video
    </a>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Videos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatablesSimple" style="width: 100%" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                {{-- <th>Subject</th> --}}
                                <th>Type</th>
                                <th>Is Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                            <tr>
                                <td>{{$video->id}}</td>
                                <td>{{$video->title}}</td>
                                @php
                                    $subject = \App\Models\Subject::find($video->subject_id);
                                @endphp
                                {{-- <td>{{$subject->name}}</td> --}}
                                <td>{{ $video->is_playlist == 1 ? 'Playlist' : 'Video'}}</td>
                                <td>{{ $video->is_active == 1 ? 'Yes' : 'No'}}</td>
                                <td>
                                    <a href="{{route('videos.edit',$video->id)}}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{route('videos.destroy',$video->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure to delete this video?')" type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$videos->links()}} --}}
                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    @endsection
