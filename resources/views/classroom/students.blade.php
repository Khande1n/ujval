
<div class="x-content">
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
					 <input class="btn btn-primary search-all m-t-md" onclick="showClass()" value="Search" type="button"/>
			 	</div>
				 
			</form>
		</div>
	</div> 
	<div id="mark-tab"  >
		<div class="x-content-title">
			<h1> Class:<span id="className"></span></h1>
		</div>

		<!-- FORM DETAILS -->

		<div class="panel panel-default">
			<div class="panel-body">
				<h6>All students</h6>
					<div class="x-chart-widget-content">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="table-responsive" id="studentTable">						
									<table id="example" class="table datatable" width="100%"></table>
								</div>
							</div>
						</div> 
					</div> 
			</div>
		</div> 				 
	</div>
</div>
@section('graphscript')
<script>
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
	function drawDataTable(columns, data) {
		$('#example').DataTable().destroy();
		$('#example').empty();
	    var oTable = $('#example').dataTable({
	        data: data,
	        columns:columns
	    });
	}

	function showClass(){
		dataSet = [];
		cols = [];
		$('#mark-tab').addClass('hidden');
		gra_id = $('#gradeMarkSelect').val();
		$.get('/principal/grade/' + gra_id, function(data) {
			var grade = JSON.parse(data);
			$('#className').html(" " + grade.grade + grade.grade_section);
		});
		$.get('/principal/create/classroom/'+gra_id, function(data){
			cols = [ {title: "Name"},
						 {title: "Guardian"}
					   ];			
			$.each(JSON.parse(data)[0].exams, function(index, examObj) {
				cols.push({
					title: examObj.exam + " (" + examObj.subject + ")"
				});
			});
			cols.push({title:"MarkSheet"});
			$.each(JSON.parse(data), function(index, studentObj) {
				var studentInfo = [];
				studentInfo.push(studentObj.student,studentObj.guardian1);
				$.each(studentObj.exams, function(index, examObj) {
					studentInfo.push(examObj.obt_marks);
				});
				exportBtn = '<button class="btn btn-info search-all"> <a target="_"href="marksheet?grad_id='+gra_id+'&student_id='+studentObj.id+'"> Export</a></button>';
				studentInfo.push(exportBtn);
				dataSet.push(studentInfo);
			});
			drawDataTable(cols, dataSet);
		});
		$('#mark-tab').removeClass('hidden');
	}


</script>

<!-- DASHBOARD ACADEMICS -->

@endsection
