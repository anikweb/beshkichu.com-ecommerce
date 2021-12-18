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
       <div class="row ">
           <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/product-request').'/'.$request->created_at->format('Y/m/d/').$request->id.'/'.$request->image }}" alt="{{ $request->product_name }}" class="card-img-top img-fluid">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Product Name:</th>
                                            <td><span  class="text-dark">{{ $request->product_name }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Request Id:</th>
                                            <td><span  class="text-dark">{{ $request->request_id }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td><span  class="text-dark">{{ $request->email }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile:</th>
                                            <td><span  class="text-dark">{{ $request->mobile }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Details:</th>
                                            <td><span  class="text-dark lead">{{ $request->details }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Targeted Price:</th>
                                            <td><span  class="text-dark">{{ $request->targeted_price }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Quantity:</th>
                                            <td><span  class="text-dark">{{ $request->quantity }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Valid to:</th>
                                            <td><span  class="text-dark">{{ $request->valid_to }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Status:</th>
                                            <td><span  class="text-dark">@if ($request->status ==1) <span class="badge badge-primary p-2">Pending</span> @elseif ($request->status ==2)  <span class="badge badge-success p-2">Picked</span> @elseif ($request->status ==3)  <span class="badge badge-danger p-2">Declined</span> @endif </span></td>
                                        </tr>
                                        <tr>
                                            <th>Requested at:</th>
                                            <td><span  class="text-dark">{{ $request->created_at->format('m-d-Y') }}</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
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
    </script>
@endsection
