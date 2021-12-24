@extends('backend.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FAQ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active">FAQ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">FAQ</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="faq_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Summary</th>
                                        <th>Created</th>
                                        @if (auth()->user()->can('faq edit')||auth()->user()->can('faq trash'))
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($faqs as $faq)
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            <td>{{ $faq->title }}</td>
                                            <td>{{ $faq->summary }}</td>
                                            <td>{{ $faq->created_at->format('d-M-Y') }}</td>
                                            @if (auth()->user()->can('faq edit')||auth()->user()->can('faq trash'))
                                                <td>
                                                    @can('faq edit')
                                                        <a class="btn btn-primary" href="{{ route('faq.edit',$faq->id) }}"><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                    <form class="d-inline " id="faq_delete_form{{ $faq->id }}" action="{{ route('faq.destroy',$faq->id) }}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                    </form>
                                                    @can('faq trash')
                                                        <button data-id="{{ $faq->id }}" type="submit" class="btn btn-danger faq_delete_btn"><i class="fa fa-trash"></i></button>
                                                    @endcan
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-muted text-center"><i class="fa fa-exclamation-circle"></i> No data found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_js')
    <script>
        @if (session('success'))
            toastr["success"]("{{ session('success') }}");
        @elseif(session('error'))
            toastr["error"]("{{ session('error') }}");
        @endif

        $('.faq_delete_btn').click(function(){
            var faq_id = $(this).attr('data-id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure to delete this FAQ?',
                // text: 'Invoice No:',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                $("#faq_delete_form"+faq_id).submit();

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',

                )
            }
            })
        });
        $(document).ready( function () {
            $('#faq_table').DataTable();
        } );
    </script>
@endsection
