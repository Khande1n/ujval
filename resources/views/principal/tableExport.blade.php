				    <div class="x-content-title">
                        <h1>Student List</h1>
                        @include('exports.export')
                    </div>		
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="customers2" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Grade</th>
                                                    <th>Contact</th>
                                                    <th>Birthday</th>
                                                    <th>Email</th>
                                                    <th>Guardian</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($students as $student){
                                                	<tr>
                                                	<th><a href="/principal/dashboard/{{$student->id}}"> {{ $student->student }} </a></th>
                                                	<th>{{ $student->grade }}</th>
                                                	<th>{{ $student->contact11 }}</th>
                                                	<th>{{ $student->bday }}</th>
                                                	<th>{{ $student->email }}</th>
                                                	<th>{{ $student->guardian1 }}</th>
                                                	</tr>
                                  				}
                                  				 @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>                                            
                            <!-- END DATATABLE EXPORT -->                            
                    





