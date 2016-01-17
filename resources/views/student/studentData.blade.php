<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

	<div class="row">
		<div class="col-md-12">

			<!-- START STUDENT INFO-->
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>Basic Info</h3>
					<form class="form-horizontal" role="form">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-md-3 control-label">Name:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" value="{{ $studentData->student }}" disabled/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Email:</label>
								<div class="col-md-9">
									<input type="email" class="form-control" value="{{ $studentData->email }}" disabled/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Date of birth:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" value="{{ $studentData->bday }}" disabled/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Contact:</label>
								<div class="col-md-9">
									<input type="number" class="form-control" value="{{ $studentData->contact11 }}" disabled/>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-md-3 control-label">Gender:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" value="{{ $studentData->gender }}" disabled/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Class:</label>
								<div class="col-md-9">
									<input type="text" class="mask_ssn form-control" value="{{ $studentData->grade_id }}" disabled/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Guardian:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" value="{{ $studentData->guardian1 }}" disabled/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Guardian's Email:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" value="{{ $studentData->parentemail }}" disabled/>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="panel-footer">
					<div class="pull-right">
						<div class="form-group col-md-6">
							<a href="/student/{{ $studentData->id }}/edit">
							<button type="button" class="btn btn-lg btn-default">
								Edit
							</button> </a>
						</div>
					</div>
					<!-- <div class="form-group">
					{!! Form::model($studentData,
					['route' => ['student.destroy', $studentData->id],
					'method' => 'DELETE'])
					!!}
					<div class="form-group">
					{!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
					</div>
					{!! Form::close() !!}
					</div> -->
				</div>
			</div>
			<!-- END STUDENT INFO-->

			<!-- START STUDENT ATTENDANCE GRAPH -->

			<div class="row">
				<div class="col-md-6">

					<!-- START STUDENT ATTENDANCE GRAPH -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Attendance Chart</h3>
						</div>
						<div class="pull-right">
							<ul class="nav nav-pills ranges">
								<button class="btn btn-default">
									<li class="active">
										<a href="#" data-range='7'>WEEK</a>
									</li>
								</button>
								<button class="btn btn-default">
									<li>
										<a href="#" data-range='30'>MONTH</a>
									</li>
								</button>
								<button class="btn btn-default">
									<li>
										<a href="#" data-range='180'>HALF YEAR</a>
									</li>
								</button>
								<button class="btn btn-default">
									<li>
										<a href="#" data-range='365'>YEAR</a>
									</li>
								</button>

								<button class="btn btn-default">
									EXPORT
								</button>
							</ul>
						</div>
						<div class="panel-body">
							<div id="student-attendance-chart" style="height: 300px;"></div>
						</div>
					</div>
					<!-- END STUDENT ATTENDANCE GRAPH -->
				</div>

				<div class="col-md-6">

					<!-- START STUDENT ACADEMIC GRAPH -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Academic Chart</h3>
						</div>
						<div class="pull-right">
							<div class="btn-group">
								<ul class="nav nav-pills  acad">

									@foreach($examlists as $examlist)
									@if ( $examlist->grade_id == $studentData->grade_id)
									<button class="btn btn-default">
										<li>
											<a href="#" data-examId='{{ $examlist->id }}'>{{ $examlist->exam }}</a>
										</li>
									</button>
									@endif
									@endforeach

								</ul>
							</div>
							<button class="btn btn-default">
								EXPORT
							</button>
						</div>
						<div class="panel-body">
							<div id="student-marks-graph" style="height: 300px;"></div>
						</div>
					</div>
					<!-- END STUDENT ACADEMIC GRAPH -->
				</div>
			</div>
		</div>
	</div>
</div>
@section('graphscript')

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

<!-- STUDENT ATTENDANCE GRAPH -->

<script>
	$(function() {

		// Create a function that will handle AJAX requests
		function requestData(days, chart) {
			$.ajax({
			type: "GET",
			url: "{{url('/api/student/attendance')}}", // This is the URL to the API
			data: { days: days, Idstudent : {{ $studentData->id }}
		}

	}).done(function(data) {
		// When the response to the AJAX request comes back render the chart with new data
		chart.setData(data);
	}).fail(function() {
		// If there is no communication between the server, show an error
		alert("error occured");
	});
	}

	var chart = Morris.Bar({
		// ID of the element in which to draw the chart.
		element : 'student-attendance-chart',
		data : [0, 0], // Set initial data (ideally you would provide an array of default data)
		xkey : 'date', // Set the key for X-axis
		ykeys : ['value'], // Set the key for Y-axis
		labels : ['Attendance'] // Set the label when bar is rolled over
	});

	// Request initial data for the past 7 days:
	requestData(365, chart);

	$('ul.ranges a').click(function(e){
	e.preventDefault();

	// Get the number of days from the data attribute
	var el = $(this);
	days = el.attr('data-range');

	// Request the data and render the chart using our handy function
	requestData(days, chart);

	// Make things pretty to show which button/tab the user clicked
	el.parent().addClass('active');
	el.parent().siblings().removeClass('active');
	})

	});
</script>

<!-- STUDENT MARKS GRAPH -->
<script>
	$(function() {

		console.log('One');
		// Create a function that will handle AJAX requests
		function requestData(examId, chart) {
			$.ajax({
			type: "GET",
			url: "{{url('/api/student/marks')}}", // This is the URL to the API
			data: { examId: examId, Idstudent : {{ $studentData->id }}
		}

	}).done(function(data) {
		// When the response to the AJAX request comes back render the chart with new data
		chart.setData(data);
		console.log('Made Chart');
	}).fail(function() {
		// If there is no communication between the server, show an error
		alert("error occured");
	});
	}
	console.log('Two');
	var chart = Morris.Bar({
		// ID of the element in which to draw the chart.
		element : 'student-marks-graph',
		data : [0, 0], // Set initial data (ideally you would provide an array of default data)
		xkey : 'mark', // Set the key for X-axis
		ykeys : ['value'], // Set the key for Y-axis
		labels : ['Result'] // Set the label when bar is rolled over
	});

	console.log('Three');
	// Request initial data for the past 7 days:
	requestData({{ $examlist->id }}, chart);

	console.log('Four');

	$('ul.acad a').click(function(e){
	e.preventDefault();

	// Get the number of days from the data attribute
	var el = $(this);
	examId = el.attr('data-examId');

	// Request the data and render the chart using our handy function
	requestData(examId, chart);

	console.log('Five');
	//Make things pretty to show which button/tab the user clicked
	el.parent().addClass('active');
	el.parent().siblings().removeClass('active');
	})

	});

</script>

@endsection

