@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">

        <style>
            .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 9999; /* Increase the z-index value to ensure it's above other elements */
            overflow: auto; /* Add overflow property to enable scrolling if needed */
        }

        .popup .close {
            color: #fff;
            position: absolute;
            top: 70px;
            right: 20px;
            font-size: 30px;
            cursor: pointer;
            z-index: 99999; /* Make sure the close button is above the image */
        }

        .popup .full-image {
            display: block;
            margin: 0 auto;
            max-width: 70%;
            max-height: 70%;
            position: fixed; /* Change to fixed position */
            top: 50%;
            left: calc(50% + 100px); /* Adjust the left position as needed */
            transform: translate(-50%, -50%);
            z-index: 999999999999999999; /* Ensure the image is above other elements */
        }
        </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">


            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total User</h4>
                            </div>
                            <div class="card-body">
                                {{ $data['jumlahUser'] }}
                            </div>
                        </div>
                    </div>
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Post</h4>
                            </div>
                            <div class="card-body">
                                {{ $data['jumlahPost'] }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-8 col-sm-8">
                    <div class="card">
                        <div class="card-header">
                            <a  href="{{ url('admin/post') }}"><h4>Latest Posts</h4></a>

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table-striped mb-0 table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Author</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['postTerbaru'] as $row)
                                        @php
                                        $photoPath = $row['postImage']; // Get the value of "postImage" key for the current post
                                        $photoUrl = Storage::url('public/image/' . $photoPath); // Generate URL for the phot
                                       @endphp
                                        <tr>
                                            <td>
                                                {{ $row['postTitle'] }}
                                            </td>
                                            <td><div style="width:40px; height:40px;">
                                                <img class="small-image" src="{{ $photoUrl }} " style="max-width: 100%; max-height: 100%;"></div></td>
                                            <td>
                                                <div
                                                    class="font-weight-600"> {{ $row['user']['email'] }}</div>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>

    <script>
        function openPopup(photoUrl) {
    document.querySelector('.popup .full-image').src = photoUrl;
    document.querySelector('.popup').style.display = 'block';
}

// Function to close popup
function closePopup() {
    document.querySelector('.popup').style.display = 'none';
}

// Add click event listener to small images
document.querySelectorAll('.small-image').forEach(img => {
    img.addEventListener('click', function() {
        openPopup(this.src);
    });
});
    </script>
@endpush
