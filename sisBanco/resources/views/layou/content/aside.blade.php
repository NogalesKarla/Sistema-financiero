<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/home') }}">Banco</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            @if(Entrust::can('modulo-servicios'))
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Servicios <b class="caret"></b></a>
              <ul class="dropdown-menu">
                
                  <li><a href="{{ route('personas.index') }}">R. Cliente</a></li>
                  <li><a href="{{ route('cuentas.index') }}">Cuentas</a></li>
                  <li><a href="{{ route('d_credito.index') }}">R. Credito</a></li>
                  <li><a href="{{ route('t_credito.index') }}">R.Tipo de Credito</a></li>
                  
              </ul>
            </li>
            @endif
            
           <!-- <li><a href="charts.html"><i class="fa fa-bar-chart-o"></i> Charts</a></li>
            <li><a href="tables.html"><i class="fa fa-table"></i> Tables</a></li>
            <li><a href="forms.html"><i class="fa fa-edit"></i> Forms</a></li>-->
            @if(Entrust::can('modulo-seguridad'))
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Seguridad <b class="caret"></b></a>
              <ul class="dropdown-menu">
                
                  <li><a href="{{ route('users.index') }}">Users</a></li>
                  <li><a href="{{ route('roles.index') }}">Roles</a></li>
              </ul>
            </li>
             @endif
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;&nbsp; 
                {{ Auth::user()->name }}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                
                <li><a href="#"><i class="fa fa-gear"></i> Configuraciones</a></li>
                <li class="divider"></li>
                <li> <a href="{{ url('/login') }}"
                                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> Log Out</a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                   {{ csrf_field() }}
                                </form>
                 </li>

              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>