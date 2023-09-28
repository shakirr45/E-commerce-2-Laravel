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

    <link rel="stylesheet" href="home/assets/css/owl-carousel.css">

    <link rel="stylesheet" href="home/assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
        <!-- ***** Header Area Start ***** -->
        @include('home.header')
    <!-- ***** Header Area End ***** -->
    <!-- ***** Header Area Start ***** -->
    <div style="padding-top:160px;" class="container">

<!-- Card deck -->
<div class="card-deck row">





  <div class="col-xs-12 col-sm-6 col-md-4">
  <!-- Card -->
  <div class="card">

    <!--Card image-->
    <div class="view overlay">
      <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt="Card image cap">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

    <!--Card content-->
    <div class="card-body">

      <!--Title-->
      <h4 class="card-title">1 Card title</h4>
      <!--Text-->
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
      <button type="button" class="btn btn-light-blue btn-md">Read more</button>

    </div>

  </div>
  </div>

  <!-- Card end-->







  <!-- Card -->
  </div>




  
</div>
<!-- Card deck -->
  
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