@extends('layouts.pages')

@section('title')
<title>Edit {{$studentData->student}} Details </title>
@endsection

@section('content')

<div>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<h1>Update Details: {{ $studentData->student }} </h1>
		</div>

		<div class="panel-body"></div>

		{!! Form::model($studentData, ['route' => ['student.update', $studentData->id],
		'method' => 'PATCH',
		'class' => 'form',
		]) !!}

		<!-- widget_name Form Input -->
		<div class="col-md-12">
			<div class="form-group col-md-6">
				{!! Form::label('student', 'Student Name') !!}
				{!! Form::text('student', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('email', 'Student Email') !!}
				{!! Form::text('email', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('parentemail', 'Guardian Email') !!}
				{!! Form::text('parentemail', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('contact11', 'Primary Contact Number') !!}
				{!! Form::text('contact11', null, ['class' => 'form-control', 'maxlength' => '10']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('contact12', 'Secondary Contact Number') !!}
				{!! Form::text('contact12', null, ['class' => 'form-control', 'maxlength' => '10']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('std_add1', 'Address Line 1') !!}
				{!! Form::text('std_add1', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('std_add2', 'Address Line 2') !!}
				{!! Form::text('std_add2', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('std_street', 'Street') !!}
				{!! Form::text('std_street', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('std_pincode', 'Pincode') !!}
				{!! Form::text('std_pincode', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="panel panel-default">
			<div class="pull-right">
				<div class="form-group col-md-6">

					{!! Form::submit('Update Student Details', array('class'=>'btn btn-lg btn-primary')) !!}

				</div>
			</div>
		</div>

		{!! Form::close() !!}

	</div>
</div>

@endsection