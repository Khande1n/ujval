<div class="x-content">
	<div class="wrapper">
		<div class="wrapper-sm bd-default">
			<div class="heading-sp"> <p> Attendance</p></div>


			
			<div class="row">				 
				<div class="col-md-4 btn-group">
					<button class="btn btn-default" id="todayBtn" onclick="todaysAttendance()">Today</button>
					<button class="btn btn-default" id="weekBtn"  onclick="weeksAttendance()">This Week</button>
					<button class="btn btn-default active" id="monthBtn" onclick="monthsAttendance()">This Month</button>		
				</div>
				<div class="col-md-4" >
					<div class="col-md-9">
						<select class="form-control" name="graph_grade" id="graphGrade">
							@foreach($gradelists as $grade)
							<option id = "gradeMark{{ $grade->id }}" value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-3">
						 <span class="fa fa-plus add-btn" onclick="addGradeToGraph()"></span> 
					</div>
				</div>
			</div>
			<div class="col-md-5">
			</div>
			<div class="col-md-4 m-t-xl">
				 <h3> Chart: ABSENT STUDENTS</h3>
			</div>

			<div class="row m-t-sm m-b-sm">
				<div class="row wrapper bd-default">
					<div class="x-chart-holder">
						<div id="class-chart" style="height: 400px;"></div>
					</div>
				</div>
			</div>

			
		</div>
		
		<div class="wrapper-sm bd-default m-t-xl">
			<div class="heading-sp"> <p> Attendance</p></div>
			<div class="row">
				
 				<!--<div class="btn-group pull-right">
					<button class="btn btn-default" onclick="undo()"><span class="fa fa-undo m-r-sm"></span>Undo</button>
				</div> -->
				<!-- 
				<div class="btn-group pull-right">
					<button class="btn btn-default">Download</button>
				</div> -->
				<div class="btn-group pull-right">
					<button class="btn btn-default" onclick="editAttendance()"><span class="fa fa-edit m-r-sm"></span>Edit attendance</button>
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
					<div class="show-info" style="display:none" id="successMsg"> <p class="text-success"> students attendance marked successfully!</p> </div>
				</div>				
			</div>
			<div class="row m-t-sm"> 
				<div class="btn-group pull-right">
					<button class="btn btn-default btn-lg m-r-sm bg-grey">Cancel</button>
					<button class="btn btn-default btn-lg bg-grey" onclick="submitAttendance()">Submit Attendance</button>
				</div>
			</div>	
		</div>	
	</div>
</div>
 

@section('graphscript')
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

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

	var attendanceObj;
	var attendanceDaysArray = [];
	var studentIds = [];
	var attendancesArray = [];
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
    	addGradeToGraph();
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
			attendanceObj = JSON.parse(data);
			attendanceDaysArray = attendancesDays(attendanceObj);	 
			
			$.get('/principal/attendances/'+gra_id, function(data){
				cols = [ {title:""}, {title:""}, {title:""}
					   ];			
				$.each(daysInMonth, function(index, day) {
					cols.push({
						title: addLabelTag(day.date)
					});
				});
				var i = 1;
				studentIds = [];
				$.each(JSON.parse(data), function(index, studentObj) {
					var row = [];					
					var checkBox = '<input type="checkbox" id="checkbox'+index+'"> </input>';
					var nameTd = '<label class="bg-grey">'+studentObj.name+'</label>';
					row.push(checkBox,addLabelTag(i), nameTd);
					var studentAttendance = studentAttendances(studentObj.attendance , index);
					studentAttendance = $.map(studentAttendance, function(el) { return el });
					row = row.concat(studentAttendance);
					dataSet.push(row);
					studentIds.push(parseInt(index));
					i++;
				});
				drawDataTable(cols, dataSet);
				addTableClasses();
			});
		});
		$('#mark-tab').removeClass('hidden');
	}
	function studentAttendances(absentDaysObj, studentId){
		// find all absent days array.
		attendancesArray[studentId] = [];
		var absentArray = absentDays(absentDaysObj);
		var attendances = [];
		for(var i=1;i<=daysInMonth.length;i++){ 
			if(attendanceDaysArray.indexOf(i)!= -1){
				if(absentArray.indexOf(i)==-1){
					var td = addLabelTag("P",studentId,i);
					td += hiddenSelectTag("P",studentId,i);
					attendances.push(td);	
					attendancesArray[studentId].push({"attendance":"P","date":i});
				}
				else{
					var td = addLabelTag("A",studentId,i);
					td += hiddenSelectTag("A",studentId,i);
					attendances.push(td);	
					attendancesArray[studentId].push({"attendance":"A","date":i});
				}
			}
			else
				attendances.push(addLabelTag("."));
		} 
		return attendances;
	}

	function absentDays(absentDaysObj){
		var days= [];
		$.each(absentDaysObj, function(index, attObj){
			var date = attObj.created_at;
			date = date.split(" ")[0];
			days.push(parseInt(date.slice(-2)));
		});		
		return days;
	}
	function attendancesDays(attendanceDaysObj){
		var days = [];
		$.each(attendanceDaysObj,function(index,day){
				days.push(parseInt((day.date).slice(-2)));
		});
		return days;
	}
	function checkedIds(){
		var ids = [];
		$.each(studentIds, function(index,studentId){
			var checked = $("#checkbox"+studentId).is(":checked")
			if(checked)
				ids.push(studentId);
		});
		return ids;
	}


	function editAttendance(){	
		var editIds = checkedIds();

		$.each(editIds, function(index,studentId){
			$.each(attendanceDaysArray, function(index,date){
				$("#s"+studentId+"d"+date).addClass("hidden");
				$("#dropdownS"+studentId+"D"+date).removeClass("hidden");
				$("#dropdownS"+studentId+"D"+date + " + .fa-caret-down" ).removeClass("hidden");				
			});
		});
	}

	var changedAttendance = [];	

	function updateChangedAttendances(studentId, date){

		if(!changedAttendance[studentId]){
			changedAttendance[studentId] = []			
		}
		if(changedAttendance[studentId][date])
		 	changedAttendance[studentId][date] = $("#dropdownS"+studentId+"D"+date).val();
		else{
			changedAttendance[studentId][date] = []
		 	changedAttendance[studentId][date] = $("#dropdownS"+studentId+"D"+date).val();
		}
	}

	function submitAttendance(){

		console.log(changedAttendance);		
		$.each(studentIds, function(index,studentId){
			if(changedAttendance[studentId]){
				$.each(changedAttendance[studentId], function(index,attendance){
					if(attendance){
						var date = index.toString();
						if(date.length==1)
							date = "0"+date;
						mm = mm.toString();
						if(mm.length==1)
							mm =  "0"+ mm;
						date = yyyy.toString() + "-" + mm + "-" + date;	
						var url = '?student_id=' + studentId+'&attendance='+attendance+'&date='+date;			 	 		
						$.get('/principal/create/attendance'+url , function(data) {

							//changed saved;							
						});	
					}
				});
			}
		});
		$("#successMsg").fadeIn(1000);
		$("#successMsg").fadeOut(3000);
	}

	function addTableClasses(){
		$('#example tr').css("margin-bottom", "5px");
		$('#example td').css({"padding":"0px 2px","background-color":"#ffffff" });
		$('#example th').css({"padding":"0px 2px"});
	
		$('#example th label').css({"border": "1px solid #E0E0E0","margin-top":"5px","padding": "8px 11px","width": "100%","text-align": "center"});
		$('#example td label').css({"border": "1px solid #E0E0E0","margin-top":"5px","padding": "8px 13px","width": "100%","text-align": "center"});
    	
    	$('#example td input[type=checkbox]').css({"margin": "13px 10px" ,"width": "20px","height": "20px"});
		$('#attendanceTable').removeClass('hidden');
	}
	function hiddenSelectTag(att,studentId,date){
		var attId="";
		if(date && studentId)
			attId = "dropdownS"+studentId+"D"+date;
		var selected = ["",""];	// for selecting current attendance as default.
		if(att=="P")
			selected[0] = "selected";
		else
			selected[1] = "selected";
		var selectHtml = '<select class="select-btn hidden" name="" id='+attId+ ' onchange="updateChangedAttendances('+studentId+","+ date+')">';
			selectHtml += '<option id = "" class="" value="P" ' + selected[0]+'> P </option>';
			selectHtml += '<option id = "" class="" value="A" ' + selected[1]+'> A </option>';
			selectHtml += '</select>'+' <i class="fa fa-caret-down hidden"></i>';
		return selectHtml;	
	}

	function addLabelTag(str,studentId,date){
		var attId="";
		if(date && studentId)
			attId = "s"+studentId+"d"+date;
		return '<label id='+attId+ '>'+ str + '</label>';
	}

	Morris.Line.prototype.setSeries = function(ykeys, labels,colors,data){
	    this.options.ykeys = ykeys;
	    this.options.labels = labels;
	    
	    this.options.colors = colors;
	    this.setData(data);
	};

	var data = []
	var colors = ["red","green","blue","black","yellow","brown"];
	var bChart;
	var isGraphCreated = false;
	function drawLine(){
		var config = {
				      data: data,
				      xkey: 'date',
				      ykeys: [],
				      fillOpacity: 0.6,
				      hideHover: 'auto',
				      behaveLikeLine: true,
				      resize: true,
				      pointFillColors:['#ffffff'],
				      pointStrokeColors: ['black'],
				      labels: [],
				      colors:[]
	  	};
		config.element = 'class-chart';
		for(var i=0;i<graphGrade.length;i++){
			config.ykeys.push(graphGrade[i]);
			config.labels.push(graphGrade[i]);
			config.colors.push(colors[(parseInt(graphGrade[i]))%6]);
		}

		if(bChart){
		    bChart.setSeries(config.ykeys,config.labels,config.colors,data);
		}
		else{
			bChart = Morris.Line(config);
		}
	}

	var graphGrade = [];
	var totalDays = 30;

	function addGradeToGraph(){
		grad = $("#graphGrade").val();
		if($.inArray(grad , graphGrade) == -1)
		{
			graphGrade.push(grad); 
			$.get("/principal/attendance-analysis?gra_id="+grad+"&days="+totalDays, function(resp){					
				
				if(data.length){
					$.each(resp,function(index,att){
						data[index][grad] = att[grad];
					});					
				}
				else
					data = resp;		 
				drawLine();
			});
		}
	}

	function todaysAttendance(){
		$("#todayBtn").addClass("active");
		$("#weekBtn").removeClass("active");
		$("#monthBtn").removeClass("active");
		totalDays = 1;
		data = [];
		graphGrade = [];

		addGradeToGraph();
	}
	function weeksAttendance(){
		$("#todayBtn").removeClass("active");
		$("#weekBtn").addClass("active");
		$("#monthBtn").removeClass("active");
		totalDays = 7;
		data = [];
		graphGrade = [];
		addGradeToGraph();
		// $("#gradeMarkSelect").val($("#gradeMarkSelect option:first").val());
	}
	function monthsAttendance(){
		$("#todayBtn").removeClass("active");
		$("#weekBtn").removeClass("active");
		$("#monthBtn").addClass("active");
		totalDays = 30;
		data = [];
		graphGrade = [];
		addGradeToGraph();
	}	 
</script>
 
@endsection