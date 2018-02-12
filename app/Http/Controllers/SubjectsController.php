<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use Yajra\Datatables\Datatables;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subject.index');
    }

    public function data()
    {
        return Datatables::of(Subject::query())->make(true);
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
            'subject_code' => 'required',
            'subject_title' => 'required',
            'subject_unit' => 'required',
            'subject_course' => 'required',
            'subject_sem' => 'required',
        ]);

        $subjects = new Subject;
        $subjects->subject_code = $request->subject_code;
        $subjects->subject_title = $request->subject_title;
        $subjects->subject_unit = $request->subject_unit;
        $subjects->subject_course = $request->subject_course;
        $subjects->subject_sem = $request->subject_sem;
        $subjects->save();

        return view('subject.index');
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
