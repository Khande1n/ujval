@extends('layouts.pages')

@section('title')
<title>{{ $staffData->name }} </title>
@endsection

@section('content')

<div>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<h1>Details: {{ $staffData->name }}</h1>
		</div>
		<div class="panel-body">

		</div>

		<!-- Table -->
		<table class="table">
			<tr>
				<th>Name </th>
				<th>Email </th>
				<th>Bday </th>
				<th>Edit </th>
				<!-- <th>Delete </th> -->
			</tr>

			<tr>
				<td>{{ $staffData->name }} </td>
				<td>{{ $staffData->email }} </td>
				<td>{{ $staffData->bday }} </td>
				
				<td><a href="/staff/{{ $staffData->id }}/edit">
				<button type="button" class="btn btn-default">
					Edit
				</button> </a></td>
				
				<!-- <td> {!! Form::model($staffData,
				['route' => ['staff.destroy', $staffData->id],
				'method' => 'DELETE'])
				!!}
				<div class="form-group">
					{!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
				</div> {!! Form::close() !!} </td> -->
			</tr>
		</table>
	</div>
</div>

@include('staff.staffData')

@endsection

@section('scripts')
<script>
	function ConfirmDelete() {
		var x = confirm("Are you sure you want to delete?");
		if (x)
			return true;
		else
			return false;
	}

</script>

@endsection

