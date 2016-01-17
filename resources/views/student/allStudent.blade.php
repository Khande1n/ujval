<!-- START DATATABLE EXPORT -->
<div class="x-chart-widget-content">
	<div class="panel-body">
		<div class="table-responsive">
			<table id="customers2" class="table datatable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Grade</th>
						<th>Contact</th>
						<th>Birthday</th>
						<th>Email</th>
						<th>Guardian</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($students as $student)
					<tr>
						<th><a href="/student/{{$student->id}}"> {{ $student->student }} </a></th>
						<th>{{ $student->grade }}</th>
						<th>{{ $student->contact11 }}</th>
						<th>{{ $student->bday }}</th>
						<th>{{ $student->email }}</th>
						<th>{{ $student->guardian1 }}</th>
						<th><a href="/student/{{ $student->id }}/edit">
						<button type="button" class="btn btn-default">
							Edit
						</button> </a></th>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

