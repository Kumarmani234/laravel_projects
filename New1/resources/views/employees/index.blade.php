@extends('employees.master')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Employee Data</b></div>
			<div class="col col-md-6">
				<a href="{{ route('employees.create') }}" class="btn btn-success btn-sm float-end">Add</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr>
                <th>First_Name</th>
				<th>Last_Name</th>
				<th>Company_Id</th>
				<th>Email</th>
				<th>Phone</th>
			</tr>
			@if(count($data) > 0)

				@foreach($data as $row)

					<tr>
						<td>{{ $row->first_name }}</td>
						<td>{{ $row->last_name }}</td>
						<td>{{ $row->company_id }}</td>
						<td>{{ $row->email }}</td>
						<td>{{ $row->phone }}</td>
						<td>
							<form method="post" action="{{ route('employees.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('employees.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
								<a href="{{ route('employees.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Delete" />
							</form>
							
						</td>
					</tr>

				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
		</table>
		{!! $data->links() !!}
	</div>
</div>

@endsection
