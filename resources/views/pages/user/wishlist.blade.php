<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Cool Foto</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('user/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('user/images/fevicon.png') }}" type="image/gif" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <style>
        body{
            background-color: #ffffff;
        }
         #submenu{
            left: o;
            opacity: 0;
            position: absolute;
            top: 35px;
            visibility: hidden;
            z-index: 1;
         }
         li:hover ul#submenu{
            opacity: 1;
            top: 80px;
            visibility: visible;
         }

         #submenu li{
            float: none;
            width: 100%;
         }
         #submenu a:hover{
            background:  #3e0bce;

         }
         #submenu a{
            background-color: #7e036a;
            color: rgb(255, 255, 255);
            display: block;
            font-weight: bold;
            font-size: 13px;
            padding: 15px 55px;
            text-align: center;
            text-decoration: none;
            transition: all 0.25s ease;
         }
         .pin-container{
            background-color: #82a1ef;
         }

         .carg{
            background-color: #ffffff;
         }
         .navigation.navbar-dark .navbar-nav .nav-link {
            color: #000000;
         }
      </style>
   </head>
   <!-- body -->
   <body class="main-layout inner_page">
      <!-- loader  -->
      {{-- <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div> --}}
      <!-- end loader -->
      <!-- header -->
      <div class="header">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class=" col-md-2 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('user/images/cover.png') }}" alt="#" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('beranda') }}">Home</a>
                                </li>
                                &nbsp;
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('about') }}">About</a>
                                </li>&nbsp;
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('shop') }}">shop</a>
                                </li>&nbsp;
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('galery') }}">Library</a>
                                    <ul id="submenu">
                                        <li><a href="{{ url('upimage') }}">Add Imaged</a></li>
                                        <li><a href="{{ url('private') }}">Private</a></li>
                                        <li><a href="{{ url('wishlist') }}">Wishlist</a></li>
                                    </ul>
                                </li>&nbsp;
                                <li class="nav-item">
                                    @if(session()->has('token'))
                                    <a class="nav-link" href="{{ url('logout') }} "
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    @else
                                    <a class="nav-link" href="{{ url('login') }}">Login</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                </div>
                </nav>
            </div>
        </div>
    </div>
      <!-- end header inner -->
      <!-- shop -->

      <div class="card-container">
         <div class="card">
            <img class="img-shop" src="images/31.jpg">
            <div class="intro">
               <h1>Rice Fields</h1>
               <br></br>
               <a href="" class="card-button">Buy</a>
               <a href="" class="card-button"> <i class='bx bxs-like'></i></a>
            </div>
         </div>
         <div class="card">
            <img class="img-shop" src="images/32.jpg">
            <div class="intro">
               <h1>Rice Fields</h1>
               <br></br>
               <a href="" class="card-button">Buy</a>
               <a href="" class="card-button"><i class='bx bxs-like'></i></a>
            </div>
         </div>
         <div class="card">
            <img class="img-shop" src="images/33.jpg">
            <div class="intro">
               <h1>Rice Fields</h1>
               <br></br>
               <a href="" class="card-button">Buy</a>
               <a href="" class="card-button"><i class='bx bxs-like'></i></a>
            </div>
         </div>
         <div class="card">
            <img class="img-shop" src="images/34.jpg">
            <div class="intro">
               <h1>Rice Fields</h1>
               <br></br>
               <a href="" class="card-button">Buy</a>
               <a href="" class="card-button"> <i class='bx bxs-like'></i></a>
            </div>
         </div>
         <div class="card">
            <img class="img-shop" src="images/35.jpg">
            <div class="intro">
               <h1>Rice Fields</h1>
               <br></br>
               <a href="" class="card-button">Buy</a>
               <a href="" class="card-button"> <i class='bx bxs-like'></i></a>
            </div>
         </div>
         <div class="card">
            <img class="img-shop" src="images/36.jpg">
            <div class="intro">
               <h1>Rice Fields</h1>
               <br></br>
               <a href="" class="card-button">Buy</a>
               <a href="" class="card-button"><i class='bx bxs-like'></i></a>
            </div>
         </div>
         <div class="card">
            <img class="img-shop" src="images/37.jpg">
            <div class="intro">
               <h1>Rice Fields</h1>
               <br></br>
               <a href="" class="card-button">Buy</a>
               <a href="" class="card-button"><i class='bx bxs-like'></i></a>
            </div>
         </div>
         <div class="card">
            <img class="img-shop" src="images/38.jpg">
            <div class="intro">
               <h1>Rice Fields</h1>
               <br></br>
               <a href="" class="card-button">Buy</a>
               <a href="" class="card-button"> <i class='bx bxs-like'></i></a>
            </div>
         </div>
         <div class="card">
            <img class="img-shop" src="images/39.jpg">
            <div class="intro">
               <h1>Rice Fields</h1>
               <br></br>
               <a href="" class="card-button">Buy</a>
               <a href="" class="card-button"> <i class='bx bxs-like'></i></a>
            </div>
         </div>
      </div>
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-4 ">
                     <div class="infoma">
                        <h3>Contact Us</h3>
                        <ul class="conta">
                           <li><i class="fa fa-phone" aria-hidden="true"></i>Call 081249578905</li>
                           <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)"> myfahmi45@gmail.com</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="row border_left">
                        <div class="col-md-12">

                        </div>
                        <div class="col-md-9">
                           <div class="infoma">
                              <h3>Useful Link</h3>
                              <ul class="fullink">
                                 <li><a href="index.html">Home</a></li>
                                 <li><a href="about.html">About</a></li>
                                 <li><a href="skating.html">Skating</a></li>
                                 <li><a href="shop.html">Shop</a></li>
                                 <li><a href="contact.html">Contact Us</a></li>
                              </ul>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>Cool Foto<a href="https://html.design/">by Kelompok 8</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/custom.js"></script>
      <script>
         AOS.init();
      </script>
   </body>
</html>
