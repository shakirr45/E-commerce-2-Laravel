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
          <h1 class="font_size">Kid's All Products</h1>
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
                @foreach($kids_product as $kids_product)
                <tr>
                    <td>{{$kids_product->title}}</td>
                    <td>{{$kids_product->description}}</td>
                    <td>{{$kids_product->quantity}}</td>
                    <td>{{$kids_product->price}}</td>
                    <td>{{$kids_product->discount_price}}</td>
                    <td><img class="img_size" src="product/{{$kids_product->image}}" alt=""></td>
                    <td><a onclick="return confirm('Are You Sure To Delete This?')" class="btn btn-danger" href="{{url('delete_kids_product',$kids_product->id)}}">Delete</a></td>
                    <td><a class="btn btn-success" href="{{url('update_product',$kids_product->id)}}">Update</a></td>
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
