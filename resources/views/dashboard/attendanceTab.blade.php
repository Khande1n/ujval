<div class="x-content">
	<div id="Attendance-tab">
		<div class="x-content-title">
			<h1>Attendance Analysis</h1>
		</div>
		<div class="row stacked">
			<div class="col-md-12">
				<div class="x-chart-widget">
					<div class="x-chart-widget-head">
						<div class="x-chart-widget-title">
							<!-- <h3>Project Activity</h3>
							<p>Account Type: <span>Business</span></p> -->
						</div>

						@include('exports.export')

					</div>
					<div class="x-chart-widget-content">
						<div class="x-chart-widget-content-head">
							<h4>SUMMARY</h4>
							<div class="pull-right">
								<div class="btn-group">
									<ul class="nav nav-pills ranges">
										<button class="btn btn-default">
											<li class="active">
												<a href="#" data-range='7'>WEEK</a>
											</li>
										</button>
										<button class="btn btn-default">
											<li>
												<a href="#" data-range='30'>MONTH</a>
											</li>
										</button>
										<button class="btn btn-default">
											<li>
												<a href="#" data-range='180'>HALF YEAR</a>
											</li>
										</button>
										<button class="btn btn-default">
											<li>
												<a href="#" data-range='365'>YEAR</a>
											</li>
										</button>
									</ul>
								</div>
							</div>
						</div>
						<!-- <div class="row">
						<div class="col-md-6">
						<div class="x-chart-widget-informer">
						<div class="row">
						<div class="col-md-3">
						<div class="x-chart-widget-informer-item">
						<div class="count">223<span>34% <i class="fa fa-arrow-up"></i></span></div>
						<div class="title">Views of your profile</div>
						</div>
						</div>
						<div class="col-md-3">
						<div class="x-chart-widget-informer-item">
						<div class="count">190<span>17% <i class="fa fa-arrow-up"></i></span></div>
						<div class="title">Views of your works</div>
						</div>
						</div>
						<div class="col-md-3">
						<div class="x-chart-widget-informer-item">
						<div class="count">223<span class="negative">22% <i class="fa fa-arrow-down"></i></span></div>
						<div class="title">Likes</div>
						</div>
						</div>
						<div class="col-md-3">
						<div class="x-chart-widget-informer-item last">
						<div class="count">160<span>3% <i class="fa fa-arrow-up"></i></span></div>
						<div class="title">Comments</div>
						</div>
						</div>
						</div>
						</div>
						</div>
						</div> -->
						<div class="panel panel-default">
							<div class="panel-heading">
                            	<h3 class="panel-title">Attendance Chart</h3>                                
                            </div>
							<div class="panel-body">
								<div class="x-chart-holder">
									<div id="stats-container" style="height: 400px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>