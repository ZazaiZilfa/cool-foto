@extends('layouts.app')

@section('title', 'Post')

@push('style')
    <!-- CSS Libraries -->
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
                                        <th>Created At</th>
                                        <th>Updated At</th>

                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>tes foto</td>
                                        <td><div style="background-color: red; width:40px; height:40px;"></div></td>
                                        <td>gunung</td>
                                        <td>POS0001</td>
                                        <td>mamat@gmail.com</td>
                                        <td>2017-01-09</td>
                                        <td>2017-01-09</td>

                                        <td>
                                                &nbsp;<a class="btn btn-danger btn-action"
                                                data-toggle="tooltip"
                                                title="Delete"
                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                    tr>
                                        <td>2</td>
                                        <td>tes coyy</td>
                                        <td><div style="background-color: blue; width:40px; height:40px;"></div></td>
                                        <td>scenery</td>
                                        <td>POS0002</td>
                                        <td>dadang@gmail.com</td>
                                        <td>2019-01-09</td>
                                        <td>2019-01-09</td>

                                        <td>
                                                &nbsp;<a class="btn btn-danger btn-action"
                                                data-toggle="tooltip"
                                                title="Delete"
                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link"
                                            href="#"
                                            tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link"
                                            href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link"
                                            href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="#"><i class="fas fa-chevron-right"></i></a>
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

    <!-- Page Specific JS File -->
@endpush
