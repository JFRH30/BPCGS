<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Datatables;
use Validator;

class UsersController extends Controller
{
    public function index()
    {
    	return view('user.index');
    }

    public function getData()
    {
    	$users = User::all();
    	return Datatables::of($users)
    		->addColumn('action', function($users){
    			return '<div class="row">
    								<div class="col">
	    								<a href="#" class="btn btn-xs btn-primary btn-block edit" id="'.$users->id.'"><i class="fa fa-edit"></i>Edit</a>
	    							</div>
	    							<br>
	    							<div class="col">
	    								<a href="#" class="btn btn-xs btn-danger btn-block delete" id="'.$users->id.'"><i class="fa fa-trash"></i> Delete</a>
	    							</div>
    							</div>';
    		})
 		   	->make(true);
    }

    public function postData(Request $request)
    {
    	$validator = Validator::make($request->all(),[
    		'name' => 'required',
    		'email' => 'required',
    		'password' => 'required',
    		'position' => 'required'
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
    			$user = new User([
    				'name' => $request->get('name'),
    				'email' => $request->get('email'),
    				'password' => bcrypt($request->get('password')),
    				'position' => $request->get('position')
    			]);
    			$user->save();
    			$success = '<script>toastr.success("User Inserted")</script>';
    		}
    		if ($request->get('buttonAction') =='update') {
    			$user = User::find($request->get('userid'));
    			$user->name = $request->get('name');
    			$user->email = $request->get('email');
    			$user->password = $request->get('password');
    			$user->position = $request->get('position');
    			$user->save();
    			$success = '<script>toastr.info("User Updated")</script>';
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
    	$user = User::find($id);
    	$output = array(
    		'userid' => $user->id,
    		'name' => $user->name,
    		'email' => $user->email,
    		'password' => $user->password,
    		'position' => $user->position
    	);
    	return json_encode($output);
			
    }

    public function removeData(Request $request)
    {
        $user = User::find($request->input('id'));
        if($user->delete())
        {
            echo 'User Deleted';
        }
    }
}
