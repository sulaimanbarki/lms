<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dashboard\Department;
use App\Models\Subject;
use Illuminate\Http\Request;

class subjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $subjects = Subject::with('department')->get();
        // return view('subject.index', compact('subjects'));
        return view('Admin/Dashboard/pages/subject/index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        // return view('subject.create', compact('departments'));
        return view('Admin/Dashboard/pages/subject/create', compact('departments'));
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
        // return view('subject.index', compact('subjects'));
        return view('Admin.Dashboard.pages.subject.index', compact('subjects'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all();
        $subject = Subject::find($id);
        // return view('subject.edit', compact('subject', 'departments'));
        return view('Admin/Dashboard/pages/subject/edit', compact('departments', 'subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {

        $request->validate([
            'name' => 'required',
            'department_id' => 'required|exists:departments,id',
        ]);
        $subject->name = $request->name;
        $subject->department_id = $request->department_id;
        $subject->save();
        $subjects = Subject::all();
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();
            $subjects = Subject::all();
            return view('Admin/Dashboard/pages/subject/index', ['subjects' => $subjects]);
        } catch (\Exception $e) {
            $subjects = Subject::all();
            return redirect()->route('subjects.index')->with('delete_error', 'Subject can not be deleted.');
        }
    }
}