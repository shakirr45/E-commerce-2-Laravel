<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop Ecommerce HTML CSS Template</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="home/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="home/assets/css/font-awesome.css">

    <link rel="stylesheet" href="home/assets/css/templatemo-hexashop.css">
home/
    <link rel="stylesheet" href="home/assets/css/owl-carousel.css">

    <link rel="stylesheet" href="home/assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
<style>
        .center{
            margin:auto;
            width:50%;
            text-align:center;
            padding: 30px;
            padding-top: 100px;


        }
        table,th,td{
            border: 3px solid gray;
        }
        .th_deg{
            font-size: 20px;
            padding: 5px;
            background: skyblue;
        }
        .total_deg{
            font-size: 20px;
            padding:40px;
        }
      </style>
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->

    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    @include('home.header')
    <!-- ***** Header Area End ***** -->

    <div class="center">
      @if(session()->has('message'))
          <div class="alert alert-success"> 
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
          </div>
          @endif

        <table>
            <tr>
                <th class="th_deg">Product title</th>
                <th class="th_deg">Product Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>

            <?php $totalprice= 0;?>
            @foreach($cart_data as $cart_data)
            <tr>
                <td>{{$cart_data->product_ttitle}}</td>
                <td>{{$cart_data->quantity}}</td>
                <td>{{$cart_data->price}}</td>
                <td><img width="150" height="150" src="product/{{$cart_data->image}}" alt=""></td>
                <td><a href="{{url('delete_cart_data',$cart_data->id)}}" class="btn btn-danger" submit>Remove</a></td>


            </tr>

            <?php $totalprice = $totalprice + $cart_data->price?>

            @endforeach


        </table>
        <div class="">
            <h1 class="total_deg">

           Total Price :  ${{$totalprice}}

            </h1>
        </div>
        <div>
            <h1 style="font-size: 25px; padding-bottom:15px;">Proceed Order</h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
            <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay Using Card</a>

        </div>
      </div>



   
    
    <!-- ***** Footer Start ***** -->
    @include('home.footer')

    
    <!-- jQuery -->
    <script src="home/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="home/assets/js/popper.js"></script>
    <script src="home/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="home/assets/js/owl-carousel.js"></script>
    <script src="home/assets/js/accordions.js"></script>
    <script src="home/assets/js/datepicker.js"></script>
    <script src="home/assets/js/scrollreveal.min.js"></script>
    <script src="home/assets/js/waypoints.min.js"></script>
    <script src="home/assets/js/jquery.counterup.min.js"></script>
    <script src="home/assets/js/imgfix.min.js"></script> 
    <script src="home/assets/js/slick.js"></script> 
    <script src="home/assets/js/lightbox.js"></script> 
    <script src="home/assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="home/assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</html>