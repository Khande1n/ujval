<div class="x-content">
	<div id="Academic-tab">
		<div class="x-content-title">
			<h1>School Academic Analysis</h1>
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
							<div class="pull-right col-md-6">
								<form>
									<div class="form-group col-md-4">
										<label>GRADE</label>
										<select class="form-control" name="grade_id" id="grade_id">
											<option value="">Select Grade</option>
											@foreach($gradelists as $grade)
											<option value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
											@endforeach
										</select>
									</div>

									<div class="form-group col-md-4">
										<label>SUBJECT</label>
										<select class="form-control" name="subject_id" id="subject_id">
											<option value="">First Select Grade</option>
										</select>
									</div>

									<div class="form-group col-md-4">
										<label>EXAM</label>
										<select class="form-control" name="exam_id" id="exam_id">
											<option value="">First Select Subject</option>
										</select>
									</div>
								</form>
							</div>
						</div>

						<!-- <div class="row">
							<div class="col-md-6">
								<div class="x-chart-widget-informer">
									<div class="row">
								</div>
							</div>
						</div> -->
						<div class="panel panel-default">
							<div class="panel-heading">
                            	<h3 class="panel-title">Academic Chart</h3>                                
                            </div>
							<div class="panel-body">
								<div class="x-chart-holder">
									<div id="academic-analysis" style="height: 400px"></div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>