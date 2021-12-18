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
                    <div class="card">
                        <div class="card-body">
                           <div class="row">
                               <div class="col-6">
                                   <img class="img-fluid" src="{{ asset('assets/images/product-request/').$productRequest->created_at->format('/Y/m/d/').$productRequest->id.'/'.$productRequest->image }}" alt="">
                               </div>
                               <div class="col-6">
                                    <h3>Product Name: <span  class="text-dark">{{ $productRequest->product_name }}</span></h3>
                                    <h4>Request Id: <span  class="text-dark">{{ $productRequest->request_id }}</span></h4>
                                    <h4>Email: <span  class="text-dark">{{ $productRequest->email }}</span></h4>
                                    <h4>Mobile: <span  class="text-dark">{{ $productRequest->mobile }}</span></h4>
                                    <h4>Details: <span  class="text-dark lead">{{ $productRequest->details }}</span></h4>
                                    <h4>Quantity: <span  class="text-dark">{{ $productRequest->quantity }}</span></h4>
                                    <h4>Valid to: <span  class="text-dark">{{ $productRequest->valid_to }}</span></h4>
                                    <h4>Status: <span  class="text-dark">@if ($productRequest->status ==1) <span class="badge badge-primary p-2">Pending</span> @elseif ($productRequest->status ==2)  <span class="badge badge-success p-2">Picked</span> @elseif ($productRequest->status ==3)  <span class="badge badge-danger p-2">Declined</span> @endif </span></h4>
                                    <h4>Requested at: <span  class="text-dark">{{ $productRequest->created_at->format('m-d-Y') }}</span></h4>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
