<?php

namespace App\Http\Controllers;

use App\Models\Admin\Dashboard\Department;
use App\Models\Admin\Dashboard\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::with('department')->get();
        return view('subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('subject.create', compact('departments'));
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
            'name' => 'required',
            // check department_id in database
            'department_id' => 'required|exists:departments,id',
        ]);
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->department_id = $request->department_id;
        $subject->save();
        $subjects = Subject::all();
        return view('subject.index', compact('subjects'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $departments = department::all();
        return view('subject.edit', compact('subject', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required',
            // check department_id in database
            'department_id' => 'required|exists:departments,id',
        ]);
        $subject->name = $request->name;
        $subject->department_id = $request->department_id;
        $subject->save();
        $subjects = Subject::all();
        return view('subject.index', compact('subjects'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        dd($subject);
        try {
            $subject->delete();
            return redirect()->route('subject.index');
        } catch (\Exception $e) {
            return redirect()->route('subject.index')->with('delete_error', 'Subject can not be deleted.');
        }
        redirect()->route('subject.index');
    }
}
