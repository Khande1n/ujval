@extends('layouts.pages')

@section('title')

<title>Principal-Create</title> 

@endsection

@section('content-tabs')

					<div class="x-content-tabs">
                        <ul>
                            <li><a href="#first-tab" class="icon active"><span class="fa fa-desktop"></span></a></li>
                            <li><a href="#second-tab"><span class="fa fa-life-ring"></span><span>Reports</span></a></li>
                            <li><a href="#third-tab"><span class="fa fa-microphone"></span><span>Course Tracking</span></a></li>
                            <li><a href="#third-tab"><span class="fa fa-microphone"></span><span>Teacher</span></a></li>
                            <li><a href="#third-tab"><span class="fa fa-microphone"></span><span>Student</span></a></li>                                                
                        </ul>
                    </div>

@endsection



@section('content')
 
 					<div class="x-content">
                        <div id="first-tab">
                            <div class="x-content-title">
                                <h1>Attendance</h1>
                            </div>
                            <div class="row stacked">
                                <div class="col-md-10">
                                    <div class="x-chart-widget">
                                        <div class="x-chart-widget-head">
                                            <div class="x-chart-widget-title">
                                                <h3>Project Activity</h3>
                                                <p>Account Type: <span>Business</span></p>
                                            </div>
                                            <div class="pull-right">
                                                <button class="btn btn-default">EXPORT</button>
                                                <button class="btn btn-default">TODAY: 14 SEP.2015</button>
                                            </div>
                                        </div>
                                        <div class="x-chart-widget-content">
                                            <div class="x-chart-widget-content-head">
                                                <h4>SUMMARY</h4>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>      
                        </div>
                        <div id="second-tab"></div>
                        <div id="third-tab"></div>
                        <div id="fourth-tab"></div>
                    </div>              

@endsection