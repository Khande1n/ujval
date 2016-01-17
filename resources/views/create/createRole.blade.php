<div class="x-content">
	<div id="role-tab">
    	<div class="x-content-title">
        	<h1> Create Roles</h1>
        </div>
                            
<!-- FORM DETAILS -->
                            
        <div class="panel panel-default">
			<div class="panel-body">
				<h6>Please fill the details below</h6>
				<form class="form-horizontal" role="form" method="POST" action="/principal/create/role">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- FORM FIELD 1 -->

					<div class="form-group">
						<label class="col-md-3 control-label">Role</label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="role_name"  value="" placeholder="eg. Class Teacher" required>
						</div>
					</div>
					
					<!-- FORM FIELD 2 -->

					<div class="form-group">
						<input type="hidden" class="form-control" name="school_id"  value="{{Auth::user()->school_id}}" required>
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