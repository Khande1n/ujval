<!-- START DATATABLE EXPORT -->
<div class="x-chart-widget-content">
	<div class="panel-body">
		<div class="table-responsive">
			<table id="customers2" class="table datatable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<!-- <th>Role</th> -->
						<th>Birthday</th>
						<!-- <th>Contact</th> -->
						<th>Guardian</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					@foreach($staffs as $key=>$staff)
					<tr>
						<th><a href="/staff/{{$staff['id']}}"> {{ $staff['name'] }} </a></th>
						<th>{{ $staff['email'] }}</th>
						<th>{{ $staff['bday'] }}</th>
						<th>{{ $staff['guardian1'] }}</th>
						<th><a href="/staff/{{ $staff['id'] }}/edit">
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
