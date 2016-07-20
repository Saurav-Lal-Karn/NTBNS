@section('menubar')
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
            <ul class="nav side-menu">
                <li>
                    <a href="{{url('/')}}">
                        <i class="fa fa-home"></i> Home
                        
                    </a>
                </li>
                <li>
                  <a href="{{url('about')}}">
                      <i class="fa fa-info"></i> About Us
                  </a>
                </li>
                  
                <li><a><i class="fa fa-users"></i> Members <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('members/Faculty Members')}}">Faculty Members</a></li>
                      <li><a href="{{url('members/Committee Members')}}">Committee Members</a></li>
                      <li><a href="{{url('members/General Members')}}">General Members</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-text"></i>Notices <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('notices/Recent')}}">Recent</a></li>
                      <li><a href="{{url('notices/All')}}">All</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-download"></i>Downloads <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('downloads/all')}}">All</a></li>
                      <li><a href="{{url('downloads/Notes')}}">Notes</a></li>
                      <li><a href="{{url('downloads/Books')}}">Books</a></li>
                      <li><a href="{{url('downloads/Syllabus')}}">Syllabus</a></li>
                      <li><a href="{{url('downloads/Reports')}}">Reports</a></li>
                      <li><a href="{{url('downloads/Miscellaneous')}}">Miscellaneous</a></li>
                    </ul>
                  </li>
                  <li><a href="{{ url('events') }}">Events</a></li>
                  <li><a href="{{url('contact')}}"><i class="fa fa-phone"></i>Contact</a></li>
                </ul>
              </div>
            
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
        
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
              
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-home"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
@endsection