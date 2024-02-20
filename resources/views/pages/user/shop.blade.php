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
</head>
<style>
    #submenu {
        left: o;
        opacity: 0;
        position: absolute;
        top: 35px;
        visibility: hidden;
        z-index: 1;
    }

    li:hover ul#submenu {
        opacity: 1;
        top: 80px;
        visibility: visible;
    }

    #submenu li {
        float: none;
        width: 100%;
    }

    #submenu a:hover {
        background: #3e0bce;

    }

    #submenu a {
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

</style>
<!-- body -->

<body class="main-layout inner_page">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('user/images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <div class="header">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class=" col-md-2 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="index.html"><img
                                        src="{{ asset('user/images/cover.png') }}" alt="#" /></a>
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
                                    <a class="nav-link" href="{{ url('library') }}">Library</a>
                                    <ul id="submenu">
                                        <li><a href="{{ url('upimage') }}">Add Imaged</a></li>
                                        <li><a href="{{ url('private') }}">Public Libary</a></li>
                                        <li><a href="{{ url('wishlist') }}">Wistlist</a></li>
                                    </ul>
                                </li>&nbsp;
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('login') }}">Login</a>
                                </li>
                            </ul>
                        </div>
                </div>
                </nav>
            </div>
        </div>
    </div>

    </div>

    </div>

    <!-- end header inner -->
    <!-- shop -->
    <div class="kategori">
        <div class="filter-button">
            <button class="active" data-name="all">Show All</button>
            <button data-name="view">view</button>
            <button data-name="game">Game</button>
            <button data-name="anime">Anime</button>
            <button data-name="aldi">Aldi Taher</button>
            <button data-name="Devil">Devil</button>
            <button data-name="Mishima">Mishima</button>
            <button data-name="ayam">Ayam</button>
            <button data-name="terlur">Telur</button>


        </div>
    </div>
    <div class="card-container">
        @foreach ( $data as $row )
        <div class="card">
            <img class="img-shop" src="{{ asset('user/images/view.jpeg') }}">
            <div class="intro">
                <h1>{{ $row['postImage'] }}</h1>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div>
        @endforeach
        {{-- <div class="card">
            <img class="img-shop" src="{{ asset('user/images/view.jpeg') }}">
            <div class="intro">
                <h1>Rice Fields</h1>
                <p>a <span>Rice Fields</span> </p>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div>
        <div class="card">
            <img class="img-shop" src="{{ asset('user/images/view1.jpeg') }}">
            <div class="intro">
                <h1>ships in the beautiful sea</h1>
                <p> <span>ships in the beautiful sea</span></p>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div>
        <div class="card">
            <img class="img-shop" src="images/view2.jpg">
            <div class="intro">
                <h1>Rice Fields</h1>
                <p>a <span>Rice Fields</span>asasasas </p>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div>
        <div class="card">
            <img class="img-shop" src="images/view3.jpg">
            <div class="intro">
                <h1>Rice Fields</h1>
                <p>a <span>Rice Fields</span>asasasas </p>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div>
        <div class="card">
            <img class="img-shop" src="images/view4.jpg">
            <div class="intro">
                <h1>Rice Fields</h1>
                <p>a <span>Rice Fields</span>asasasas </p>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div>
        <div class="card">
            <img class="img-shop" src="images/view5.jpg">
            <div class="intro">
                <h1>Rice Fields</h1>
                <p>a <span>Rice Fields</span>asasasas </p>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div>
        <div class="card">
            <img class="img-shop" src="images/view6.jpg">
            <div class="intro">
                <h1>Rice Fields</h1>
                <p>a <span>Rice Fields</span>asasasas </p>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div>
        <div class="card">
            <img class="img-shop" src="images/view7.jpg">
            <div class="intro">
                <h1>Rice Fields</h1>
                <p>a <span>Rice Fields</span>asasasas </p>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div>
        <div class="card">
            <img class="img-shop" src="images/view8.jpg">
            <div class="intro">
                <h1>Rice Fields</h1>
                <p>a <span>Rice Fields</span>asasasas </p>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div>
        <div class="card">
            <img class="img-shop" src="images/view9.jpg">
            <div class="intro">
                <h1>Rice Fields</h1>
                <p>a <span>Rice Fields</span>asasasas </p>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div>
        <div class="card">
            <img class="img-shop" src="images/view10.jpg">
            <div class="intro">
                <h1>Rice Fields</h1>
                <p>a <span>Rice Fields</span>asasasas </p>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div>
        <div class="card">
            <img class="img-shop" src="images/view11.jpg">
            <div class="intro">
                <h1>Rice Fields</h1>
                <p>a <span>Rice Fields</span>asasasas </p>
                <a href="" class="card-button">Buy</a>
                <a href="" class="card-button"> <i class='bx bx-like'></i></a>
            </div>
        </div> --}}
    </div>
    <!-- end shop -->

    <div class="cart-tab">
        <h1>Shopping Cart</h1>
        <div class="list-cart">
            <div class="item">
                <div class="imgg">
                    <img src="images/view.jpeg" alt="">
                </div>
                <div class="name">
                    Rice Fiealds
                </div>
                <div class="total">
                    $200
                </div>
            </div>
        </div>
        <div class="btn">
            <button class="close">Close</button>
            <button class="checkout">Check Out</button>
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
                                <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)">
                                        myfahmi45@gmail.com</a></li>
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
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="login.html">Login</a></li>
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
    <script src="{{ asset('user/js/jquery.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('user/js/shop.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('user/js/custom.js') }}"></script>
    <script>
        AOS.init();

    </script>
</body>

</html>
