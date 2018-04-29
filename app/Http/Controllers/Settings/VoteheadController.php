<?php

namespace App\Http\Controllers\Settings;

use App\Settings\Votehead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;
class VoteheadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $votes=Votehead::all();
        return view('settings.voteheads',['votes'=>$votes]);
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
        ]);
        Votehead::create(array_merge($request->all()));
        return redirect()->back()->with('success','Votehead has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings\Votehead  $votehead
     * @return \Illuminate\Http\Response
     */
    public function show(Votehead $votehead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings\Votehead  $votehead
     * @return \Illuminate\Http\Response
     */
    public function edit(Votehead $votehead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings\Votehead  $votehead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $vote=Votehead::find($request->id);
       $vote->update(array_merge($request->all()));
       return redirect()->back()->with('info','Votehead has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings\Votehead  $votehead
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $vote=Votehead::find($id);
       $vote->delete();
        return redirect()->back()->with('warning','Votehead has been deleted!');
    }
}
