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
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Notices</h2>
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

                    <p>List of notices with editing options</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Title</th>
                          <th>Description</th>
                          <th>Uploaded By</th>
                          <th>Status</th>
                          <th style="width: 20%">#Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                        

                      @foreach($notices as $notice)
                        <tr>
                          <td>#</td>
                          <td>
                            <a>{{$notice->title }} </a>
                            <br />
                            <small>Uploaded at {{ $notice->created_at }}</small>
                          </td>
                          <td>
                            <a> {{$notice->description}} </a>
                          </td>
                          <td><a> {{$notice->uploadedBy}} </a></td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Active</button>
                          </td>
                          <td>
                            <a href="{{url('admin/editNotice')}}/{{ $notice->id }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="{{url('admin/deleteNotice')}}/{{$notice->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>
                        @endforeach



                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

         


          </div>
        </div> 
@endsection