@extends('layouts.pages')

@section('title')
<title>Edit {{$staffData->name}} Details </title>
@endsection

@section('content')

<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">
		<h1>Update Details: {{ $staffData->name }} </h1>
	</div>

	<div class="panel-body"></div>

	{!! Form::model($staffData, ['route' => ['staff.update', $staffData->id],
	'method' => 'PATCH',
	'class' => 'form',
	]) !!}

	<!-- widget_name Form Input -->
		<div class="col-md-12">
			<div class="form-group col-md-6">
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('email', 'Email') !!}
				{!! Form::text('email', null, ['class' => 'form-control']) !!}
			</div>

			<!-- <div class="form-group">
			<label class="col-md-3 control-label">Select Role</label>
			<select class="form-control select" name="role" id="role">

			<option value="{{ 1}}">{{ 'role' }}</option>

			</select>
			</div> -->

			<div class="form-group col-md-6">
				{!! Form::label('bday', 'Date of Birth') !!}
				{!! Form::date('bday', null, ['class' => 'form-control datepicker','id' => 'dp-4']) !!}
			</div>

			<div class="panel panel-default">
				<div class="pull-right">
					<div class="form-group col-md-6">

						{!! Form::submit('Update Staff Details', array('class'=>'btn btn-lg btn-primary')) !!}

					</div>
				</div>
			</div>

			{!! Form::close() !!}
	
	<div class="panel-body"></div>

		{!! Form::model($addressStaff, ['route' => ['staff.update', $staffData->id],
			'method' => 'PATCH',
			'class' => 'form',
		]) !!}	
			
		<div class="col-md-12">
			<div class="form-group col-md-6">
				{!! Form::label('contact11', 'Primary Contact') !!}
				{!! Form::text('contact11',  null , ['class' => 'form-control', 'maxlength' => '10']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('contact12', 'Second Contact') !!}
				{!! Form::text('contact12', null, ['class' => 'form-control', 'maxlength' => '10']) !!}
			</div>
		
		
			<div class="form-group col-md-6">
				{!! Form::label('add1', 'Address Line 1') !!}
				{!! Form::text('add1', null , ['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('add2', 'Address Line 2') !!}
				{!! Form::text('add2', null , ['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('street', 'Street') !!}
				{!! Form::text('street', null , ['class' => 'form-control']) !!}
			</div>

			<div class="form-group col-md-6">
				{!! Form::label('pincode', 'Pincode') !!}
				{!! Form::text('pincode', null , ['class' => 'form-control']) !!}
			</div>
		</div>

		<div class="panel panel-default">
			<div class="pull-right">
				<div class="form-group col-md-6">

					{!! Form::submit('Update Staff Address', array('class'=>'btn btn-lg btn-primary')) !!}

				</div>
			</div>
		</div>
	</div>
		{!! Form::close() !!}

</div>

@endsection
