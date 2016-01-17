@extends('layouts.main_page')

@section('nav_content')
    <body class="x-dashboard">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="x-hnavigation">
                        <div class="x-hnavigation-logo">
                            <a href="/principal/dashboard">Ujval</a>
                        </div>
                        
           <!-- NAV LINKS STARTS  -->              
                   
                        <ul>
                            <li class="active">
                                <a href="/principal/dashboard">Home</a>
                            </li>
                            <li class="xn-openable">
                                <a href="/principal/classroom">Classroom</a>
                                <ul>
                                    <!-- <li><a href="/principal/classroom#student-tab"><span class="fa fa-users"></span> Student</a></li> -->
                                    <li><a href="/principal/classroom#teacher-tab"><span class="fa fa-user"></span>Teacher</a></li>
                                    <li><a href="/principal/classroom#reports-tab"><span class="fa fa-bar-chart-o"></span> Reports</a></li>
                                    <!-- <li  class="xn-openable"><a href="#"><span class="fa fa-recycle"></span> Course Tracking</a></li> -->
                                    <!-- <li><a href="#"><span class="fa fa-calendar"></span>Attendance</a></li> -->
                                </ul>
                            </li>
                            <!-- <li class="">
                            	<a href="/mailbox/inbox">Message</a>
                            </li> -->
                            <!-- <li class="xn-openable">
                                <a href="/principal/feedback">Feedback</a>
                                <ul>
                                    <li><a href="#"><span class="fa fa-cube"></span> New</a></li>
                                    <li><a href="#"><span class="fa fa-life-ring"></span> Analyse</a></li>
                                    <li><a href="#"><span class="fa fa-recycle"></span> Respond</a></li>
                                    <li><a href="#"><span class="fa fa-university"></span> Teacher</a></li>
                                    <li><a href="#"><span class="fa fa-calendar"></span> Student</a></li>
                                </ul>
                            </li> -->
                            <!-- <li class="xn-openable">
                                <a href="/principal/chat">Chat</a> -->
                                <!-- <ul>
                                    <li><a href="#"><span class="fa fa-cube"></span> Home</a></li>
                                    <li class="xn-openable"><a href="#"><span class="fa fa-life-ring"></span> Write</a></li>
                                    <li><a href="#"><span class="fa fa-recycle"></span> Ask</a></li>
                                    <li><a href="#"><span class="fa fa-university"></span> Notification</a></li>
                                    <li><a href="#"><span class="fa fa-calendar"></span> Reading List</a></li>  
                                    <li><a href="#"><span class="fa fa-calendar"></span> My Searches</a></li>  
                                    <li><a href="#"><span class="fa fa-calendar"></span> Topics</a></li>
                                    <li><a href="#"><span class="fa fa-calendar"></span> Stats</a></li>                                
                                </ul> -->                                
                            <!-- </li> -->  
                            <li class="xn-openable">
                                <a href="/principal/create">Create</a>
                                <ul>
                                    <li><a href="/principal/create#role-tab"><span class="fa fa-tags"></span>Role</a></li>
                                    <li><a href="/principal/create#grade-tab"><span class="fa fa-building-o"></span>Grade</a></li>
                                    <li><a href="/principal/create#subject-tab"><span class="fa fa-book"></span>Subject</a></li>
                                    <li><a href="/principal/create#staff-tab"><span class="fa fa-user"></span>Staff</a></li>
                                    <li><a href="/principal/create#student-tab"><span class="fa fa-users"></span>Student</a></li>
                                    <li><a href="/principal/create#exam-tab"><span class="fa fa-pencil-square"></span>Exam</a></li>
                                    <li><a href="/principal/create#mark-tab"><span class="fa fa-star"></span>Mark</a></li>
                                    <!-- <li><a href="#"><span class="fa fa-calendar"></span> KPI Alarm</a></li> -->
                                    <!-- <li><a href="#"><span class="fa fa-university"></span> Time-Table</a></li>
                                    <li><a href="#"><span class="fa fa-calendar"></span>Group</a></li>  
                                    <li><a href="#"><span class="fa fa-calendar"></span>Marks Cut Criteria</a></li> -->
                                </ul>                                
                            </li>                          
                        </ul>
                        
                <!-- NAV LINKS ENDS  -->       
                        
                        <div class="x-features">
                            <div class="x-features-nav-open">
                                <span class="fa fa-bars"></span>
                            </div>
                            <div class="pull-right">
                                <!-- <div class="x-features-search">
                                    <input type="text" name="search">
                                    <input type="submit">
                                </div> -->
                                <div class="x-features-profile">
                                    <img src="{{asset('assets/images/profile-pic.jpg')}}">
                                    <ul class="xn-drop-left animated zoomIn">
                                    	<li><a href="/profilepage"><span class="fa fa-user"></span> Profile</a></li>
                                        <!-- <li><a href="/lock-screen"><span class="fa fa-lock"></span> Lock Screen</a></li> -->
                                        <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>                        
                    </div>
                   
                    @yield('content-tabs')
                    
                    @if (count($errors) > 0)
    					<div class="alert alert-danger">
        					<ul>
            					@foreach ($errors->all() as $error)
                					<li>{{ $error }}</li>
            					@endforeach
        					</ul>
    					</div>
					@endif
                    
                    
                    @yield('content')
                    
                    @yield('create')
                    
                    @yield('message')
                    
                    <div class="x-content-footer">
                        Copyright © 2016 Ujval. All rights reserved
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="/auth/logout" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
        
        
    @endsection

      