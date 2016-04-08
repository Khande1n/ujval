<div class="x-content">
	<div class="wrapper">
		<div class="wrapper-sm bd-default">
			<div class="heading-sp"> <p> Attendance</p></div>
			<div class="row">
				<!-- <div class="btn-group pull-right">
					<button class="btn btn-default">Undo</button>
				</div>
				<div class="btn-group pull-right">
					<button class="btn btn-default">Download</button>
				</div> -->
				<div class="btn-group pull-right">
					<button class="btn btn-default"><span class="fa fa-edit m-r-sm"></span>Edit attendance</button>
				</div>				
			</div>

			<div class="row m-t-sm">
				<div class="row wrapper bd-default">
						<div class="pull-left">
							<select class="form-control" name="grade_id" id="gradeMarkSelect">
								@foreach($gradelists as $grade)
								<option id = "gradeMark{{ $grade->id }}" value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
								@endforeach
							</select>	
						</div>
						<div class="pull-right">
							<select class="form-control" name="order" id="orderSelect">
								<option id = "" class="" value="">month</option>
							</select>
						</div>
				</div>
				<div class="row wrapper bd-default">
					 <div class="table-responsive hidden" id="attendanceTable">						
						<table id="example" class="table datatable" width="100%"></table>
					</div>
				</div>				

			</div>
			<div class="row m-t-sm"> 
				<div class="btn-group pull-right">
					<button class="btn btn-default btn-lg m-r-sm bg-grey">Cancel</button>
					<button class="btn btn-default btn-lg bg-grey">Submit</button>
				</div>
			</div>	
		</div>
			
	</div>
</div>
 

@section('graphscript')
<script>
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();

	function getDaysArray(year, month) {
	    var numDaysInMonth, daysInWeek, daysIndex, index, i, l, daysArray;

	    numDaysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	    if(year%4==0)
	    	numDaysInMonth[1] = 29;
	    daysInWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	    daysIndex = { 'Sun': 0, 'Mon': 1, 'Tue': 2, 'Wed': 3, 'Thu': 4, 'Fri': 5, 'Sat': 6 };
	    index = daysIndex[(new Date(year, month - 1, 1)).toString().split(' ')[0]];
	    daysArray = [];

	    for (i = 0, l = numDaysInMonth[month - 1]; i < l; i++) {
	        daysArray.push({ "date":i+1 , "day": daysInWeek[index++]}) ;
	        if (index == 7) index = 0;
	    }
	    return daysArray;
	}
	var daysInMonth = getDaysArray(yyyy,mm);
	var attendanceDays;
	var attendanceDaysArray = [];

	var dataSet = [];
	var cols = [{'title':''}];
	var studentTable;
	$(document).ready(function() {
    	$('#example').DataTable( {
	        data: dataSet,
	        columns:[{title: "Name"}]
    	});
    	$("#gradeMarkSelect").val($("#gradeMarkSelect option:first").val());
    	showClass();
	});

	$('#gradeMarkSelect').on('change', function(e) {
		showClass();
	});

	function drawDataTable(columns, data) {
		$('#example').DataTable().destroy();
		$('#example').empty();
	    var oTable = $('#example').dataTable({
	        data: data,
	        columns:columns,
	        bSort: false,
	        bFilter: false,
	        bInfo: false,
	        bPaginate: false
	    });
	}
	function showClass(){
		dataSet = [];
		cols = [];
		$('#attendanceTable').addClass('hidden');
		gra_id = $('#gradeMarkSelect').val();
		$.get('/principal/grade/' + gra_id, function(data) {
			var grade = JSON.parse(data);
			$('#className').html(" " + grade.grade + grade.grade_section);
		});

		$.get('/principal/attendances/days/'+gra_id, function(data){
			attendanceDays = JSON.parse(data);
			attendanceDaysArray = [];	 
			$.each(attendanceDays,function(index,day){
				attendanceDaysArray.push(parseInt((day.date).slice(-2)));
			});
			$.get('/principal/attendances/'+gra_id, function(data){
				cols = [ {title: ""},
						 {title: ""},
						 {title: ""}
						   ];			
				$.each(daysInMonth, function(index, day) {
					cols.push({
						title: addLabelTag(day.date)
					});
				});
				var i = 1;
				$.each(JSON.parse(data), function(index, studentObj) {
					var row = [];
					var checkBox = '<input type="checkbox"> </input>';
					var nameTd = '<label class="bg-grey">'+studentObj.name+'</label>';
					row.push(checkBox,addLabelTag(i), nameTd);
					var studentAttendance = studentAttendances(studentObj.attendance);
					studentAttendance = $.map(studentAttendance, function(el) { return el });

					row = row.concat(studentAttendance);
					//
					//
					// exportBtn = '<button class="btn btn-info search-all"> <a target="_"href="marksheet?grad_id='+gra_id+'&student_id='+studentObj.id+'"> Export</a></button>';
					// studentInfo.push(exportBtn);
					dataSet.push(row);
					i++;
				});
				drawDataTable(cols, dataSet);
				addTableClasses();
			});

		});
		$('#mark-tab').removeClass('hidden');
	}
	function addTableClasses(){
		$('#example tr').css("margin-bottom", "5px");
		$('#example td').css({"padding":"0px 2px","background-color":"#ffffff" });
		$('#example th').css({"padding":"0px 2px"});
	
		$('#example td label').css({"border": "1px solid #E0E0E0","margin-top":"5px","padding": "8px 13px","width": "100%","text-align": "center"});
		$('#example th label').css({"border": "1px solid #E0E0E0","margin-top":"5px","padding": "8px 11px","width": "100%","text-align": "center"});
    	
    	$('#example td input[type=checkbox]').css({"margin": "13px 10px" ,"width": "20px","height": "20px"});
		$('#attendanceTable').removeClass('hidden');
	}
	function addLabelTag(str){
		return "<label>"+ str + "</label>";
	}
	function studentAttendances(absentDaysObj){

		// attendanceDaysArray
		var absentDays = [];
		// find all absent days array.
		$.each(absentDaysObj, function(index, attObj){
			var date = attObj.created_at;
			var date = date.split(" ")[0];
			absentDays.push(parseInt(date.slice(-2)));
		});
 
		var attendances = [];
		for(var i=1;i<=daysInMonth.length;i++){ 
			if(attendanceDaysArray.indexOf(i)!= -1){
				if(absentDays.indexOf(i)==-1)
					attendances.push(addLabelTag("P"));	
				else
					attendances.push(addLabelTag("A"));	
			}
			else
				attendances.push(addLabelTag("."));
		} 
		return attendances;
	}
</script>
 
@endsection