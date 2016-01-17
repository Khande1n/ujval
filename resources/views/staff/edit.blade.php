@extends('layouts.pages')

@section('title')
<title>Edit {{$staffData->name}} Details </title>
@endsection

@section('content')

<div>
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
		<form class="form-horizontal" role="form">
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('email', 'Email') !!}
					{!! Form::text('email', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">Select Role</label>
					<select class="form-control select" name="role" id="role">
						@foreach($roles as $role)
						<option value="{{ $role->role_name}}">{{ $role->role_name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					{!! Form::label('stf_bday', 'Date of Birth') !!}
					{!! Form::date('stf_bday', null, ['class' => 'form-control datepicker','id' => 'dp-4']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('stf_contact1', 'Primary Contact') !!}
					{!! Form::text('stf_contact1', null, ['class' => 'form-control', 'maxlength' => '10']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('stf_contact2', 'Second Contact') !!}
					{!! Form::text('stf_contact2', null, ['class' => 'form-control', 'maxlength' => '10']) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('stf_add1', 'Address Line 1') !!}
					{!! Form::text('stf_add1', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('stf_guardian1', 'Guardian') !!}
					{!! Form::text('stf_guardian1', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('stf_add2', 'Address Line 2') !!}
					{!! Form::text('stf_add2', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('stf_street', 'Street') !!}
					{!! Form::text('stf_street', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('stf_pincode', 'Pincode') !!}
					{!! Form::text('stf_pincode', null, ['class' => 'form-control']) !!}
				</div>
			</div>

			<div class="panel panel-default">
				<div class="pull-right">
					<div class="form-group col-md-6">
						
						{!! Form::submit('Update Staff Details', array('class'=>'btn btn-lg btn-primary')) !!}

					</div>
				</div>
			</div>

			{!! Form::close() !!}

	</div>
</div>

@endsection
