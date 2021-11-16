@extends('frontend.master')

@section('content')
    <section class="section-big-py-space light-layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                        <h2>thank you</h2>
                        <p>Your Order Placed Successfull</p>
                        <p>Invoice No: {{ $order_summary->invoice_no }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-big-py-space mt--5 bg-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-order">
                        <h3>your order details</h3>
                        @foreach ($order_summary->order_details as $order)
                            <div class="row product-order-detail">
                                <div class="col-3">
                                    <img src="{{ asset('assets/images/product').'/'.$order->product->created_at->format('Y/m/d/').$order->product->id.'/thumbnail/'.$order->product->thumbnail }}" alt="{{ $order->product->name }}" class="img-fluid ">
                                </div>
                                <div class="col-3 order_detail">
                                    <div>
                                        <h4>Product Name</h4>
                                        <h5 class="text-center">{{ $order->product->name }}</h5>
                                    </div>
                                </div>
                                <div class="col-2 order_detail">
                                    <div>
                                        <h4>Size</h4>
                                        <h5 class="text-center">{{ $order->size_id }}</h5>
                                    </div>
                                </div>
                                <div class="col-2 order_detail">
                                    <div>
                                        <h4>quantity</h4>
                                        <h5 class="text-center">{{ $order->quantity }}</h5>
                                    </div>
                                </div>
                                <div class="col-2 order_detail">
                                    <div>
                                        <h4>price</h4>
                                        <h5 class="text-center">৳{{ $order->product->attribute->where('image_gallery_id',$order->image_id)->first()->offer_price}}</h5>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        <div class="total-sec">
                            <ul>
                                <li>subtotal <span>৳{{ $order_summary->sub_total }}</span></li>
                                @if ($order_summary->discount)
                                    <li>discount <span>-৳{{ $order_summary->discount }}</span></li>
                                @endif
                            </ul>
                        </div>
                        <div class="final-total">
                            <h3>total <span>${{ $order_summary->total_price }}</span></h3></div>
                        </div>
                        <div class="pt-2">
                            <i class="text-success fa fa-exclamation-circle"></i>MoveOn- Ship for me অর্ডার করার সময় টোটাল প্রাইসে শিপিং চার্জ যুক্ত থাকেনা, প্রোডাক্ট দেশে আসার পর ওজন করে (প্যাকেট সহ) ওজন অনুসারে প্রতি কেজিতে গুন করে (প্রোডাক্ট ভিত্তিক আলাদা আলাদা শিপিং চার্জ হতে পারে) শিপিং চার্জ যুক্ত হবে। এছাড়া টোটাল প্রাইসে দেশের ভিতরে ডেলিভারি চার্জও যুক্ত থাকেনা, এটি ডেলিভারি সময় পেমেন্ট করতে হবে।</p>
                        </div>
                </div>
                <div class="col-lg-6">
                    <div class="row order-success-sec">
                        <div class="col-sm-6">
                            <h4>summery</h4>
                            <ul class="order-detail">
                                <li><strong>Invoice No:</strong> {{ $order_summary->invoice_no }}</li>
                                <li><strong>Order Date:</strong> {{ $order_summary->created_at->format('d-M-y, h:i A') }}</li>
                                <li><strong>Order Total:</strong> ৳{{ $order_summary->total_price }}</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h4>shipping address</h4>
                            <ul class="order-detail">
                                <li>{{ $order_summary->billing_details->division->name }}</li>
                                <li>{{ $order_summary->billing_details->district->name }}</li>
                                <li>{{ $order_summary->billing_details->upazila->name }}</li>
                                <li>{{ $order_summary->billing_details->upazila->street_adress1 }}</li>
                                <li>{{ $order_summary->billing_details->upazila->street_adress2 }}</li>
                            </ul>
                        </div>
                        <div class="col-sm-12 payment-mode">
                            <h4>payment method</h4>
                            <p>{{ $order_summary->billing_details->payment_method }}</p>
                        </div>
                        <div class="col-md-12">
                            <div class="delivery-sec">
                                <h3>expected date of delivery</h3>
                                <h2>20-25 Days</h2></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
