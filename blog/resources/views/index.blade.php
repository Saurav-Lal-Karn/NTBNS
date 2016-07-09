@extends('layout')
@extends('menubar')
@extends('footer')
@section('content')
	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Home</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Gallery</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      Add content to the page ...
                  </div>
                </div>
              </div>
            </div>



            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Recent Events</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>We celebrated following events recently</p>
                    
                    <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                            <div class="mask">
                              <p>Title</p>
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-download"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p>Detail of the event</p>
                          </div>
                        </div>
                      </div>
                    
                   

                  </div>
                </div>
              </div>


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Meet Our Team</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
  
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Post</i></h4>
                            <div class="left col-xs-7">
                              <h2>Name</h2>
                              <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                    
                  </div>
                </div>
              </div>




             <div class="col-md-6 col-sm-6 col-xs-12 pull-right">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Recent Notices</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Following Notices has been updated recently</p>
                    <ul class="list-unstyled msg_list">
                    <li>
                      <a>
                        <span class="image">
                          <img src="images/img.jpg" alt="img" />
                        </span>
                        <span>
                          <span>John Smith</span>
                          <span><i class = "fa fa-download"></i></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that
                        </span>
                      </a>
                    </li>
                    </ul>

                  </div>
                </div>
              </div>




              <div class="col-md-6 col-sm-6 col-xs-12 pull-right">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Recent Downloads</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Following files have been added to downloads recently</p>
                    
                    <ul class="list-unstyled msg_list">
                    <li>
                      <a>
                        <span class="image">
                          <img src="images/img.jpg" alt="img" />
                        </span>
                        <span>
                          <span>John Smith</span>
                          <span><i class = "fa fa-download"></i></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that
                        </span>
                      </a>
                    </li>
                    </ul>


                  </div>
                </div>
              </div>



          </div>
        </div> 
@endsection