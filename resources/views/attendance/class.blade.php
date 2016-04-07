<div class="x-content">
	<div id="mark-tab">
		<div class="x-content-title">
			<h1> Attendance</h1>
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
				 
						<div class="form-group col-md-3"> 
							 <input class="btn btn-primary search-all m-t-md" onclick="showStudents()" value="Search" type="button"/>							 
						</div>
					 
				</form>
				<div class="btn-group pull-right">
					<button class="btn btn-default">TODAY: {{$nowTime}}</button>
				</div>	

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
	<script>
		var dataSet = []; 
		var studentTable ;
		$(document).ready(function() {
	    	$('#example').DataTable( {
		        data: dataSet,
		        columns: [
		            { title: "Name" },
		            { title: "Guardian" },
		            { title: "Email" },
		            { title: "Sex" },
		            { title: "Mark if Absent" }
		        ]
	    	} );
	    	studentTable = $('#example').dataTable();
	});

	var gra_id = null;
	gra_id = $('#gradeMarkSelect').val();

</script>
<script>

 	function showStudents(){
		gra_id = $('#gradeMarkSelect').val();
 		findAllstudent(gra_id);
 	 }

	 function findAllstudent(gra_id){
	 	dataSet = [];

		$.get('/principal/attendances/classroom/' + gra_id, function(data) {
			//success data
			$.each(JSON.parse(data), function(index, studentObj) {
				dataSet.push(createStudentData(studentObj));
			});
			studentTable.fnClearTable();
			studentTable.fnAddData(dataSet);
			 	
		});
	 }

	 function createStudentData(studentObj){
	 	var AttendanceColumn;
 		var checked = "";
 		if(studentObj.attendance){
 			checked = "checked";
 		}
 		AttendanceColumn = '<th><div class="row"><div class="col-md-8 squaredCheck"> <input type="checkbox" value="None" id="squaredCheck'+studentObj.id+'" name="check"'+checked+' /><label for="squaredCheck'+studentObj.id+'"></label></div><div class="col-md-4"> <button type="button" class="btn btn-default" onclick="submitForm('+studentObj.id+')" > Save </button> <span id="status'+studentObj.id+'" class="text-success" style="display: none;">saved!</span> </div> </div></th>';

		var data = [studentObj.student, studentObj.guardian1, studentObj.email, studentObj.gender , AttendanceColumn ] ;
		return data; 	 	
 	 }
	 

</script>
@endsection