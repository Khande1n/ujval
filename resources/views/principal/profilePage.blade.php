@extends('layouts.pages')

<!-- PAGE CONTENT -->
@section('content')
            
                
                <!-- START BREADCRUMB -->
                <!-- <ul class="breadcrumb">
                    <li><a href="/principal/dashboard">Home</a></li>
                    <li class="active">Profile</li>
                </ul> -->
                <!-- END BREADCRUMB -->                                                
                
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span> Edit Profile</h2>
                </div>
                <!-- END PAGE TITLE -->                     
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">                        
                        <div class="col-md-3 col-sm-4 col-xs-5">
                            
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">                                
                                <div class="panel-body">
                                    <h3><span class="fa fa-user"> NAME USER</span></h3>
                                    <p>ROLE USER</p>
                                    <div class="text-center" id="user_image">
                                        <img src="../assets/images/users/user2.jpg" class="img-thumbnail"/>
                                    </div>                                    
                                </div>
                                <div class="panel-body form-group-separated">
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
                                            <a href="#" class="btn btn-primary btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_photo">Change Photo</a>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">#ID</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="" class="form-control" disabled/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Login</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="USER NAME" class="form-control"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">E-mail</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="USER EMAIL" class="form-control"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
                                            <a href="#" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password">Change password</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            </form>
                            
                        </div>
                        <div class="col-md-6 col-sm-8 col-xs-7">
                            
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Profile</h3>
                                    <p>This information is about the user.</p>
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="User Name" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Address Line 1</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="" placeholder="Address Line 1" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Address Line 2</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="" placeholder="Address Line 2" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Street</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="" placeholder="Street Name" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">City</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="" placeholder="City" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">State</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="" placeholder="State" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Country</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="" placeholder="Country" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-xs-5">
                                            <button type="submit"  class="btn btn-primary btn-rounded pull-right">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            
                            <!-- <div class="panel panel-default tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">Contacts</a></li>
                                    <li><a href="#tab2" data-toggle="tab">Send Message</a></li>                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane panel-body active" id="tab1">                                                                                
                                        
                                        <div class="list-group list-group-contacts border-bottom">
                                            <a href="#" class="list-group-item">            
                                                <div class="list-group-status status-online"></div>
                                                <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali">
                                                <span class="contacts-title">Nadia Ali</span>
                                                <p>Singer-Songwriter</p>                                    
                                                <div class="list-group-controls">
                                                    <button class="btn btn-primary btn-rounded"><span class="fa fa-pencil"></span></button>
                                                </div>                                    
                                            </a>                                                                
                                            <a href="#" class="list-group-item">                   
                                                <div class="list-group-status status-online"></div>
                                                <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk">
                                                <span class="contacts-title">Dmitry Ivaniuk</span>
                                                <p>Web Developer/Designer</p>                                    
                                                <div class="list-group-controls">
                                                    <button class="btn btn-primary btn-rounded"><span class="fa fa-pencil"></span></button>
                                                </div>                                    
                                            </a>
                                            <a href="#" class="list-group-item">                   
                                                <div class="list-group-status status-away"></div>
                                                <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe">
                                                <span class="contacts-title">John Doe</span>
                                                <p>UI/UX Designer</p>                     
                                                <div class="list-group-controls">
                                                    <button class="btn btn-primary btn-rounded"><span class="fa fa-pencil"></span></button>
                                                </div>
                                            </a>                                
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane panel-body" id="tab2">                                        
                                        <p>Feel free to contact us for any issues you might have with our products.</p>
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" placeholder="youremail@domain.com">
                                        </div>
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="email" class="form-control" placeholder="Message subject">
                                        </div>                                
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control" placeholder="Your message" rows="3"></textarea>
                                        </div>                                
                                    </div>                                                                        
                                    
                                </div>
                                
                            </div> -->

                        </div>
                        
                        <div class="col-md-3">
                            <div class="panel panel-default form-horizontal">
                                <div class="panel-body">
                                    <h3><span class="fa fa-info-circle"></span> Quick Info</h3>
                                    <p>Some quick info about this user</p>
                                </div>
                                <div class="panel-body form-group-separated">                                    
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Last visit</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">12:46 27.11.2015</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Registration</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">01:15 21.11.2015</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Groups</label>
                                        <div class="col-md-8 col-xs-7">administrators, managers, team-leaders, developers</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Birthday</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">14.02.1989</div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <!-- <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-cog"></span> Settings</h3>
                                    <p>Sample of settings block</p>
                                </div>
                                <div class="panel-body form-horizontal form-group-separated">                                    
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Notifications</label>
                                        <div class="col-md-6 col-xs-6">
                                            <label class="switch">
                                                <input type="checkbox" checked value="1"/>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Mailing</label>
                                        <div class="col-md-6 col-xs-6">
                                            <label class="switch">
                                                <input type="checkbox" checked value="1"/>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Priority</label>
                                        <div class="col-md-6 col-xs-6">
                                            <label class="switch">
                                                <input type="checkbox" value="0"/>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        
                    </div>
                    

                </div>
                <!-- END PAGE CONTENT WRAPPER -->   
                
        <!-- MODALS -->
        <div class="modal animated fadeIn" id="modal_change_photo" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Change photo</h4>
                    </div>                    
                    <form id="cp_crop" method="post" action="assets/crop_image.php">
                    <div class="modal-body">
                        <div class="text-center" id="cp_target">Use form below to upload file. Only .jpg files.</div>
                        <input type="hidden" name="cp_img_path" id="cp_img_path"/>
                        <input type="hidden" name="ic_x" id="ic_x"/>
                        <input type="hidden" name="ic_y" id="ic_y"/>
                        <input type="hidden" name="ic_w" id="ic_w"/>
                        <input type="hidden" name="ic_h" id="ic_h"/>                        
                    </div>                    
                    </form>
                    <form id="cp_upload" method="post" enctype="multipart/form-data" action="assets/upload_image.php">
                    <div class="modal-body form-horizontal form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 control-label">New Photo</label>
                            <div class="col-md-4">
                                <input type="file" class="fileinput btn-info" name="file" id="cp_photo" data-filename-placement="inside" title="Select file"/>
                            </div>                            
                        </div>                        
                    </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success disabled" id="cp_accept">Accept</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal animated fadeIn" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                	<div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Change password</h4>
                    </div>
                    <div class="modal-body">
                    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus, est quis molestie tincidunt</p>
                    </div>
                    
                    <form action="/password-reset" method="post" class="form-horizontal">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body form-horizontal form-group-separated">                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">Your Email ID</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="password">Old Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="password">New Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="password_confirmation">Repeat New</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation""/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" >Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>        
        <!-- EOF MODALS -->    

@endsection
