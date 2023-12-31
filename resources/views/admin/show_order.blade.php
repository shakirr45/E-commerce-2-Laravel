<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.admincss')

  <style>
        .title_deg{
            text-align:center;
            font-size:25px;
            font-weight: bold;
            padding-bottom:40px;
        }
        .table_deg{
            border: 3px solid white;
            width: 100%;
            margin: auto;
            text-align:center;
        }
        .th_deg{
            background-color: skyblue;
            color: black;
        }
        .img_size{
            height:150px;
            width: 150px;
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
            <h1 class="title_deg">All Orders</h1>


 <div style="padding-left: 400px; padding-bottom:30px;">
            <!-- //for search =================> -->
            <form action="{{url('search')}}" method="GET">
              @csrf
              <input style="color:black;" type="text" name="search">
              <input type="submit" class="btn btn-success" value="search">
            </form>
            </div>


          <table class="table_deg">
            <tr class="th_deg">
                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Email</th>
                <th style="padding: 10px;">Address</th>
                <th style="padding: 10px;">Phone Number</th>
                <th style="padding: 10px;">Product Title</th>
                <th style="padding: 10px;">Quantity</th>
                <th style="padding: 10px;">Price</th>
                <th style="padding: 10px;">Payment Status</th>
                <th style="padding: 10px;">Delivery Status</th>
                <th style="padding: 10px;">Product Image</th>
                <th style="padding: 10px;">Delivered</th>
                <th style="padding: 10px;">Print PDF</th>
                <th style="padding: 10px;">Send Email</th>

            </tr>

            <!-- //if use empty -->
            @forelse($order_data as $order_data)
            <tr>
                <td>{{$order_data->name}}</td>
                <td>{{$order_data->email}}</td>
                <td>{{$order_data->address}}</td>
                <td>{{$order_data->phone}}</td>
                <td>{{$order_data->product_ttitle}}</td>
                <td>{{$order_data->quantity}}</td>
                <td>{{$order_data->price}}</td>
                <td>{{$order_data->payment_status}}</td>
                <td>{{$order_data->delivery_status}}</td>
                <td><img class="img_size" src="product/{{$order_data->image}}" alt=""></td>
                <td>
                    @if($order_data->delivery_status == 'processing')
                    
                    <a onclick="return confirm('Are You Sure this Product to delivered?')" href="{{url('delivered',$order_data->id)}}" class="btn btn-primary">Delivered</a>

                    @else
                    <p style="color: green;">Delivered</p>


                    @endif

                </td>
                <td>
                    <a href="{{url('for_pdf',$order_data->id)}}" class="btn btn-secondary">Print PDF</a>
                </td>
                <td>
                    <a href="{{url('send_mail',$order_data->id)}}" class="btn btn-info">send Email</a>
                </td>

            </tr>

            <!-- //if there is any wrong dast value then show a message=======> -->
            @empty
            <tr>
              <td colspan="16">No Data Found</td>
            </tr>

            @endforelse
           
          </table>

            </div>
          </div>

        <!-- //for script part -->
        @include('admin.adminscript')

        
    
  </body>
</html>
