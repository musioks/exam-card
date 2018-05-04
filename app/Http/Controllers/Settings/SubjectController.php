<?php

namespace App\Http\Controllers\Settings;

use App\Settings\Subject;
use App\Settings\Course;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $subjects=DB::table('subjects')
         ->join('courses','subjects.course_id','courses.id')
         ->select('subjects.*','courses.course_name as course')
         ->get();
         $courses=Course::all();
        return view('settings.subjects',['subjects'=>$subjects,'courses'=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       'subject_code'=>'required', 
       'subject_name'=>'required', 
        ]);
        Subject::create(array_merge($request->all()));
        return redirect()->back()->with('success','Unit has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $subject=Subject::find($request->id);
       $subject->update(array_merge($request->all()));
       return redirect()->back()->with('info','Unit has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $subject=Subject::find($id);
       $subject->delete();
        return redirect()->back()->with('warning','Unit has been deleted!');
    }
}
