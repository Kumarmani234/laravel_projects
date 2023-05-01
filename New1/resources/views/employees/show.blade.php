@extends('employees.master')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Employee Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Employee first_name</b></label>
			<div class="col-sm-10">
				{{ $employee->first_name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Employee Last_name</b></label>
			<div class="col-sm-10">
				{{ $employee->last_name }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Employee Company</b></label>
			<div class="col-sm-10">
				{{ $employee->company_id }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Employee Email</b></label>
			<div class="col-sm-10">
				{{ $employee->email }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Employee Phone_No</b></label>
			<div class="col-sm-10">
				{{ $employee->phone }}
			</div>
		</div>
		
	</div>
</div>

@endsection('content')
