@extends('layouts.pages')

@section('title')

<title>Ujval - Principal Dashboard</title> 

@endsection

@section('content-tabs')

<div class="x-content-tabs">
	<ul>
    	<li><a href="#Academic-tab" class="icon active"><span class="fa fa-bar-chart-o"></span></a></li>
    	<li><a href="#Attendance-tab"><span class="fa fa-check"></span><span>Attendance Analysis</span></a></li>
    	<li><a href="#Student-tab"><span class="fa fa-users"></span><span>Student List</span></a></li>
    	<!-- <li><a href="#Markscut-tab"><span class="fa fa-life-ring"></span><span>Marks Cut Analysis</span></a></li> -->                            
    	<!-- <li><a href="#Coursetrack-tab"><span class="fa fa-microphone"></span><span>Course Tracking</span></a></li> -->
	</ul>
</div>
                    
@endsection


@section('content')

 <!-- FIRST CONTENT TAB -->
 
@include('dashboard.academicTab')

                                                
 <!-- SECOND CONTENT TAB -->
                      
@include('dashboard.attendanceTab')                       
                            
                        
 <!-- THIRD CONTENT TAB -->
                      
@include('dashboard.studentTab')	


@endsection 


@section('graphscript')

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script> 

<script> 

//dropdownlist for academic analysis

$('#grade_id').on('change', function(e){

    var gra_id = e.target.value;

       //ajax

        $.get('/api/category-dropdown?gra+id=' + gra_id, function(data){

           //success data
            $('#subject_id').empty();
				console.log('EMPTY DONE');
            $('#subject_id').append('<option value=""> Please choose one</option>');
            	console.log('Please choose DONE');
            $.each(JSON.parse(data), function(index, subjectObj){
				$('#subject_id').append('<option value=" ' + subjectObj.id+'">'+ subjectObj.subject + '</option');
           });
       		console.log('DONE');
     });
  });
 
 </script>
 <script> 
  
       $('#subject_id').on('change', function(e){
       			var sub_id = e.target.value;
       			
       			//ajax
       			$.get('/api/subject-dropdown?sub+id=' +sub_id, function(data){
       				//success data
       				$('#exam_id').empty();
       					console.log("India no 1");
       				$('#exam_id').append('<option value="">Please Choose one</option>');
       					console.log('India again no 1');
       				$.each(JSON.parse(data), function(index, examObj){
       					$('#exam_id').append('<option value="' +examObj.id+'">' +examObj.exam+ '</option');
       				});
       				console.log('Awesome!!! Done')
       			});
       		});
      

</script>

<!-- DASHBOARD ACADEMICS -->

<script>



$('#exam_id').on('change', function(e){ 
	
 	e.preventDefault();
 	 
	var exam_id = e.target.value;

// $(function() {
	console.log('Part one');

  // Create a function that will handle AJAX requests
  function requestData(examId, chart){
    $.ajax({
      type: "GET", 
      url: "{{url('/api/marks-analysis')}}", // This is the URL to the API
      data: { examId: exam_id }
    })
    .done(function( data ) {
      // When the response to the AJAX request comes back render the chart with new data
      chart.setData(data);
    })
    .fail(function() {
      // If there is no communication between the server, show an error
      alert( "error occured" );
    });
    
    console.log('Part two');
  }

  var chart = Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'academic-analysis',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'mark', // Set the key for X-axis
    ykeys: ['value'], // Set the key for Y-axis
    labels: ['Marks'] // Set the label when bar is rolled over
  });

	console.log('Part three');
	

  requestData(6, chart);

  console.log('Part four');
});
</script>    

<!-- dashboard Attendance -->

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
    element: 'stats-container',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'date', // Set the key for X-axis
    ykeys: ['value'], // Set the key for Y-axis
    labels: ['Attendance'] // Set the label when bar is rolled over
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

    
@endsection



