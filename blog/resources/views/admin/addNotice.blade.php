@extends('admin.layout')
@extends('admin.header')
@extends('admin.menubar')
@extends('admin.footer')
@section('content')
	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
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
                    <h2>Add Notice</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="addNotice" enctype="multipart/form-data">
                     
                     {!! csrf_field() !!}

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="title" class="form-control col-md-7 col-xs-12" name="title" required>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="message" class ="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="desc"  class="form-control col-md-7 col-xs-12" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="250" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long description.."
                            data-parsley-validation-threshold="10"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Source(max 1 mb)</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="source" name="source" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <a href="index"><button class="btn btn-primary">Cancel</button></a>
                        </div>
                      </div>

                    </form>      
                  </div>
                </div>
              </div>
            </div>


         


          </div>
        </div> 
@endsection