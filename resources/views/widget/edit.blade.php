@extends('layouts.mastera')

@section('title')
    <title>Edit a Widget </title>
   @endsection

   @section('content')

       {!! Breadcrumb::withLinks(['Home' => '/', 'Widgets' => '/widget', $widget->widget_name]) !!}

        <h1>Update {{ $widget->widget_name }} </h1>


        <hr/>

       @include('errors.errors')


       {!! Form::model($widget, ['route' => ['widget.update', $widget->id],
       'method' => 'PATCH',
       'class' => 'form',
       ]) !!}

        <!-- widget_name Form Input -->
        <div class="form-group">
           {!! Form::label('widget_name', 'Widget Name') !!}
           {!! Form::text('widget_name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">

           {!! Form::submit('Update Widget', array('class'=>'btn btn-primary')) !!}

        </div>

       {!! Form::close() !!}

       @endsection
