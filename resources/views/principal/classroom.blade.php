@extends('layouts.pages')

@section('title')

<title>Principal-Create</title> 

@endsection

@section('content-tabs')

					<div class="x-content-tabs">
                        <ul>
                            <li><a href="#student-tab" class="icon active"><span class="fa fa-desktop"></span></a></li>
                            <li><a href="#teacher-tab"><span class="fa fa-life-ring"></span><span>Teacher</span></a></li>
                            <li><a href="#reports-tab"><span class="fa fa-microphone"></span><span>Reports</span></a></li>
                            <!-- <li><a href="#course-tab"><span class="fa fa-microphone"></span><span>Course Tracking</span></a></li> -->
                            <!-- <li><a href="#attendance-tab"><span class="fa fa-microphone"></span><span>Attendance</span></a></li> -->                                                
                        </ul>
                    </div>

@endsection



@section('content')
 
 					<div class="x-content">
 						<div id="student-tab">
                            <div class="x-content-title">
                                <h1>Student</h1>
                            </div>
                            <div>
                            	@include('classroom.student')
                            </div>      
                        </div>
                    </div>
                    
                    <div class="x-content">
                        <div id="teacher-tab">
                        	<div class="x-content-title">
                                <h1>Teacher</h1>
                            </div>
                            <div>
                        		@include('classroom.teacher')
                            </div>
                        </div>
                    </div>
                        
                    <div class="x-content">    
                        <div id="reports-tab"></div>
                        	<div class="x-content-title">
                                <h1>Reports</h1>
                            </div>
                            <div>
                            	@include('classroom.reports')
                            </div>
                        </div>
                    </div>  
                    
                    <!-- <div id="course-tab"></div> -->
                    <!-- <div id="attendance-tab"></div> -->            

@endsection