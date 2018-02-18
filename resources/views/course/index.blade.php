@extends('layouts.app')

@section('title', '| Manage Course')

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
							{!! Form::label('course_code', 'Course Code:') !!}
							{!! Form::text('course_code', null, ['class'=>'form-control', 'placeholder' => 'Enter course code']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('course_title', 'Course Title:') !!}
							{!! Form::text('course_title', null, ['class'=>'form-control', 'placeholder' => 'Enter course title']) !!}
						</div>
						<hr>
							{!! Form::hidden('courseid', '', ['id'=>'courseid']) !!}
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
							<table class="table" id="courseTable">
							  <thead>
							    <tr>
							      <th scope="col">Code</th>
							      <th scope="col">Title</th>
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
					$('#courseTable').DataTable({
						proccessing: true,
						serverSide: true,
						ajax: '{{ route('getCourseData') }}',
						columns: 
						[
							{data: 'course_code'},
							{data: 'course_title'},
							{data: 'action', orderable:false, searchable: false}
						]
					});


					$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});
					// Store
					$('#storeForm').on('submit',function(event)
					{
						event.preventDefault();
						var storeData = $(this).serialize();
						$.ajax({
							url: '{{ route('postCourseData') }}',
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
                        errorHtml = data.error[count];
                        toastr.error(errorHtml);
                    }
								}
								else
								{
									$('#formOutput').html(data.success);
									$('#course_code').val('');
									$('#course_title').val('');
                  $('#storeForm')[0].reset();
                  $('#submitValue').val('ADD');
									$('#submitValue').removeClass('btn-warning');
									$('#submitValue').addClass('btn-success');
									$('.delete').removeClass('disabled');
                  $('#buttonAction').val('store');
                  $('#courseTable').DataTable().ajax.reload();
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
							url: '{{ route('fetchCourseData') }}',
							method: 'GET',
							data: {id:id},
							dataType: 'json',
							success: function(data){
								$('#courseid').val(data.courseid);
								$('#course_code').val(data.course_code);
								$('#course_title').val(data.course_title);
								$('#submitValue').val('UPDATE');
								$('#submitValue').removeClass('btn-success');
								$('.delete').addClass('disabled');
								$('#submitValue').addClass('btn-warning');
								$('#buttonAction').val('update');
							}
						})
					});

					// Delete
					$(document).on('click','.delete', function()
					{
						var id = $(this).attr("id");
						if(confirm("Are you sure want to delete this this course?"))
						{
							$.ajax({
								url: '{{ route('removeCourseData') }}',
								method: 'GET',
								data: {id:id},
								success: function(data)
								{
									alert(data);
									$('#courseTable').DataTable().ajax.reload();
								}
							})
						}
						else
						{
							return false;
						}
					});
				});

	</script>

@endpush