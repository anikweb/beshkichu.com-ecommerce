@extends('backend.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active">Requested Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!--container-fluid -->
    </div>
    <div class="content">
       <div class="row">
           <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Requested Products</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-bordered">
                               <thead>
                                   <tr class="text-center">
                                       <th>#</th>
                                       <th>Product Name</th>
                                       <th>Request Id</th>
                                       <th>Mobile</th>
                                       <th>Email</th>
                                       <th>Status</th>
                                       <th>Requested at</th>
                                       <th>Action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @forelse ($requests as $request)
                                        <tr class="text-center">
                                            <td>{{ $requests->firstItem() +$loop->index }}</td>
                                            <td>{{ $request->product_name }}</td>
                                            <td>{{ $request->request_id }}</td>
                                            <td>{{ $request->mobile }}</td>
                                            <td>{{ $request->email }}</td>
                                            <td>@if ($request->status==1) <span class="badge badge-primary p-2">Pending</span> @elseif ($request->status==2) <span class="badge badge-success p-2">Picked</span> @elseif ($request->status==3) <span class="badge badge-danger p-2">Declined</span> @endif </td>
                                            <td>{{ $request->created_at->format('m/d/Y, h:i A') }}</td>
                                            <td>
                                                <a  href="{{ route('backend.requested.product.show',$request->id) }}"  class="btn btn-primary"><i class="fa fa-eye"></i> Details</a>
                                                @if ($request->status == 1||$request->status == 3)
                                                    <button data-id="{{ $request->id }}" class="btn btn-success approve-btn"><i class="fa fa-check"></i> Pick</button>
                                                @endif
                                                @if ($request->status == 1||$request->status == 2)
                                                    <button data-id="{{ $request->id }}" class="btn btn-danger decline-btn"><i class="fa fa-times"></i> Decline</button>
                                                @endif
                                                @if ($request->status == 1||$request->status == 3)
                                                    <form id="approve_form{{ $request->id }}" action="{{ route('backend.requested.product.approve') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $request->id }}" name="request_id">
                                                    </form>
                                                @endif
                                                @if ($request->status == 1||$request->status == 2)
                                                    <form id="decline_form{{ $request->id }}" action="{{ route('backend.requested.product.decline') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $request->id }}" name="request_id">
                                                    </form>
                                                @endif

                                            </td>
                                        </tr>
                                   @empty
                                    <tr class="text-center">
                                        <td colspan="8"><i class="fa fa-exclamation-circle"></i> No Request Found</td>
                                    </tr>
                                   @endforelse
                               </tbody>
                           </table>
                        </div>
                    </div>
                </div>
           </div>
       </div>
    </div>
@endsection
@section('footer_js')
    <script>
        // Notification
        @if (session('success'))
            toastr["success"]("{{ session('success') }}");
        @elseif(session('error'))
            toastr["error"]("{{ session('error') }}");
        @endif
        $('.approve-btn').click(function(){
            var request_id = $(this).attr('data-id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure to pick this request?',
                // text: 'Invoice No:',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Pick!',
                cancelButtonText: 'Cancel!',
                reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                $("#approve_form"+request_id).submit();

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'This request steel now pending',
                )
            }
            })
        });
        $('.decline-btn').click(function(){
            var request_id = $(this).attr('data-id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure to decline this request?',
                // text: 'Invoice No:',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Decline!',
                cancelButtonText: 'Cancel!',
                reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                $("#decline_form"+request_id).submit();

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
    </script>
@endsection
