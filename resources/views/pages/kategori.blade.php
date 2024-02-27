@extends('layouts.app')

@section('title', 'Kategori')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kategori</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-4 col-md-4 col-lg-4">
                    @if(!Route::currentRouteNamed('adminkat'))
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Kategori</h4>

                        </div>
                        <form action="" method="POST">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <input type="text" readonly value="KAT{{ $data['idKategori'] }}" class="form-control">
                                <br>
                                <input type="text" name="namaKategori" value="{{ $data['namaKategori'] }}"
                                    class="form-control">
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-lg btn-info  mx-auto">Submit</button>
                            </div>
                        </form>
                    </div>
                    @endif
                    @if(Route::currentRouteNamed('adminkat'))
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Kategori</h4>
                        </div>
                        <form action="" method="POST">
                            @csrf
                            <div class="card-body">
                                <input type="text" name="namakategori" id="namakategori" class="form-control">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-lg btn-info  mx-auto">Submit</button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>

                @if(Route::currentRouteNamed('adminkat'))
                <div class="col-8 col-md-8 col-lg-8">
                    <div class="card">

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table-striped table-md table">
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Kategori</th>
                                        <th>Kategori</th>

                                        <th>Action</th>
                                    </tr>
                                    @foreach ($data as $index => $row)


                                    <tr>
                                        <td>{{ $index +1 }}</td>
                                        <td>KAT{{ $row['idKategori'] }}</td>
                                        <td>{{ $row['namaKategori'] }}</td>


                                        <td> <a href="{{ url('admin/kategori/'.$row['idKategori']) }}"
                                                class="btn btn-primary btn-action" data-toggle="tooltip" title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            &nbsp;
                                            {{-- <form action="{{ url('admin/kategori/'.$row['idKategori']) }}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus data ini?')">
@csrf
@method('delete')
                                            <button type="submit" name="submit" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form> --}}
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                onclick="confirmDelete('{{ route('delete.kategori', $row['idKategori']) }}')"
                                                >
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
                                        <a class="page-link" href="#" tabindex="-1"><i
                                                class="fas fa-chevron-left"></i></a>
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
                @endif
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/prismjs/prism.js') }}"></script>

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
                    setTimeout(function() {
    window.location.reload();
}, 2000);
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('Failed to delete item');
            });
        }
    }

</script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
@endpush
