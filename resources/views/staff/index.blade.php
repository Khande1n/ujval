<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<div class="row stacked">
		<div class="col-md-12">
			<div class="x-chart-widget">
				<div class="x-chart-widget-head">
					<div class="x-chart-widget-title">
						<!-- <h3>Project Activity</h3>
						<p>Account Type: <span>Business</span></p> -->
					</div>
				</div>
				
				<!-- START STAFF INFO-->
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="panel-title">Total Staff: {{ $countUser }}</h3>
						@include('exports.export')
					</div>

					<!-- START Table -->
					@include('staff.allStaff')
					<!-- END Table-->

				</div>
			</div>

			<!-- END STAFF INFO-->

		</div>
	</div>
</div>

