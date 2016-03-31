<style type="text/css" href=""></style>
<style type="text/css">
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.googleapis.com/css?family=Source+Sans+Pro) format('truetype');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700) format('truetype');
}
	html, body, div, span, applet, object, iframe,
	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	a, abbr, acronym, address, big, cite, code,
	del, dfn, em, img, ins, kbd, q, s, samp,
	small, strike, strong, sub, sup, tt, var,
	b, u, i, center,
	dl, dt, dd, ol, ul, li,
	fieldset, form, label, legend,
	table, caption, tbody, tfoot, thead, tr, th, td,
	article, aside, canvas, details, embed, 
	figure, figcaption, footer, header, hgroup, 
	menu, nav, output, ruby, section, summary,
	time, mark, audio, video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline;
	}
	/* HTML5 display-role reset for older browsers */
	article, aside, details, figcaption, figure, 
	footer, header, hgroup, menu, nav, section {
		display: block;
	}
	body {
		line-height: 1;
	}
	ol, ul {
		list-style: none;
	}
	blockquote, q {
		quotes: none;
	}
	blockquote:before, blockquote:after,
	q:before, q:after {
		content: '';
		content: none;
	}
	table {
		border-collapse: collapse;
		border-spacing: 0;
	}
	.center{text-align:center;}
	.text-success{color: green;}
	.row{width: 100%;position: relative;}
	.marksheet{line-height: 1.2;} 
	/*tr td{border: 1px solid #000;}*/
	.col-4{width: 40%;}
	.col-1{width: 10%;} 
/*	.col-off-4{margin-left: 40%!important;}
	.col-off-1{margin-left: 10%!important;} 
	.col-off-5{margin-left: 50%!important;} 
	.col-off-9{margin-left: 90%!important;} 
*/
	.bd-lg-green{border:4px solid green;}
	.bd-default{border: 1px solid #000;}
	.bd-none{border: none;}
	.wrapper{padding: 15px;}
	.m-sm{margin:10px; }
	td{padding-left:5px;}
	.col-1,.col-4{float:left;}
	.col-1 p,.col-4 p{min-height: 24px; }
	.m-l-xl{margin-left:40px!important;}
	.m-l-lg{margin-left:30px!important;}
	.m-l-md{margin-left:20px!important;}
	.m-l-sm{margin-left:10px!important;}
	.m-l-xs{margin-left:5px!important;}
	.m-r-sm{margin-right:10px!important;}
	.m-t-xl{margin-top:40px!important;}
	.m-t-lg{margin-top:30px!important;}
	.m-t-md{margin-top:20px!important;}	
	.m-t-sm{margin-top:10px!important;}
	.m-t-xs{margin-top:5px!important;}
	.m-b-xl{margin-bottom:40px!important;}

	.text-sm{}
	.ucase{text-transform: uppercase;}
	.pull-left{float: left;}
	.pull-right{float: right;}
	.full-height{height: 1090px;}
</style>
 
<div class="row bd-lg-green m-sm full-height">
    <div class="center">
    <h4 class="text-success ucase m-t-md" style="font-weight:bold"> {{$student['school']}} <br>1st Semester Gradesheet
    </h4>
	 <div class = "m-l-sm m-r-sm m-t-xs marksheet">
 	 	<table style="width:100%">
	 		<tr>
	 			<td>
				 <table style="width:100%">
				  <tr>
				    <td class="col-4 bd-default text-bold">Name: {{$student['student']}}</td> 		
				    <td class="col-1"></td>
				    <td class="col-4 bd-default text-bold">Class: {{$student['grade']}} </td> 		
				    <td class="col-1 bd-default">R. No. {{$student['rollNumber']}} </td>

				  </tr>		  
				   
				</table>	 				
 			</td>
 		</tr>
		</table>	
	 	<table style="width:100%" class="m-t-md">
	 		<tr>
	 			<td>
					 <table style="width:100%" id="leftTable">
					  <tr>
					    <td class="col-4 bd-default">SUBJECTS</td> 		
					    <td class="col-1 bd-default">  </td>
					  </tr>
					  <tr>
					    <td class="col-4 bd-default"> </td> 		
					    <td class="col-1 bd-default"> </td>
					  </tr>	
					   <tr>
						    <td class="col-4 bd-default"><p style="opacity:0"> empty coln</p></td> 
						    <td class="col-1 bd-default"> </td>
					    </tr>
					    <?php $i=2; ?>
					  @foreach($student['subjects'] as $subj => $subjs)
							<tr>
							    <td class="col-4 bd-default ucase"> {{$subj}}</td> 
							    <td class="col-1 bd-default"></td>
						    </tr>
						    <?php $i++; ?>
						    @foreach($subjs['exams'] as $exam)
						    	<tr>
							    <td class="col-4 bd-default m-l-xs"> {{$exam['exam']}}</td> 
							    <td class="col-1 bd-default"> {{$exam['obt_grade']}} </td>
						   		</tr>
						   		<?php $i++; ?>
						    @endforeach
						    <tr>
							    <td class="col-4 bd-default"><p style="opacity:0"> empty coln</p></td> 
							    <td class="col-1 bd-default"> </td>
						    </tr>
						    <?php $i++; ?>
					  @endforeach  
					  
					</table>	 				
	 			</td>

	 			<td>
					 <table style="width:100%" id="rightTableHeader">
					  <tr>
					    <td class="col-4 bd-default">TALENT</td> 		
					    <td class="col-1 bd-default">  </td>
					  </tr>
					  <tr>
					    <td class="col-4 bd-default"> </td> 		
					    <td class="col-1 bd-default"> </td>
					  </tr>	
					   	<tr>
						    <td class="col-4 bd-default"><p style="opacity:0"> empty coln</p></td> 
						    <td class="col-1 bd-default"> </td>
					    </tr>
					   	  
					  
					</table>
					<table style="width:100%;" id="remarksTable">
					  <tr >
					    <td style="width:100%;height:{{($i-2)*20}}px;" class="bd-default"><p style="opacity:0;"> empty coln</p></td> 	
					  </tr>
					  <tr >
					    <td style="width:100%;" class="bd-default"></td> 	
					  </tr>
					    </tr>
					</table>						 				
	 			</td>
	 		</tr>
	 	</table>
 
 		<table style="width:100%" class="m-t-xl m-b-xl">
 			<tr>
 				<td class="col-4 ">Teacher</td>
 				<td class="col-1 ">Principal</td>
 				<td class="col-4 "></td>
 				<td class="col-1 ">Parents</td>
 				
 			</tr>
 		</table>
	</div>

    </div>
</div>
