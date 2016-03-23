<div class="x-content">
	<div id="mark-tab">
		<div class="x-content-title">
			<h1> Class:  </h1>
		</div>

		<!-- FORM DETAILS -->

		<div class="panel panel-default">
			<div class="panel-body">
				<h6>Please fill the details below</h6>
				<form role="form" class="form-horizontal">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					 
				</form>
			</div>
		</div> 				 
	</div>
</div>
@section('graphscript')
<script>
	var path = window.location.pathname.split('/');
	var classId = path[path.length -1];
	$.get('/principal/create/classroom/'+classId, function(data) {
		console.log(data);
	});
</script>

<!-- DASHBOARD ACADEMICS -->

@endsection
