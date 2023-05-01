@extends('employees.master')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<div class="card">
	<div class="card-header">Add Employee</div>
	<div class="card-body">
		<form method="post" action="{{ route('employees.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form"> First_Name</label>
				<div class="col-sm-10">
					<input type="text" name="first_name" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form"> Last_Name</label>
				<div class="col-sm-10">
					<input type="text" name="last_name" class="form-control" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form"> Company_Id</label>
				<div class="col-sm-10">
			
                    <input type="text" name="company_id" class="form-control" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form"> Email</label>
				<div class="col-sm-10">
                <input type="text" name="email" class="form-control" />
				</div>
			</div>
            <div class="row mb-4">
				<label class="col-sm-2 col-label-form"> Mobile_No</label>
				<div class="col-sm-10">
                <input type="text" name="phone" class="form-control" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
			</div>	
		</form>
	</div>
</div>

@endsection('content')
