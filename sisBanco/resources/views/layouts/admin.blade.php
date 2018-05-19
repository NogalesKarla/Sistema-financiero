<!DOCTYPE html>
<html lang="en">


@include('layouts.content.head')
<body class="hold-transition {{Auth::user()->fondo}} sidebar-mini" >
<div class="wrapper"  >
@include('layouts.content.header')
@include('layouts.content.aside')  
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">

         @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <aside class="control-sidebar control-sidebar-dark control-sidebar">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-theme-demo-options-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-wrench"></i></a></li>

     
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      
      <div id="control-sidebar-theme-demo-options-tab" class="tab-pane active">
        <div>
          <h4 class="control-sidebar-heading">Layout Options</h4>
          
              
                  <div class="form-group"><label class="control-sidebar-subheading"><input type="checkbox" data-layout="sidebar-collapse" class="pull-right"> Toggle Sidebar</label><p>Toggle the left sidebar's state (open or collapse)</p></div>
                  
                  <div class="form-group"><label class="control-sidebar-subheading"><input type="checkbox" data-controlsidebar="control-sidebar-open" class="pull-right"> Toggle Right Sidebar Slide</label><p>Toggle between slide over content and push content effects</p></div>
                  <div class="form-group"><label class="control-sidebar-subheading"><input type="checkbox" data-sidebarskin="toggle" class="pull-right"> Toggle Right Sidebar Skin</label><p>Toggle between dark and light skins for the right sidebar</p></div>
                  
                  </div></div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      
      <!-- /.tab-pane -->
    </div>
  </aside>
  <div class="control-sidebar-bg">
    
  </div>
 </div>

<!-- ./wrapper -->

  @include('layouts.content.script')
 @yield('script')

 
</div> 
</body>
</html>