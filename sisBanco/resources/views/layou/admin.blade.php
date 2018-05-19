<!DOCTYPE html>
<html lang="en">
@include('layouts.content.head')
<body>
    <div id="wrapper">
@include('layouts.content.aside')  
  <!-- Content Wrapper. Contains page content -->
    <div id="page-wrapper">

    
    <!-- Main content -->
    <section class="content">
		
         @yield('content')

    </section>
    <!-- /.content -->
  </div>
 </div>
<!-- ./wrapper -->

  @include('layouts.content.script')
 @yield('script')

 
</div> 
</body>
</html>