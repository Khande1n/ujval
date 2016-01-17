<div class="x-content">
	<div id="exam-tab">
		<div class="x-content-title">
			<h1> Create Exam</h1>
		</div>

		<!-- FORM DETAILS -->

		<div class="panel panel-default">
			<div class="panel-body">
				<h6>Please fill the details below</h6>
				<form class="form-horizontal" role="form" method="POST" action="/principal/create/exam">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- FORM FIELD 1 -->

					<div class="form-group">
						<label class="col-md-3 control-label" for="exam">Exam Name</label>
						<div class="col-md-2">
							<input type="text" class="form-control" value="" name="exam" placeholder="eg. FA II or SA I" required>
						</div>
					</div>

					<!-- FORM FIELD 2 -->

					<div class="form-group">
						<label class="col-md-3 control-label" for="sub_name_first">Assign Subject</label>
						<div class="col-md-2">
							<select class="form-control select" name="subject_id" id="subject_id">
								@foreach($marklists as $subject)
								<option value="{{ $subject->subject_id }}">{{ $subject->subject }}.{{ $subject->grade }}.{{ $subject->grade_section }}</option>
								@endforeach
							</select>
						</div>
					</div>


					
					<!-- FORM FIELD 3 -->

					<div class="form-group">
						<label class="col-md-3 control-label" for="exam_end">Exam Start Date </label>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" id="dp-2" class="form-control datepicker" name="exam_start" value="2013-02-01" required>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								<!-- <input type="text" class="form-control timepicker"/>
								<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span> -->
							</div>
						</div>
					</div>
					

					
					<!-- FORM FIELD 4 -->

					<div class="form-group">
						<label class="col-md-3 control-label" for="exam_end">Exam End Date </label>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" id="dp-2" class="form-control datepicker" name="exam_end" value="2013-02-01" required>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								<!-- <input type="text" class="form-control timepicker"/>
								<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span> -->
							</div>
						</div>
					</div>
					
					
					<!-- FORM FIELD 5 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Maximum Marks</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="max_marks" value="" placeholder="" required>
						</div>
					</div>

					<!-- FORM FIELD 6 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Pass Marks</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="pass_marks" value="" placeholder="" required>
						</div>
					</div>

					<!-- FORM FIELD 'SAVE'-->

					<div class="panel-footer">
						<button class="btn btn-primary pull-right" type="submit" value"Save">
							Save
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>




