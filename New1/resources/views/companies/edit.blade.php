@extends('companies.master')

@section('content')

<div class="card">
	<div class="card-header">Edit Company</div>
	<div class="card-body">
		<form method="post" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Company Name</label>
				<div class="col-sm-10">
					<input type="text" name="Name" class="form-control" value="{{ $company->name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Company Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" value="{{ $company->email }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Company website</label>
				<div class="col-sm-10">
					
                <input type="text" name="website" class="form-control" value="{{ $company->website }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Company logo</label>
				<div class="col-sm-10">
					<input type="file" name="logo" />
					<br />
					<img src="{{ asset('images/' . $company->logo) }}" width="100" class="img-thumbnail" />
					<input type="hidden" name="hidden_logo" value="{{ $company->logo }}" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $company->id }}" />
				<input type="submit" class="btn btn-primary" value="Update" />
			</div>	
		</form>
	</div>
</div>

@endsection('content')
