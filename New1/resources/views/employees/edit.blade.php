@extends('employees.master')

@section('content')

<div class="card">
	<div class="card-header">Edit Employee</div>
	<div class="card-body">
		<form method="post" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Employee First_Name</label>
				<div class="col-sm-10">
					<input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Employee Last_Name</label>
				<div class="col-sm-10">
					<input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Company_Id</label>
				<div class="col-sm-10">
					
                <input type="text" name="company_id" class="form-control" value="{{ $employee->company_id }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Email</label>
				<div class="col-sm-10">
					
                <input type="text" name="email" class="form-control" value="{{ $employee->email }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Mobile_No</label>
				<div class="col-sm-10">
					
                <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $employee->id }}" />
				<input type="submit" class="btn btn-primary" value="Update" />
			</div>	
		</form>
	</div>
</div>

@endsection('content')
