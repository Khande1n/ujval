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
							 <input class="btn btn-primary search-all m-t-md" onclick="showStudents()" value="Search" type="button"/>							 
						</div>
					 
				</form>
			</div>
		</div> 		
		<div class="x-chart-widget-content">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="table-responsive">						
						<table id="example" class="table datatable" width="100%"></table>
					</div>
				</div>
			</div> 
		</div> 
	</div>
</div>


@section('graphscript')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>	
	<script>
		var dataSet = []; 
		var studentTable ;
		$(document).ready(function() {
	    	$('#example').DataTable( {
		        data: dataSet,
		        columns: [
		            { title: "Name" },
		            { title: "Email" },
		            { title: "Sex" },
		            { title: "Marks" }
		        ]
	    	} );
	    	studentTable = $('#example').dataTable();
	} );
		//dropdownlist for academic analysis
		var gra_id = null;
		var sub_id = null; 
		var exam_id = null; 
		 
		$('#gradeMarkSelect').on('change', function(e) {

			gra_id = e.target.value;
			$.get('/api/category-dropdown?gra+id=' + gra_id, function(data) {
				//success data
				$('#subjectMarkSelect').empty();
				$('#subjectMarkSelect').append('<option value=""> Please choose one</option>');
				$.each(JSON.parse(data), function(index, subjectObj) {
					$('#subjectMarkSelect').append('<option value="' + subjectObj.id + '">' + subjectObj.subject + '</option');
				});
			});
			studentTable.fnClearTable();
		});

</script>
<script>
	$('#subjectMarkSelect').on('change', function(e) {
		sub_id = e.target.value;
		//ajax
		$.get('/api/subject-dropdown?sub+id=' + sub_id, function(data) {
			//success data
			$('#examMarkSelect').empty();
			$('#examMarkSelect').append('<option value="">Please Choose one</option>');
			$.each(JSON.parse(data), function(index, examObj) {
				$('#examMarkSelect').append('<option value="' + examObj.id + '">' + examObj.exam + '</option');
			});
		});

		studentTable.fnClearTable(); 
	});

	$('#examMarkSelect').on('change', function(e) {
			exam_id = e.target.value;
			studentTable.fnClearTable(); 
		});
 	function showStudents(){
 		findAllstudent(gra_id,sub_id,exam_id);
 	 }

	 function findAllstudent(gra_id,sub_id,exam_id){
	 	dataSet = [];
	 	if(gra_id&&sub_id&&exam_id){
			$.get('/api/student-dropdown?gra+id=' + gra_id+"&sub="+sub_id+"&exam="+exam_id, function(data) {
				//success data
				studentTable.fnClearTable();
				$.each(JSON.parse(data), function(index, studentObj) {					 
					dataSet.push(createStudentData(studentObj));
				});
				studentTable.fnAddData(dataSet);
			});
	 	}
	 	else{
	 		$('#studentMarkSelect').empty();
			studentTable.fnClearTable();
	 	}
	 }

	 function createStudentData(studentObj){
	 	var marksColumn;
	 	if(studentObj.mark ===''){
	 		marksColumn = '<th><div class="row"><div class="col-md-8"> <input type="integer" class="form-control" id="marksField'+studentObj.id+'"value="" name="obt_marks" placeholder="Enter marks" required=""><p class="hidden" id="studentMarks'+studentObj.id+'">'+studentObj.mark+'</p></div><div class="col-md-4"> <button type="button" class="btn btn-default hidden" onclick="showInput('+studentObj.id+')" id="editBtn'+studentObj.id+'">Edit </button><button type="button" class="btn btn-default" id="saveBtn'+studentObj.id+'" onclick="addStudentMark('+studentObj.id+')">Save </button></div> <span id="status'+studentObj.id+'"class="text-success" style="display: none;">saved!</span> </div></th>';
	 	}
	 	else{
	 		marksColumn = '<th><div class="row"><div class="col-md-8"> <input type="integer" class="form-control hidden" id="marksField'+studentObj.id+'" value="'+studentObj.mark+'" name="obt_marks" placeholder="Enter marks" required=""><p id="studentMarks'+studentObj.id+'">'+studentObj.mark+'</p></div><div class="col-md-4"> <button type="button" class="btn btn-default" onclick="showInput('+studentObj.id+')"id="editBtn'+studentObj.id+'">Edit </button><button type="button" class="btn btn-default hidden" id="saveBtn'+studentObj.id+'" onclick="addStudentMark('+studentObj.id+')">Save </button><span id="status'+studentObj.id+'" class="text-success"style="display: none;">saved!</span> </div> </div></th>';
	 	}
		var data = [studentObj.student, studentObj.email, studentObj.gender , marksColumn] ;
		return data; 	 	
 	 }
	/**
	 * showInput: handles save and edit btn and input filed for marks.
	 * @param  {int} studentId 
	 */
 	 function showInput(studentId){
 	 	$('#studentMarks'+studentId).addClass("hidden");
 	 	$('#marksField'+studentId).removeClass("hidden");
 	 	$('#editBtn'+studentId).addClass("hidden");
 	 	$('#saveBtn'+studentId).removeClass("hidden"); 	 	
 	 }
 	 /**
 	  * saves obtained marks for individual student and finds obt marks a then handles show hide elments.
 	  * @param {[int]} studentId [take studentId for a exam id.]
 	  */
 	 function addStudentMark(studentId){
		var obt_marks = $('#marksField'+studentId).val();
		if(obt_marks!==""){
			var url = "?exam_id="+exam_id+"&student_id="+studentId+"&obt_marks="+obt_marks ;
			$.get('/principal/create/mark' + url, function(data) {

				$('#studentMarks'+studentId).html(obt_marks);
		 	 	$('#studentMarks'+studentId).removeClass("hidden");
		 	 	$('#marksField'+studentId).addClass("hidden");
		 	 	$('#editBtn'+studentId).removeClass("hidden");
		 	 	$('#saveBtn'+studentId).addClass("hidden");
				$('#status'+studentId).fadeIn(1000);
				$('#status'+studentId).fadeOut(3000);
			});
		}		
 	 }
 	 function clearSubjectOptions(){

 	 } 	
 	 function clearExamOptions(){
 	 	
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