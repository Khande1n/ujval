<div class="x-content">
	<div id="subject-tab">
		<div class="x-content-title">
			<h1> Create Subject</h1>
		</div>

		<!-- FORM DETAILS -->

		<div class="panel panel-default">
			<div class="panel-body">
				<h6>Please fill the details below</h6>
				<form class="form-horizontal" role="form" method="POST" action="/principal/update/subject/{id}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- FORM FIELD 1 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Subject Name</label>
						<div class="col-md-3">
							<select class="form-control js-example-basic-single" name="subject" id="subjectSelect" placeholder="Subject Name">
								@foreach($subjectDB as $k=>$subject)
								<option value="{{ $subject['id'] }}">{{ $subject['subject'] }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<!-- FORM FIELD 2 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Assign Class</label>
						<div class="col-md-3">
							<select class="form-control js-example-basic-multiple" multiple="multiple" name="grade_id[]" id="grade_id">
								@foreach($gradelists as $grade)
								<option value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<!-- FORM FIELD 'SAVE'-->

					<div class="panel-footer">
						<button class="btn btn-primary pull-right" type="submit" value="submit">
							Update
						</button>
					</div>
				</form>
			</div>
		</div>

		<!-- FORM DETAILS -->

		<div class="panel panel-default">
			<div class="panel-body">
				<h6>If required subject not available, please create one</h6>
				<form class="form-horizontal" role="form" method="POST" action="/principal/create/subject">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- FORM FIELD 1 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Subject Name</label>
						<div class="col-md-3">
							<select class="form-control js-example-basic-single" name="subjectCreate" id="subjectCreate" placeholder="eg. Hindi 510">
								@foreach($subjectDB as $k=>$subject)
								<option value="{{ $subject['id'] }}">{{ $subject['subject'] }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<!-- FORM FIELD 'SAVE'-->

					<div class="panel-footer">
						<button class="btn btn-primary pull-right" type="submit" value="submit">
							Save
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@section('selectscript')
<script>$('#subjectSelect').select2();</script>


<script>
	$('#grade_id').select2({
		placeholder : 'Choose Grades'
	}); 
</script>
<script>
	$('#subjectCreate').select2({
		tags: true
	});
</script>
@endsection

