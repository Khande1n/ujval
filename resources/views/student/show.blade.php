@extends('layouts.pages')

@section('title')
<title>{{ $studentData->student }} </title>
@endsection

@section('content')

<div>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<h1>Student: {{ $studentData->student }}</h1>
		</div>
		<div class="panel-body">
			<!-- <a href="/student/create">
			<button type="button" class="btn btn-lg btn-success">
			Create New
			</button> </a> -->
		</div>

		<!-- Table -->
		<table class="table">
			<tr>
				<th>Name </th>
				<!-- <th>Class </th> -->
				<th>Email </th>
				<th>Contact </th>
				<th>Edit </th>
			</tr>

			<tr>
				<!-- <td>{{ $studentData->rollNumber }} </td> -->
				<td>{{ $studentData->student }} </td>
				<!-- <td>{{ $studentData->grade_id }} </td> -->
				<td>{{ $studentData->email }} </td>
				<td>{{ $studentAdd[0]['contact11'] }} </td>
				
				<td><a href="/student/{{ $studentData->id }}/edit">
				<button type="button" class="btn btn-default">
					Edit
				</button> </a></td>
			</tr>
		</table>
	</div>
</div>

@include('student.studentData')

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

