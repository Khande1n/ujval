<div class="x-content">
	<div id="mark-tab">
		<div class="x-content-title">
			<h1> Enter Marks</h1>
		</div>

		<!-- FORM DETAILS -->

		<div class="panel panel-default">
			<div class="panel-body">
				<h6>Please fill the details below</h6>
				<form class="form-horizontal" role="form" method="POST" action="/principal/create/mark">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- FORM FIELD 1 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Select Class</label>
						<div class="col-md-2">
							<select class="form-control select" name="grade_id" id="grade_id">
								@foreach($grades as $grade)
								<option value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
								@endforeach
							</select>
						</div>
					</div>
					
				    <!-- FORM FIELD 2 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Select Sujbect</label>
						<div class="col-md-2">
							<select class="form-control select" name="subject_id" id="subject_id">
								@foreach($marklists as $subject)
								<option value="{{ $subject->subject_id }}">{{ $subject->subject }}</option>
								@endforeach
							</select>
						</div>
					</div>
					
					<!-- FORM FIELD 3 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Select Exam</label>
						<div class="col-md-2">
							<select class="form-control select" name="exam_id" id="exam_id">
								@foreach($marklists as $exam)
								<option value="{{ $exam->exam_id }}">{{ $exam->exam }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<!-- FORM FIELD 4 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Select Student</label>
						<div class="col-md-2">
							<select class="form-control select" name="student_id" id="student_id">
								@foreach($students as $student)
								<option value="{{ $student->id }}">{{ $student->student }}</option>
								@endforeach
							</select>
						</div>
					</div>


					<!-- FORM FIELD 3 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Marks</label>
						<div class="col-md-2">
							<input type="integer" class="form-control" value="" name="obt_marks" placeholder="Enter marks" required>
						</div>
					</div>

					<!-- FORM FIELD 'SAVE'-->

					<div class="panel-footer">
						<button class="btn btn-primary pull-right" type="submit" value="Save">
							Save
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	