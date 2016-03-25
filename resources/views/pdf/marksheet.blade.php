<style type="text/css">
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
	.bd-lg-green{border:5px solid green;}
	.bd-default{border: 1px solid green;}
	.bd-none{border: none;}
	.wrapper{padding: 15px;}
	td{padding-left:5px; }
	.col-1,.col-4{float:left;}
	.col-1 p,.col-4 p{min-height: 24px; }
	.m-l-xl{margin-left:40px;}
	.m-t-lg{margin-left:30px;}
	.m-t-md{margin-top:20px!important;}	
	.ucase{text-transform: uppercase;}
	.bold{font-weight: 700;}
	.pull-left{float: left;}
	.pull-right{float: right;}
</style>
 
<div class="row">
    <div class="center">
    <h4 class="text-success"> 1st Semester Gradesheet
    </h4>
 <!--    <div class = "wrapper m-l-xl m-t-lg marksheet">
	    <div class="col-3"><p class="bold ucase bd-default">name</p></div>
	     
	    <div class="col-3 "><p class="bd-default">Class-2</p></div>
	    <div class="col-1"><p class="bd-default">Roll NO</p></div>
	    
    </div>
 -->

	 <div class = "wrapper m-l-xl m-t-lg marksheet">
 	 	<table style="width:100%" class="m-t-md">
	 		<tr>
	 			<td>
				 <table style="width:100%">
				  <tr>
				    <td class="col-4 bd-default">Jill</td> 		
				    <td class="col-1"></td>
				    <td class="col-4"></td> 		
				    <td class="col-1 bd-default">50</td>

				  </tr>		  
				   
				</table>	 				
 			</td>
 		</tr>
		</table>	
	 	<table style="width:100%" class="m-t-md">
	 		<tr>
	 			<td>
					 <table style="width:100%">
					  <tr>
					    <td class="col-4 bd-default">Jill</td> 		
					    <td class="col-1 bd-default">50</td>
					  </tr>		  
					  <tr>
					    <td>John</td> 
					    <td>80</td>
					  </tr>
					</table>	 				
	 			</td>

	 			<td>
				 <table  style="width:100%">
				  <tr>
				    <td class="col-4 bd-default">Jill</td> 	
				    <td class="col-1 bd-default">50</td>
				  </tr>
				  <tr>
				    <td>Eve</td> 
				    <td>94</td>
				  </tr>
				  <tr>
				    <td>John</td> 		
				    <td>80</td>
				  </tr>
				</table> 
	 				
	 			</td>
	 		</tr>
	 	</table>
 
	</div>

    </div>
</div>