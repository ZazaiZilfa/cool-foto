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
                                <a class="nav-link" href="login.html">Login</a>
                            </li>
                        </ul>
                    </div>
            </div>
            </nav>
        </div>
    </div>
</div>
