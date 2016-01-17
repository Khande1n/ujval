 <div class="x-content">
	<div id="subject-tab">
		<div class="x-content-title">
			<h1> Create Subject</h1>
		</div>

		<!-- FORM DETAILS -->

		<div class="panel panel-default">
			<div class="panel-body">
				<h6>Please fill the details below</h6>
				<form class="form-horizontal" role="form" method="POST" action="/principal/create/subject">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- FORM FIELD 1 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Subject Name</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="subject"  value="" placeholder="Subject Name" required>
						</div>
					</div>

					<!-- FORM FIELD 2 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Assign Class</label>
						<div class="col-md-2">
							<select class="form-control select" name="grade_id" id="grade_id">
                            	@foreach($gradelists as $grade)
									<option value="{{ $grade->id }}">{{ $grade->grade }}.{{ $grade->grade_section }}</option>
								@endforeach
                       		</select>
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
