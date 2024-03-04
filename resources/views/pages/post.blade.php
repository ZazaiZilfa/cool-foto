@extends('layouts.app')

@section('title', 'Post')

@push('style')
<!-- CSS Libraries -->
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

@section('main')<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Post</h1>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table-striped table-md table">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Photo</th>
                                    <th>Category</th>
                                    <th>Kode Post</th>
                                    <th>Published By</th>
                                    <th style="text-align: center;">Created At</th>
                                    <th style="text-align: center;">Updated At</th>
                                    <th style="text-align: center;">Price</th>
                                    <th style="text-align: center;">Status</th>

                                    <th style="text-align: center;">Action</th>
                                </tr>

                                @foreach ($data as $index => $row )
                                {{-- {{ dd($data) }} --}}
                                @php
                                $photoPath = $row['postImage']; // Get the value of "postImage" key for the current post
                                $photoUrl = Storage::url('public/image/' . $photoPath); // Generate URL for the phot
                               @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $row['postTitle'] }}</td>
                                    <td>
                                        <div style=" width:40px; height:40px;">
                                            <img class="small-image" src="{{ $photoUrl }} " style="max-width: 100%; max-height: 100%;">
                                        </div>
                                        <div class="popup" id="popup">
                                            <span class="close" onclick="closePopup()">&times;</span>
                                            <img src="" class="full-image" alt="Full Image">
                                        </div>
                                    </td>
                                    <td>{{ $row['Kategori']['namaKategori'] }}</td>
                                    <td>POS{{ $row['id'] }}</td>
                                    <td>{{ $row['user']['email'] }}</td>
                                    <td>{{ $row['created_at'] }}</td>
                                    <td>{{ $row["updated_at"] }}</td>
                                    <td>{{ $row['price'] }}</td>
                                    <td>
                                        @if($row['status'] == '1')
                                        <center><span class="badge badge-success">Sale</span></center>
                                        @elseif($row['status'] == '2')
                                        <center><span class="badge badge-info">Public</span></center>
                                        @elseif($row['status'] == '3')
                                        <center><span class="badge badge-secondary">private</span></center>
                                        @endif
                                    </td>
                                    <td>
                                        @if($row['approvalStatus'] == '0')
                                        <a class="btn btn-success btn-action" data-toggle="tooltip" title="Approved"
                                            onclick="confirmDelete('{{ route('delete.post', $row['id']) }}')">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        &nbsp;
                                        @endif

                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                            onclick="confirmDelete('{{ route('delete.post', $row['id']) }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span
                                            class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->

<script>
    function confirmDelete(url) {
        if (confirm('Are You Sure? This action can not be undone. Do you want to continue?')) {
            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                if (response.ok) {
                    alert('Deleted');
                    // Optionally, redirect to another page after deletion
                } else {
                    console.log(response);
                    alert('Deleted');
                    setTimeout(function () {
                        window.location.reload();
                    }, 10);
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('Failed to delete item');
            });
        }
    }

    // Function to open popup and display full-size image
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

<!-- Page Specific JS File -->
@endpush
