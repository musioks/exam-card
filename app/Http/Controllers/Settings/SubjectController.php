<?php

namespace App\Http\Controllers\Settings;

use App\Settings\Subject;
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
         $groups=\App\Settings\Subject_group::all();
         $subjects=\DB::table('subjects')
                       ->join('subject_groups','subjects.group_id','subject_groups.id')
                       ->select('subjects.*','subject_groups.group_name as group')
                       ->get();
        return view('settings.subjects',['groups'=>$groups,'subjects'=>$subjects]);
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
       'group_id'=>'required', 
       'subject_code'=>'required', 
       'subject_name'=>'required', 
        ]);
        Subject::create(array_merge($request->all()));
        return redirect()->back()->with('success','Subject has been created!');
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
       return redirect()->back()->with('info','Subject has been updated!');
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
        return redirect()->back()->with('warning','Subject has been deleted!');
    }
}
