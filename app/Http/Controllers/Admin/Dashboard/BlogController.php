<?php

namespace App\Http\Controllers\Admin\Dashboard;

// use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Models\Admin\Dashboard\Blog;
use Faker\Provider\File;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        // return view('blogs.index', compact('blogs'));
        return view('Admin/Dashboard/pages/blogs/index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Dashboard/pages/blogs/create');
    }

    // upload file
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            // $request->file('upload')->storeAs('public/uploads', $filenametostore);
            $request->file('upload')->move(public_path('uploads'), $filenametostore);

            //return response()->json(['uploaded'=>'ok'], 200);
            return response()->json(['uploaded'=>'ok', 'url'=>asset('uploads/'.$filenametostore)], 200);
        }
        else {
            return response()->json(['uploaded'=>'not ok'], 200);
        }
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
            // thumbnail optional mimetype: image/jpeg, image/png, image/gif
            'thumbnail' => 'nullable|mimetypes:image/jpeg,image/png,image/gif',
            'description' => 'required',
        ]);

        // if thumbnail is uploaded move it to public/uploads/thumbnail
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/thumbnail'), $fileName);
            $thumbnail_url = $fileName;
        }

        $blog = new Blog;
        $blog->title = $request->title;
        // thumbnail_url optional
        $blog->thumbnail = $thumbnail_url;
        $blog->body = $request->description;
        $blog->save();

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('Admin/Dashboard/pages/blogs/edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'title' => 'required',
            'thumbnail' => 'nullable|mimetypes:image/jpeg,image/png,image/gif',
            'description' => 'required',
        ]);

        // if thumbnail exists delete it
        if ($blog->thumbnail) {
            $file_path = public_path('uploads/thumbnail/'.$blog->thumbnail);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        // if thumbnail is uploaded move it to public/uploads/thumbnail
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/thumbnail'), $fileName);
            $thumbnail_url = $fileName;
        }

        $blog->title = $request->title;
        $blog->thumbnail = $thumbnail_url;
        $blog->body = $request->description;
        $blog->save();

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index');
    }
}