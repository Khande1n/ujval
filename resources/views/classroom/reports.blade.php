<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

	<div class="row">
		<div class="col-md-12">

			<!-- START STUDENT ATTENDANCE GRAPH -->

			<div class="row">
				<div class="col-md-12">

					<!-- START LINE CHART -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Academic Chart</h3>
						</div>
						<div class="pull-right col-md-12">
							<!-- FORM FIELD 1 -->

							<div class="form-group col-md-4">
								<label class="col-md-4 control-label">Select Class</label>
								<div class="col-md-6">
									<select class="form-control" name="grade_id" id="gradeMarkSelect">
										@foreach($gradelists as $grade)
										<option value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<!-- FORM FIELD 2 -->

							<div class="form-group col-md-4">
								<label class="col-md-4 control-label">Select Sujbect</label>
								<div class="col-md-6">
									<select class="form-control" name="subject_id" id="subjectMarkSelect">
										<option value="">First Select Grade</option>
									</select>
								</div>
							</div>

							<!-- FORM FIELD 3 -->

							<div class="form-group col-md-4">
								<label class="col-md-4 control-label">Select Exam</label>
								<div class="col-md-6">
									<select class="form-control" name="exam_id" id="examMarkSelect">
										<option value="">First Select Subject</option>
									</select>
								</div>
							</div>
							<!-- <button class="btn btn-default">
								EXPORT
							</button> -->
						</div>
						<div class="panel-body">
							<div id="attendance-chart" style="height: 300px;"></div>
						</div>
					</div>
					<!-- END STUDENT ATTENDANCE GRAPH -->
				</div>

				<div class="col-md-6">

					<!-- START STUDENT ACADEMIC GRAPH -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Attendance Chart</h3>
						</div>
						<div class="pull-right">
							<button class="btn btn-default">
								EXPORT
							</button>
						</div>
						<div class="panel-body">
							<div id="attendance-chart1" style="height: 300px;"></div>
						</div>
					</div>
				</div>
				<!-- END STUDENT ACADEMIC GRAPH -->

				<!-- START SCHOOL TOTAL STRENGTH GRAPH 1-->

				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">School Stats</h3>
						</div>
						<div class="pull-right">
							<button class="btn btn-default">
								EXPORT
							</button>
						</div>
						<div class="panel-body">
							<div id="attendance-chart2" style="height: 300px;"></div>
						</div>
					</div>
				</div>

				<!-- END SCHOOL TOTAL STRENGTH GRAPH 1-->

			</div>
		</div>
	</div>
</div>

@section('graphscript')

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>



	<script>
		//dropdownlist for academic analysis

		$('#gradeMarkSelect').on('change', function(e) {

			var gra_id = e.target.value;

			//ajax

			$.get('/api/category-dropdown?gra+id=' + gra_id, function(data) {

				//success data
				$('#subjectMarkSelect').empty();
				console.log('EMPTY DONE');
				$('#subjectMarkSelect').append('<option value=""> Please choose one</option>');
				console.log('Please choose DONE');
				$.each(JSON.parse(data), function(index, subjectObj) {
					$('#subjectMarkSelect').append('<option value=" ' + subjectObj.id + '">' + subjectObj.subject + '</option');
				});
				console.log('DONE');
			});
			
});
</script>
<script>
	$('#subjectMarkSelect').on('change', function(e) {
		var sub_id = e.target.value;

		//ajax
		$.get('/api/subject-dropdown?sub+id=' + sub_id, function(data) {
			//success data
			$('#examMarkSelect').empty();
			
			console.log("India no 1");
			$('#examMarkSelect').append('<option value="">Please Choose one</option>');
			console.log('India again no 1');
			$.each(JSON.parse(data), function(index, examObj) {
				$('#examMarkSelect').append('<option value="' + examObj.id + '">' + examObj.exam + '</option');
			});
			console.log('Awesome!!! Done')
		});
	});

</script>

<script>
	$('#examMarkSelect').on('change', function(e) {

		e.preventDefault();
		$('#academic-analysis').empty();
		
		var exam_id = e.target.value;

		// $(function() {
		console.log('Part one');

		// Create a function that will handle AJAX requests
		function requestData(examId, chart) {
			$.ajax({
				type : "GET",
				url : "{{url('/api/subject/exams/average')}}", // This is the URL to the API
				data : {
					examId : exam_id
				}
			}).done(function(data) {
				// When the response to the AJAX request comes back render the chart with new data
				chart.setData(data);
			}).fail(function() {
				// If there is no communication between the server, show an error
				alert("error occured");
			});

			console.log('Part two');
		}

		var chart = Morris.Bar({
			// ID of the element in which to draw the chart.
			element : 'academic-analysis',
			data : [0, 0], // Set initial data (ideally you would provide an array of default data)
			xkey : 'mark', // Set the key for X-axis
			ykeys : ['value'], // Set the key for Y-axis
			labels : ['Marks'] // Set the label when bar is rolled over
		});

		console.log('Part three');

		requestData(6, chart);

		console.log('Part four');
	}); 
</script>

<script>
	$(function() {

		// Create a function that will handle AJAX requests
		function requestData(days, chart) {
			$.ajax({
				type : "GET",
				url : "{{url('/api')}}", // This is the URL to the API
				data : {
					days : days
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
			element : 'attendance-chart',
			data : [0, 0], // Set initial data (ideally you would provide an array of default data)
			xkey : 'date', // Set the key for X-axis
			ykeys : ['value'], // Set the key for Y-axis
			labels : ['Attendance'] // Set the label when bar is rolled over
		});

		// Request initial data for the past 7 days:
		requestData(700, chart);

	});

	$(function() {

		// Create a function that will handle AJAX requests
		function requestData(days, chart) {
			$.ajax({
				type : "GET",
				url : "{{url('/api')}}", // This is the URL to the API
				data : {
					days : days
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
			element : 'attendance-chart1',
			data : [0, 0], // Set initial data (ideally you would provide an array of default data)
			xkey : 'date', // Set the key for X-axis
			ykeys : ['value'], // Set the key for Y-axis
			labels : ['Attendance'] // Set the label when bar is rolled over
		});

		// Request initial data for the past 7 days:
		requestData(700, chart);

	});

	$(function() {

		// Create a function that will handle AJAX requests
		function requestData(days, chart) {
			$.ajax({
				type : "GET",
				url : "{{url('/api')}}", // This is the URL to the API
				data : {
					days : days
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
			element : 'attendance-chart2',
			data : [0, 0], // Set initial data (ideally you would provide an array of default data)
			xkey : 'date', // Set the key for X-axis
			ykeys : ['value'], // Set the key for Y-axis
			labels : ['Attendance'] // Set the label when bar is rolled over
		});

		// Request initial data for the past 7 days:
		requestData(700, chart);

	}); 
</script>

@endsection


