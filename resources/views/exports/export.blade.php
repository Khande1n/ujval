

<div class="btn-group pull-right">
	<button class="btn btn-default dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">EXPORT</button>
    	<ul class="dropdown-menu">
        	<li class="divider"></li>
            <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='../img/icons/csv.png' width="24"/> CSV</a></li>
            <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='../img/icons/txt.png' width="24"/> TXT</a></li>
            <li class="divider"></li>
            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='../img/icons/xls.png' width="24"/> XLS</a></li>
            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='../img/icons/word.png' width="24"/> Word</a></li>
            <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='../img/icons/ppt.png' width="24"/> PowerPoint</a></li>
            <li class="divider"></li>
            <li><a href="#" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='../img/icons/png.png' width="24"/> PNG</a></li>
            <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='../img/icons/pdf.png' width="24"/> PDF</a></li>
        </ul>
    <button class="btn btn-default">TODAY: {{$nowTime}}</button>
</div>