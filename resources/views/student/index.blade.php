
<div class="x-content">
	<div id="Student-tab">
		<div class="x-content-title">
			<h1>Student's Details</h1>
		</div>
		<div class="row stacked">
			<div class="col-md-12">
				<div class="x-chart-widget">
					<div class="x-chart-widget-head">
						<div class="x-chart-widget-title">
							<!-- <h3>Project Activity</h3>
							<p>Account Type: <span>Business</span></p> -->
						</div>
					</div>

					<!-- START DATATABLE EXPORT -->
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="panel-title">List of Students</h3>
							@include('exports.export')
						</div>
						@include('student.allStudent')
					<!-- END DATATABLE EXPORT -->
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>

