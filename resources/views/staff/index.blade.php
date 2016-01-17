<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">

			<!-- START STAFF INFO-->
			<div class="panel panel-default">
				<div class="panel-body">
					<h3 class="panel-title">Total Staff: {{ $count }}</h3>
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


