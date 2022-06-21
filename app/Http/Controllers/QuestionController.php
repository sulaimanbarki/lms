<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all question with all subjects and all departments
        $questions = Question::with('subject', 'subject.department')->get();
        // return view('questions.index', compact('questions'));
        return view('Admin/Dashboard/pages/questionAnswer/index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $departments = department::all();
        return view('admin.dashboard.pages.questionAnswer.create', compact('subjects', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'subject_id' => 'required',
            'department_id' => 'required',
        ]);
        $question = new Question();
        $question->question = $request->question;
        $question->answer = $request->answer;
        $question->subject_id = $request->subject_id;
        $question->department_id = $request->department_id;
        $question->save();
        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $subjects = Subject::all();
        $departments = department::all();
        return view('admin.dashboard.pages.questionAnswer.edit', compact('question', 'subjects', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'subject_id' => 'required',
            'department_id' => 'required',
        ]);
        $question->question = $request->question;
        $question->answer = $request->answer;
        $question->subject_id = $request->subject_id;
        $question->department_id = $request->department_id;
        $question->save();
        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index');
    }
}
