@extends('frontend.master')
@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Requested Product Details</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('frontend.requested.product.index') }}">Requested Product</a></li>
                                <li><a href="javascript:void(0)">Details</a></li>
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
                    <div class="card">
                        <div class="row">
                            <div class="col-6">
                                <img class="card-img-top img-fluid" src="{{ asset('assets/images/product-request/').$productRequest->created_at->format('/Y/m/d/').$productRequest->id.'/'.$productRequest->image }}" alt="">
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Product Name:</th>
                                                <td><span  class="text-dark">{{ $productRequest->product_name }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Request Id:</th>
                                                <td><span  class="text-dark">{{ $productRequest->request_id }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Email:</th>
                                                <td><span  class="text-dark">{{ $productRequest->email }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Mobile:</th>
                                                <td><span  class="text-dark">{{ $productRequest->mobile }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Details:</th>
                                                <td><span  class="text-dark lead">{{ $productRequest->details }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Quantity:</th>
                                                <td><span  class="text-dark">{{ $productRequest->quantity }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Targeted Price:</th>
                                                <td><span  class="text-dark">{{ $productRequest->targeted_price }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Valid to:</th>
                                                <td><span  class="text-dark">{{ $productRequest->valid_to }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Status:</th>
                                                <td><span  class="text-dark">@if ($productRequest->status ==1) <span class="badge badge-primary p-2">Pending</span> @elseif ($productRequest->status ==2)  <span class="badge badge-success p-2">Picked</span> @elseif ($productRequest->status ==3)  <span class="badge badge-danger p-2">Declined</span> @endif </span></td>
                                            </tr>
                                            <tr>
                                                <th>Requested at:</th>
                                                <td><span  class="text-dark">{{ $productRequest->created_at->format('m-d-Y') }}</span></td>
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
    </section>
@endsection
