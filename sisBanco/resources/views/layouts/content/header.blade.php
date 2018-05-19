<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo"  >
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>BN</b>B</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>BANCO </b></span>
  </a>
  
 <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>



    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->

        <!-- Notifications: style can be found in dropdown.less -->

        <!-- Tasks: style can be found in dropdown.less -->

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           <img src="{{asset('/storage/perfil/'.Auth::user()->foto) }}" class="user-image" alt="User Image">

            <span class="hidden-xs">{{ Auth::user()->name }} </span>
          </a>
           <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('/storage/perfil/'.Auth::user()->foto) }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('users.perfil') }}" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/login') }}"
                                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                                Logout</a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                   {{ csrf_field() }}
                    </form>
                 <!-- <a href="#" class="btn btn-default btn-flat">Sign out</a>-->
                </div>
              </li>
            </ul>
            <!-- User image -->
           <!-- <li class="user-header">
             <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

              <p>
                Alexander Pierce - Web Developer
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            -->

            <!-- Menu Body -->

            <!-- Menu Footer-->
          <!--  <li class="user-footer">

              <div class="pull-right">
               <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                    <button type="submit" class="btn btn-default btn-flat">Sign out</button>

                    {{ csrf_field() }}
                  </form>
                </div>
              </li>-->

                          




          
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>