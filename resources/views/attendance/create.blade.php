<div class="x-content">
	<div id="mark-tab">
		<div class="row">
			<div class="content-title center">
				<h1 class=""> Attendance</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="x-content-title">
					<h1> </h1>
				</div>
			</div>
			<!-- FORM DETAILS -->
			<div class="col-md-6 padding-default">
				<form role="form" class="form-inline">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<!-- FORM FIELD 1 --> 
						<div class="form-group col-md-9">
							<label class="m-r-sm">Select Class</label>										
							<select class="form-control" name="grade_id" id="gradeMarkSelect" style="width:inherit">
								<option  class="hidden" value=""></option>
								@foreach($gradelists as $grade)
								<option id = "gradeMark{{ $grade->id }}" class="hidden" value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
								@endforeach
							</select>						 
						</div>			 
						<div class="form-group col-md-3"> 
							 <input class="btn btn-primary" onclick="showStudents()" value="Search" type="button"/>
						</div>
					 
				</form>				
			</div>
			<div class="col-md-3 padding-default">						
				<div class="btn-group pull-right">
					<button class="btn btn-default">TODAY: {{$nowTime}}</button>
				</div>	
			</div>
		</div>	
 		<div class="row student-list">
 			<div class="no-data-msg" id="noStudents">
 				<h3> No students to show.</h3>
 			</div>
			<div class="x-chart-widget-content hidden" id="studentsList">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="default-title m-b-sm">Select Absent Students.</h3>

						<div class="row" id="students">	
							 			
						</div>
	 			</div>
					<div class="text-success" style="display:none" id="successMsg"> <p> students attendance marked successfully!</p> </div>
	 				<div class="panel-footer">
	 					<div class="m-t-sm m-r-sm">
				            <button type="button" class="btn btn-danger pull-left m-r-sm" onclick="allAbsents()">All absent</button>
				            <button type="button" class="btn btn-success pull-left m-r-sm" onclick="allPresents()">All absent</button>		            
				            <button type="button" class="btn btn-primary btn-lg pull-right " onclick="submitAttendance()">Save changes</button> 						
	 					</div>
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
					                <p class="text-warning"> Total Students: {{$grade->studentCount}}  </p>
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
            	<p class="text-danger pull-left hidden" id="noClassMsg"> <small> *no class today</small></p>
                <button type="button" class="btn btn-default" onclick="selectGradeNone()">No Class Today</button>
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
					$("#gradeMark"+data[i]['grade_id']).removeClass('hidden');
				}
			}

		},"json");
		
	});

	var selectedGrades = []
	var selectedStudents = []
	var absentIds = [];
		
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

	function selectStudent(student_id){
		console.log(selectedStudents);
		var index = selectedStudents.indexOf(student_id);
		if(index==-1)
			selectedStudents.push(student_id);
		else
			selectedStudents.splice(index,1);

		var checkImg = $("#student"+student_id).find(".cross-icon img");
		if(checkImg.hasClass('hidden')){ 
			$("#student"+student_id).find(".cross-icon img").removeClass("hidden");
			$("#student"+student_id).find("img.class-icon").addClass("on-hover");
		}
		else{ 
			$("#student"+student_id).find(".cross-icon img").addClass("hidden");
			$("#student"+student_id).find("img.class-icon").removeClass("on-hover");
		}
	}
	function selectGradeNone(){
		$("#noClassMsg").removeClass("hidden");
		window.setTimeout(function () {
	        window.location.href = "/principal/dashboard";
	    }, 3000)

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
						window.location.href = "/principal/attendance";
					    	 
					}
				});
			}
		}
		else
			$('#myModal').modal('hide');
	}

	function findAbsentStudents(gra_id){
		$.get("/principal/attendances/classroom/"+gra_id ,function(data){
			if(data.length){
				for(var i=0;i<data.length;i++){ 
					if(data[i].attendance=="A"){
						// selectedStudents.push((data[i].id).toString());
						selectStudent(data[i].id);
					}
				}	
			}
		},"json");
	}
	function allAbsents(){		
		selectedStudents = [];
		for(var i=0;i<studentIds;i++){ 
			selectStudent(data[i].id);
		}			
	}
	function allPresents(){		
		selectedStudents = studentIds;
		for(var i=0;i<studentIds;i++){ 
			selectStudent(data[i].id);
		}			
	}
	</script>
 
<script>

	var gra_id = null;
	gra_id = $('#gradeMarkSelect').val();
 	function showStudents(){
		gra_id = $('#gradeMarkSelect').val();
 		findAllstudent(gra_id);
 		$("#noStudents").addClass("hidden");
 	 }
 	 var studentIds=[];
	 function findAllstudent(gra_id){ 
		$.get('/principal/attendances/classroom/' + gra_id, function(data) {
			studentIds = [];
			data.sort(function(a, b) {
			    return b["gender"].localeCompare(a["gender"]);
			});
			//success data
			$("#students").html("");
			$.each(data , function(index, studentObj) {
				studentIds.push(studentObj.id);
				var html = createStudentDiv(studentObj);
				$("#students").append(html);
			});

		 	findAbsentStudents(gra_id);
			$("#studentsList").removeClass('hidden');	 	
		},"json");
	 }

	/**
	 * submitForm: saves student attendance
	 * @param  {int} studentId 
	 */
 	 function submitAttendance(){
		var len = selectedStudents.length; 
 	 	for(var i in studentIds){
 	 		var url = '?student_id=' + studentIds[i]+'&attendance=';
 	 		var isSelected = selectedStudents.indexOf(parseInt(studentIds[i]));
 	 		if(isSelected==-1)
				url += 'P';
			else
				url += 'A';
			$.get('/principal/create/attendance'+url , function(data) {
				if(i==len-1){
					// window.location.href = "/principal/attendance";							 
					$("#successMsg").fadeIn(1000);
					$("#successMsg").fadeOut(3000);
				}	
			});	
 	 	}
 	 }

 	 function createStudentDiv(studentObj){
 	 	var html= '<div class="col-md-2">';
			html += '<div class="content-box">';
			html += '<div class="box-image" id="student'+studentObj.id+'" onClick="selectStudent('+studentObj.id+')">';
			html += '<span class="helper"></span>';
			if(studentObj.gender=="Male")
				html += '<img class="class-icon" src="../img/icons/boy.png">';       				
			else
				html += '<img class="class-icon" src="../img/icons/girl.png">';       				

			html += '<div class="cross-icon"><img class="hidden" src="../img/icons/cross3.png"></div>';
			html += '</div>';
			html += '<div class="info m-t-sm">' ;           				
			html += '<p>'+studentObj.student+'</p>';
			// html += '<p class="text-warning"> Total Students: 5  </p>';
			html += '</div> </div> </div>';
	    return html;
 	 }

</script>
@endsection