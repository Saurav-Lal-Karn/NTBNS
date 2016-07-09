@extends('layout')
@extends('menubar')
@extends('footer')
@section('content')
	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Notices</h3>
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
                  <h2>Notices</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <ul class="list-unstyled msg_list">
                    <li>
                        
                      <a>
                        <span class="image">
                          <img src="images/img.jpg" alt="img" />
                        </span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                          <span><i class = "fa fa-download"></i> </span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that
                        </span> 
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image">
                          <img src="images/img.jpg" alt="img" />
                        </span>
                        <span>
                          <span>John Smith</span>
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
@endsection