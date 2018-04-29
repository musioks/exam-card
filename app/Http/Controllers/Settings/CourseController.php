<?php

namespace App\Http\Controllers\Settings;

use App\Settings\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all();
        //dd($courses);
        return view('settings.courses',['courses'=>$courses]);
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
       'course_name'=>'required', 
       'course_code'=>'required', 
       'duration'=>'required', 
        ]);
        Course::create(array_merge($request->all()));
        return redirect()->back()->with('success','Course has been created!');
    }

    public function update(Request $request)
    {
       $course=Course::find($request->id);
       $course->update(array_merge($request->all()));
       return redirect()->back()->with('info','Course has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $course=Course::find($id);
       $course->delete();
        return redirect()->back()->with('warning','Course has been deleted!');
    }
}
