@extends('layout')
@extends('menubar')
@extends('footer')
@section('content')
	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Find Us</h3>
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
                    <h3>Contact Us</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12" style="text-align:center;">
                        <i class ="fa fa-phone"></i>
                        @foreach($contacts as $contact)
                          @if($contact->category == 'Contact Number')
                            </br>
                            <span>{{ $contact->contact }}</span>
                          @endif
                        @endforeach
                        
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12" style="text-align:center;">
                        <i class ="fa fa-envelope"></i>
                          
                          @foreach($contacts as $contact)
                            @if($contact->category == 'Email')
                              </br>
                              <span>{{ $contact->contact }}</span>
                            @endif
                        @endforeach

                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12" style="text-align:center;">
                        <i class ="fa fa-map-marker"></i>
                        
                        @foreach($contacts as $contact)
                          @if($contact->category == 'Address')
                            </br>
                            <span>{{ $contact->contact }}</span>
                          @endif
                        @endforeach

                      </div>
                    </div>    
                  </div>
                </div>
              </div>

              <div class = "col-md-6 col-sm-6 col-xs-12">
               <div class="x_panel">
                  <div class="x_title">
                    <h2>leave us a message </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate>
                      <label for="fullname">Full Name</label>
                      <input type="text" id="fullname" class="form-control" name="fullname" required />

                      <label for="email">Email</label>
                      <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />

                      

                        
                          <label for="message">Message (20 chars min, 100 max)</label>
                          <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"></textarea>

                          <br/>
                          <span class="btn btn-primary">Message Us</span>

                    </form>
                    <!-- end form for validations -->

                  </div>
                </div>

                </div>

                <div class = "col-md-6 col-sm-6 col-xs-12">
               <div class="x_panel">
                  <div class="x_title">
                    <h2>Find us in map</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate>
                      <label for="fullname">Full Name</label>
                      <input type="text" id="fullname" class="form-control" name="fullname" required />

                      <label for="email">Email</label>
                      <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />

                      

                        
                          <label for="message">Message (20 chars min, 100 max)</label>
                          <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"></textarea>

                          <br/>
                          <span class="btn btn-primary">Message Us</span>

                    </form>
                    <!-- end form for validations -->

                  </div>
                </div>
            </div>



              </div>
            </div>
          </div>
        </div> 
@endsection