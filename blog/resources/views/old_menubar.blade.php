@section('menubar')
<nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class= "row">
            <div class = "col-md-1 col-xs-1">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.html">NTBNS</a>
                </div>
            </div>
            <div class = "col-md-5 col-xs-5">
             <div id="navbar" class="navbar-collapse collapse">
              <form class="navbar-form">
                <div class="form-group">
                  <input type="text" placeholder="Search NTBNS" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Search</button>
              </form>
            </div><!--/.navbar-collapse -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class = "col-md-6 col-xs-6">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="/" class="page-scroll">Home</a></li>
                    <li><a href="#" class="page-scroll">About Us</a></li>
                    <li><a href="members" class="page-scroll">Members</a></li>
                    <li><a href="notices" class="page-scroll">Notices</a></li>
                    <li><a href="downloads" class="page-scroll">Downloads</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container-fluid -->
  	</div>
</nav>

@endsection