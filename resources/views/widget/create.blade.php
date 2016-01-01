@extends('layouts.mastera')

@section('title')
    <title>Create a Widget </title>
   @endsection

   @section('content')

       {!! Breadcrumb::withLinks(['Home' => '/', 'Widgets' => '/widget', 'Create']) !!}

        <h1>Create a New Widget </h1>


        <hr/>

       @include('errors.errors')


       {!! Form::open(array('url' => '/widget', 'class' => 'form')) !!}

        <!-- widget_name Form Input -->
        <div class="form-group">
           {!! Form::label('widget_name', 'Widget Name') !!}
           {!! Form::text('widget_name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">

           {!! Form::submit('Create Widget', array('class'=>'btn btn-primary')) !!}

        </div>

       {!! Form::close() !!}



       @endsection
