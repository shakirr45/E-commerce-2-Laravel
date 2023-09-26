<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.admincss')


  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- for header  -->
      @include('admin.header')
      
        <!-- partial -->
        @include('admin.body')

        <!-- //for script part -->
        @include('admin.adminscript')

        
    
  </body>
</html>
