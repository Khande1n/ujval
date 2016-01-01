<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"> </span> Search
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <h1> Search For a Widget </h1>

                <hr/>

               @include('errors.errors')

                <form class="form-horizontal" role="form" method="POST" action="/widget/search">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Enter Widget Name </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="widget_name" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                           <button type="submit" class="btn btn-primary">
                               Search
                            </button>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


 </div>

 <br>
