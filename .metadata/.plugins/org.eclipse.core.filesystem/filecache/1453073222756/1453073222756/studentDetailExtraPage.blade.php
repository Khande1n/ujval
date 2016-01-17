<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

	<div class="row">
		<div class="col-md-12">

			<!-- START STUDENT INFO-->
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>Basic Info</h3>
					<form class="form-horizontal" role="form">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-md-3 control-label">Name:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" value=""/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Email:</label>
								<div class="col-md-9">
									<input type="email" class="form-control" value=""/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Date of birth:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" value=""/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Contact:</label>
								<div class="col-md-9">
									<input type="number" class="form-control" value=""/>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-md-3 control-label">Gender:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" value=""/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Class:</label>
								<div class="col-md-9">
									<input type="text" class="mask_ssn form-control" value=""/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Guardian:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" value=""/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Percent:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" value=""/>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- END STUDENT INFO-->

			<!-- START STUDENT ATTENDANCE GRAPH -->

			<div class="row">
				<div class="col-md-6">

					<!-- START LINE CHART -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Academic Chart</h3>
						</div>
						<div class="pull-right">
							<button class="btn btn-default">
								EXPORT
							</button>
						</div>
						<div class="panel-body">
							<div id="morris-line-example" style="height: 300px;"></div>
						</div>
					</div>
					<!-- END STUDENT ATTENDANCE GRAPH -->
				</div>

				<div class="col-md-6">

					<!-- START STUDENT ACADEMIC GRAPH -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Attendance Chart</h3>
						</div>
						<div class="pull-right">
							<button class="btn btn-default">
								EXPORT
							</button>
						</div>
						<div class="panel-body">
							<div id="morris-line-example" style="height: 300px;"></div>
						</div>
					</div>
					<!-- END STUDENT ACADEMIC GRAPH -->
				</div>
			</div>
		</div>
	</div>
</div>
