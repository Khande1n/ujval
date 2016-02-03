<!-- START DATATABLE EXPORT -->
<div class="x-chart-widget-content">
	<div class="panel-body">
		<div class="table-responsive">
			<table id="customers2" class="table datatable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Attendance</th>
						<th>Edit</th>
						<th>Delete </th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($attendanceStudents as $attendanceStudent)
					<tr>
						<th><a href="/attendance/{{$attendanceStudent->student_id}}"> {{ $attendanceStudent->student }} </a></th>
						<th> {{ $attendanceStudent->attendance }} </th>
						<th><a href="/attendance/{{$attendanceStudent->student_id}}/edit">
						<button type="button" class="btn btn-default">
							Edit
						</button> </a></th>
						<td> {!! Form::model($attendanceStudent,
								['route' => ['attendance.destroy', $attendanceStudent->idS],
									'method' => 'DELETE'])
								!!}
							<div class="form-group">
							{!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
							</div> {!! Form::close() !!} </td>
					</tr>
					@endforeach
					
					@foreach($attendanceUsers as $attendanceUser)
					<tr>
						<th><a href="/attendance/{{$attendanceUser->user_id}}"> {{ $attendanceUser->name }} </a></th>
						<th> {{ $attendanceUser->attendance }} </th>
						<th><a href="/attendance/{{ $attendanceUser->user_id }}/edit">
						<button type="button" class="btn btn-default">
							Edit
						</button> </a></th>
						<td> {!! Form::model($attendanceUser,
							['route' => ['attendance.destroy', $attendanceUser->idU],
							'method' => 'DELETE'])
							!!}
							<div class="form-group">
								{!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
							</div> {!! Form::close() !!} </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

