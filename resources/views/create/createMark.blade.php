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
							<select class="form-control" name="grade_id" id="gradeMarkSelect">
								@foreach($gradelists as $grade)
								<option value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
								@endforeach
							</select>
						</div>
					</div>
					
				    <!-- FORM FIELD 2 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Select Sujbect</label>
						<div class="col-md-2">
							<select class="form-control" name="subject_id" id="subjectMarkSelect">
								<option value="">First Select Grade</option>
							</select>
						</div>
					</div>
					
					<!-- FORM FIELD 3 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Select Exam</label>
						<div class="col-md-3">
							<select class="form-control" name="exam_id" id="examMarkSelect">
								<option value="">First Select Subject</option>
							</select>
						</div>
					</div>

					<!-- FORM FIELD 4 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Select Student</label>
						<div class="col-md-3">
							<select class="form-control" name="student_id" id="studentMarkSelect">
								<option value="">First Select Grade</option>
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
</div>


@section('graphscript')
	
	<script>
		//dropdownlist for academic analysis

		$('#gradeMarkSelect').on('change', function(e) {

			var gra_id = e.target.value;

			//ajax

			$.get('/api/category-dropdown?gra+id=' + gra_id, function(data) {

				//success data
				$('#subjectMarkSelect').empty();
				console.log('EMPTY DONE');
				$('#subjectMarkSelect').append('<option value=""> Please choose one</option>');
				console.log('Please choose DONE');
				$.each(JSON.parse(data), function(index, subjectObj) {
					$('#subjectMarkSelect').append('<option value=" ' + subjectObj.id + '">' + subjectObj.subject + '</option');
				});
				console.log('DONE');
			});
			
			$.get('/api/student-dropdown?gra+id=' + gra_id, function(data) {
			//success data
			$('#studentMarkSelect').empty();
			console.log("India no 1");
			$('#studentMarkSelect').append('<option value="">Please Choose one</option>');
			console.log('India again no 1');
			$.each(JSON.parse(data), function(index, studentObj) {
				$('#studentMarkSelect').append('<option value="' + studentObj.id + '">' + studentObj.student + '</option');
			});
		});
});
</script>
<script>
	$('#subjectMarkSelect').on('change', function(e) {
		var sub_id = e.target.value;

		//ajax
		$.get('/api/subject-dropdown?sub+id=' + sub_id, function(data) {
			//success data
			$('#examMarkSelect').empty();
			
			console.log("India no 1");
			$('#examMarkSelect').append('<option value="">Please Choose one</option>');
			console.log('India again no 1');
			$.each(JSON.parse(data), function(index, examObj) {
				$('#examMarkSelect').append('<option value="' + examObj.id + '">' + examObj.exam + '</option');
			});
			console.log('Awesome!!! Done')
		});
	});

</script>

<!-- DASHBOARD ACADEMICS -->



@endsection

@section('selectMarkScript')

<script>
	$('#gradeMarkSelect').select2();
</script>

<script>
	$('#subjectMarkSelect').select2();
</script>

<script>
	$('#examMarkSelect').select2();
</script>

<script>
	$('#studentMarkSelect').select2();
</script>

@endsection	