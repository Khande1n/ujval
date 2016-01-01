@extends('layouts.pages')

@section('title')

<title>Ujval - Principal Dashboard</title> 

@endsection

@section('content-tabs')


					<div class="x-content-tabs">
                        <ul>
                            <li><a href="#Academic-tab" class="icon active"><span class="fa fa-desktop"></span></a></li>
                            <li><a href="#Attendance-tab"><span class="fa fa-microphone"></span><span>Attendance Analysis</span></a></li>
                            <li><a href="#Student-tab"><span class="fa fa-microphone"></span><span>Student List</span></a></li>
                            <!-- <li><a href="#Markscut-tab"><span class="fa fa-life-ring"></span><span>Marks Cut Analysis</span></a></li> -->                            
                            <!-- <li><a href="#Coursetrack-tab"><span class="fa fa-microphone"></span><span>Course Tracking</span></a></li> -->
                        </ul>
                    </div>
                    
@endsection


@section('content')

 <!-- FIRST CONTENT TAB -->
 
 					<div class="x-content">
                        <div id="Academic-tab">
                            <div class="x-content-title">
                                <h1>Academic Analysis</h1>
                                <!-- <div class="pull-right">
                                    <button class="btn btn-danger"><span class="fa fa-plus"></span> ADD NEW WIDGET</button>
                                </div> -->
                            </div>
                            <div class="row stacked">
                                <div class="col-md-10">
                                    <div class="x-chart-widget">
                                        <div class="x-chart-widget-head">
                                            <div class="x-chart-widget-title">
                                                <h3>Project Activity</h3>
                                                <p>Account Type: <span>Business</span></p>
                                            </div>
                                            
                                            @include('exports.export')
                                            
                                        </div>
                                        <div class="x-chart-widget-content">
                                            <div class="x-chart-widget-content-head">
                                                <h4>SUMMARY</h4>
                                                <div class="pull-right">
                                                	<form>
                                                   		<div class="form-group col-md-6">
                                                      		<label>GRADE</label>
                                                      		<select class="form-control" name="grade_id" id="grade_id">
                                                      			<option value="">Select Grade</option>
                                                      				@foreach($grades as $grade)
                                                      				<option value="{{ $grade->id }}">{{ $grade->grade }}</option>
                                                      				@endforeach
                                                      		</select>
                                                      	</div>
                                                      
                                                      	<div class="form-group col-md-6">
                                                      		<label>SUBJECT</label>
                                                      		<select class="form-control" name="subject_id" id="subject_id">
                                                      			<option value="">First Select Grade</option>
                                                      		</select>
                                                      	</div>
                                                      
                                                      	<div class="form-group col-md-6">
                                                      		<label>EXAM</label>
                                                      		<select class="form-control" name="exam_id" id="exam_id">
                                                      			<option value="">First Select Subject</option>
                                                      		</select>
                                                      	</div>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="x-chart-widget-informer">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="x-chart-widget-informer-item">
                                                                    <div class="count">223<span>34% <i class="fa fa-arrow-up"></i></span></div>
                                                                    <div class="title">Views of your profile</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="x-chart-widget-informer-item">
                                                                    <div class="count">190<span>17% <i class="fa fa-arrow-up"></i></span></div>
                                                                    <div class="title">Views of your works</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="x-chart-widget-informer-item">
                                                                    <div class="count">223<span class="negative">22% <i class="fa fa-arrow-down"></i></span></div>
                                                                    <div class="title">Likes</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="x-chart-widget-informer-item last">
                                                                    <div class="count">160<span>3% <i class="fa fa-arrow-up"></i></span></div>
                                                                    <div class="title">Comments</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="x-chart-holder">
                                            	<div id="academic-analysis" style="height: 400px">
				
												</div>
												
											</div>
                                        </div>                                        
                                    </div>
                                </div>
                                <!-- <div class="col-md-2">
                                    
                                    <div class="x-widget-timeline">
                                        <div class="x-widget-timelime-head">
                                            <h3>NOTIFICATIONS</h3>
                                            <div class="pull-right"><a href="#">Settings <span class="fa fa-cog"></span></a></div>                                            
                                        </div>
                                        <div class="x-widget-timeline-content">
                                            <div class="item item-blue">
                                                <a href="#">Maria Jackson</a> Sent you a <strong>message</strong>
                                                <span>3 minutes ago</span>
                                            </div>
                                            <div class="item item-green">
                                                <a href="#">Brian Dawson</a> Invited you to <strong>Linkedin</strong>
                                                <span>16.09.2015 1:27 pm</span>
                                            </div>
                                            <div class="item item-green">
                                                <a href="#">Hannah Jensen</a> Invited you to like her on <strong>facebook</strong>
                                                <span>16.09.2015 1:13 pm</span>
                                            </div>
                                            <div class="item item-red">
                                                <a href="#">Nancy Watson</a> You got 3 new <strong>notifications</strong>
                                                <span>16.09.2015 11:41 am</span>
                                            </div>
                                            <div class="item item-red">
                                                <a href="#">Nancy Watson</a> You got 1 requests to <strong>add friends</strong>
                                                <span>16.09.2015 11:23 am</span>
                                            </div>
                                            <div class="item item-greay">
                                                <a href="#">Hannah Jensen</a> Invited you to like her on <strong>facebook</strong>
                                                <span>16.09.2015 10:26 am</span>
                                            </div>
                                            <div class="item item-blue">
                                                <a href="#">Douglas Cook</a> Sent you a <strong>message</strong>
                                                <span>16.09.2015 09:15 am</span>
                                            </div>                                            
                                            <button class="btn btn-default btn-block">Load more...</button>
                                        </div>                                        
                                    </div>    
                                </div> -->
                            </div>
                        </div>
                        
                        
 <!-- SECOND CONTENT TAB -->
                      
                        
                        <div id="Attendance-tab">
                            <div class="x-content-title">
                                <h1>Attendance Analysis</h1>
                                <!-- <div class="pull-right">
                                    <button class="btn btn-danger"><span class="fa fa-plus"></span> ADD NEW WIDGET</button>
                                </div> -->
                            </div>
                            <div class="row stacked">
                                <div class="col-md-10">
                                    <div class="x-chart-widget">
                                        <div class="x-chart-widget-head">
                                            <div class="x-chart-widget-title">
                                                <h3>Project Activity</h3>
                                                <p>Account Type: <span>Business</span></p>
                                            </div>
                                            
    @include('exports.export')                                          
                                            
                                        </div>
                                        <div class="x-chart-widget-content">
                                            <div class="x-chart-widget-content-head">
                                                <h4>SUMMARY</h4>
                                                <div class="pull-right">
                                                    <div class="btn-group">
                                                    	<ul class="nav nav-pills ranges">
                                                    		<button class="btn btn-default"><li class="active"><a href="#" data-range='7'>WEEK</a></li></button>
                                                   			<button class="btn btn-default"><li><a href="#" data-range='30'>MONTH</a></li></button>
                                                    		<button class="btn btn-default"><li><a href="#" data-range='180'>HALF YEAR</a></li></button>
	                                              			<button class="btn btn-default"><li><a href="#" data-range='365'>YEAR</a></li></button>
	                                              		</ul>	
                                                    </div>
                                            	</div>
                                            </div>	
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="x-chart-widget-informer">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="x-chart-widget-informer-item">
                                                                    <div class="count">223<span>34% <i class="fa fa-arrow-up"></i></span></div>
                                                                    <div class="title">Views of your profile</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="x-chart-widget-informer-item">
                                                                    <div class="count">190<span>17% <i class="fa fa-arrow-up"></i></span></div>
                                                                    <div class="title">Views of your works</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="x-chart-widget-informer-item">
                                                                    <div class="count">223<span class="negative">22% <i class="fa fa-arrow-down"></i></span></div>
                                                                    <div class="title">Likes</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="x-chart-widget-informer-item last">
                                                                    <div class="count">160<span>3% <i class="fa fa-arrow-up"></i></span></div>
                                                                    <div class="title">Comments</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="x-chart-holder">
                                                <div id="stats-container" style="height: 400px;"></div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>  
                            </div>
                        </div>    
                                              
         
                        
 <!-- THIRD CONTENT TAB -->
                      
<div id="Student-tab">  

@include('principal.tableExport')

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

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
// $('#exam_id').on('change', function(e){ 
// 	
	// var exam_id = e.target.value;
	// var sub_id = e.target.value;
	// var gra_id = e.target.value;
$(function() {
	console.log('Part one');

  // Create a function that will handle AJAX requests
  function requestData(marks, chart){
    $.ajax({
      type: "GET", 
      url: "{{url('/api/marks-analysis')}}", // This is the URL to the API
      data: { marks: marks }
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
	
  // Request initial data for the past 7 days:
  requestData(48, chart);

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
      url: "{{url('/principal/dashboard/api')}}", // This is the URL to the API
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
  requestData(700, chart);

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



