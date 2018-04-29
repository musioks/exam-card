<?php

namespace App\Http\Controllers\Settings;

use App\Settings\Subject_group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SubGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups=Subject_group::all();
        return view('settings.subject_groups',['groups'=>$groups]);
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
       'group_name'=>'required', 
        ]);
        Subject_group::create(array_merge($request->all()));
        return redirect()->back()->with('success','Subject Group has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings\Subject_group  $subject_group
     * @return \Illuminate\Http\Response
     */
    public function show(Subject_group $subject_group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings\Subject_group  $subject_group
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject_group $subject_group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings\Subject_group  $subject_group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $group=Subject_group::find($request->id);
       $group->update(array_merge($request->all()));
       return redirect()->back()->with('info','Subject Group has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings\Subject_group  $subject_group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $group=Subject_group::find($id);
       $group->delete();
        return redirect()->back()->with('warning','Subject Group has been deleted!');
    }
}
