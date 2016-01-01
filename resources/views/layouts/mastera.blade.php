<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
@yield('title')

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">


@yield('css')

</head>
<body> 
	
	<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">LaraTemp</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
            <ul class="nav navbar-nav navbar-right">

              @if (!Auth::check())
            <li><a href="/auth/login">Login </a></li>
            <li><a href="/auth/register">Register</a></li>
              @else (Auth::check())
            <li><img class="circ" src="{{ Gravatar::get(Auth::user()->email)  }}"></li>
            <li class="dropdown">         
          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
    
            <ul class="dropdown-menu" role="menu">
            <li><a href="/logout">Logout</a></li>
            </ul>
            </li>
            </ul>
           @endif
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


<div class="col-md-9">


@yield('content')


</div>

</div>

   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
 
  
@yield('scripts')

</body>
</html>

	
