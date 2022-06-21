<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // all videos paginated
        $videos = Video::all();
        return view('admin.dashboard.pages.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.pages.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subject_id' => 'required',
            'description' => 'required',
            'video_url' => 'required',
            'is_active' => 'required',
            'is_playlist' => 'required',
            'image_thumbnail' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        // if thumbnail is uploaded move it to public/uploads/thumbnail
        if ($request->hasFile('image_thumbnail')) {
            $file = $request->file('image_thumbnail');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/thumbnail'), $fileName);
            $thumbnail_url = $fileName;
        }


        $video = new Video();
        $video->title = $request->title;
        $video->subject_id = $request->subject_id;
        $video->description = $request->description;
        $video->video_url = $request->video_url;
        $video->is_active = $request->is_active;
        $video->is_playlist = $request->is_playlist;
        $video->thumbnail_url = $thumbnail_url;
        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Dashboard\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Dashboard\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.dashboard.pages.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Dashboard\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $this->validate($request, [
            'title' => 'required',
            'subject_id' => 'required',
            'description' => 'required',
            'video_url' => 'required',
            'is_active' => 'required',
            'is_playlist' => 'required',
            'image_thumbnail' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        // if thumbnail exists delete it
        if ($video->thumbnail_url and $request->hasFile('image_thumbnail')) {
            $file_path = public_path('uploads/thumbnail/' . $video->image_thumbnail);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        $image_thumbnail = "";
        // if thumbnail is uploaded move it to public/uploads/thumbnail
        if ($request->hasFile('image_thumbnail')) {
            $file = $request->file('image_thumbnail');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/thumbnail'), $fileName);
            $image_thumbnail = $fileName;
        }

        $video->title = $request->title;
        $video->subject_id = $request->subject_id;
        $video->description = $request->description;
        $video->video_url = $request->video_url;
        $video->is_active = $request->is_active;
        $video->is_playlist = $request->is_playlist;
        $image_thumbnail ? $video->thumbnail_url = $image_thumbnail : "";
        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Dashboard\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index')->with('success', 'Video deleted successfully');
    }
}
