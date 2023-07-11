<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Maika-Villax</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ url('front/css/style.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light row">
                <div class="col-md-2">
                 <a class="navbar-brand" href="#"><img src="https://demo2.wpopal.com/villax/wp-content/uploads/2022/11/logo.svg" alt="" class="img-fluid"></a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                 </button>
                </div>
            
             <div class="col-md-6">
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <!-- <ul class="navbar-nav mr-auto">
                       <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Home
                         </a>
                         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="#">Home – v01</a>
                           <a class="dropdown-item" href="#">Home – v02</a>
                           <a class="dropdown-item" href="#">Home – v03</a>
                           <a class="dropdown-item" href="#">Home – v04</a>
                       </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               All Villas
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Villas – Gridstyle 01</a>
                            <a class="dropdown-item" href="#">Villas – Gridstyle 02</a>
                            <a class="dropdown-item" href="#">Villas – Liststyle</a>
                            <a class="dropdown-item" href="#">Villa Detail 01</a>
                            <a class="dropdown-item" href="#">Villa Detail 02</a>
                         </li>
                         <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Destinations
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Destinations</a>
                            <a class="dropdown-item" href="#">Destination Detail</a>
                           </div>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="#">About us</a>
                          </li>
                         <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Blog
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="#">Blog Standard</a>
                             <a class="dropdown-item" href="#">Blog Grid</a>
                             <a class="dropdown-item" href="#">Blog List</a>
                             <a class="dropdown-item" href="#">Single Post</a>
                         </li>
                         <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Pages
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">FAQs</a>
                             <a class="dropdown-item" href="#">404 Page</a>
                             <a class="dropdown-item" href="#">Contact us</a>
                         </li>
                     </ul> -->
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Home
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Home – v01</a>
                            <a class="dropdown-item" href="#">Home – v02</a>
                            <a class="dropdown-item" href="#">Home – v03</a>
                            <a class="dropdown-item" href="#">Home – v04</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                All Villas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="#">Villas – Gridstyle 01</a>
                             <a class="dropdown-item" href="#">Villas – Gridstyle 02</a>
                             <a class="dropdown-item" href="#">Villas – Liststyle</a>
                             <a class="dropdown-item" href="#">Villa Detail 01</a>
                             <a class="dropdown-item" href="#">Villa Detail 02</a>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Destinations
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="#">Destinations</a>
                             <a class="dropdown-item" href="#">Destination Detail</a>
                            </div>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link" href="#">About us</a>
                           </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Blog
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">Blog Standard</a>
                              <a class="dropdown-item" href="#">Blog Grid</a>
                              <a class="dropdown-item" href="#">Blog List</a>
                              <a class="dropdown-item" href="#">Single Post</a>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pages
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="#">FAQs</a>
                              <a class="dropdown-item" href="#">404 Page</a>
                              <a class="dropdown-item" href="#">Contact us</a>
                          </li>
                      </ul>
                   </div>
             </div>
             <div class="header-links col-md-4">
                <p>Call us at<a href="tel:+84 123 44 66 88">+84 123 44 66 88</a> </p> 
                <div class="social-link">
                    <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="#"><i class="fa-regular fa-heart"></i></a>
                    <a href="#"><i class="fa-regular fa-user"></i></a> 

                </div>
            </div>
         </nav>
        </div>
    </header>
    @yield('front-content')
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('front/javascript/script.js') }}"></script> 
</body>
</html>