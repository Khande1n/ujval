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
									<option id = "gradeMark{{ $grade->id }}" class="hidden" value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
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
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Select Classes for attendance.</h4>
            </div>
            <div class="modal-body">
            	<div class="row m-b-sm">
	            	<div class="btn-group pull-right">
						<button class="btn btn-default">TODAY: {{$nowTime}}</button>
					</div>
				</div>
				<div class="row">	
					@foreach($gradelists as $grade)
		            	<div class="col-md-4">
			            	<div class="content-box">
		            			<div class="box-image" id="grade{{$grade->id}}" onClick="selectClass({{$grade->id}})">
		            				<span class="helper"></span>
		            				<img class="class-icon" src="../img/icons/class.png">            				
		            				<img class="check-icon hidden" src="../img/icons/check2.png">
		            			</div>
		            			<div class="info m-t-sm">            				
					                <p>Class: {{ $grade->grade }}.{{ $grade->grade_section }}</p>
					                <p class="text-warning"><small>Total Students: {{$grade->studentCount}} </small></p>
		            			</div>
		            		</div>    
		                </div>
					@endforeach				
				</div>
				<div class="row m-t-md">	
					<div class="pull-right">
						 <p class="text-warning"><small>*if no class today then click on save changes directly</small></p>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-primary" onclick="saveClasses()">Save changes</button>
            </div>
        </div>
    </div>
</div>
@section('graphscript')

	<script>

	$(document).ready(function(){
		$.get("/principal/classroom/attendances/classes",function(data){
			console.log(data);
			if(!data.length)
		        $("#myModal").modal('show');			
			else{
				for(var i=0;i<data.length;i++){
					console.log(data[i]);
					$("#gradeMark"+data[i]['grade_id']).removeClass('hidden');
				}
			}

		},"json");
	});

	var selectedGrades = []
	function selectClass(gra_id){
		var index = selectedGrades.indexOf(gra_id);
		if(index==-1)
			selectedGrades.push(gra_id);
		else
			selectedGrades.splice(index,1);

		var checkImg = $("#grade"+gra_id).find("img.check-icon");

		if(checkImg.hasClass('hidden')){
			$("#grade"+gra_id).find("img.check-icon").removeClass("hidden");
			$("#grade"+gra_id).find("img.class-icon").addClass("on-hover");
		}
		else{
			$("#grade"+gra_id).find("img.check-icon").addClass("hidden");
			$("#grade"+gra_id).find("img.class-icon").removeClass("on-hover");
		}
	}
	function saveClasses(){
		var len = selectedGrades.length;
		var count = 0;
		if(len){			
			for(i in selectedGrades){
				$.get( "/principal/classroom/attendances/save/"+selectedGrades[i], function( data ) {
					count+=1;					
					if(count==len){
						$('#myModal').modal('hide');
					}
				});
			}
		}
		else
			$('#myModal').modal('hide');
	}

	</script>

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
	function checkBoxStyle(studentId){
		
		if($('#checkBox'+studentId).hasClass('label-x-red')){			
			$('#checkBox'+studentId).removeClass('label-x-red');
			$('#checkBox'+studentId).addClass('label-x-blank');			
		}
		else
			$('#checkBox'+studentId).addClass('label-x-red');
			$('#checkBox'+studentId).removeClass('label-x-blank');			
	}

	 function createStudentData(studentObj){
	 	var AttendanceColumn;
 		var checked = "";
 		var cssClass = "label-x-blank";
 		if(studentObj.attendance){
 			checked = "checked";
 			cssClass = "label-x-red";
 		}
 		AttendanceColumn = '<th><div class="row"><div class="col-md-8 squaredCheck"> <input type="checkbox" value="None" id="squaredCheck'+studentObj.id+'" name="check"'+checked+'" onclick="checkBoxStyle('+studentObj.id+')"/><label id="checkBox'+studentObj.id+'" for="squaredCheck'+studentObj.id+'" class="'+cssClass+'"></label></div><div class="col-md-4"> <button type="button" class="btn btn-default" onclick="submitForm('+studentObj.id+')" > Save </button> <span id="status'+studentObj.id+'" class="text-success" style="display: none;">saved!</span> </div> </div></th>';

		var data = [studentObj.student, studentObj.guardian1, studentObj.email, studentObj.gender , AttendanceColumn ] ;
		return data; 	 	
 	 }
	/**
	 * submitForm: saves student attendance
	 * @param  {int} studentId 
	 */
 	 function submitForm(studentId){
		var val = $('#squaredCheck'+studentId).is(":checked") ;
		 
		if(val)
			attendance = 'A';
		else
			attendance = 'P';
		var url = '?student_id=' + studentId + '&attendance=' + attendance ;
		$.get('/principal/create/attendance'+url , function(data) {
			$('#status'+studentId).fadeIn(1000);
			$('#status'+studentId).fadeOut(3000);
		});		 		
 	 }

</script>
@endsection