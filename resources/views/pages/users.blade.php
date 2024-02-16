
@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush



@section('main')<div class="main-content">
<section class="section">
    <div class="section-header">
        <h1>User</h1>

    </div>

    <div class="section-body">

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">


                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table-striped table-md table">

                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>

                                <th>Action</th>
                            </tr>
                            <?php
$i = 1;
                foreach ($users as $user) { ?>

                            <tr>
                                <td><?= $i++?></td>
                                <td><?= $user->name?></td>
                                <td><?= $user->email?></td>
                                <td><?= $user->created_at?></td>

                                <td>
                                    &nbsp;<a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                        data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                        data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    {{-- {{$users->withQueryString()->links()}} --}}
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
