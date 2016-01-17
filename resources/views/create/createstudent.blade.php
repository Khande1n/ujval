<div class="x-content">
	<div id="student-tab">
		<div class="x-content-title">
			<h1> Create Student</h1>
		</div>

		<!-- FORM DETAILS -->

		<div class="panel panel-default">
			<div class="panel-body">
				<h6>Please fill the details below</h6>
				<form class="form-horizontal" role="form" method="POST" action="/principal/create/student">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- FORM FIELD 1 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Name</label>
						<div class="col-md-5">
							<input type="text" class="form-control" value="" name="student" placeholder="Student Name" required>
						</div>
					</div>

					<!-- FORM FIELD 2 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Birthday</label>
						<div class="col-md-5">
							<div class="input-group">
								<input type="text" id="dp-4" class="form-control datepicker" name="bday" value="2016-01-01" required>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
						</div>
					</div>

					<!-- FORM FIELD 3 -->

					<div class="form-group">
						<label class="col-md-3 control-label" name="gender">Gender</label>
						<div class="col-md-2">
							<select class="form-control select" name="gender">
								<option selected>Male</option>
								<option>Female</option>
							</select>
						</div>
					</div>

					<!-- FORM FIELD 4 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Email</label>
						<div class="col-md-5">
							<input type="email" class="form-control" value="" name="email" placeholder="Enter your valid email id" required>
						</div>
					</div>

					<!-- FORM FIELD 5 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Contact</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="contact11" value="" maxlength="10" placeholder="Enter your 10 digit mobile number" required>
						</div>
					</div>

					<!-- FORM FIELD 6 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Father Name</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="guardian1" value="" placeholder="Father's Name">
						</div>
					</div>

					<!-- FORM FIELD 7 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Mother Name</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="guardian2" value="" placeholder="Mother's Name">
						</div>
					</div>

					<!-- FORM FIELD 8 -->

					<div class="form-group">
						<label class="col-md-3 control-label" name="parentemail">Parent's Email</label>
						<div class="col-md-5">
							<input type="email" class="form-control" name="parentemail" value="" placeholder="Enter parent's valid email id">
						</div>
					</div>

					<!-- FORM FIELD 9 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Address</label>
						<div class="col-md-5">
							<input type="text" class="form-control" value="" name="std_add1" placeholder="Address Line 1">
							<input type="text" class="form-control" value="" name="std_add2" placeholder="Address Line 2">
							<input type="text" class="form-control" value=""name="std_street" placeholder="Street">
							<input type="number" class="form-control" value="" name="std_pincode" placeholder="Pincode">
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

					<!-- FORM FIELD 11 -->

					<!-- <div class="form-group"> -->
					<input type="hidden" class="form-control" name="password"  value="password123" required>
					<!-- </div> -->
					

					<!-- FORM FIELD 'SAVE'-->

					<div class="panel-footer">
						<button class="btn btn-primary pull-right" name="Save" type="submit" value="Save">
							Save
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
