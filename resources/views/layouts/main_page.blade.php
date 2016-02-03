<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        
        @yield('title')
                   
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf_token" content="{{ csrf_token() }}" />
        <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
        
        <!-- SELECT TAGS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />

        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{asset('css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE -->                                  
    </head>
 
 	@yield('login_lock_register')
 	
 	<!-- LAYOUTS.PAGES -->
 	@yield('nav_content') 
 	
 	<!-- pages.blade.php -->
 	
 	
         <!-- START PRELOADS -->
        <audio id="audio-alert" src="{{asset('audio/alert.mp3')}}" preload="auto"></audio>
        <audio id="audio-fail" src="{{asset('audio/fail.mp3')}}" preload="auto"></audio>
        <!-- END PRELOADS -->             
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{asset('js/plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/bootstrap/bootstrap.min.js')}}"></script>                
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src="{{asset('js/plugins/icheck/icheck.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/bootstrap/bootstrap-timepicker.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/bootstrap/bootstrap-colorpicker.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/bootstrap/bootstrap-select.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>
        <!-- END THIS PAGE PLUGINS -->       
        
        <!-- START THIS PAGE PLUGINS-->        
    
     	<script type="text/javascript" src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
     	<script type="text/javascript" src="{{asset('js/plugins/tableexport/tableExport.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/plugins/tableexport/jquery.base64.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/plugins/tableexport/html2canvas.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/libs/sprintf.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/jspdf.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/plugins/tableexport/jspdf/libs/base64.js')}}"></script>        
        <!-- END THIS PAGE PLUGINS--> 
        
       <!-- START THIS PAGE PLUGINS-->        
        <script type="text/javascript" src="{{asset('js/plugins/summernote/summernote.js')}}"></script>    
        <!-- END THIS PAGE PLUGINS-->  
        
        
		<!-- TAG SELECT -->
      	<!-- <script src="http://code.jquery.com/jquery.js"></script> -->
      	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    	<!-- END TAG SCRIPTS --> 
    
    	@yield('selectscript') 
    	@yield('createuserscript')
    	@yield('createstudentscript')
    	@yield('createExamScript')
    	@yield('selectMarkScript')
 
    	<!-- GRAPH ATTENDANCE SCRIPT -->
    	@yield('graphscript')     
    	<!-- GRAPH ATTENDANCE SCRIPT --> 
        
   
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{asset('js/settings.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{asset('js/actions.js')}}"></script> 
        <script type="text/javascript" src="{{asset('js/demo_charts_morris.js')}}"></script>       
        <!-- END TEMPLATE -->

        <script>
            $(function(){
                //Spinner
                $(".spinner_default").spinner()
                $(".spinner_decimal").spinner({step: 0.01, numberFormat: "n"});                
                //End spinner
                
                //Datepicker
                $('#dp-2').datepicker();
                $('#dp-3').datepicker({startView: 2});
                $('#dp-4').datepicker({startView: 1});                
                //End Datepicker
            });
        </script>
     
        <script>
        	$('.dropdown-menu a').on('click', function(){    
    			$(this).parent().parent().prev().html($(this).html() + '<span class="caret"></span>');    
			});
        </script>
                        
    </body>
</html>






