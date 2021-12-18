@extends('frontend.master')
@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Requested Product</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">Requested Product</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-big-py-space bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Request Id</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($requests as $request)
                                    <tr>
                                        <td class="text-center">{{ $requests->firstItem() + $loop->index }}</td>
                                        <td class="text-center">{{ $request->product_name }}</td>
                                        <td class="text-center">{{ $request->request_id }}</td>
                                        <td class="text-center">@if ($request->status ==1) <span class="badge badge-primary p-2">Pending</span> @elseif ($request->status ==2)  <span class="badge badge-success p-2">Picked</span> @elseif ($request->status ==3)  <span class="badge badge-danger p-2">Declined</span> @endif</td>
                                        <td class="text-center">
                                            <a href="{{ route('product-request.show',$request->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> <span class="d-none d-sm-inline-block ">Details</span></a>
                                            {{-- <button type="button" class="btn btn-danger mt-2 mt-sm-0"><i class="fa fa-times"></i> <span class="d-none d-sm-inline-block ">Cancel</span> </button> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4"><i class="fa fa-exclamation-circle"></i> No Product Request Exists</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $requests->links() }}
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
            Swal.fire({
                title: 'Success!',
                icon: 'success',
                confirmButtonText: 'Done'
            });
        @endif
    </script>
@endsection
