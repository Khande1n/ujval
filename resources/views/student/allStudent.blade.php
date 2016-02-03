<!-- START DATATABLE EXPORT -->
<div class="x-chart-widget-content">
	<div class="panel-body">
		<div class="table-responsive">
			<table id="customers2" class="table datatable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Birthday</th>
						<th>Email</th>
						<th>Guardian</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($students as $key=>$value)
						
					<tr>
						<th><a href="/student/{{$value['id']}}"> {{ $value['student'] }} </a></th>
						<th>{{ $value['bday'] }}</th>
						<th>{{ $value['email'] }}</th>
						<th>{{ $value['guardian1'] }}</th>
						<th><a href="/student/{{ $value['id'] }}/edit">
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

