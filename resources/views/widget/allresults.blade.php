 <div>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">{{ $count }} Widgets </div>
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
           @foreach($widgets as $widget )

                <tr>
                    <td>{{ $widget->id }}  </td>
                    <td> <a href="/widget/{{ $widget->id }}">{{ $widget->widget_name }} </a> </td>

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
           @endforeach
        </table>
        <div>

           {!! $widgets->render() !!}

        </div>
    </div>
 </div>
