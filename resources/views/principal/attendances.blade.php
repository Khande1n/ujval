@extends('layouts.pages')
 

@section('title')

	<title>Monthly Attendance Chart</title>
@endsection
 
@section('content-tabs')

	<div class="x-content-tabs">
        <ul>
            <li><a href ><span class="fa fa-star"></span><span class="fa fa-search"></span></a></li>
        </ul>
    </div>
@endsection


@section('content')

<!-- SEVENTH TAB -->
			
@include('attendance.class')


@endsection