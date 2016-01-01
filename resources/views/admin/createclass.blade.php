 @extends('layouts.main_page')					
 					
 					
 					<div class="x-content">
                        <div id="staff-tab">
                            <div class="x-content-title">
                                <h1> Create Class</h1>
                            </div>
                            
                            <!-- FORM DETAILS -->
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h6>Please fill the details below</h6>                        
                                    <form class="form-horizontal" role="form" method="POST" action="/admin/create/class">
                                    	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                    	
                                    	<!-- FORM FIELD 1 -->
                                    	                                   
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="grade">Grade</label>
                                            <div class="col-md-2">
                                                <select class="form-control select" name="grade" id="grade">
                                                    <option selected>I</option>
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
                                        
                                        <!-- FORM FIELD 2 -->
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="grade_section">Section</label>
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
                                        </div>
                                        
                                        <!-- FORM FIELD 3 -->
                                        
                                        <div class="form-group">
                                        	<label class="col-md-3 control-label"  for="school_id">Assign To</label>
                                            <div class="col-md-2">
                                                <select class="form-control select" name="school_id" id="school_id">
                                                    <option selected>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                </select>
											</div>
                                        </div>
                                        
                                        <!-- FORM FIELD 4 -->
                                        
                                        
                                        <div class="form-group">
                                        	<label class="col-md-3 control-label"  for="student_id">Assign Student</label>
                                            <div class="col-md-2">
                                                <select class="form-control select" name="student_id" id="student_id">
                                                    <option selected>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                </select>
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