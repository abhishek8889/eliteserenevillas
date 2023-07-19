<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Maika-Villax</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
        integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
 
</head>
<body>
    <header class="site-header">
        <div class="container-fluid">
            <div class="search-bar">
                <form>
                    <input type="search" placeholder="Search...">
                </form>
                <a href="#" class="search-close">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                 <a class="navbar-brand" href="#"><img src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/logo.svg" alt="" class="img-fluid"></a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="bars bar1"></span>
                   <span class="bars bar2"></span>
                   <span class="bars bar3"></span>
                 </button>
               
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item drop-angle">
                          <a class="nav-link drop-toggle">
                           Home
                          </a>
                          <!-- <span class="cus-drop"><i class="fa-thin fa-angle-down"></i></span>
                          <div class="drop-menu">
                            <a class="dropdown-item" href="#">Home – v01</a>
                            <a class="dropdown-item" href="#">Home – v02</a>
                            <a class="dropdown-item" href="#">Home – v03</a>
                            <a class="dropdown-item" href="#">Home – v04</a> -->
                        </li>
                        <li class="nav-item drop-angle">
                            <a class="nav-link drop-toggle" href="{{ url('/villas') ?? ''}}">
                                All Villas
                            </a>
                            <!-- <span class="cus-drop"><i class="fa-thin fa-angle-down"></i></span>
                            <div class="drop-menu">
                             <a class="dropdown-item" href="#">Villas – Gridstyle 01</a>
                             <a class="dropdown-item" href="#">Villas – Gridstyle 02</a>
                             <a class="dropdown-item" href="#">Villas – Liststyle</a>
                             <a class="dropdown-item" href="#">Villa Detail 01</a>
                             <a class="dropdown-item" href="#">Villa Detail 02</a> -->
                          </li>
                          <li class="nav-item drop-angle">
                            <a class="nav-link drop-toggle" href="{{ url('villas/destinations') ?? '' }}">
                                Destinations
                            </a>
                            <!-- <span class="cus-drop"><i class="fa-thin fa-angle-down"></i></span>
                            <div class="drop-menu">
                             <a class="dropdown-item" >Destinations</a>
                             <a class="dropdown-item" href="#">Destination Detail</a>
                            </div> -->
                          </li>
                          <li class="nav-item">
                             <a class="nav-link" href="#">About us</a>
                           </li>
                          <li class="nav-item drop-angle">
                            <a class="nav-link drop-toggle">
                                Blog
                            </a>
                            <!-- <span class="cus-drop"><i class="fa-thin fa-angle-down"></i></span>
                            <div class="drop-menu">
                              <a class="dropdown-item" href="#">Blog Standard</a>
                              <a class="dropdown-item" href="#">Blog Grid</a>
                              <a class="dropdown-item" href="#">Blog List</a>
                              <a class="dropdown-item" href="#">Single Post</a> -->
                          </li>
                          <li class="nav-item drop-angle">
                            <a class="nav-link drop-toggle">
                                Pages
                            </a>
                            <!-- <span class="cus-drop"><i class="fa-thin fa-angle-down"></i></span>
                            <div class="drop-menu">
                             <a class="dropdown-item" href="#">FAQs</a>
                              <a class="dropdown-item" href="#">404 Page</a>
                              <a class="dropdown-item" href="#">Contact us</a> -->
                          </li>
                      </ul>
                   </div>
             
             <div class="header-links">
                <p>Call us at<a href="tel:+84 123 44 66 88">+84 123 44 66 88</a> </p> 
                <div class="social-link">
                    <a href="#" class="my-serch"><i class="bi bi-search"></i></a>
                    <a href="#"><i class="bi bi-suit-heart"></i></a>
                    <a href="#"><i class="bi bi-person"></i></a> 

                </div>
            </div>
         </nav>
        </div>
    </header>
   
    @yield('front-content')

    <!--  Footer  content -->
    <section class="sign-up-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sign-up-text">
                        <h2>Sign up for exclusive offers from us
                        </h2>
                    </div>
                </div>
                <div class="col-md-8 sign-col">
                    <div class="sign-up-form">
                        <p>Sign up to your newsletter for all the latest news and our villa  <br> exclusives promotion.</p>
                        <form class="form-inline">
                            <div class="field-wrap">
                                <input type="email" placeholder="your email" class="form-control">
                            </div>
                            <div class="s-bt-wrapper">
                                <button class="submit-btn">
                                    <span>suscribe</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
      <div class="footer-divider">
          <span></span>
      </div>
    <footer class="site-footer">
        <button class="back_to_top show">
            <span class="fa-solid fa-angle-up"></span>
          </button>
        <div class="container">
            <div class="row">
                <div class="col-md-5 social-order">
                    <ul class="social-links">
                        <li>
                            <a href="#">facebook</a>
                        </li>
                        <li>
                            <a href="#">instagram</a>
                        </li>
                        <li>
                            <a href="#">pinterest</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>Discover</h4>
                    <ul class="foot-links">
                        <li><a href="#">How it works</a></li>
                        <li><a href="#">Get inspired </a></li>
                        <li><a href="#">Affiliates</a></li>
                        <li><a href="#">Travel Planners</a></li>
                        <li><a href="#">Buy a house </a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>About</h4>
                    <ul class="foot-links">
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>get in touch</h4>
                   <p>2972 Westheimer Rd. Santa Ana, Illinois <br>
                     85486</p>
                     <a href="mailto:support@example.com"> support@example.com</a> <br>
                     <a href="tel:406555-0120">+ (406) 555-0120</a>
                </div>
            </div>
        </div>
       
       
    </footer>
   
    <div class="footer-bg" style="background-image:url(https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/footer.png) ;">
    <div class="container">
        <div class="footer-copy">
            <div class="copy-wripte-wrapper">
                <p> Copyright © 2022
                    <a  href="https://demo2.wpopal.com/villax/">Villax.</a> All rights reserved </p>
                    <div class="payment-img">
                        <img src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/payment.png" alt="">
                    </div>
            </div>
        </div>
       
    </div>
    
    </div> 
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('front/javascript/script.js')}}"></script>
</body>
</html>