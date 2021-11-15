@extends('frontend.master')
@section('inline_style')
<style>
    .product-right .size-box ul li {
        font-size: 16px;
        padding-top: 5px;

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
                            <h2>product</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('frontend.product') }}">product</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">{{ $product->name }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-big-pt-space bg-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick">
                            <div>
                                <img src="{{ asset('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/thumbnail/'.$product->thumbnail }}" alt="{{$product->name}}" class="img-fluid  image_zoom_cls-0">
                            </div>
                            @foreach ($product->imageGallery as $imageGallery)
                                <img src="{{ asset('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/image_galleries/'.$imageGallery->name }}" alt="{{$product->name}}" class="img-fluid  image_zoom_cls-{{ $loop->index+1 }}">
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav">
                                    <div>
                                        <img src="{{ asset('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/thumbnail/'.$product->thumbnail }}" alt="{{$product->name}}" class="img-fluid ">
                                    </div>
                                    @foreach ($product->imageGallery as $imageGallery)
                                        <div>
                                            <img src="{{ asset('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/image_galleries/'.$imageGallery->name }}" alt="{{$product->name}}" class="img-fluid ">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <form action="{{route('cart.store')}}" method="post">
                            @csrf
                            <input type="hidden" class="image_id" name="image_id" value="">
                            <input type="hidden" class="size_id" name="size_id" value="">
                            <input type="hidden" class="product_id" name="product_id" value="">
                            <div class="product-right">
                                <h2>{{ Str::upper($product->name) }}</h2>
                                <h4><del class="text-danger rPrice">{{ '৳'.$product->attribute->max('regular_price') }}</span></h4>
                                <h3 class="text-info offer_price">{{ '৳'.$product->attribute->min('offer_price') }}</h3>
                                <ul class="image-swatch">
                                    @foreach ($product->imageGallery as $imageGallery)
                                        <li class="active image_gallery_choose" image-id="{{ $imageGallery->id }}" product-id="{{ $product->id }}">
                                            <a href="javascript:void(0)">
                                                <img width="60px" src="{{ asset('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/image_galleries/'.$imageGallery->name }}" alt="{{ $product->name }}" class="img-fluid ">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="product-description border-product">
                                    @error('image_id')
                                        <div class="text-danger error-msg">
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <h6 class="product-title size-text sizeName"> {{-- Size name ajax --}}</h6>
                                    <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Size Chart</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body"><img src="../assets/images/size-chart.jpg" alt="" class="img-fluid "></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="size-box ">
                                        <ul class="size">
                                           {{-- Sizes Ajax --}}
                                        </ul>
                                    </div>
                                    @if (session('size_error'))
                                        <div class="text-danger error-msg size_id-error">
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ session('size_error') }}
                                        </div>
                                    @endif
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                            <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                                    </div>
                                    @error('quantity')
                                        <div class="text-danger error-msg">
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="product-buttons">
                                    <button type="submit" class="btn btn-normal">Add to Cart</button>
                                    <a href="#" class="btn btn-normal">buy now</a>
                                </div>
                                <div class="border-product">
                                    <label for="shipping_method">Estimate Delivery Date
                                    </label>
                                    <select name="" class="form-control" id="shipping_method">
                                        <option>Beshkichu Sourching Company (Time: {{ $product->delivery_deadline }} Days) ৳{{ $product->shipping_charge }}/KG </option>
                                    </select>
                                </div>
                                <div class="border-product bg-white px-2">
                                    <p> <i class="text-success fa fa-exclamation-circle"></i>Beshkichu Sourching Company শিপমেন্ট সিলেক্টের সময় টোটাল প্রাইসে শিপিং চার্জ যুক্ত থাকেনা, প্রোডাক্ট দেশে আসার পর ওজন করে (প্যাকেট সহ) ওজন অনুসারে প্রতি কেজিতে গুন করে শিপিং চার্জ যুক্ত হবে। এছাড়া টোটাল প্রাইসে দেশের ভিতরে ডেলিভারি চার্জও যুক্ত থাকেনা, এটি ডেলিভারি সময় পেমেন্ট করতে হবে।</p>
                                </div>
                                <div class="border-product">
                                    <h6 class="product-title">product details</h6>
                                    <p>{{ $product->summary }}</p>
                                </div>
                                <div class="border-product">
                                    <h6 class="product-title">Category: <span class="badge badge-info">{{ $product->category->name }}</span></h6>
                                </div>
                                <div class="border-product">
                                    <div class="product-icon">
                                        <ul class="product-social">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                        </ul>
                                        {{-- <form class="d-inline-block"> --}}
                                            <button class="wishlist-btn"><i class="fa fa-heart"></i><span class="title-font">Add To WishList</span></button>
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tab-product tab-exes">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                <div class="creative-card creative-inner">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">Description</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-selected="false">Details</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#top-contact" role="tab" aria-selected="false">Video</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-toggle="tab" href="#top-review" role="tab" aria-selected="false">Write Review</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">

                            <div class="single-product-tables">
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="width:50%">
                                        <tbody>
                                            <tr>
                                                <td>Main Upper Material</td>
                                                <td>{{ $product->main_upper_material }}</td>
                                                <td class="font-weight-bold">Main Upper Material</td>
                                                <td>{{ $product->main_upper_material }}</td>
                                            </tr>
                                            <tr>
                                                <td>Brand</td>
                                                <td>{{ $product->brand }}</td>
                                                <td class="font-weight-bold">Origin</td>
                                                <td>{{ $product->origin }}</td>
                                            </tr>
                                            <tr>
                                                <td>Authenticity</td>
                                                <td>{{ $product->authentic.'%' }}</td>
                                                <td class="font-weight-bold">Gender</td>
                                                <td>{{ $product->gender }}</td>
                                            </tr>
                                            <tr>
                                                <td>Warrenty</td>
                                                <td>{{ $product->warranty_name->warranty }}</td>
                                                <td class="font-weight-bold">Return</td>
                                                <td>{{ $product->return_name->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Subcategory</td>
                                                <td>{{ $product->subcategory->name }}</td>
                                                <td>Promotions</td>
                                                <td>{{ $product->promotions }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                            <div class="mt-4 text-center">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/BUWzX78Ye_8" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                            <form class="theme-form">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="media">
                                            <label>Rating</label>
                                            <div class="media-body ml-3">
                                                <div class="rating three-star"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter Your name" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Email" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="review">Review Title</label>
                                        <input type="text" class="form-control" id="review" placeholder="Enter your Review Subjects" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="review">Review Title</label>
                                        <textarea class="form-control" placeholder="Wrire Your Testimonial Here" id="exampleFormControlTextarea1" rows="6"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-normal" type="submit">Submit YOur Review</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products -->
<section class="section-big-py-space  ratio_asos bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-12 product-related">
                <h2>related products</h2>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 product">
                <div class="product-slide no-arrow">
                    @foreach ($product->category->product as $releted_product)
                        @if ($product->slug != $releted_product->slug)
                            <a class="d-inline-block" href="{{ route('frontend.product.single',$releted_product->slug) }}">
                                <div>
                                    <div class="product-box">
                                        <div class="product-imgbox">
                                            <div class="product-front">
                                                <img src="{{ asset('assets/images/product').'/'.$releted_product->created_at->format('Y/m/d/').$releted_product->id.'/thumbnail/'.$releted_product->thumbnail }}" class="img-fluid  " alt="{{$product->name}}">
                                            </div>
                                            @foreach ($releted_product->imageGallery as $imageGallery)
                                                @if ($loop->index ==0)
                                                    <div class="product-back">
                                                        <img src="{{ asset('assets/images/product').'/'.$releted_product->created_at->format('Y/m/d/').$releted_product->id.'/image_galleries/'.$imageGallery->name }}" class="img-fluid  " alt="{{$product->name}}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="product-detail detail-center ">
                                            <div class="detail-title">
                                                <div class="detail-left">
                                                    <div class="rating-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="">
                                                        <h6 class="price-title">
                                                            reader will be distracted.
                                                        </h6>
                                                    </a>
                                                </div>
                                                <div class="detail-right">
                                                    <div class="check-price">
                                                        $ 56.21
                                                    </div>
                                                    <div class="price">
                                                        <div class="price">
                                                            $ 24.05
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="icon-detail">
                                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                    <i class="ti-bag" ></i>
                                                </button>
                                                <a href="javascript:void(0)" title="Add to Wishlist">
                                                    <i class="ti-heart" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                    <i class="ti-search" aria-hidden="true"></i>
                                                </a>
                                                <a href="compare.html" title="Compare">
                                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- related products -->

@endsection
@section('inline_style')
<style>
    .stockout-btn{
        position: relative;
        padding: 0 35px;
        height: 50px;
        font-size: 14px;
        font-weight: 600;
        border: none;
        border-radius: 5px;
        box-shadow: none;
        text-transform: uppercase;
        display: inline-block;
        margin-left: 10px;
        background: #fb5d5d;
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        letter-spacing: 2px;
        cursor:context-menu !important;
    }
</style>
@endsection
@section('footer_js')
<script src="{{ asset('assets/js/jquery.elevatezoom.js') }}"></script>
    <script>
        $(document).ready(function(){
            // $('.image_gallery_choose').click(function() {
            //     $(this).attr('style','border:1px solid red');
            //     var image_id = $(this).attr('image-id');
            //     alert(image_id);
            // });

            $('.image_gallery_choose').click(function(){
                $('.error-msg').hide();

                $('.image_gallery_choose').attr('style','');
                $(this).attr('style','border:3px solid #002340');
                var image_id = $(this).attr('image-id');
                var productId = $(this).attr('product-id');
                $(".product_id").val(productId);
                $(".image_id").val(image_id);
                $(".product-right .size-box ul li").removeClass('active');
                $(".product-right .size-box ul .color_id"+image_id).addClass('active');
                // alert('hello');;
                $.ajax({
                    type: "GET",
                    url: "{{ url('get/color/size') }}/"+image_id+'/'+productId,
                    success:function(res){
                        if(res){
                            // console.log(res);
                            $('.sizeName').empty();
                            $('.sizeName').html('Select Size <span><a href="" data-toggle="modal" data-target="#sizemodal">size chart</a></span>');
                            $('.size').empty();
                            $('.size').html(res);
                            $('.sizeCheck').click(function(){
                                var price = $(this).attr('data-price');
                                var quantity = $(this).attr('data-quantity');
                                var rPrice = $(this).attr('data-rprice');
                                var size_id = $(this).attr('data-size');
                                $('.offer_price').html('৳'+price);
                                $('.rPrice').html('৳'+rPrice);
                                $('.size_id').val(size_id);
                                $('.sizeCheck').removeClass('active');
                                $('.sizeCheck'+size_id).addClass('active');
                            });
                        }else{
                            $('.sizeName').empty();
                            $('.size').empty();
                        }
                    }
                });
            });
        });
    </script>
@endsection
