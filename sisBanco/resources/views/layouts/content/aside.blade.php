<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!--<img src="" class="img-circle" alt="User Image">-->
        </div>
        <div class="pull-left info">

        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Servicios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('personas.index') }}"><i class="fa fa-circle-o"></i> R. Cliente</a></li>
            <li class="active"><a href="{{ route('cuentas.index') }}"><i class="fa fa-circle-o"></i>Cuenta</a></li>
            <li><a href="{{ route('d_credito.index') }}"><i class="fa fa-circle-o"></i>R. Credito</a></li>
            <li><a href="{{ route('t_credito.index') }}"><i class="fa fa-circle-o"></i>R.Tipo de Credito</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Seguridad</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i>Users</a></li>
            <li><a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i>Roles</a></li>
          </ul>
        </li>
        
        
       
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>