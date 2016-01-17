 <div class="x-content">
	<div id="grade-tab">
		<div class="x-content-title">
			<h1> Create Grade</h1>
		</div>

		<!-- FORM DETAILS -->

		<div class="panel panel-default">
			<div class="panel-body">
				<h6>Please fill the details below</h6>
				<form class="form-horizontal" role="form" method="POST" action="/principal/create/grade">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- FORM FIELD 1 -->
  					<div class="form-group">
						<label class="col-md-3 control-label" name="grade">Select Class</label>
						<div class="col-md-2">
							<select class="form-control select" name="grade">
								<option>I</option>
								<option>II</option>
								<option>III</option>
								<option>IV</option>
								<option>V</option>
								<option>VI</option>
								<option>VII</option>
								<option>VIII</option>
								<option>IX</option>
								<option>X</option>
								<option>XI</option>
								<option>XII</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" name="grade_section">Select Section</label>
						<div class="col-md-2">
							<select class="form-control select" name="grade_section">
								<option>A</option>
								<option>B</option>
								<option>C</option>
								<option>D</option>
								<option>E</option>
								<option>F</option>
								<option>G</option>
								<option>H</option>
								<option>I</option>
								<option>J</option>
								<option>K</option>
								<option>L</option>
								<option>M</option>
								<option>N</option>
								<option>O</option>
								<option>P</option>
								<option>Q</option>
								<option>R</option>
								<option>S</option>
								<option>T</option>
								<option>U</option>
								<option>V</option>
								<option>W</option>
								<option>X</option>
								<option>Y</option>
								<option>Z</option>
							</select>
						</div>
					</div>
					
					<!-- FORM FIELD 2 -->

					<div class="form-group">
						<input type="hidden" class="form-control" name="school_id"  value="{{$schoolId}}" required>
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
