<?php

namespace App\Http\Controllers\Settings;

use App\Settings\Stream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class StreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $streams=Stream::all();
        return view('settings.streams',['streams'=>$streams]);
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
       'stream_name'=>'required', 
        ]);
        Stream::create(array_merge($request->all()));
        return redirect()->back()->with('success','Stream has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function show(Stream $stream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function edit(Stream $stream)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $stream=Stream::find($request->id);
       $stream->update(array_merge($request->all()));
       return redirect()->back()->with('info','Stream has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $stream=Stream::find($id);
       $stream->delete();
        return redirect()->back()->with('warning','Stream has been deleted!');
    }
}
