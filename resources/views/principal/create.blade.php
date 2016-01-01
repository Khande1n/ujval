@extends('layouts.pages')

@section('title')

<title>Principal-Create</title> 

@endsection

@section('content-tabs')

					<div class="x-content-tabs">
                        <ul>
                            <li><a href="#staff-tab" class="icon active"><span class="fa fa-desktop"></span></a></li>
                            <li><a href="#student-tab"><span class="fa fa-life-ring"></span><span>Student</span></a></li>
                            <li><a href="#exam-tab"><span class="fa fa-microphone"></span><span>Exam</span></a></li> 
                            <!-- <li><a href="#kpi-tab"><span class="fa fa-microphone"></span><span>KPI Alarm</span></a></li> -->
                            <!-- <li><a href="#third-tab"><span class="fa fa-microphone"></span><span>Time-Table</span></a></li> -->
                            <!-- <li><a href="#fourth-tab"><span class="fa fa-microphone"></span><span>Group</span></a></li> -->
                            <!-- <li><a href="#sixth-tab"><span class="fa fa-microphone"></span><span>Marks Cut Criteria</span></a></li> --> 			                              
                        </ul>
                    </div>

@endsection



@section('content')

<!-- FIRST TAB -->
 
@include('create.createstaff')
      
                 
    <!-- SECOND TAB -->
                                     
@include('create.createstudent')
                        
                   
<!-- THIRD TAB -->
			
@include('create.createexam')

@endsection
