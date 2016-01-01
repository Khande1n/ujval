 					<div class="x-content">
                        <div id="staff-tab">
                            <div class="x-content-title">
                                <h1> Create Staffs</h1>
                            </div>
                            
                            <!-- FORM DETAILS -->
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h6>Please fill the details below</h6>                        
                                    <form class="form-horizontal" role="form" method="POST" action="/principal/create/staff">
                                    	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                    	
                                    	<!-- FORM FIELD 1 -->
                                    	                                   
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Name</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="staff"  value="" placeholder="User Name" required>
                                            </div>
                                        </div>
                                        
                                        <!-- FORM FIELD 2 -->
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Birthday</label>
                                            <div class="col-md-5">
                                                <div class="input-group date">
                                                    <input type="text" id="dp-3" name="stf_bday" class="form-control" value="01/05/2010" required>
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- FORM FIELD 3 -->
                                        
                                        <div class="form-group">
                                        	<label class="col-md-3 control-label"  name="gender">Gender</label>
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
                                                <input type="text" class="form-control" value="" name="stf_contact1" maxlength="10" placeholder="Enter your 10 digit mobile number" required>
                                            </div>
                                        </div>
                                        
                                        <!-- FORM FIELD 6 -->
                                        
                                      	<div class="form-group">
                                      		<label class="col-md-3 control-label"  name="role">Assign Role</label>
                                            <div class="col-md-2">
                                                <select class="form-control select" name="role">
                                                    <option selected>SubjectTeacher</option>
                                                    <option>ClassTeacher</option>
                                                    <option>Guardian</option>
                                                    <option>Manager</option>
                                                </select>
											</div>
                                        </div>
                                        
                                        <!-- FORM FIELD 7 -->
                                        
                                        <!-- <div class="form-group">
                                            <label class="col-md-3 control-label"  name="grade_name">Assign Class</label>
                                            <div class="col-md-2">
                                                <select class="form-control select" name="grade_name">
                                                    <option>I</option>
                                                    <option>II</option>
                                                    <option>III</option>
                                                    <option selected>IV</option>
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
											<div class="col-md-2">
                                                <select class="form-control select" name="grade_section">
                                                    <option selected>A</option>
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
                                        </div> -->
                          
                                        
                                        <!-- FORM FIELD 8 -->
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Address</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" value="" name="stf_add1" placeholder="Address Line 1">
                                                <input type="text" class="form-control" value="" name="stf_add2" placeholder="Address Line 2">
                                                <input type="text" class="form-control" value="" name="stf_street" placeholder="Street">
                                                <input type="number" class="form-control" value="" name="stf_pincode" placeholder="Pincode">
                                            </div>
                                        </div>
                                        
                                        <!-- FORM FIELD 'SAVE'-->
                                        
                                        <div class="panel-footer">
                                    		<button class="btn btn-primary pull-right" type="submit" value="Save">Save</button>
                                		</div>
                                    </form>
                                </div>
                            </div>  
                        </div>