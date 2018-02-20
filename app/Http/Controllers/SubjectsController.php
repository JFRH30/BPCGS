<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use Datatables;
use Validator;

class SubjectsController extends Controller
{
    public function index()
    {
    	return view('subject.index');
    }

    public function getData()
    {
    	$subjects = Subject::all();
    	return Datatables::of($subjects)
    		->addColumn('action', function($subjects){
    			return '<div class="row">
							<div class="col">
								<a href="#" class="btn btn-xs btn-primary btn-block edit" id="'.$subjects->id.'"><i class="fa fa-edit"></i>Edit</a>
							</div>
							<br>
							<div class="col">
								<a href="#" class="btn btn-xs btn-danger btn-block delete" id="'.$subjects->id.'"><i class="fa fa-trash"></i> Delete</a>
							</div>
						</div>';
    		})
 		   	->make(true);
    }

    public function postData(Request $request)
    {
    	$validator = Validator::make($request->all(),[
    		'subject_code' => 'required',
    		'subject_title' => 'required',
    		'subject_unit' => 'required',
    		'subject_course' => 'required',
    		'subject_sem' => 'required'
    	]);
    	$error = array();
    	$success = '';
    	if($validator->fails())
    	{
    		foreach ($validator->messages()->getMessages() as $field_name => $messages) {
    			$error[] = $messages;
    		}
    	}
    	else
    	{
    		if ($request->get('buttonAction') =='store') {
    			$subject = new Subject([
    				'subject_code' => $request->get('subject_code'),
    				'subject_title' => $request->get('subject_title'),
    				'subject_unit' => $request->get('subject_unit'),
    				'subject_course' => $request->get('subject_course'),
    				'subject_sem' => $request->get('subject_sem')
    			]);
    			$subject->save();
    			$success = '<script>toastr.success("Subject Inserted")</script>';
    		}
    		if ($request->get('buttonAction') =='update') {
    			$subject = Subject::find($request->get('subjectid'));
    			$subject->subject_code = $request->get('subject_code');
    			$subject->subject_title = $request->get('subject_title');
    			$subject->subject_unit = $request->get('subject_unit');
    			$subject->subject_course = $request->get('subject_course');
    			$subject->subject_sem = $request->get('subject_sem');
    			$subject->save();
    			$success = '<script>toastr.info("Subject Updated")</script>';
    		}

    	}
    	$output = array(
    		'error' => $error,
    		'success' => $success
    	);

    	return json_encode($output);
    }

    public function fetchData(Request $request)
    {
    	$id = $request->input('id');
    	$subject = Subject::find($id);
    	$output = array(
    		'subjectid' => $subject->id,
    		'subject_code' => $subject->subject_code,
    		'subject_title' => $subject->subject_title,
    		'subject_unit' => $subject->subject_unit,
    		'subject_course' => $subject->subject_course,
    		'subject_sem' => $subject->subject_sem
    	);
    	return json_encode($output);
			
    }

    public function removeData(Request $request)
    {
        $subject = Subject::find($request->input('id'));
        if($subject->delete())
        {
            echo 'Subject Deleted';
        }
    }
}
