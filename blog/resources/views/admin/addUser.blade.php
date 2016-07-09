@extends('admin.layout')
@extends('admin.header')
@extends('admin.menubar')
@extends('admin.footer')
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
                    <h2>Create Admin user</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="addUser">
                     
                     {!! csrf_field() !!}

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="firstName">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="lastName" required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email Address</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="email" name="email" required>
                        </div>
                      </div>
                      
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Batch</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" name="batch">
                            <option value="050">050</option>
                            <option value="051">051</option>
                            <option value="052">052</option>
                            <option value="053">053</option>
                            <option value="053">054</option>
                            <option value="055">055</option>
                            <option value="056">056</option>
                            <option value="057">057</option>
                            <option value="058">058</option>
                            <option value="059">059</option>
                            <option value="060">060</option>
                            <option value="061">061</option>
                            <option value="062">062</option>
                            <option value="063">063</option>
                            <option value="064">064</option>
                            <option value="065">065</option>
                            <option value="066">066</option>
                            <option value="067">067</option>
                            <option value="068">068</option>
                            <option value="069">069</option>
                            <option value="070">070</option>
                            <option value="071">071</option>
                            <option value="072">072</option>
                            <option value="073">073</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Faculty</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" name="faculty">
                            <option value="1">Architecture</option>
                            <option value="2">Civil</option>
                            <option value="3">Computer</option>
                            <option value="4">Electrical</option>
                            <option value="5">Electronics</option>
                            <option value="6">Mechanical</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="rollNo" class="control-label col-md-3 col-sm-3 col-xs-12">Roll No.</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="roll-no" class="form-control col-md-7 col-xs-12" type="number" name="rollNo" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" class="form-control col-md-7 col-xs-12" type="password" name="password" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="rePassword" class="control-label col-md-3 col-sm-3 col-xs-12">Re-Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="rePassword" class="form-control col-md-7 col-xs-12" type="password" name="rePassword" required>
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