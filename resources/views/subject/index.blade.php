@extends('layouts.app')

@section('content')
	<section class="container mb-5">
		<div class="row">
			<div class="col-md-4 pt-5">
				<div class="card">
					<div class="card-body">
						{!! Form::open(['action' => 'SubjectsController@store']) !!}
							<div class="form-group">
								{!! Form::label('subject_code', 'Subject Code:') !!}
								{!! Form::text('subject_code', null, ['class'=>'form-control', 'placeholder' => 'Enter subject code']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('subject_title', 'Subject Title:') !!}
								{!! Form::text('subject_title', null, ['class'=>'form-control', 'placeholder' => 'Enter subject title']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('subject_unit', 'Unit:') !!}
								{!! Form::number('subject_unit', null, ['class'=>'form-control', 'placeholder'=>'Enter subject unit']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('subject_course', 'Course Department:') !!}
								{!! Form::select('subject_course', ['BSOM'=>'BS Office Management', 'BSIS'=>'BS Information Systems'], null, ['class'=>'form-control', 'placeholder'=>'--- Select department ---']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('subject_sem', 'Semester:') !!}
								{!! Form::select('subject_sem', ['1stSem'=>'1st Semester', '2nd'=>'2nd Semester'], null, ['class'=>'form-control', 'placeholder'=>'--- Select semester ---']) !!}
							</div>
							<hr>
							{!! Form::submit('ADD',['class'=>'btn btn-success btn-block']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			<div class="col-md-8 pt-5">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive-sm">
							<table class="table" id="subjectTable">
							  <thead>
							    <tr>
							      <th scope="col">Code</th>
							      <th scope="col">Title</th>
							      <th scope="col">Unit</th>
							      <th scope="col">Department</th>
							      <th scope="col">Semester</th>
							    </tr>
							  </thead>
						  </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@push('scripts')
	<script>
	$('#subjectTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('subjectsData') !!}',
        columns: [
            {data:'id'},
						{data:'subject_code'},
						{data:'subject_title'},
						{data:'subject_unit'},
						{data:'subject_course'},
						{data:'subject_sem'}
        ]
    });
	</script>
@endpush