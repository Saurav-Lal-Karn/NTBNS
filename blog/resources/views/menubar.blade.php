@section('menubar')
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
            <ul class="nav side-menu">
                <li>
                    <a>
                        <i class="fa fa-home"></i> Home
                        
                    </a>
                </li>
                <li><a><i class="fa fa-info"></i> About Us</a>
                  </li>
                  <li><a><i class="fa fa-users"></i> Members <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Faculty Members</a></li>
                      <li><a href="tables_dynamic.html">Committee Members</a></li>
                      <li><a href="tables_dynamic.html">General Members</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-text"></i>Notices <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Recent</a></li>
                      <li><a href="tables_dynamic.html">All</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-download"></i>Downloads <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Recent</a></li>
                      <li><a href="tables_dynamic.html">Notes</a></li>
                      <li><a href="tables_dynamic.html">Books</a></li>
                      <li><a href="tables_dynamic.html">Reports</a></li>
                      <li><a href="tables_dynamic.html">Miscellaneous</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-phone"></i>Contact</a></li>
                </ul>
              </div>
            
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
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