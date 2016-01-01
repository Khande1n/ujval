<!DOCTYPE html>
<html >
  <head>
  	
  	@yield('title')
  	
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- <link rel="stylesheet" href="../css/bootstrap.min.css" /> -->
	<!-- <link rel="stylesheet" href="../css/theme-default.css" /> -->
	<!-- <link rel="stylesheet" href="../css/docs.min.css" /> -->
	<!--[if lte IE 8]><script src="js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="../css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->

  </head>

  <body>
  	
  	<!-- Header -->
  	        <header id="header" class="skel-layers-fixed">
				<h1><a href="/principal/dashboard">Ujval</a></h1>
				<a href="#nav">Menu</a>
			</header>
		
			
	<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li><a href="/principal/dashboard">Home</a></li>
					<li><a href="/principal/Classroom">Classroom</a></li>
					<li><a href="/principal/Message">Message</a></li>
					<li><a href="/principal/Feedback">Feedback</a></li>
					<li><a href="/principal/Chat">Chat</a></li>
					<li><a href="/principal/Create">Create</a></li>
				</ul>
			</nav>	
			
	
	<!-- In-page Nav -->
		
			@yield('inpage-nav')		
			
	<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major special">
						<!-- <h2>Elements</h2> -->
						<!-- <p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p> -->
					</header>
							
  		
@yield('content')
		
	<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook">
							<span class="label">Facebook</span>
						</a></li>
						<li><a href="#" class="icon fa-twitter">
							<span class="label">Twitter</span>
						</a></li>
						<li><a href="#" class="icon fa-instagram">
							<span class="label">Instagram</span>
						</a></li>
						<li><a href="#" class="icon fa-linkedin">
							<span class="label">LinkedIn</span>
						</a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Ujval.</li>
						<!-- <li>Images: <a href="http://unsplash.com">Unsplash</a>.</li> -->
					</ul>
				</div>
			</footer>
			
			
  <!-- Scripts -->
			<script src="../js/jquery.min.js"></script>
			<script src="../js/skel.min.js"></script>
			<script src="../js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../js/main.js"></script>

	</body>
</html>