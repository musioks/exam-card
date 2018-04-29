<?php

namespace App\Http\Controllers\Exams;

use App\Settings\Grading_system;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class GradingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $grades=Grading_system::all();
        return view('exams.grading',['grades'=>$grades]);
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
       'name'=>'required', 
       'grade_point'=>'required', 
       'mark_upto'=>'required', 
       'mark_from'=>'required', 
       'comment'=>'required', 
        ]);
        Grading_system::create(array_merge($request->all()));
        return redirect()->back()->with('success','Grading system has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings\Grading_system  $grading_system
     * @return \Illuminate\Http\Response
     */
    public function show(Grading_system $grading_system)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings\Grading_system  $grading_system
     * @return \Illuminate\Http\Response
     */
    public function edit(Grading_system $grading_system)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings\Grading_system  $grading_system
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $grade=Grading_system::find($request->id);
       $grade->update(array_merge($request->all()));
       return redirect()->back()->with('info','Grading system has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings\Grading_system  $grading_system
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $grade=Grading_system::find($id);
       $grade->delete();
        return redirect()->back()->with('info','Grading system been deleted!');
    }
}
