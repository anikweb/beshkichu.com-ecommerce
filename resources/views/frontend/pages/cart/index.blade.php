@extends('frontend.master')
@section('inline_style')
    <style>
    #add_voucher_input {
        width: 100%;
        height: 30%;
        border: 1px solid #00baf2 ;
    }
    .cart-section tfoot tr td{
        margin: 6px !important;
        padding: 6px !important;
    }
    </style>
@endsection
@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>cart</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="cart-section section-big-py-space bg-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">Size</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">action</th>
                            <th scope="col">subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $cartTotalPrice =0;
                            @endphp
                            @forelse ($carts as $cart)
                                <tr>
                                    <td>
                                        <a href="{{ route('frontend.product.single',$cart->image->product->slug) }}">
                                            <img src="{{ asset('assets/images/product').'/'.$cart->image->product->created_at->format('Y/m/d/').$cart->image->product->id.'/image_galleries/'.$cart->image->name }}" class="img-fluid  " alt="{{$cart->image->product->name}}">
                                        </a>
                                    </td>


                                    <td>{{ $cart->product->name }}
                                        @php
                                        // $offers = App\Models\Product_Attribute::where('product_id',$cart->product_id)->where('image_gallery_id',$cart->image_id)->where('size_id',$cart->size_id)->get();
                                        $offer_price = App\Models\Product_Attribute::where('product_id',$cart->product_id)->where('image_gallery_id',$cart->image_id)->first()->offer_price;
                                        @endphp
                                        <div class="mobile-cart-content row">
                                            <div class="col-xs-3">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number qty-box{{$cart->id}}" value="1">
                                                    <h5>{{$cart->quantity}} * </h5>
                                                </div>
                                                {{-- <div class="qty-box">
                                                    <div class="input-group product-quantity" data-id="{{ $cart->id }}>
                                                        <input type="text" name="quantity" class="form-control input-number qty-box{{$cart->id}}" value="1">
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="col-xs-3">
                                                <h2 class="td-color">৳ {{ $offer_price }}</h2>
                                            </div>
                                            <div class="col-xs-3">
                                                <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a></h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $cart->size_id }}</td>
                                    <td>
                                        <h2 class="td-color">৳ {{ $offer_price }}</h2>
                                    <td class="product-quantity" >
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input data-id="{{ $cart->id }}" type="number" name="quantity" class="form-control input-number qty-boxs qty-box{{$cart->id}}" min="1" value="{{ $cart->quantity}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="{{ route('cart.delete',$cart->id) }}" class="icon"><i class="ti-close"></i></a></td>
                                    <td>
                                        <h2 class="td-color proSubtotal{{$cart->id }}">৳{{ $subtotal =  $cart->quantity * $offer_price   }}</h2>

                                    </td>
                                    @php
                                        $cartTotalPrice = $cartTotalPrice + $subtotal;
                                    @endphp
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"><i class="fa fa-exclamation-circle"></i> Empty</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="row cart-buttons mb-2">
                        <div class="col-12">
                            <a href="{{ url()->current() }}" class="btn btn-info">Update Carts</a>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <table class="table cart-table table-responsive-md">
                                <tfoot>
                                        <tr>
                                            <td>Total Price :</td>
                                            <td>
                                                <h2>৳{{ $cartTotalPrice }}</h2>
                                            <td>
                                        </tr>
                                </tfoot>
                                @php
                                    session()->put('s_subtotal',$cartTotalPrice);
                                    session()->put('s_total',$cartTotalPrice);
                                @endphp
                            </table>
                            <div class="row cart-buttons">
                                <div class="col-12"><a href="{{ route('frontend.product') }}" class="btn btn-normal">Continue shopping</a>
                                <a href="{{ route('checkout.index') }}" class="btn btn-normal">check out</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
@section('footer_js')
    <script>
        $("#add_voucher_btn").click(function(){
            var voucherInput =  $("#add_voucher_input").val();
            if(voucherInput !=''){
                window.location.href = "{{ route('cart.index') }}/"+voucherInput;
            }
        });
        $("#remove_voucher_btn").click(function(){
            window.location.href = "{{ route('cart.remove.voucher') }}";
        });
        $('.quantity').change(function() {
            alert('hello');
        })
        // $('.product-quantity').click(function(){

        // var quantity = $('.qty-box'+cart_id).val();
            $('.qty-boxs').change(function() {
                var cart_id = $(this).attr('data-id');
                var  quantity = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('cart/quantity/update') }}/"+cart_id+"/"+quantity,
                    success:function(res){
                        if(res){
                            console.log('.proSubtotal'+cart_id);
                            $('.proSubtotal'+cart_id).html('৳'+res*quantity);

                        }
                    }
                });
            })
            // $('.qty-boxs').change(function() {
            //     var cart_id = $(this).attr('data-id');
            //     $.ajax({
            //         type: "GET",
            //         url: "{{ url('cart/quantity/total-price') }}/"+cart_id,
            //         success:function(res){
            //             if(res){
            //                 // console.log('.proSubtotal'+cart_id);
            //                 // $('.proSubtotal'+cart_id).html('৳'+res*quantity);
            //                 alert(res);

            //             }
            //         }
            //     });
            // })

    //    });
    </script>
@endsection
