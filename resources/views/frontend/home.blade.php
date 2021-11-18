@extends('frontend.master')
@section('content')
    {{-- ############################ Beshkichu ############################## --}}

<!--top brand panel start-->
<section class="brand-panel">
      <div class="brand-panel-box">
        <div class="brand-panel-contain ">
          <ul>
            <li><a href="javascript:void(0)">top brand</a></li>
            <li><a>:</a></li>
            <li><a href="javascript:void(0)">aerie</a></li>
            <li><a href="javascript:void(0)">baci lingrie</a></li>
            <li><a href="javascript:void(0)">gerbe</a></li>
            <li><a href="javascript:void(0)">jolidon</a></li>
            <li><a href="javascript:void(0)">Wonderbra</a></li>
            <li><a href="javascript:void(0)">Ultimo</a></li>
            <li><a href="javascript:void(0)">Vassarette </a></li>
            <li><a href="javascript:void(0)">Oysho</a></li>
          </ul>
        </div>
      </div>

</section>
  <!--top brand panel end-->

  <!--slider start-->
  <section class="theme-slider b-g-white " id="theme-slider">
    <div class="custom-container">
      <div class="row">
        <div class="col">
          <div class="slide-1 no-arrow">
              @foreach ($sliders as $slider)
                <div>
                    <div class="slider-banner p-center slide-banner-1">
                        <div class="slider-img">
                            <ul class="layout1-slide-1">
                                <li id="img-1">
                                  <img style="max-width:500px;" src="{{ asset('assets/images/slider-image/'.$slider->image)}}" class="img-fluid" alt="{{ $slider->title }}">
                                </li>
                                <li id="img-2">
                                  <img style="max-width:500px;" src="{{ asset('assets/images/slider-image/'.$slider->image)}}" class="img-fluid" alt="{{ $slider->title }}">
                                </li>
                            </ul>
                        </div>
                        <div class="slider-banner-contain">
                            <div>
                                <h1>{{$slider->title}}</h1>
                                <h4></h4>
                                <h2>Pixel Perfect Deal Camera</h2>
                                @if ($slider->url)
                                  <a href="https://{{ $slider->url }}" class="btn btn-normal">
                                  Shop Now
                                  </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--slider end-->

  <!--collection banner start-->
  <section class="collection-banner section-pt-space b-g-white ">
    <div class="custom-container">
      <div class="row collection2">
          @foreach ($categories as $category)
          @if ($loop->index <3)

            <div class="col-md-4 m-auto">
                <a href="{{ route('frontend.category.product',$category->slug) }}">

                    <div class="collection-banner-main banner-1  p-right">
                        <div class="collection-img">
                        <img src="{{ asset('assets/images/layout-2/collection-banner/'.$category->image) }}" class="img-fluid bg-img  " alt="{{ $category->name }}">
                        </div>
                        <div class="collection-banner-contain">
                        <div>
                            <h4>{{ $category->name }}</h4>
                            {{--  <h4>fashion</h4>  --}}
                            <div class="shop">

                            </div>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
          @endif
          @endforeach
      </div>
    </div>
  </section>
  <!--collection banner end-->

  <!--discount banner start-->
  <section class="discount-banner">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="discount-banner-contain">

            <div class="rounded-contain rounded-inverse">
              <div class="rounded-subcontain">
                How does it feel, when you see great discount deals for each product?
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--discount banner end-->

  <!--tab product-->
  <section class="section-pt-space" >
    <div class="tab-product-main">
      <div class="tab-prodcut-contain">
        <ul class="tabs tab-title">
            @foreach ($categories as $category)
                @if ($category->product->first())
                    <li class="@if ($loop->index==0) current @endif"><a href="tab-{{ $loop->index +1 }}">{{ $category->name }}</a></li>
                @endif
            @endforeach
        </ul>
      </div>
    </div>
  </section>
  <!--tab product-->

  <!-- slider tab  -->
  <section class="section-py-space ratio_square product">
    <div class="custom-container">
      <div class="row">
        <div class="col pr-0">
          <div class="theme-tab product mb--5">
            <div class="tab-content-cls ">
                @foreach ($categories as $category)
                    @if ($category->product->first())
                        <div id="tab-{{ $loop->index +1 }}" class="tab-content @if($loop->index== 0) active default @endif ">
                            <div class="product-slide-6 product-m no-arrow">
                                @foreach ($category->product as $product)
                                    <div>
                                        <div class="product-box">
                                            <div class="product-imgbox">
                                                <div class="product-front">
                                                <img src="{{ asset('assets/images/product/'.$product->created_at->format('Y/m/d').'/'.$product->id.'/thumbnail/'.$product->thumbnail) }}" class="img-fluid  " alt="{{$product->name}}">
                                                </div>
                                                <a href="{{ route('frontend.product.single',$product->slug) }}">
                                                    <div class="product-back">
                                                        @foreach ($product->imageGallery as $imageGallery)
                                                            @if ($loop->index == 0)
                                                                <img src="{{ asset('assets/images/product/'.$product->created_at->format('Y/m/d').'/'.$product->id.'/image_galleries/'.$imageGallery->name) }}" class="img-fluid  " alt="{{$product->name}}">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </a>
                                                <div class="product-icon icon-inline">
                                                <a href="{{ route('frontend.product.single',$product->slug) }}">
                                                    <i class="ti-bag" ></i>
                                                </a>
                                                @php
                                                    $w = $wishlistProduct->where('cookie_id',Cookie::get('jesco_ecommerce'))->where('product_id',$product->id)->first();
                                                @endphp
                                                {{--  @if ($w)  --}}
                                                   {{-- <div class="wishlist-area{{$product->id}}">
                                                        <button   type="button" data-id="{{ $product->id }}" title="Add to Wishlist" class="action wishlist add-wishlist">
                                                            <i class="ti-heart" aria-hidden="true"></i>
                                                        </button>
                                                   </div> --}}
                                                {{--  @else
                                                    <button href="javascript:void(0)" type="button" data-id="{{ $product->id }}" title="Add to Wishlist" class="action wishlist add-wishlist wishlist-product{{$product->id}}">
                                                        <i class="ti-heart" aria-hidden="true"></i>
                                                    </button>
                                                @endif  --}}
                                                {{--  <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                    <i class="ti-search" aria-hidden="true"></i>
                                                </a>
                                                <a href="compare.html" title="Compare">
                                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                                </a>  --}}
                                                </div>
                                                <div class="new-label1">
                                                <div>new</div>
                                                </div>
                                                <div class="on-sale1">
                                                on sale
                                                </div>
                                            </div>
                                            <div class="product-detail detail-inline ">
                                                <div class="detail-title">
                                                <div class="detail-left">
                                                    <div class="rating-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="#">
                                                    <h6 class="price-title">
                                                        {{ $product->name }}
                                                    </h6>
                                                    </a>
                                                </div>
                                                <div class="detail-right">
                                                    <div class="check-price">
                                                        ৳{{ $product->attribute->max('regular_price') }}
                                                    </div>
                                                    <div class="price">
                                                    <div class="price">
                                                        ৳{{ $product->attribute->min('offer_price') }}
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- slider tab end -->

  <!--title start-->
<div class="title1 section-my-space" style="background: #002340">
    <h4 class="text-white">Latest Products (Retail)</h4>
  </div>
  <!--title end-->

  <!--product start-->
  <section class="product section-pb-space mb--5">
    <div class="custom-container">
      <div class="row">
        <div class="col pr-0">
          <div class="product-slide-6 no-arrow">
            @foreach ($productLatest as $product)
            <div class="product-box">
                <div class="product-imgbox">
                    <div class="product-front">
                    <img src="{{ asset('assets/images/product/'.$product->created_at->format('Y/m/d').'/'.$product->id.'/thumbnail/'.$product->thumbnail) }}" class="img-fluid  " alt="{{$product->name}}">
                    </div>
                    <a href="{{ route('frontend.product.single',$product->slug) }}">
                        <div class="product-back">
                            @foreach ($product->imageGallery as $imageGallery)
                                @if ($loop->index == 0)
                                    <img src="{{ asset('assets/images/product/'.$product->created_at->format('Y/m/d').'/'.$product->id.'/image_galleries/'.$imageGallery->name) }}" class="img-fluid  " alt="{{$product->name}}">
                                @endif
                            @endforeach
                        </div>
                    </a>
                    <div class="product-icon icon-inline">
                    <a href="{{ route('frontend.product.single',$product->slug) }}">
                        <i class="ti-bag" ></i>
                    </a>
                    @php
                        $w = $wishlistProduct->where('cookie_id',Cookie::get('jesco_ecommerce'))->where('product_id',$product->id)->first();
                    @endphp
                    {{--  @if ($w)  --}}
                       {{-- <div class="wishlist-area{{$product->id}}">
                            <button   type="button" data-id="{{ $product->id }}" title="Add to Wishlist" class="action wishlist add-wishlist">
                                <i class="ti-heart" aria-hidden="true"></i>
                            </button>
                       </div> --}}
                    {{--  @else
                        <button href="javascript:void(0)" type="button" data-id="{{ $product->id }}" title="Add to Wishlist" class="action wishlist add-wishlist wishlist-product{{$product->id}}">
                            <i class="ti-heart" aria-hidden="true"></i>
                        </button>
                    @endif  --}}
                    {{--  <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                        <i class="ti-search" aria-hidden="true"></i>
                    </a>
                    <a href="compare.html" title="Compare">
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </a>  --}}
                    </div>
                    <div class="new-label1">
                    <div>new</div>
                    </div>
                    <div class="on-sale1">
                    on sale
                    </div>
                </div>
                <div class="product-detail detail-inline ">
                    <div class="detail-title">
                    <div class="detail-left">
                        <div class="rating-star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        </div>
                        <a href="#">
                        <h6 class="price-title">
                            {{ $product->name }}
                        </h6>
                        </a>
                    </div>
                    <div class="detail-right">
                        <div class="check-price">
                            ৳{{ $product->attribute->max('regular_price') }}
                        </div>
                        <div class="price">
                        <div class="price">
                            ৳{{ $product->attribute->min('offer_price') }}
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div>

            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-12  text-center">
          <a class="btn btn-custom"  href="{{ route('frontend.product') }}">See All</a>
        </div>
      </div>
    </div>
  </section>
  <!--product end-->
  <!--testimonial start-->
  {{--  <section class="testimonial testimonial-inverse">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="slide-1 no-arrow">
            <div>
              <div class="testimonial-contain">
                <div class="media">
                  <div class="testimonial-img">
                    <img src="../assets/images/testimonial/1.jpg" class="img-fluid rounded-circle  " alt="testimonial">
                  </div>
                  <div class="media-body">
                    <h5>mark jecno</h5>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="testimonial-contain">
                <div class="media">
                  <div class="testimonial-img">
                    <img src="../assets/images/testimonial/2.jpg" class="img-fluid rounded-circle  " alt="testimonial">
                  </div>
                  <div class="media-body">
                    <h5>mark jecno</h5>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="testimonial-contain">
                <div class="media">
                  <div class="testimonial-img">
                    <img src="../assets/images/testimonial/3.jpg" class="img-fluid rounded-circle  " alt="testimonial">
                  </div>
                  <div class="media-body">
                    <h5>mark jecno</h5>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  --}}
  <!--testimonial end-->



  <!--Newsletter modal popup start-->
  {{--  <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="news-latter">
            <div class="modal-bg">
              <div class="offer-content">
                <div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h2>newsletter</h2>
                  <p>Subscribe to our website mailling list <br> and get a Offer, Just for you!</p>
                  <form action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda" class="auth-form needs-validation" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                    <div class="form-group mx-sm-3">
                      <input type="email" class="form-control" name="EMAIL" id="mce-EMAIL" placeholder="Enter your email" required="required">
                      <button type="submit" class="btn btn-theme btn-normal btn-sm " id="mc-submit">subscribe</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  --}}
  <!--Newsletter Modal popup end-->
  <!-- notification product -->

    {{-- ############################ Beshkichu ############################## --}}


<script src="{{ asset('assets/js/slider-animat.js') }}"></script>
<script src="{{ asset('assets/js/timer.js') }}"></script>
@endsection
@section('inline_style')
    <style>
        .wishlist-active{
            background: #000 !important;
            color: #fff !important;
        }
        .btn-custom{
            background: #002340 !important;
            color:#fff !important;
            border:3px solid #002340 !important;
        }
        .btn-custom:hover{
            background: #002391  !important;
            color:#fff !important;
            border:3px solid #002340;
        }
    </style>
@endsection
@section('footer_js')
<script>
        $(document).ready(function(){
            $('.add-wishlist').click(function(){
                // alert('hell');
            })
            $('.add-wishlist').click(function(){
                var product_id = $(this).attr('data-id');
                // alert(product_id);
                $.ajax({
                    type: "GET",
                    url: "{{ url('wishlist/add') }}/"+product_id,
                    success:function(res){
                        // console.log(res);
                    }
                });
            });

        });
</script>
@endsection

