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
						<label class="col-md-3 control-label">Select Class</label>
						<div class="col-md-3">
							<select class="form-control js-example-basic-multiple" multiple="multiple" name="grade_id[]" id="gradeExam" placeholder="Select Grade">
								@foreach($gradelists as $grade)
								<option value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<!-- FORM FIELD 2 -->
					
					<div class="form-group">
						<label class="col-md-3 control-label">Assign Subject</label>
						<div class="col-md-3">
							<select class="form-control js-example-basic-multiple" multiple="multiple" name="subject_id[]" id="subjectExamSelect" placeholder="Select Subject">
								@foreach($subjectlists as $subId=>$subjects)
									@foreach($subjects as $k=>$subject)
									<option value="{{ $subject['id'] }}">{{ $subject['subject'] }}</option>
									@endforeach
								@endforeach
							</select>
						</div>
					</div>
					
					<!-- FORM FIELD 3 -->

					<div class="form-group">
						<label class="col-md-3 control-label" >Exam Name</label>
						<div class="col-md-3">
							<select class="form-control js-example-basic-single" name="exam" id="examsSelect" placeholder="eg. FA II or SA I">
								@foreach($examlists as $key=>$exams)
								@foreach($exams as $k=>$exam)
								<option value="{{ $exam['exam'] }}">{{ $exam['exam'] }}</option>
								@endforeach
								@endforeach
							</select>
						</div>
					</div>
					
					<!-- FORM FIELD 4 -->

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

					<!-- FORM FIELD 5 -->

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

					<!-- FORM FIELD 6 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Maximum Marks</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="max_marks" required>
						</div>
					</div>

					<!-- FORM FIELD 7 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Pass Marks</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="pass_marks" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Weightage</label>
						<div class="col-md-2">
							<input type="text" class="form-control" name="weightage" required>
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
		
		<!-- FORM UPDATE SECTION -->

		<div class="panel panel-default">
			<div class="panel-body">
				<h6>Please Update Exams of any Grade</h6>
				<form class="form-horizontal" role="form" method="POST" action="/principal/update/exam/{id}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- FORM FIELD 1 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Assign Class</label>
						<div class="col-md-3">
							<select class="form-control js-example-basic-multiple" multiple="multiple" name="grade_id[]" id="gradeExamUpdate" placeholder="Select Grade">
								@foreach($gradelists as $grade)
								<option value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<!-- FORM FIELD 2 -->

					<div class="form-group">
						<label class="col-md-3 control-label" >Exam Name</label>
						<div class="col-md-3">
							<select class="form-control js-example-basic-single" name="exam" id="examUpdateSelect" placeholder="eg. FA II Grade or SA I Grade Section">
								@foreach($examlists as $key=>$exams)
								@foreach($exams as $k=>$exam)
								<option value="{{ $exam['id'] }}">{{ $exam['exam'] }}</option>
								@endforeach
								@endforeach
							</select>
						</div>
					</div>
				<!-- FORM FIELD 'SAVE'-->

					<div class="panel-footer">
						<button class="btn btn-primary pull-right" type="submit">
							Update
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



@section('createExamScript')

<script>
	$('#gradeExam').select2({

		placeholder : "Please Select",
		
	});
</script>

<script>
	$('#examsSelect').select2({
		placeholder : "Select Exam",
		tags: true
	}); 
</script>

<script>
	$('#subjectExamSelect').select2({
		placeholder : "Select Subject",
		
	}); 
</script>

<script>
	$('#gradeExamUpdate').select2(); 
</script>

<script>
	$('#examUpdateSelect').select2(); 
</script>

@endsection

