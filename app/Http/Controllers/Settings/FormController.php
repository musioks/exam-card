<?php

namespace App\Http\Controllers\Settings;

use App\Settings\Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $forms=Form::all();
        return view('settings.forms',['forms'=>$forms]);
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
       'form'=>'required', 
        ]);
        Form::create(array_merge($request->all()));
        return redirect()->back()->with('success','Form has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $form=Form::find($request->id);
       $form->update(array_merge($request->all()));
       return redirect()->back()->with('info','Form has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $form=Form::find($id);
       $form->delete();
        return redirect()->back()->with('warning','Form has been deleted!');
    }
}
