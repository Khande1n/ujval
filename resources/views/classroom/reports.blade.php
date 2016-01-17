<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

	<div class="row">
		<div class="col-md-12">

			<!-- START STUDENT ATTENDANCE GRAPH -->

			<div class="row">
				<div class="col-md-6">

					<!-- START LINE CHART -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Academic Chart</h3>
						</div>
						<div class="pull-right">
							<button class="btn btn-default">
								EXPORT
							</button>
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
$(function() {

  // Create a function that will handle AJAX requests
  function requestData(days, chart){
    $.ajax({
      type: "GET", 
      url: "{{url('/api')}}", // This is the URL to the API
      data: { days: days }
    })
    .done(function( data ) {
      // When the response to the AJAX request comes back render the chart with new data
      chart.setData(data);
    })
    .fail(function() {
      // If there is no communication between the server, show an error
      alert( "error occured" );
    });
  }

  var chart = Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'attendance-chart',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'date', // Set the key for X-axis
    ykeys: ['value'], // Set the key for Y-axis
    labels: ['Attendance'] // Set the label when bar is rolled over
  });

  // Request initial data for the past 7 days:
  requestData(700, chart);

});


$(function() {

  // Create a function that will handle AJAX requests
  function requestData(days, chart){
    $.ajax({
      type: "GET", 
      url: "{{url('/api')}}", // This is the URL to the API
      data: { days: days }
    })
    .done(function( data ) {
      // When the response to the AJAX request comes back render the chart with new data
      chart.setData(data);
    })
    .fail(function() {
      // If there is no communication between the server, show an error
      alert( "error occured" );
    });
  }

  var chart = Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'attendance-chart1',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'date', // Set the key for X-axis
    ykeys: ['value'], // Set the key for Y-axis
    labels: ['Attendance'] // Set the label when bar is rolled over
  });

  // Request initial data for the past 7 days:
  requestData(700, chart);

});


$(function() {

  // Create a function that will handle AJAX requests
  function requestData(days, chart){
    $.ajax({
      type: "GET", 
      url: "{{url('/api')}}", // This is the URL to the API
      data: { days: days }
    })
    .done(function( data ) {
      // When the response to the AJAX request comes back render the chart with new data
      chart.setData(data);
    })
    .fail(function() {
      // If there is no communication between the server, show an error
      alert( "error occured" );
    });
  }

  var chart = Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'attendance-chart2',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'date', // Set the key for X-axis
    ykeys: ['value'], // Set the key for Y-axis
    labels: ['Attendance'] // Set the label when bar is rolled over
  });

  // Request initial data for the past 7 days:
  requestData(700, chart);

});
</script> 

@endsection

