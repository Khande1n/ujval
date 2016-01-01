@extends('layouts.mastera')

@section('title')
    <title>{{ $widget->widget_name }} </title>
   @endsection

@section('content')
   {!! Breadcrumb::withLinks(['Home' => '/', 'Widgets' => '/widget', $widget->widget_name => $widget->id]) !!}
    <br>
    <div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">{{ $widget->widget_name }} Widget </div>
            <div class="panel-body">
                <a href="/widget/create"> <button type="button" class="btn btn-lg btn-success">
                       Create New </button> </a>
            </div>

            <!-- Table -->
            <table class="table">
                <tr>

                    <th>Id </th>
                    <th>Name </th>
                    <th>Edit </th>
                    <th>Delete </th>

                </tr>


                    <tr>
                        <td>{{ $widget->id }}  </td>
                        <td>{{ $widget->widget_name }} </td>

                        <td>  <a href="/widget/{{ $widget->id }}/edit">
                                <button type="button" class="btn btn-default">Edit </button> </a> </td>
                        <td>{!! Form::model($widget, ['route' => ['widget.destroy', $widget->id],
                           'method' => 'DELETE'
                           ]) !!}
                            <div class="form-group">

                               {!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}

                            </div>
                           {!! Form::close() !!} </td>
                    </tr>

            </table>

        </div>
    </div>

@endsection
@section('scripts')
    <script>

       function ConfirmDelete()
       {
           var x = confirm("Are you sure you want to delete?");
           if (x)
               return true;
           else
               return false;
       }

    </script>

@endsection
