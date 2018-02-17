@extends('layouts.app')

@section('content')
	<section class="container mb-5">
		<div class="row">

			{{-- Add Form --}}
			<div class="col-md-4 pt-5">
				<div class="card">
					<div class="card-body">
						<span id="formOutput"></span>
						{!! Form::open(['method'=>'post', 'id'=>'storeForm']) !!}
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
							{!! Form::select('subject_sem', ['1st Sem'=>'1st Semester', '2nd Sem'=>'2nd Semester'], null, ['class'=>'form-control', 'placeholder'=>'--- Select semester ---']) !!}
						</div>
						<hr>
							{!! Form::hidden('subjectid', '', ['id'=>'subjectid']) !!}
							{!! Form::hidden('buttonAction', 'store', ['id'=>'buttonAction']) !!}
							{!! Form::submit('ADD',['id'=>'submitValue','class'=>'btn btn-success btn-block']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>

			{{-- Datatables --}}
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
							      <th scope="col">Action</th>
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
	<script type="text/javascript">
		$(document).ready( function() 
				{
					// Datatable
					$('#subjectTable').DataTable({
						proccessing: true,
						serverSide: true,
						ajax: '{{ route('getData') }}',
						columns: 
						[
							{data: 'subject_code'},
							{data: 'subject_title'},
							{data: 'subject_unit'},
							{data: 'subject_course'},
							{data: 'subject_sem'},
							{data: 'action', orderable:false, searchable: false}
						]
					});
					// Store
					$('#storeForm').on('submit',function(event)
					{
						event.preventDefault();
						var storeData = $(this).serialize();
						$.ajax({
							url: '{{ route('postData') }}',
							method: 'POST',
							data: storeData,
							dataType: 'json',
							success: function(data)
							{
								if(data.error.length > 0)
								{
									var errorHtml = '';
									for(var count = 0; count < data.error.length; count++)
                    {
                        errorHtml += '<div class="alert alert-danger alert-dismissible fade show">'+data.error[count]+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    }
                    $('#formOutput').html(errorHtml);
								}
								else
								{
									$('#formOutput').html(data.success);
                  $('#storeForm')[0].reset();
                  $('#buttonAction').val('store');
                  $('#subjectTable').DataTable().ajax.reload();
								}
							}
						})
					});

					// Update
					$(document).on('click','.edit', function()
					{
						var id = $(this).attr("id");
						$('#formOutput').html('');
						$.ajax({
							url: '{{ route('fetchData') }}',
							method: 'GET',
							data: {id:id},
							dataType: 'json',
							success: function(data){
								$('#subjectid').val(data.subjectid);
								$('#subject_code').val(data.subject_code);
								$('#subject_title').val(data.subject_title);
								$('#subject_unit').val(data.subject_unit);
								$('#subject_course').val(data.subject_course);
								$('#subject_sem').val(data.subject_sem);
								$('#submitValue').val('UPDATE');
								$('#buttonAction').val('update');
							}
						})
					})

					// Delete
					$(document).on('click','.delete', function()
					{
						var id = $(this).attr("id");
						$('#formOutput').html('');
						$.ajax({
							url: '{{ route('fetchData') }}',
							method: 'GET',
							data: {id:id},
							dataType: 'json',
							success: function(data){
								$('#subjectid').val(data.subjectid);
								$('#subject_code').val(data.subject_code);
								$('#subject_title').val(data.subject_title);
								$('#subject_unit').val(data.subject_unit);
								$('#subject_course').val(data.subject_course);
								$('#subject_sem').val(data.subject_sem);
								$('#submitValue').val('DELETE');
								$('#buttonAction').val('destroy');
							}
						})
					})
				});
	</script>

@endpush