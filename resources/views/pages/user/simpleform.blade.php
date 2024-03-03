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
</head>
<!-- body -->

<body class="main-layout inner_page">
    {{-- <!-- loader  -->
      <div class="loader_bg">
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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('shop') }}">shop</a>
                                </li>&nbsp;
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ url('galery') }}">Library</a>
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
    <!-- end header inner -->
    <!-- shop -->

    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #ffffff;

        }

        input {
            display: none;
        }

        label {
            height: 553px;
            width: 400px;
            border-radius: 6px;
            border: 3px dashed #999;
        }

        label:hover {
            color: #7e036a;
            border: 3px dashed #7e036a;
        }

        .tekx h3 {
            margin-top: 30px;
        }

        .dropdown {
        width: 370px;
        height: fit-content;
        box-sizing: border-box;
        position: relative;
        border-color: #000000;

        /* outline: 2px solid #000000; */
      }
      .input-box {
        width: 100%;
        height: 40px;
        box-sizing: border-box;
        outline: 0.3mm solid rgba(0, 0, 0, 0.15);
        border-radius: 2mm;
        border: 2px solid #000000;
        padding: 10px 15px;
        font-family: poppins;
        font-size: 14px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        position: relative;
      }
      .input-box::before {

        font-family: "Material Icons";
        position: absolute;
        font-size: 18px;
        top: 50%;
        right: 15px;
        transform: translate(0, -50%);
        width: fit-content;
        height: fit-content;
      }
      .input-box.open::before {

      }
      .kategoricoy .input-box:empty::after {
        content: "Select Category";
        color: rgba(0, 0, 0, 0.5);
      }

      .statusnyacoy .input-box:empty::after {
        content: "Select Status";
        color: rgba(0, 0, 0, 0.5);

    }

    .statusnyacoy .list,
.kategoricoy .list {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    height: fit-content;
    background: rgb(255, 255, 255);
    margin-top: 10px;
    border-radius: 2mm;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: column;
    max-height: 0;
    transition: 0.25s ease-out;
    z-index: 9999; /* Ensure both dropdowns have a high z-index */
}


      .list input {
        display: none;
      }
      .list label {
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: flex-start;
        font-family: poppins;
        font-size: 14px;
        padding: 10px 15px;
        box-sizing: border-box;
        cursor: pointer;
        position: relative;
        z-index: 999;
      }

      .statusnyacoy .list {
    z-index: 9999; /* Set a higher z-index for the status dropdown */
    /* Other styles */
}

.kategoricoy .list {
    /* Other styles */
}


      .list label .material-icons-outlined,
      .input-box .material-icons-outlined {
        margin-right: 5px;
        font-size: 22px;
      }
      .list label:hover {
        background: rgba(0, 0, 0, 0.08);
      }
      input:checked + label {
        color: rgb(20, 117, 213);
        background: rgb(238, 245, 252);
      }
      input:checked + label::before {
        content: "done";
        font-family: "Material Icons";
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translate(0, -50%);
        font-size: 18px;
      }
      .open {
        outline: 0.7mm solid rgb(20, 117, 213);
      }
      .title {
        font-family: poppins;
        font-size: small;
        font-weight: 500;
        margin-bottom: 10px;
      }
      .search-box {
        width: 100%;
        box-sizing: border-box;
        padding: 10px 8px;
      }
      #search {
        display: block;
        width: 100%;
        box-sizing: border-box;
        padding: 8px;
        border-radius: 1mm;
        border: none;
        outline: 0.3mm solid rgba(0, 0, 0, 0.15);
        font-family: poppins;
      }
      #search:focus {
        outline: 0.5mm solid rgba(0, 0, 0, 0.35);
      }

        button.active {
            background: #fff;
        }

        .image-view {
            height: 553px;
            width: 400px;
            border: none;
            display: none;
            border-radius: 10px;
            border: 2px solid #000000;
        }

    </style>

    <div class="headinh">
        <h1>Upload Photo</h1>
    </div>
    <div class="contener">
        <form action="{{ route('upimage') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="idUser" id="" value="{{ $sessionid }}">
            <section class="upload">
                <div class="upload-image">
                    <input type="file" id="file" name="postImage" />
                    <label for="file" id="kotak"></label>
                    <img src="" class="image-view" id="image-view" alt="">
                </div>
                <div class="upload-konten">
                    <div class="textarea">

                        <textarea cols="" placeholder="Isi Judul" name="postTitle" rows="1  "></textarea>
                        <br></br>
                        <textarea cols="" placeholder="Isi Deskripsi" name="postDesc" rows="1  "></textarea>
                        <br></br>
                        <textarea cols="" placeholder="Isi Harga" name="price" rows="1  "></textarea>
                    </div>
                    {{-- <select class="dropdown" name="" id="">
                        <option class="select" value="">Sale</option>
                        <option class="select" value="">Public</option>
                        <option class="select" value="">Private</option>
                    </select> --}}
<br>
                    <div class="dropdown kategoricoy">

                        <div class="  input-box"></div>
                        <div class="list">
                            @foreach ($kategori as $row)
                            <input type="radio" name="postCategory" value="{{ $row['idKategori'] }}" id="id{{ $loop->index }}" class="radio" />
                            <label for="id{{ $loop->index }}">

                                <span class="name">{{ $row['namaKategori'] }}</span>
                            </label>
                            @endforeach

                        </div>
                    </div>
                    <br>

                    <div class="dropdown statusnyacoy ">

                        <div class="  input-box"></div>
                        <div class="list">

                            <input type="radio" name="status" value="1" id="status1"  class="radio" />
                            <label for="status1">

                                <span class="name">sale</span>
                            </label>

                            <input type="radio" name="status" value="2" id="status2"  class="radio" />
                            <label for="status2">

                                <span class="name">public</span>
                            </label>

                            <input type="radio" name="status" value="3" id="status3"  class="radio" />
                            <label for="status3">

                                <span class="name">private</span>
                            </label>


                        </div>
                    </div>

                    <div class="textt">
                        {{-- <a href="" class="delete">Delete</a> --}}
                        <button type="submit" class="delete">Save</button>
                    </div>
            </section>
        </form>
    </div>

    <!-- end shop -->
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
    <!-- Javascript files-->
    <script src="{{ asset('user/js/jquery.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('user/js/jquery-3.0.0.min.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('user/js/custom.js') }}"></script>
    <script>
        const fileInput = document.getElementById('file')
        const imageView = document.getElementById('image-view')
        const kotak = document.getElementById('kotak')

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = () => {
                imageView.src = reader.result;
                imageView.style.display = 'block';
                kotak.style.display = 'none';

            };

            reader.readAsDataURL(file);
        })

        // AOS.init();
        const dropdowns = document.querySelectorAll('.dropdown');

        //          dropdowns.forEach(dropdown =>{
        //          const select = dropdown.querySelector('.select');
        //          const caret = dropdown.querySelector('.caret');
        //          const menu = dropdown.querySelector('.menu');
        //          const options = dropdown.querySelectorAll('.menu li');
        //          const selected = dropdown.querySelector('.selected');

        //          select.addEventListener('click', () =>{
        //             select.classList.toggle('select-clicked');
        //             caret.classList.toggle('caret-rotate');
        //             menu.classList.toggle('menu-open');
        //          });

        //          options.forEach(option => {
        //             option.addEventListener('click', () => {
        //                selected.innerText = option.innerText;
        //                select.classList.remove('select-clicked');
        //                caret.classList.remove('caret-rotate');
        //                menu.classList.remove('menu-open');

        //                options.forEach(option => {
        //                option.classList.remove('active');
        //             });
        //             option.classList.add('active');
        //          });
        //       });
        //    });

    </script>

    <script>
        function toggleDropdown(inputBox) {
        inputBox.classList.toggle("open");
        let list = inputBox.nextElementSibling;
        if (list.style.maxHeight) {
          list.style.maxHeight = null;
          list.style.boxShadow = null;
        } else {
          list.style.maxHeight = list.scrollHeight + "px";
          list.style.boxShadow =
            "0 1px 2px 0 rgba(0, 0, 0, 0.15),0 1px 3px 1px rgba(0, 0, 0, 0.1)";
        }
      }

      // Event listener for clicks on document
      document.addEventListener("click", function(event) {
        // Check if the clicked element is an input-box
        if (event.target.classList.contains("input-box")) {
          // Call toggleDropdown function with the clicked input-box
          toggleDropdown(event.target);
        }
      });

      // Event listeners for radio buttons
      var rad = document.querySelectorAll(".radio");
      rad.forEach((item) => {
        item.addEventListener("change", () => {
          var inputBox = item.closest(".dropdown").querySelector(".input-box");
          inputBox.innerHTML = item.nextElementSibling.innerHTML;
          toggleDropdown(inputBox);
        });
      });

      // Function to handle search filtering
      function search(searchin) {
        let searchVal = searchin.value.toUpperCase();
        let labels = searchin.closest(".dropdown").querySelectorAll("label");
        labels.forEach((item) => {
          let checkVal = item.querySelector(".name").innerHTML.toUpperCase();
          if (checkVal.indexOf(searchVal) == -1) {
            item.style.display = "none";
          } else {
            item.style.display = "flex";
          }
          let list = item.closest(".dropdown").querySelector(".list");
          list.style.maxHeight = list.scrollHeight + "px";
        });
      }
    </script>
</body>

</html>
