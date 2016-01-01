<div>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">{{ $count }} Widgets Found </div>
        <div class="panel-body">
            <a href="/widget/create">
                <button type="button" class="btn btn-lg btn-success">
                   Create New
                </button>
            </a>
        </div>

        <!-- Table -->
        <table class="table">
            <tr>

                <th>Id </th>
                <th>Name </th>
                <th>Edit </th>
                <th>Delete </th>

            </tr>

           @foreach($results as $result )

                <tr>
                    <td>{{ $result->id }}  </td>
                    <td> <a href="/widget/{{ $result->id }}">{{ $result->widget_name }} </a> </td>

                    <td> <a href="/widget/{{ $result->id }}/edit">
                            <button type="button" class="btn btn-default">Edit </button>
                        </a> </td>
                    <td>{!! Form::model($result, ['route' => ['widget.destroy', $result->id],
                       'method' => 'DELETE'
                       ]) !!}
                        <div class="form-group">

                           {!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return
                           ConfirmDelete();')) !!}

                        </div>
                       {!! Form::close() !!}
                    </td>
                </tr>
           @endforeach

        </table>

        <div>

        </div>
    </div>
 </div>
