@extends('Admin.Dashboard.pages.masterpage')

@section('content')


                        <h1 class="mt-4">Dashboard</h1>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Questions</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        @php
                                            $total_questions = DB::table('question_answers')->count();
                                        @endphp
                                        <h3><a class="small text-white stretched-link" href="#">{{ $total_questions }}</a></h3>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Total Blogs</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        @php
                                            $total_blogs = DB::table('blogs')->count();
                                        @endphp
                                        <h3><a class="small text-white stretched-link" href="#">{{$total_blogs}}</a></h3>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Videos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        @php
                                            $total_videos = DB::table('videos')->count();
                                        @endphp
                                        <h3><a class="small text-white stretched-link" href="#">{{$total_videos}}</a></h3>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        @php
                                            $total_users = DB::table('users')->count();
                                        @endphp
                                        <h3><a class="small text-white stretched-link" href="#">{{$total_users}}</a></h3>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> --}}

 @endsection
