@extends('layouts.pages')

@section('title')

<title>Principal-Create</title> 

@endsection

@section('content-tabs')

					<div class="x-content-tabs">
                        <ul>
                        	<!-- <li><a href="#role-tab" class="icon active"><span class="fa fa-tags"></span><span>Roles</span></a></li> -->
                        	<li><a href="#grade-tab" class="icon active"><span class="fa fa-building-o"></span><span>Grade</span></a></li>
                        	<li><a href="#subject-tab"><span class="fa fa-book"></span><span>Subject</span></a></li>
                            <li><a href="#staff-tab"><span class="fa fa-user"></span>Staff</a></li>
                            <li><a href="#student-tab"><span class="fa fa-users"></span><span>Student</span></a></li>
                            <li><a href="#exam-tab"><span class="fa fa-pencil-square"></span><span>Exam</span></a></li> 
                            <li><a href="#mark-tab"><span class="fa fa-star"></span><span>Mark</span></a></li>
                        </ul>
                    </div>

@endsection



@section('content')

<!-- FIRST TAB -->
 
<!-- include('create.createRole') -->
      
                 
<!-- SECOND TAB -->
                                     
@include('create.createGrade')

                 
<!-- THIRD TAB -->
                                     
@include('create.createSubject')
                        
                   
<!-- FOURTH TAB -->
			
@include('create.createStaff')


<!-- FIFTH TAB -->
			
@include('create.createStudent')


<!-- SIXTH TAB -->
			
@include('create.createExam')


<!-- SEVENTH TAB -->
			
@include('create.createMark')


@endsection
