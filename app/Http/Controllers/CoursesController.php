<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Datatables;
use Validator;

class CoursesController extends Controller
{
    public function index()
    {
    	return view('course.index');
    }

    public function getData()
    {
    	$courses = Course::all();
    	return Datatables::of($courses)
    		->addColumn('action', function($courses){
    			return '<div class="row">
							<div class="col">
								<a href="#" class="btn btn-xs btn-primary btn-block edit" id="'.$courses->id.'"><i class="fa fa-edit"></i>Edit</a>
							</div>
							<br>
							<div class="col">
								<a href="#" class="btn btn-xs btn-danger btn-block delete" id="'.$courses->id.'"><i class="fa fa-trash"></i> Delete</a>
							</div>
						</div>';
    		})
 		   	->make(true);
    }

    public function postData(Request $request)
    {
    	$validator = Validator::make($request->all(),[
    		'course_code' => 'required',
    		'course_title' => 'required'
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
    			$course = new Course([
    				'course_code' => $request->get('course_code'),
    				'course_title' => $request->get('course_title')
    			]);
    			$course->save();
    			$success = '<script>toastr.success("Course Inserted")</script>';
    		}
    		if ($request->get('buttonAction') =='update') {
    			$course = Course::find($request->get('courseid'));
    			$course->course_code = $request->get('course_code');
    			$course->course_title = $request->get('course_title');
    			$course->save();
    			$success = '<script>toastr.info("Course Updated")</script>';
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
    	$course = Course::find($id);
    	$output = array(
    		'courseid' => $course->id,
    		'course_code' => $course->course_code,
    		'course_title' => $course->course_title
    	);
    	return json_encode($output);
			
    }

    public function removeData(Request $request)
    {
        $course = Course::find($request->input('id'));
        if($course->delete())
        {
            echo 'Course Deleted';
        }
    }
}
