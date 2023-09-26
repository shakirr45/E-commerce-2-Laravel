<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.admincss')


  <style>
        .div_center{
            text-align:center;
            padding-top: 30px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color{
            color:black;
            padding-bottom: 20px;
        }
        label{
            display:inline-block;
            width:200px;
        }
        .div_design{
            padding-bottom: 15px;
        }

    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- for header  -->
      @include('admin.header')
      
      <div class="main-panel">
          <div class="content-wrapper">

          <div class="div_center">

  <h1 class="font_size">Add Mens Product</h1>

  <form action="{{url('/add_mens_product')}}" method="POST" enctype="multipart/form-data">
      @csrf

  <div class="div_design">
      <label for="">Product Title:</label>
      <input class="text_color" type="text" name="title" placeholder="Write a Title" required="">
  </div>
  <div class="div_design">
      <label for="">Product Description:</label>
      <input class="text_color" type="text" name="description" placeholder="Write a Description" required="">
  </div>
  <div class="div_design">
      <label for="">Product Price:</label>
      <input class="text_color" type="number" name="price" placeholder="Write a Price" required="">
  </div>
  <div class="div_design">
      <label for="">Discount Price:</label>
      <input class="text_color" type="number" name="discount_price" placeholder="Write Discount Price">
  </div>
  <div class="div_design">
      <label for="">Product Quantity:</label>
      <input class="text_color" type="number" min="0" name="quantity" placeholder="Write a Quantity" required="">
  </div>
  
  <div class="div_design">
      <label for="">Product Image Here:</label>
      <input type="file"name="image" required="">
  </div>

  <div class="div_design">
      <input type="submit" value="Add Product" class="btn btn-primary">
  </div>

  </form>

</div>


            </div>
          </div>

        <!-- //for script part -->
        @include('admin.adminscript')

        
    
  </body>
</html>
