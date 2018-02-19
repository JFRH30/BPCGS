@extends('layouts.app')

@section('title', '| Manage Users')

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
							{!! Form::label('name', 'Name:') !!}
							{!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Enter fullname']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('email', 'Email:') !!}
							{!! Form::email('email', null, ['class'=>'form-control', 'placeholder' => 'Enter email']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('password', 'Password:') !!}
							{!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter password']) !!}
						</div>
{{-- 						<div class="form-group">
							{!! Form::label('position', 'Position:') !!}
							{!! Form::select('position', ['Admin'=>'Admin', 'Registrar'=>'Registrar', 'Teacher'=>'Teacher', 'Parent'=>'Parent', 'Student'=>'Student'], null, ['class'=>'form-control', 'placeholder'=>'--- Select position ---']) !!}
						</div> --}}
						<hr>
							{!! Form::hidden('userid', '', ['id'=>'userid']) !!}
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
							<table class="table" id="userTable">
							  <thead>
							    <tr>
							      <th scope="col">Name</th>
							      <th scope="col">Email</th>
							      {{-- <th scope="col">Position</th> --}}
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
					$('#userTable').DataTable({
						proccessing: true,
						serverSide: true,
						ajax: '{{ route('getUserData') }}',
						columns: 
						[
							{data: 'name'},
							{data: 'email'},
							// {data: 'position'},
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
							url: '{{ route('postUserData') }}',
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
									$('#name').val('');
									$('#email').val('');
									$('#password').val('');
									// $('#position').val('');
                  $('#storeForm')[0].reset();
                  $('#submitValue').val('ADD');
									$('#submitValue').removeClass('btn-warning');
									$('.delete').removeClass('disabled');
									$('#submitValue').addClass('btn-success');
                  $('#buttonAction').val('store');
                  $('#userTable').DataTable().ajax.reload();
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
							url: '{{ route('fetchUserData') }}',
							method: 'GET',
							data: {id:id},
							dataType: 'json',
							success: function(data){
								$('#userid').val(data.userid);
								$('#name').val(data.name);
								$('#email').val(data.email);
								$('#password').val(data.password);
								// $('#position').val(data.position);
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
						if(confirm("Are you sure want to delete this this user?"))
						{
							$.ajax({
								url: '{{ route('removeUserData') }}',
								method: 'GET',
								data: {id:id},
								success: function(data)
								{
									alert(data);
									$('#userTable').DataTable().ajax.reload();
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