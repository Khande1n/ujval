                    <div class="x-content"> 
                        <div id="exam-tab">
                            <div class="x-content-title">
                                <h1> Create Test</h1>
                            </div>
                            
                            <!-- FORM DETAILS -->
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h6>Please fill the details below</h6>                        
                                    <form class="form-horizontal" role="form" method="POST" action="/principal/create/exam">
                                    	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                    	
                                    	<!-- FORM FIELD 1 -->
                                    	                                   
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="exam">Exam Name</label>
                                            <div class="col-md-2">
                                                <select class="form-control select" name="exam">
                                                    <option>FAI</option>
                                                    <option>FAII</option>
                                                    <option>SAI</option>
                                                    <option selected>FAIII</option>
                                                    <option>FAIV</option>
                                                    <option>SAII</option>
                                                </select>
											</div>
                                        </div>
                                        
                                        <!-- FORM FIELD 2 -->
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="sub_name_first">Assign Subject</label>
                                            <div class="col-md-2">
                                                <select class="form-control select" name="sub_name_first">
                                                    <option>Hindi</option>
                                                    <option>Maths</option>
                                                    <option selected>Social Science</option>
                                                    <option>Sanskrit</option>
                                                    <option>Physics</option>
                                                    <option>Chemistry</option>
                                                    <option>English</option>
                                                    <option>Biology</option>
                                                    <option>Environmental Science</option>
                                                    <option>Physcial Education</option>
                                                    <option>Computer Science</option>
                                                    <option>History</option>
                                                    <option>Civics</option>
                                                    <option>Geography</option>
                                                    <option>Accountancy</option>
                                                    <option>Economics</option>
                                                    <option>Business Studies</option>
                                                </select>
											</div>
										</div>
								
                                        
                                        
                                        <!-- FORM FIELD 3 -->
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="exam_date">Exam Date</label>
                                            <div class="col-md-5">
                                            	<div class="input-group">
                                                    <input type="text" id="dp-2" class="form-control datepicker" name="exam_date" value="2013-02-01" required>
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                       <!-- FORM FIELD 4 -->
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="exam_duration">Exam Duration</label>
                                            <div class="col-md-5">
                                            	<div class="input-group">
                                                    <input type="text" id="dp-2" class="form-control datepicker" name="exam_duration" value="2013-02-01" required>
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <!-- FORM FIELD 5 -->
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Maximum Marks</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="max_marks" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <!-- FORM FIELD 6 -->
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pass Marks</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="pass_marks" value="" placeholder="" required>
                                            </div>
                                        </div>
                                        
 
                                        <!-- FORM FIELD 'SAVE'-->
                                        
                                        <div class="panel-footer">
                                    		<button class="btn btn-primary pull-right" type="submit" value"Save">Save</button>
                                		</div>
                                    </form>
                                </div>
                            </div>  
                        </div>
                    </div>    