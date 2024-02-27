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
                foreach ($data as $index =>$row) { ?>
                                <tr>
                                    <td><?= $index +1?></td>
                                    <td><?= $row['namauser']?></td>
                                    <td><?= $row['email']?></td>
                                    <td><?= $row
                                ['created_at']?></td>

                                    <td>
                                        {{-- <form action="{{ url('admin/users/'.$row['id']) }}" method="POST"
                                            onsubmit="return confirm('Apakah anda yakin menghapus data ini?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" name="submit" class="btn btn-danger btn-action"
                                                data-toggle="tooltip" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form> --}}

                                        &nbsp;
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                    onclick="confirmDelete('{{ route('delete.users', $row['id']) }}')"
                                        >
                                        <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
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

</script>

<!-- Page Specific JS File -->
@endpush
