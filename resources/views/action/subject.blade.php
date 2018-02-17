<a href="{{ route('subjects.edit',$subjects->id) }}" class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</a>
{{ Form::open(array('url' => 'subjects/' . $subjects->id)) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}