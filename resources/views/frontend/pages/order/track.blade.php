@extends('frontend.master')
@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Track Order</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">Track Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- section start -->
<section class="section-big-py-space bg-light">
    <div class="container">
        <div class="row bg-white p-4 rounded">

            <div class="col-sm-12 col-md-12 col-lg-12 ">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                    <div class="tab-pane fade active show" id="account-details">
                        <h3 class="text-center pb-4">Track Order </h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="track-input-mobile-box" class="form-control py-3" placeholder="Billing Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="track-input-box" class="form-control py-3" placeholder="Enter Invoice No">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="form-group">
                                                <button id="track-input-btn" class="btn btn-primary" type="button">Track Order</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card search-result" style="display: none;">
                    <div class="card-header bg-primary ">
                        <h3 class="card-title text-white "> Track Order</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center" >
                                    <img width="400px" class="img-fluid pickup-in-progress" src="{{ asset('assets/images/order-status/pickup_in_progress.png') }}" alt="">
                                    <img width="400px" class="img-fluid shipped" src="{{ asset('assets/images/order-status/order_shipped.png') }}" alt="">
                                    <img width="400px" class="img-fluid out-for-delivery" src="{{ asset('assets/images/order-status/out_for_delivery.png') }}" alt="">
                                    <img width="400px" class="img-fluid order-delivered" src="{{ asset('assets/images/order-status/order_delivered.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Invoice</th>
                                        <th>Order Date</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <input class="hidden-invoice" type="hidden" value="">
                                        <td class="status"></td>
                                        <td class="invoice-data"></td>

                                        <td class="date-data"></td>
                                        <td class="amount-data"></td>
                                        <td><a data-invoice="" class="detail-btn" href="javascript:void(0)">Details</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card details-heading">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fa fa-info-circle"></i> Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="bill_info_container">
                                    {{-- Ajax --}}
                                </div>
                                <div class="table-responsive pt-2">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="4%">SL</th>
                                                <th width="50%">Product</th>
                                                <th width="5%">Size</th>
                                                <th width="5%">Price</th>
                                                <th width="10%">Shipping charge per kg{{-- (notincludedintotalammount) --}}</th>
                                                <th width="5%">QTY</th>
                                                <th width="5">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="details-full">
                                            {{-- Ajax --}}
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="card search-fail" style="display: none">
                    <div class="card-header bg-primary ">
                        <h3 class="card-title text-white "> Track Order</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="bg-danger p-3">
                            <p class="lead text-light"><i class="fa fa-exclamation-circle"></i> No Orders Found by matching this Invoice <span class="fail-invoice"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection
@section('footer_js')
    <script>
        $(document).ready(function(){
            $("#track-input-btn").click(function(){
                var invoice_no = $("#track-input-box").val();
                var mobile = $("#track-input-mobile-box").val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('my-account/orders/track/search') }}/"+invoice_no+'/'+mobile,
                    success:function(res){
                        if(res){
                            $('.details-heading').hide();
                            $('.order-delivered').hide();
                            $('.out-for-delivery').hide();
                            $('.shipped').hide();
                            $('.pickup-in-progress').hide();
                            $('.search-fail').hide();
                            $(".search-result").show();
                            $(".search-result").animate({top:'10px'});
                            $('.hidden-invoice').val(res.invoice_no);
                            $('.invoice-data').html(res.invoice_no);
                            var timestamp = res.created_at;
                            var date = new Date(timestamp);
                            $('.date-data').html(date.getDate()+'-'+date.getMonth()+'-'+date.getFullYear());
                            $('.amount-data').html('৳'+res.total_price);
                            if(res.current_status == 1){
                                $('.status').html('Picup in Progress');
                                $('.pickup-in-progress').show();
                            }else if (res.current_status == 2){
                                $('.status').html('Shipped');
                                $('.shipped').show();
                            }else if (res.current_status == 3){
                                $('.status').html('Out for Delivery');
                                $('.out-for-delivery').show();
                            }else if (res.current_status == 4){
                                $('.status').html('Order delivered');
                                $('.order-delivered').show();
                            }else if (res.current_status == 5){
                                $('.status').html('Canceled');
                            }
                            var invoice =  res.invoice_no;
                            // alert(invoice);
                            // $(".details-data").attr("data-invoice", "hello"+invoice);
                            // $('.details-data').html('<a href="">Details<a>');

                        }else{
                            $(".search-result").hide();
                            $('.search-fail').show();
                            $('.fail-invoice').html('\''+invoice_no+'\' and this mobile number: \'' + mobile+ '\'');

                        }
                    }
                });
            });
            $('.detail-btn').click(function() {
                var invoice = $(".hidden-invoice").val();
                // alert(invoice);
                $.ajax({
                    type: "GET",
                    url: "{{ url('my-account/orders/track/product/details') }}/"+invoice,
                    success:function(res){
                        if(res){
                            $('.details-heading').show();
                            $('.details-heading').animate({top:'5px'});
                            $('.bill_info_container').html(res);
                        }
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "{{ url('my-account/orders/track/product/details/full') }}/"+invoice,
                    success:function(res){
                        if(res){
                            $('.details-full').html(res);
                        }
                    }
                });
            });
        });
    </script>
@endsection
