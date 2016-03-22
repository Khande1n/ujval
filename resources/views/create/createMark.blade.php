<div class="x-content">
	<div id="mark-tab">
		<div class="x-content-title">
			<h1> Enter Marks</h1>
		</div>

		<!-- FORM DETAILS -->

		<div class="panel panel-default">
			<div class="panel-body">
				<h6>Please fill the details below</h6>
				<form role="form" class="form-horizontal">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- FORM FIELD 1 --> 
						<div class="form-group col-md-3">
							<label class="">Select Class</label>
							 
								<select class="form-control" name="grade_id" id="gradeMarkSelect">
									@foreach($gradelists as $grade)
									<option value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
									@endforeach
								</select>
							 
						</div>
						
					    <!-- FORM FIELD 2 -->

						<div class="form-group col-md-3">
							<label class="">Select Sujbect</label>
							 
								<select class="form-control" name="subject_id" id="subjectMarkSelect">
									<option value="">First Select Grade</option>
								</select>
							 
						</div>
						
						<!-- FORM FIELD 3 -->

						<div class="form-group col-md-3">
							<label class="">Select Exam</label>							 
								<select class="form-control" name="exam_id" id="examMarkSelect">
									<option value="">First Select Subject</option>
								</select>
							 
						</div>

						<div class="form-group col-md-3"> 
								 <button class="btn btn-primary search-all m-t-md" type="submit" value="Save">
									Search
								</button>							 
						</div>
					 
				</form>
			</div>
		</div> 		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table id="customers2" class="table datatable">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Sex</th>
								<th>Marks</th> 
							</tr>
						</thead>
						<tbody id="allstudents">
						
						</tbody>
					</table>
				</div>
			</div>
		</div> 

	</div>
</div>


@section('graphscript')
	
	<script>
		//dropdownlist for academic analysis
		var gra_id = null;
		var sub_id = null; 
		var exam_id = null; 
		
		$('#gradeMarkSelect').on('change', function(e) {

			gra_id = e.target.value;

			//ajax

			$.get('/api/category-dropdown?gra+id=' + gra_id, function(data) {

				//success data
				$('#subjectMarkSelect').empty();
				console.log('EMPTY DONE');
				$('#subjectMarkSelect').append('<option value=""> Please choose one</option>');
				console.log('Please choose DONE');
				$.each(JSON.parse(data), function(index, subjectObj) {
					$('#subjectMarkSelect').append('<option value="' + subjectObj.id + '">' + subjectObj.subject + '</option');
				});
				console.log('DONE');
			});
			findAllstudent(gra_id,sub_id,exam_id);
		});

</script>
<script>
	$('#subjectMarkSelect').on('change', function(e) {
		sub_id = e.target.value;

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

		findAllstudent(gra_id,sub_id,exam_id);
	});

	$('#examMarkSelect').on('change', function(e) {
			exam_id = e.target.value;
			findAllstudent(gra_id,sub_id,exam_id);
		});

	 function findAllstudent(gra_id,sub_id,exam_id){
	 	if(gra_id&&sub_id&&exam_id){
			$.get('/api/student-dropdown?gra+id=' + gra_id+"&sub="+sub_id+"&exam="+exam_id, function(data) {
				//success data
				console.log(data)
				$('#studentMarkSelect').empty();
				$('#allstudents').empty(); 
							
								  
				$('#studentMarkSelect').append('<option value="">Please Choose one</option>');
				$.each(JSON.parse(data), function(index, studentObj) {
					$('#studentMarkSelect').append('<option value="' + studentObj.id + '">' + studentObj.student + '</option');
					var studentInfo = createStudentRow(studentObj);
					$('#allstudents').append(studentInfo)
				});
			});
	 	}
	 	else{
	 		$('#studentMarkSelect').empty();
	 		$('#allstudents').empty(); 
	 	}
	 }
	 function createStudentRow(studentObj){
	 	var row = " <tr>"; 
	 	row += '<form role="form" method="POST" > <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />">';

	 	row += " <th>"+ studentObj.student +"</th>"; 
	 	row += " <th>"+ studentObj.email +"</th>"; 
	 	row += " <th>"+ studentObj.gender +"</th>"; 
 	
 		// row += " <th>"+'<input type="integer" class="form-control" value="'+studentObj.mark+'" name="obt_marks" placeholder="Enter marks" required></th>';
	 	
	 	if(studentObj.mark ===''){
	 		row += '<th><div class="row"><div class="col-md-8"> <input type="integer" class="form-control" id="marksField'+studentObj.id+'"value="" name="obt_marks" placeholder="Enter marks" required=""></div><div class="col-md-4"> <button type="button" class="btn btn-default" onclick="addStudentMark('+studentObj.id+')">Save </button></div> </div></th>';
	 	}
	 	else{
	 		row += '<th><div class="row"><div class="col-md-8"> <input type="integer" class="form-control hidden" id="marksField'+studentObj.id+'" value="'+studentObj.mark+'" name="obt_marks" placeholder="Enter marks" required=""><p id="studentMarks'+studentObj.id+'">'+studentObj.mark+'</p></div><div class="col-md-4"> <button type="button" class="btn btn-default" onclick="showInput('+studentObj.id+')"id="editBtn'+studentObj.id+'">Edit </button><button type="button" class="btn btn-default hidden" id="saveBtn'+studentObj.id+'" onclick="saveStudentMark('+studentObj.id+')">Save </button>	 </div> </div></th>';
	 	}
	 	row += "</form></tr>"; 
		return row; 	 	
 	 }

 	 function showInput(studentId){
 	 	$('#studentMarks'+studentId).addClass("hidden");
 	 	$('#marksField'+studentId).removeClass("hidden");
 	 	$('#editBtn'+studentId).addClass("hidden");
 	 	$('#saveBtn'+studentId).removeClass("hidden"); 	 	
 	 }
 	 function addStudentMark(studentId){
 // /principal/create/mark 		
		var obt_marks = $('#marksField'+studentId).val();
		if(obt_marks!==""){
			var url = "?exam_id="+exam_id+"&student_id="+studentId+"&obt_marks="+obt_marks ;

			$.post( "/principal/create/mark", {
			  'exam_id' : exam_id,
			  'student_id' : studentId,
			  'obt_marks' : obt_marks
			})
			.done(function(data) {
                console.log(data);
            })
		}
		console.log(exam_id);
		console.log();
		
 	 } 	 
 	 function saveStudentMark(studentId){
 	 	
 	 }
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