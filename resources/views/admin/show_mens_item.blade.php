<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.admincss')
  <style>
        .center{
            margin: auto;
            width:60%;
            border: 2px solid white;
            text-align:center;
            margin-top: 40px;
        }
        .font_size{
            font-size: 40px;
            text-align:center;
            padding-bottom: 10px;
        }
        .img_size{
            height:150px;
            width: 150px;
        }
        .th_color{
            background: skyblue;
            color: black;
        }
        .th_deg{
            padding: 20px;
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
          <h1 class="font_size">All Products</h1>
            <table class="center">
                <tr class="th_color">
                    <td class="th_deg">Product Title</td>
                    <td class="th_deg">Description</td>
                    <td class="th_deg">Quantity</td>
                    <td class="th_deg">Product Price</td>
                    <td class="th_deg">Discount Price</td>
                    <td class="th_deg">Product Image</td>
                    <td class="th_deg">Delete Product</td>
                    <td class="th_deg">Update Product</td>


                </tr>
                @foreach($mens_product as $mens_product)
                <tr>
                    <td>{{$mens_product->title}}</td>
                    <td>{{$mens_product->description}}</td>
                    <td>{{$mens_product->quantity}}</td>
                    <td>{{$mens_product->price}}</td>
                    <td>{{$mens_product->discount_price}}</td>
                    <td><img class="img_size" src="product/{{$mens_product->image}}" alt=""></td>
                    <td><a onclick="return confirm('Are You Sure To Delete This?')" class="btn btn-danger" href="{{url('delete_product',$mens_product->id)}}">Delete</a></td>
                    <td><a class="btn btn-success" href="{{url('update_product',$mens_product->id)}}">Update</a></td>
                </tr>
                @endforeach
            </table>
          </div>


            </div>
          </div>

        <!-- //for script part -->
        @include('admin.adminscript')

        
    
  </body>
</html>
