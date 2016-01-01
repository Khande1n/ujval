@extends('layouts.mastera')

@section('title')

    <title>The Widget Page</title>

    @endsection

 @section('css')

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

@endsection 

@section('content')

    {!! Breadcrumb::withLinks(['Home' => '/pages/dashboard', 'Widgets' => '/widget']) !!}

    @include('widget.noresults')

    <br>

    @include('widget.searchform')

    @if(isset($results))

        @include('widget.searchresults')

        @else
        
          <h1>Widget Stats </h1>

          <div id="chart" style="height: 250px;"></div>

          <hr>

        @include('widget.allresults')

        @endif

@endsection

@section('scripts')

    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

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
    <script>
      var data =  <?php echo json_encode($chartData) ?>;

       Morris.Line({
           element: 'chart',
           data: data,
           xkey: 'year',
           ykeys: ['count'],
           labels: ['widgets created']
       });
       
    </script>

@endsection