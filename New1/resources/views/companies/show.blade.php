@extends('companies.master')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Company Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('companies.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Company Name</b></label>
			<div class="col-sm-10">
				{{ $company->name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Company Email</b></label>
			<div class="col-sm-10">
				{{ $company->email }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Company logo</b></label>
			<div class="col-sm-10">
				<img src="{{ asset('images/' .  $company->logo) }}" width="200" class="img-thumbnail" />
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Company website</b></label>
			<div class="col-sm-10">
				{{ $company->website }}
			</div>
		</div>
	</div>
</div>

@endsection('content')
