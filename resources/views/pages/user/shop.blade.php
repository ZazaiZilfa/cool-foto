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
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<style>
/* Modal content */
.modal-content {
  background-color: #fefefe;
  margin: 10% auto; /* 10% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Adjust the width as needed */
  max-width: 800px; /* Optionally set a maximum width */
}

/* Close button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Modal body */
.modal-body {
  padding: 20px;
}


/* Image */
.modal-body img {
  max-width: 100%; /* Ensure the image fits within the modal */
  height: auto;

  border-radius: 5%;
}

/* Description, Uploader, and Price */
.modal-body .info {
  flex-grow: 1; /* Allow text to expand */
}
    </style>

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

    .aktip {
       filter: blur(20px);
       pointer-events: none;
       user-select: none;
    }

    #popup {
       position: fixed;
       top: 40%;
       left: 50%;
       transform: translate(-50%, -50%);
       width: 700px;
       padding: 5px;
       box-shadow: 0 5px 30px rgba(0, 0, 0, .30);
       background: #ffffff;
       margin-top: 6%;
       border-radius: 7px;

    }
    #popup h2{
       font-size: 27px;
       margin-left: 3%;
       margin-top: 30px;
    }
    #popup p{
       margin-left: 3%;
       margin-top: 15px;
    }

    #popup.aktip {
       top: 50%;

    }
    .images{
      width: 40%;
      height: 40%;
      padding: 5px;
      padding-bottom: 30px;
      flex: 1;
      margin-left: 10px;
      margin-top: 10px;
    }
    .images img{
       border-radius: 5px;
    }
    .card-btn{
      display: inline-block;
      background-color: #ace9c6;
      color: #020000;
      text-decoration: none;
      border-radius: 5px;
      padding: 8px 16px;
      margin-left: 15px;
      margin-top: 20%;

 }
 .desc{
    position: fixed;
   top: 3px;
   right: 10px;
   font-size: 18px;
   margin-top: 18px;
   background-color: #ffff;
   width: 390px;
   height: 356px;
   margin-bottom: 60px;
 }
 h4{
    color: grey ;
 }
 </style>
<!-- body -->

<body class="main-layout inner_page">
    <!-- loader  -->
    {{-- <div class="loader_bg">
        <div class="loader"><img src="{{ asset('user/images/loading.gif') }}" alt="#" /></div>
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

    </div>

    </div>

    <!-- end header inner -->
    <!-- shop -->

    <div class="kategori">
        <div class="filter-button">
            <button class="active"><a href="{{ url('shop') }}" style="all: unset;">Show All</a></button>

            @foreach ($data2 as $row)
            <?php $id = $row['idKategori']?>
            <button class="active"><a href="{{ url("shop/kat/$id")}}"
                    style="all: unset;">{{ $row['namaKategori'] }}</a></button>

            @endforeach

        </div>
    </div>
    <div class="card-container">

        @foreach ( $data1 as $row )
        @php
        $randomView = 'view' . rand(1, 11); // Adjust the range as per your actual view names
        $image = $row['postImage'];
        $imagePath = "/storage/app/image/$image";
        $photoPath = $row['postImage']; // Get the value of "postImage" key for the current post
        $photoUrl = Storage::url('public/image/' . $photoPath); // Generate URL for the phot

        // Initializing variables to track conditions
        $existsInData3 = false;
        $isKodeUserMatch = false;
        // Loop through $data3 to check conditions
        foreach ($data3 as $data3Item) {
        if ($data3Item['kodePost'] == $row['id']) {
        $existsInData3 = true;
        // Check if 'kodeuser' matches $sessionid
        if ($data3Item['kodeUser'] == $sessionid) {
        $isKodeUserMatch = true;
        }
        // If both conditions are met, break out of the loop
        if ($existsInData3 && $isKodeUserMatch) {
        break;
        }
        }
        }
        @endphp
        @if($row['status'] == '3')

        @else
        <div class="card">
            <img class="img-shop" src="{{ $photoUrl }}">
            <div class="intro">
                <h1>{{ $row['postTitle'] }}</h1>
                <h4>{{ $row['postDesc'] }}</h4>
                <br>
                @if($row['status'] == '1')
                <a href="#  " data-toggle="modal" data-target="#myModal{{ $row['id'] }}" class="card-button">IDR {{ $row['price'] }}</a>




                @elseif($row['status'] == '2')
                <a class="card_btn">Not Sale</a>
                @endif

                @if ($existsInData3 && $isKodeUserMatch)
                <a href="{{ route('delete.wishlist', $row['id']) }}" onclick="event.preventDefault(); document.getElementById('delete-wishlist').submit();" class="card-button"> <i class='bx bxs-like'></i></a>

        <form id="delete-wishlist" action="{{ route('delete.wishlist', $row['id']) }}" method="POST" style="display: none;">
            @csrf
            @method('delete')
        </form>
                @else
                <a href="{{ route('post.wishlist') }}" onclick="event.preventDefault(); document.getElementById('post-wishlist').submit();" class="card-button"><i class='bx bx-like'></i></a>
                <form id="post-wishlist" action="{{ route('post.wishlist') }}" method="POST" style="display: none;">
                    @csrf
                    @method('post')
<input type="hidden" name="kodeUser" value="{{ $sessionid }}">
<input type="hidden" name="kodePost" value="{{ $row['id'] }}">
                </form>
                @endif
            </div>
        </div>

<!-- Modal -->
<div class="modal" id="myModal{{ $row['id'] }}">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">{{ $row['postTitle'] }}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

            <img src="{{ $photoUrl }}" alt="image">
<br><br>
        <div>
            <!-- Description -->
            <p>{{ $row['postDesc'] }}</p>

            <!-- Uploader -->
            <p>By: {{ $row['user']['name'] }}</p>

            <!-- Price -->
            <p>Price: IDR {{ $row['price'] }}</p>
        </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Buy</button>
        </div>

      </div>
    </div>
  </div>
  {{-- endmodal --}}

        @endif



        @endforeach

    </div>
    <!-- end shop -->




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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('user/js/jquery.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('user/js/shop.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('user/js/custom.js') }}"></script>
    <script>
        AOS.init();

    </script>

<script type="text/javascript">
    function toggle() {
       var blur = document.getElementById('blur');
       blur.classList.toggle('aktip');
       var popup = document.getElementById('popup');
       //   popup.classList.toggle('aktip');
       // $(popup).css('display', 'block')
       $(popup).fadeToggle  ()

    }
 </script>
</body>

</html>
