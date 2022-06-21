<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\department;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Video;
use Illuminate\Http\Request;

class RouterConteroller extends Controller
{
    public function engineering()
    {
        // all subjects and departments
        $subjects = Subject::all();
        $departments = department::all();
        // questions paging and pagination (10 questions per page)
        $questions = Question::paginate(10);

        return view('frontend.pages.engineering', compact('subjects', 'departments', 'questions'));
    }

    public function engineeringSearch(Request $request)
    {
        $question = Question::find($request->id);
        $subject_id = $question->subject_id;
        $questions = Question::where('subject_id', $subject_id)->get();
        return view('frontend.pages.engineering-search', compact('question', 'questions'));
    }

    // search function
    public function search(Request $request)
    {
        $questions = Question::where('question', 'like', '%' . $request->question . '%')
            ->where('department_id', $request->department_id)
            ->where('subject_id', $request->subject_id)
            ->get();
        return $questions;
    }

    public function freelancing()
    {
        // all blogs with pagination item per page = 10
        $blogs = Blog::paginate(10);
        // $blogs = Blog::all();
        return view('frontend.pages.freelancing', compact('blogs'));
    }

    public function freelanceSearch(Request $request){
        // search in blog based on request search
        $blogs = Blog::where('title', 'like', '%' . $request->search . '%')->take(10)->get();
        return $blogs;
    }

    public function freelancingShow(Request $request)
    {
        $blog = Blog::find($request->id);
        if (!$blog) {
            return abort(404);
        }
        return view('frontend.pages.freelancing-show', compact('blog'));
    }

    public function courses(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $videos = Video::where('title', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $videos = Video::paginate(10);
        }
        return view('frontend.pages.courses', compact('videos'));
    }

    // singleCourse function
    public function singleCourse(Request $request)
    {
        $video = Video::find($request->id);
        if (!$video) {
            return abort(404);
        }
        return view('frontend.pages.single-course', compact('video'));
    }

    // playList function
    public function playList(Request $request)
    {
        $video = Video::find($request->id);
        if (!$video) {
            return abort(404);
        }
        return view('frontend.pages.play-list', compact('video'));
    }

    // coursesSearch function
    public function coursesSearch(Request $request)
    {
        $videos = Video::where('title', 'like', '%' . $request->search . '%')->take(10)->get();
        return $videos;
    }

    // fetchSubjects function subjects based on department_id
    public function fetchSubjects(Request $request)
    {
        $subjects = Subject::where('department_id', $request->id)->get();
        return $subjects;
    }

}
