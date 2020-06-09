<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"> </script>
        <script src="{{asset('js/app.js')}}"> </script>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        {{-- font awesome --}}
        <link rel="stylesheet" href="{{asset('css/all.css')}}">
        

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BinAbba Logistics</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" >
        <link href="{{asset('css/animate.css')}}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #222;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .navbar{
              padding: .5rem;
            }
            .navbar-nav li{
              padding-right: 10px;
            }

            .nav-link{
              font-size: .8em !important
            }

            .jumbotron{
              padding: 1.5rem;
              border-radius: 0;
            }
            .paddding{
              padding-bottom: 2rem;
            }
            .welcome{
              widows: 75%;
              margin: 0 auto;
              padding: 2rem;
            }

            .welcome hr{
              border-top: 2px solid #b4b4b4;
              width: 95%;
              margin-top: .3rem;
              margin-bottom: 1rem;
            }
            h2 .fa-cogs{
              color: crimson;
            }
            .fa-dolly {
              color: fuchsia;
            }
            .fa-inventory {
              color: mediumseagreen;
            }
            .fa-warehouse{
              color: teal;
            }

            .fa-shipping-fast {
              color: sienna;
            }  

            .fa-facebook ,.fa-twitter , .fa-instagram , .fa-google-plus-g{
              font-size: 3em;
              margin: 1rem;
            }
            .fa-facebook{
              color: #3b5998;
            }
            .fa-twitter{
              color: #00aced;
            }
            .fa-instagram{
              color: #517fa4;
            }
            .fa-google-plus-g{
              color: #bb0000;
            }
@media(max-width:992px){
  .social a{
    font-size: 1em;
    padding: 1rem;
  }

}
@media(max-width:768px){
  .carousel-caption{
              top: 40%;      
            }

            .carousel-caption h1{
              font-size: 150%;
               
            }

            .carousel-indicators{
              display: none;
            }
      .social a{
    font-size: .8em;
    padding: .5rem;
  }

}

@media(max-width:576px){
          .carousel-caption{
              top: 35%;      
            }

            .carousel-caption h1{
              font-size: 100%;
               
            }
            .carousel-indicators{
              display: none;
            }

            .social a{
    font-size: .5em;
    padding: .5rem;
  }



}
            .carousel-inner img{
              width: 100%;
              height: 100%;
            }
            
            .carousel-caption{
              position: absolute;
              top: 50%;
              transform: translateY(-50%)
            }

            .carousel-caption h1{
              font-size: 80%;
              text-transform: uppercase;
              text-shadow: 1px 1px 10px #000;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }









            .caption-animate .item .carousel-caption.fadeIn,
.caption-animate .item .carousel-caption.fadeInDown,
.caption-animate .item .carousel-caption.fadeInDownBig,
.caption-animate .item .carousel-caption.fadeInLeft,
.caption-animate .item .carousel-caption.fadeInLeftBig,
.caption-animate .item .carousel-caption.fadeInRight,
.caption-animate .item .carousel-caption.fadeInRightBig,
.caption-animate .item .carousel-caption.fadeInUp,
.caption-animate .item .carousel-caption.fadeInUpBig {
  opacity:0;
}





.carousel-fade .carousel-inner .item {
  opacity: 0;
  -webkit-transition-property: opacity;
  -moz-transition-property: opacity;
  -o-transition-property: opacity;
  transition-property: opacity;
}
.carousel-fade .carousel-inner .active {
  opacity: 1;
}
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  left: 0;
  opacity: 0;
  z-index: 1;
}
.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}
.carousel-fade .carousel-control {
  z-index: 2;
}



  /* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
.flip-card {
  background-color: transparent;
  width: 300px;
  height: 200px;
  border: 1px solid #f1f1f1;
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden; /* Safari */
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: #00b9e7;
  color: black;
}

/* Style the back side */
.flip-card-back {
  background-color: dodgerblue;
  color: white;
  transform: rotateY(180deg);
} 
        </style>
    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
      {{-- <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        --}}

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        
        
            <a class="navbar-brand" href="#">Bin-Abba Nig. Ltd</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                {{-- <ul class="navbar-nav ml-auto"> --}}
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <i class="fa fa-home"></i><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Services  <i class="fa fa-cogs"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#About">About Us<i class="fa fa-info-circle"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Contact">Contact Us <i class="fa fa-id-card"></i></a>
                    </li>
                    @if (Route::has('login'))
                    <li class="nav-item">
                    @auth
                        <a class="nav-link"  href="{{ url('/home') }}">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('login') }}">Login <i class="fas fa-sign-in-alt" aria-hidden="true"></i></a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('register') }}">Register</a>
                    </li>
                     @endif
                    @endauth
                    @endif
                </ul>

            </div>
        </nav>
              
                      
                   
                  {{--   @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif --}}
            <div class="corousel slide carousel-fade caption-animate" id="slides"  data-ride="carousel">

              <ol class="carousel-indicators bg-dark">
                <li data-target="#slides" data-slide-to="0" class="active"></li>
                <li data-target="#slides" data-slide-to="1"></li>
                <li data-target="#slides" data-slide-to="2"></li>
                <li data-target="#slides" data-slide-to="3"></li>

              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{asset('imgs/bg-banner.jpg')}}" alt="">
                  <div class="carousel-caption">
                    <h1 class="">Bin-Abba Nig. Ltd Logistics </h1>
                    <a href="#" class="btn btn-otline-light btn-lg">Contact Us</a>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="{{asset('imgs/1.jpg')}}" alt="">
                  <div class="carousel-caption">
                    <h1 class="">Bin-Abba Nig. Ltd Logistics </h1>
                    </div>
                </div>
                <div class="carousel-item">
                  <img src="{{asset('imgs/2.jpg')}}" alt="">
                  <div class="carousel-caption">
                    <h1 class=""> Logistics </h1>
                                   </div>
                </div>
                <div class="carousel-item">
                  <img src="{{asset('imgs/3.jpg')}}" alt="">
                  <div class="carousel-caption">
                    <h1 class=""> Logistics </h1>
                                   </div>
                </div>

              </div>
              <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            </div>
            {{-- jumbotron --}}
            <div class="container-fluid">
              <div class="row jumbotron">
                <div class="col-xs-12 cl-sm-12 col-md-9 col-lg-9 col-xl-10">
                  <p class="lead">
                    To be the best in the eyes of our customers and community for our creativity, value and performance 
                  </p>
                </div>
                <div class="col-xs-12 cl-sm-12 col-md-3 col-lg-3 col-xl-2">
                  <a href="#"> <button class="btn btn-outline-secondary btn-lg">Loogistics </button></a>
                </div>

              </div>

            </div>
            {{-- jumbotron end --}}
            <hr class="my-4"/>


      <div class="container-fluid justify-content-md-center">
          <div class="container ">
            <div class="row"> 
              <div class="col-md-5 offset-md-2">
                <div class="flip-card">
                  <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h3 class="flip-box-heading-back" style="color:#eeeded;">Our Vision</h3>
                        <a class="btn btn-outline-light btn-social mx-1" href="#">
 
                                <i class="fa fa-fw fa-eye " >  </i>
                           </a>
                        <img src="img_avatar.png" alt=" " style="width:300px;height:250px;">
                      </div>
                      <div class="flip-card-back">
                        <h1>Our Vision</h1> 
                        <p>
                        To be the best in the eyes of our customers and community for our creativity, value and performance
                        </p> 
                        
                      </div>
                    </div>
                  </div>
              </div>
                  
              <div class="col-md-5">
                <div class="flip-card">
                  <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <h3 class="flip-box-heading-back" style="color:#eeeded;">Our Mission</h3>
                          <a class="btn btn-outline-light btn-social mx-1" href="#">
                              <i class="fa fa-fw fa-book-open">  </i>       
                            </a>
                          <img src="img_avatar.png" alt=" " style="width:300px;height:300px;">
                    </div>
                    <div class="flip-card-back">
                        <h1>Our Mission</h1> 
                        <p>
                            To be a partner in delivering innovative Technologies and Services to our clientele through the combination of Creativity, Integrity and Teamwork.
                        </p> 
                        
                    </div>
                    </div>
                  </div>
              </div>
                  
            </div>
          </div>
            
        </div>

        {{-- How we do it --}}
        <div class="container-fluid padding">
          <div class="row welcome text-center">
            <div class="col-12">
              <h1 class="display-4">
                How we do it
              </h1>
              <hr/>
            </div>
            <div class="col-12">
              <p class="lead">
                Truck transportation business starts from the point of extraction or loading to the point of delivery of the goods and services for the satisfaction of the final consumers. Our logistics services are designed to ensure that each and every step of your logistics chain is carefully coordinated and managed; our professional team ensures that your goods always get to their designated location and more importantly to keep that smile on your face.
              </p>
            </div>

          </div>

        </div>
        {{--/ How we do it end --}}
          
        

         


            

                  <!--service-->
                  <div class="" id="service" class="content section-padding container-fluid">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-4 col-sm-4">
                          <h2 class="ser-title" id="ser">Our Service <i class="fa fa-cogs"></i></h2>
                          <hr class="botm-line">
                          <p>At Bin-Abba Nigeria Limited, we offers transportation services of animal produce such as cattle, goat, sheep and farm produce such as beans.</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="service-info">
                            <div class="icon">
                              <i class="fa fa-dolly "></i>
                            </div>
                            <div class="icon-info">
                              <h4>24 Hour Support</h4>
                              <p>The Transportation Business provides logistics service for individual, companies and agencies using truck capacity of 60 metric tons, 45 metric tons, 35 metric tons and 30 metric tons. we offer Bin-Abba Nigeria Limited offers transportation services of animal produce such as cattle, goat, sheep and farm produce such as beans, rice, millet etc; and also building materials such as clay, granite, cement, sand, wood, iron rods etc; and all other commodities that can be transported with trucks within and across neighboring countries of Nigeria.</p>
                            </div>
                          </div>
                          <div class="service-info">
                            <div class="icon">
                              <i class="fa fa-inventory"></i>
                            </div>
                            <div class="icon-info">
                              <h4>Inventory</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="service-info">
                            <div class="icon">
                              <i class="fa fa-warehouse"></i>
                            </div>
                            <div class="icon-info">
                              <h4>Warehouse  Truck Transportation</h4>
                              <p>Our truck transportation business starts from the point of extraction or loading to the point of delivery of the goods and services for the satisfaction of the final consumers.</p>
                            </div>
                          </div>
                          <div class="service-info">
                            <div class="icon">
                              <i class="fa fa-shipping-fast"></i>
                            </div>
                            <div class="icon-info">
                              <h4>Fast Delivery Logistics Service</h4>
                              <p>Our logistics services are designed to ensure that each and every step of your logistics chain is carefully coordinated and managed; our professional team ensures that your goods always get to their designated location and more importantly to keep that smile on your face.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- sevices end  --}}

          {{-- About Us --}}
        <div class="container-fluid padding"  id="About">
          <div class="row welcome text-center">
            <div class="col-12">
              <h1 class="display-4">
                About Us
              </h1>
              <hr/>
            </div>
            <div class="col-12">
              <p class="lead">
                Truck transportation business starts from the point of extraction or loading to the point of delivery of the goods and services for the satisfaction of the final consumers. Our logistics services are designed to ensure that each and every step of your logistics chain is carefully coordinated and managed; our professional team ensures that your goods always get to their designated location and more importantly to keep that smile on your face.
              </p>
            </div>

          </div>

        </div>
        {{--/ About Us end --}}

                  {{-- Contact Us --}}
                  <div class="container-fluid padding" id="Contact">
                    <div class="row welcome text-center">
                      <div class="col-12">
                        <h1 class="display-4">
                          Contact Us
                        </h1>
                        <hr/>
                      </div>
                      <div class="col-12 social padding"> 
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                      </div>
          
                    </div>
          
                  </div>
                  {{--/ Contact Us end --}}
          


          










              
            </div>
        </div>
        <footer>
          <div class="container-fluid padding">
              <div class="row text-center">
                <div class="col-md-4">
                <img src="{{asset('imgs/logo.jpg')}}" alt="" width="150"  height="150">
                <hr class="light"/>
                </div>

              </div>
          </div>
        </footer>
    </body>
</html>
<script>
  $('#myCarousel').on('slide.bs.carousel', function(e) {
  $('.carousel-caption').hide();
}).on('slid.bs.carousel', function(e) {
  $('.active .carousel-caption').slideToggle('slow');
});
</script>
