@extends('layouts.website')

@section('title')

<title>Ujval</title>

@endsection

@section('mainbody')
<!-- Banner -->
			<section id="banner">
				<i class="icon fa-diamond"></i>
				<h2>School of Strength</h2>
				<p>Find the new revolutionary path to find real strength that lies within</p>
				<ul class="actions">
					<li><a href="auth/register" class="button big special">Register Your School</a></li>
					<li><a href="auth/login" class="button big special">Login</a></li>
				</ul>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<div class="inner">
					<article class="feature left">
						<span class="image"><img src="/assets/images/pic01.jpg" alt="" /></span>
						<div class="content">
							<h2>Turn Data into Intelligent Insights</h2>
							<p>Data processed in real-time into class & student level reports designed to help users at different levels make more informed & time-relevant decisions.</p>
							<ul class="actions">
								<li>
									<a href="#" class="button alt">More</a>
								</li>
							</ul>
						</div>
					</article>
					<article class="feature right">
						<span class="image"><img src="/assets/images/pic02.jpg" alt="" /></span>
						<div class="content">
							<h2>Going Beyond Grades</h2>
							<p>Capture student co-scholastic achievements and track behavioral indicators via an innovative single-click evidence logging system.</p>
							<ul class="actions">
								<li>
									<a href="#" class="button alt">More</a>
								</li>
							</ul>
						</div>
					</article>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper special">
				<div class="inner">
					<header class="major narrow">
						<h2>The Do It All Platform</h2>
						<p>Single window access to lesson planning, assessments, personalised calendar, student attendance, online submissions, reporting and so much more!</p>
					</header>
					<div class="image-grid">
						<a href="#" class="image"><img src="/assets/images/pic03.jpg" alt="" /></a>
						<a href="#" class="image"><img src="/assets/images/pic04.jpg" alt="" /></a>
						<a href="#" class="image"><img src="/assets/images/pic05.jpg" alt="" /></a>
						<a href="#" class="image"><img src="/assets/images/pic06.jpg" alt="" /></a>
						<a href="#" class="image"><img src="/assets/images/pic07.jpg" alt="" /></a>
						<a href="#" class="image"><img src="/assets/images/pic08.jpg" alt="" /></a>
						<a href="#" class="image"><img src="/assets/images/pic09.jpg" alt="" /></a>
						<a href="#" class="image"><img src="/assets/images/pic10.jpg" alt="" /></a>
					</div>
					<ul class="actions">
						<li><a href="#" class="button big alt">Learn More</a></li>
					</ul>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style3 special">
				<div class="inner">
					<header class="major narrow	">
						<h2>Request an Online Demo!</h2>
						<p>If the concept of Ujval sounds interesting, drop us a quick request and we'll get in touch with you to arrange an online demo.</p>
					</header>
					<!-- <ul class="actions">
						<li><a href="#" class="button big alt">Magna feugiat</a></li>
					</ul> -->
				</div>
			</section>

		<!-- Four -->
			<section id="four" class="wrapper style2 special">
				<div class="inner">
					<header class="major narrow">
						<h2>Get in touch</h2>
						<p>Powerful features. Beautiful Design.</p>
					</header>
					<form action="#" method="POST">
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
									<input name="name" placeholder="Name" type="text" />
								</div>
								<div class="6u$ 12u$(xsmall)">
									<input name="email" placeholder="Email" type="email" />
								</div>
								<div class="12u$">
									<textarea name="message" placeholder="Message" rows="4"></textarea>
								</div>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" class="special" value="Submit" /></li>
							<li><input type="reset" class="alt" value="Reset" /></li>
						</ul>
					</form>
				</div>
			</section>
			
@endsection
