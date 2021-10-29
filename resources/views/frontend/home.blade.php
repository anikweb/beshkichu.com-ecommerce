@extends('frontend.master')
@section('content')
    {{-- ############################ Beshkichu ############################## --}}

<!--top brand panel start-->
<section class="brand-panel">
    <div class="brand-panel-box">
      <div class="brand-panel-contain ">
        <ul>
          <li><a href="#">top brand</a></li>
          <li><a>:</a></li>
          <li><a href="category-page(left-sidebar).html">aerie</a></li>
          <li><a href="category-page(left-sidebar).html">baci lingrie</a></li>
          <li><a href="category-page(left-sidebar).html">gerbe</a></li>
          <li><a href="category-page(left-sidebar).html">jolidon</a></li>
          <li><a href="category-page(left-sidebar).html">Wonderbra</a></li>
          <li><a href="category-page(left-sidebar).html">Ultimo</a></li>
          <li><a href="category-page(left-sidebar).html">Vassarette </a></li>
          <li><a href="category-page(left-sidebar).html">Oysho</a></li>
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
                                  <img style="max-width:500px;" src="{{ asset('assets/images/slider-image/'.$slider->image)}}" class="img-fluid" alt="slider">
                                </li>
                                <li id="img-2">
                                  <img style="max-width:500px;" src="{{ asset('assets/images/slider-image/'.$slider->image)}}" class="img-fluid" alt="slider">
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
        <div class="col-md-4">
          <div class="collection-banner-main banner-1  p-right">
            <div class="collection-img">
              <img src="../assets/images/layout-2/collection-banner/1.jpg" class="img-fluid bg-img  " alt="banner">
            </div>
            <div class="collection-banner-contain">
              <div>
                <h3>women</h3>
                <h4>fashion</h4>
                <div class="shop">
                  <a>
                    shop now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="collection-banner-main banner-1 p-right">
            <div class="collection-img">
              <img src="../assets/images/layout-2/collection-banner/2.jpg" class="img-fluid bg-img  " alt="banner">
            </div>
            <div class="collection-banner-contain ">
              <div>
                <h3>camera</h3>
                <h4>lenses</h4>
                <div class="shop">
                  <a>
                    shop now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="collection-banner-main banner-1 p-right">
            <div class="collection-img">
              <img src="../assets/images/layout-2/collection-banner/3.jpg" class="img-fluid bg-img  " alt="banner">
            </div>
            <div class="collection-banner-contain ">
              <div>
                <h3>refrigerator</h3>
                <h4>lG mini</h4>
                <div class="shop">
                  <a>
                    shop now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
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
            <h2>Discount on every single item on our site.</h2>
            <h1><span>OMG! Just Look at the</span> <span>great Deals!</span></h1>
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
                        <div id="tab-{{ $loop->index +1 }}" class="tab-content @if($loop->index==0) active default @endif ">
                            <div class="product-slide-6 product-m no-arrow">
                                @foreach ($category->product as $product)
                                    <div>
                                        <div class="product-box">
                                            <div class="product-imgbox">
                                                <div class="product-front">
                                                <img src="{{ asset('assets/images/product/'.$product->created_at->format('Y/m/d').'/'.$product->id.'/thumbnail/'.$product->thumbnail) }}" class="img-fluid  " alt="product">
                                                </div>
                                                <a href="{{ route('frontend.product.single',$product->slug) }}">
                                                    <div class="product-back">
                                                        @foreach ($product->imageGallery as $imageGallery)
                                                            @if ($loop->index == 0)
                                                                <img src="{{ asset('assets/images/product/'.$product->created_at->format('Y/m/d').'/'.$product->id.'/image_galleries/'.$imageGallery->name) }}" class="img-fluid  " alt="product">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </a>
                                                <div class="product-icon icon-inline">
                                                <button onclick="openCart()">
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

  <!--collection banner start-->
  <section class="collection-banner section-pb-space ">
    <div class="custom-container">
      <div class="row">
        <div class="col">
          <div class="collection-banner-main banner-5 p-center">
            <div class="collection-img">
              <img src="../assets/images/layout-2/collection-banner/7.jpg" class="bg-img  " alt="banner">
            </div>
            <div class="collection-banner-contain ">
              <div class="sub-contain">
                <h3>save up to 30% off</h3>
                <h4>women<span>fashion</span></h4>
                <div class="shop">
                  <a class="btn btn-normal" href="#">
                    shop now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--collection banner end-->

  <!--deal banner start-->
  <section class="deal-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="deal-banner-containe">
            <h2>
              save up to  30% to 40% off
            </h2>
            <h1>
              omg! just look at the great deals!
            </h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4 ">
          <div class="deal-banner-containe">
            <diV class="deal-btn">
              <a class="btn-white">
                View more
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--deal banner end-->

  <!--rounded category start-->
  <section class="rounded-category">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="slide-6 no-arrow">
            <div>
              <div class="category-contain">
                <a href="#">
                  <div class="img-wrapper">
                    <img src="../assets/images/layout-1/rounded-cat/1.png" alt="category  " class="img-fluid">
                  </div>
                  <div>
                    <div  class="btn-rounded">
                      flower
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div>
              <div class="category-contain">
                <a href="#">
                  <div class="img-wrapper">
                    <img src="../assets/images/layout-1/rounded-cat/2.png" alt="category " class="img-fluid">
                  </div>
                  <div>
                    <div class="btn-rounded">
                      Furniture
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div>
              <div class="category-contain">
                <a href="#">
                  <div class="img-wrapper">
                    <img src="../assets/images/layout-1/rounded-cat/3.png" alt="category " class="img-fluid">
                  </div>
                  <div>
                    <div class="btn-rounded">
                      Bag
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div>
              <div class="category-contain">
                <a href="#">
                  <div class="img-wrapper">
                    <img src="../assets/images/layout-1/rounded-cat/4.png" alt="category" class="img-fluid ">
                  </div>
                  <div>
                    <div class="btn-rounded">
                      Tools
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div>
              <div class="category-contain">
                <a href="#">
                  <div class="img-wrapper">
                    <img src="../assets/images/layout-1/rounded-cat/5.png" alt="category" class="img-fluid ">
                  </div>
                  <div>
                    <div class="btn-rounded">
                      Grocery
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div>
              <div class="category-contain">
                <a href="#">
                  <div class="img-wrapper">
                    <img src="../assets/images/layout-1/rounded-cat/6.png" alt="category" class="img-fluid ">
                  </div>
                  <div>
                    <div class="btn-rounded">
                      camera
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div>
              <div class="category-contain">
                <a href="#">
                  <div class="img-wrapper">
                    <img src="../assets/images/layout-1/rounded-cat/7.png" alt="category" class="img-fluid ">
                  </div>
                  <div>
                    <div class="btn-rounded">
                      cardigans
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--rounded category end-->

  <!--box categroy start-->
  <section class="box-category section-py-space">
    <div class="container-fluid ">
      <div class="row">
        <div class="col pl-0">
          <div class="slide-10 no-arrow">
            <div>
              <a href="#">
                <div class="box-category-contain">
                  <h4>10% off</h4>
                </div>
              </a>
            </div>
            <div>
              <a href="#">
                <div class="box-category-contain">
                  <h4>under @99</h4>
                </div>
              </a>
            </div>
            <div>
              <a href="#">
                <div class="box-category-contain">
                  <h4>free shipping</h4>
                </div>
              </a>
            </div>
            <div>
              <a href="#">
                <div class="box-category-contain">
                  <h4>extra 10% off</h4>
                </div>
              </a>
            </div>
            <div>
              <a href="#">
                <div class="box-category-contain">
                  <h4>$79 cashback</h4>
                </div>
              </a>
            </div>
            <div>
              <a href="#">
                <div class="box-category-contain">
                  <h4>80% off</h4>
                </div>
              </a>
            </div>
            <div>
              <a href="#">
                <div class="box-category-contain">
                  <h4>on sale</h4>
                </div>
              </a>
            </div>
            <div>
              <a href="#">
                <div class="box-category-contain">
                  <h4>only $49</h4>
                </div>
              </a>
            </div>
            <div>
              <a href="#">
                <div class="box-category-contain">
                  <h4>under @150</h4>
                </div>
              </a>
            </div>
            <div>
              <a href="#">
                <div class="box-category-contain">
                  <h4>save money</h4>
                </div>
              </a>
            </div>
            <div>
              <a href="#">
                <div class="box-category-contain">
                  <h4>80% off</h4>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--box category end-->

  <!-- media banner tab start-->
  <section class=" ratio_square">
    <div class="custom-container b-g-white section-pb-space">
      <div class="row">
        <div class="col p-0">
          <div class="theme-tab product">
            <ul class="tabs tab-title media-tab">
              <li class="current"><a href="tab-7">new product</a></li>
              <li class=""><a href="tab-8">Feature Products</a></li>
              <li class=""><a href="tab-9">best Sellers</a></li>
              <li class=""><a href="tab-10">On Sale</a></li>
            </ul>
            <div class="tab-content-cls">
              <div id="tab-7" class="tab-content active default ">
                <div class="slide-5 product-m no-arrow">
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="tab-8" class="tab-content">
                <div class="slide-5 product-m no-arrow">
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="tab-9" class="tab-content">
                <div class="slide-5 product-m no-arrow">
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="tab-10" class="tab-content">
                <div class="slide-5 product-m no-arrow">
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="media-banner media-banner-1 border-0">
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/2.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/3.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="media-banner-box">
                        <div class="media">
                          <img src="../assets/images/layout-2/media-banner/1.jpg" class="img-fluid " alt="banner">
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="rating">
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                  <i class="fa fa-star" ></i>
                                </div>
                                <p>
                                  Reader distracted.
                                </p>
                                <h6>$24.05 <span>$56.21</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- media banner tab end -->

  <!--collection banner start-->
  <section class="collection-banner section-py-space">
    <div class="container-fluid">
      <div class="row collection2">
        <div class="col-md-4">
          <div class="collection-banner-main banner-1 p-left">
            <div class="collection-img">
              <img src="../assets/images/layout-2/collection-banner/4.jpg" class="img-fluid bg-img " alt="banner">
            </div>
            <div class="collection-banner-contain ">
              <div>
                <h3>Leather</h3>
                <h4>new bag</h4>
                <div class="shop">
                  <a>
                    shop now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="collection-banner-main banner-1 p-left">
            <div class="collection-img">
              <img src="../assets/images/layout-2/collection-banner/5.jpg" class="img-fluid bg-img " alt="banner">
            </div>
            <div class="collection-banner-contain ">
              <div>
                <h3>nike</h3>
                <h4>breeze</h4>
                <div class="shop">
                  <a>
                    shop now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="collection-banner-main banner-1 p-left">
            <div class="collection-img">
              <img src="../assets/images/layout-2/collection-banner/6.jpg" class="img-fluid bg-img " alt="banner">
            </div>
            <div class="collection-banner-contain ">
              <div>
                <h3>Printing 3D</h3>
                <h4>USB moon</h4>
                <div class="shop">
                  <a>
                    shop now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--collection banner end-->

  <!--hot deal start-->
  <section class="hot-deal b-g-white section-big-pb-space space-abjust">
    <div class="custom-container">
      <div class="row hot-2">
        <div class="col-12">
          <!--title start-->
          <div class="title3 b-g-white text-left">
            <h4>today's hot deal</h4>
          </div>
          <!--titel end-->
        </div>

        <div class="col-lg-9">
          <div class="slide-1 no-arrow">
            <div>
              <div class="hot-deal-contain deal-abjust">
                <div class="row hot-deal-subcontain">
                  <div class="col-lg-4 col-md-4 ">
                    <div class="hotdeal-right-slick border-0">
                      <div><img src="../assets/images/layout-2/hot-deal/8.jpg" alt="hot-deal" class="img-fluid  "></div>
                      <div><img src="../assets/images/layout-2/hot-deal/7.jpg" alt="hot-deal" class="img-fluid  "></div>
                      <div><img src="../assets/images/layout-2/hot-deal/6.jpg" alt="hot-deal" class="img-fluid  "></div>
                      <div><img src="../assets/images/layout-2/hot-deal/5.jpg" alt="hot-deal" class="img-fluid  "></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="hot-deal-center">
                      <div>
                        <div>
                          <h5>Simply dummy text of the printing. </h5>
                        </div>
                        <div class="rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                        <div>
                          <p>
                            It is a long established fact that a reader. It is a long established fact that a reader.It is a long established fact that a reader. It is a long established fact that a reader.
                          </p>
                          <div class="price">
                            <span>$45.00</span>
                            <span>$50.30</span>
                          </div>
                        </div>
                        <div class="timer">
                          <p id="demo">
                               <span>
                                 25
                                 <span>days</span>
                               </span>
                            <span>
                                46
                                <span>hrs</span>
                              </span>
                            <span>
                                12
                                <span>min</span>
                              </span>
                            <span>
                                03
                                <span>sec</span>
                              </span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 ">
                    <div class="hotdeal-right-nav">
                      <div><img src="../assets/images/layout-2/hot-deal/8.jpg" alt="hot-dea" class="img-fluid  " ></div>
                      <div><img src="../assets/images/layout-2/hot-deal/7.jpg" alt="hot-dea" class="img-fluid  " ></div>
                      <div><img src="../assets/images/layout-2/hot-deal/6.jpg" alt="hot-dea" class="img-fluid  " ></div>
                      <div><img src="../assets/images/layout-2/hot-deal/5.jpg" alt="hot-dea" class="img-fluid  " ></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="hot-deal-contain deal-abjust">
                <div class="row hot-deal-subcontain">
                  <div class="col-lg-4 col-md-4 ">
                    <div class="hotdeal-right-slick border-0">
                      <div><img src="../assets/images/layout-2/hot-deal/8.jpg" alt="hot-deal" class="img-fluid  "></div>
                      <div><img src="../assets/images/layout-2/hot-deal/7.jpg" alt="hot-deal" class="img-fluid  "></div>
                      <div><img src="../assets/images/layout-2/hot-deal/6.jpg" alt="hot-deal" class="img-fluid  "></div>
                      <div><img src="../assets/images/layout-2/hot-deal/5.jpg" alt="hot-deal" class="img-fluid  "></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="hot-deal-center">
                      <div>
                        <div>
                          <h5>Simply dummy text of the printing. </h5>
                        </div>
                        <div class="rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                        <div>
                          <p>
                            It is a long established fact that a reader. It is a long established fact that a reader.It is a long established fact that a reader. It is a long established fact that a reader.
                          </p>
                          <div class="price">
                            <span>$45.00</span>
                            <span>$50.30</span>
                          </div>
                        </div>
                        <div class="timer">
                          <p id="demo1">
                             <span>
                               25
                               <span>days</span>
                             </span>
                            <span>
                              46
                              <span>hrs</span>
                            </span>
                            <span>
                              12
                              <span>min</span>
                            </span>
                            <span>
                              03
                              <span>sec</span>
                            </span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 ">
                    <div class="hotdeal-right-nav">
                      <div><img src="../assets/images/layout-2/hot-deal/8.jpg" alt="hot-dea" class="img-fluid  " ></div>
                      <div><img src="../assets/images/layout-2/hot-deal/7.jpg" alt="hot-dea" class="img-fluid  " ></div>
                      <div><img src="../assets/images/layout-2/hot-deal/6.jpg" alt="hot-dea" class="img-fluid  " ></div>
                      <div><img src="../assets/images/layout-2/hot-deal/5.jpg" alt="hot-dea" class="img-fluid  " ></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="slide-1-section no-arrow">
            <div>
              <div class="media-banner border-0">
                <div class="media-banner-box">
                  <div class="media-heading">
                    <h5>New Products</h5>
                  </div>
                </div>
                <div class="media-banner-box">
                  <div class="media">
                    <img src="../assets/images/layout-1/media-banner/1.jpg" class="img-fluid  " alt="banner">
                    <div class="media-body">
                      <div class="media-contant">
                        <div>
                          <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                          </div>
                          <p>
                            Generator
                            on Internet.
                          </p>
                          <h6>$153.00</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="media-banner-box">
                  <div class="media">
                    <img src="../assets/images/layout-1/media-banner/2.jpg" class="img-fluid  " alt="banner">
                    <div class="media-body">
                      <div class="media-contant">
                        <div>
                          <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                          </div>
                          <p>
                            Generator
                            on Internet.
                          </p>
                          <h6>$153.00</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="media-banner-box">
                  <div class="media">
                    <img src="../assets/images/layout-1/media-banner/2.jpg" class="img-fluid  " alt="banner">
                    <div class="media-body">
                      <div class="media-contant">
                        <div>
                          <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                          </div>
                          <p>
                            Generator
                            on Internet.
                          </p>
                          <h6>$153.00</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="media-banner-box">
                  <div class="media-view">
                    <h5>View More</h5>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="media-banner  border-0">
                <div class="media-banner-box">
                  <div class="media-heading">
                    <h5>Hot deal</h5>
                  </div>
                </div>
                <div class="media-banner-box">
                  <div class="media">
                    <img src="../assets/images/layout-1/media-banner/3.jpg" class="img-fluid  " alt="banner">
                    <div class="media-body">
                      <div class="media-contant">
                        <div>
                          <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                          </div>
                          <p>
                            Generator
                            on Internet.
                          </p>
                          <h6>$153.00</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="media-banner-box">
                  <div class="media">
                    <img src="../assets/images/layout-1/media-banner/4.jpg" class="img-fluid  " alt="banner">
                    <div class="media-body">
                      <div class="media-contant">
                        <div>
                          <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                          </div>
                          <p>
                            Generator
                            on Internet.
                          </p>
                          <h6>$153.00</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="media-banner-box">
                  <div class="media">
                    <img src="../assets/images/layout-1/media-banner/3.jpg" class="img-fluid  " alt="banner">
                    <div class="media-body">
                      <div class="media-contant">
                        <div>
                          <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                          </div>
                          <p>
                            Generator
                            on Internet.
                          </p>
                          <h6>$153.00</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="media-banner-box">
                  <div class="media-view">
                    <h5>View More</h5>
                  </div>
                </div>
              </div>
            </div>
            <div >
              <div class="media-banner  border-0">
                <div class="media-banner-box">
                  <div class="media-heading">
                    <h5>Best Sellers</h5>
                  </div>
                </div>
                <div class="media-banner-box">
                  <div class="media">
                    <img src="../assets/images/layout-1/media-banner/1.jpg" class="img-fluid  " alt="banner">
                    <div class="media-body">
                      <div class="media-contant">
                        <div>
                          <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                          </div>
                          <p>
                            Generator
                            on Internet.
                          </p>
                          <h6>$153.00</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="media-banner-box">
                  <div class="media">
                    <img src="../assets/images/layout-1/media-banner/2.jpg" class="img-fluid  " alt="banner">
                    <div class="media-body">
                      <div class="media-contant">
                        <div>
                          <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                          </div>
                          <p>
                            Generator
                            on Internet.
                          </p>
                          <h6>$153.00</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="media-banner-box">
                  <div class="media">
                    <img src="../assets/images/layout-1/media-banner/1.jpg" class="img-fluid  " alt="banner">
                    <div class="media-body">
                      <div class="media-contant">
                        <div>
                          <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                          </div>
                          <p>
                            Generator
                            on Internet.
                          </p>
                          <h6>$153.00</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="media-banner-box">
                  <div class="media-view">
                    <h5>View More</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--hot deal start-->

  <!--testimonial start-->
  <section class="testimonial testimonial-inverse">
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
  </section>
  <!--testimonial end-->

  <!--title start-->
  <div class="title1 section-my-space">
    <h4>Special Products</h4>
  </div>
  <!--title end-->

  <!--product start-->
  <section class="product section-pb-space mb--5">
    <div class="custom-container">
      <div class="row">
        <div class="col pr-0">
          <div class="product-slide-6 no-arrow">
            <div>
              <div class="product-box">
                <div class="product-imgbox">
                  <div class="product-front">
                    <img src="../assets/images/layout-2/product/1.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-back">
                    <img src="../assets/images/layout-2/product/a1.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-icon icon-inline">
                    <button onclick="openCart()">
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
                </div>
              </div>
            </div>
            <div>
              <div class="product-box">
                <div class="product-imgbox">
                  <div class="product-front">
                    <img src="../assets/images/layout-2/product/2.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-back">
                    <img src="../assets/images/layout-2/product/a2.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-icon icon-inline">
                    <button onclick="openCart()">
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
                <div class="product-detail detail-inline">
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
                </div>
              </div>
            </div>
            <div>
              <div class="product-box">
                <div class="product-imgbox">
                  <div class="product-front">
                    <img src="../assets/images/layout-2/product/3.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-back">
                    <img src="../assets/images/layout-2/product/a3.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-icon icon-inline">
                    <button  onclick="openCart()" type="button" >
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
                  <div class="new-label1">
                    <div>new</div>
                  </div>
                </div>
                <div class="product-detail detail-inline">
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
                </div>
              </div>
            </div>
            <div>
              <div class="product-box">
                <div class="product-imgbox">
                  <div class="product-front">
                    <img src="../assets/images/layout-2/product/4.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-back">
                    <img src="../assets/images/layout-2/product/a4.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-icon icon-inline">
                    <button  onclick="openCart()" type="button" >
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
                <div class="product-detail detail-inline">
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
                </div>
              </div>
            </div>
            <div>
              <div class="product-box">
                <div class="product-imgbox">
                  <div class="product-front">
                    <img src="../assets/images/layout-2/product/5.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-back">
                    <img src="../assets/images/layout-2/product/a5.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-icon icon-inline">
                    <button  onclick="openCart()" type="button" >
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
                  <div class="new-label1">
                    <div>new</div>
                  </div>
                  <div class="on-sale1">
                    on sale
                  </div>
                </div>
                <div class="product-detail detail-inline">
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
                </div>
              </div>
            </div>
            <div>
              <div class="product-box">
                <div class="product-imgbox">
                  <div class="product-front">
                    <img src="../assets/images/layout-2/product/6.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-back">
                    <img src="../assets/images/layout-2/product/a6.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-icon icon-inline">
                    <button  onclick="openCart()" type="button" >
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
                <div class="product-detail detail-inline">
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
                </div>
              </div>
            </div>
            <div>
              <div class="product-box">
                <div class="product-imgbox">
                  <div class="product-front">
                    <img src="../assets/images/layout-2/product/7.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-back">
                    <img src="../assets/images/layout-2/product/a7.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-icon icon-inline">
                    <button  onclick="openCart()" type="button" >
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
                <div class="product-detail detail-inline">
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
                </div>
              </div>
            </div>
            <div>
              <div class="product-box">
                <div class="product-imgbox">
                  <div class="product-front">
                    <img src="../assets/images/layout-2/product/8.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-back">
                    <img src="../assets/images/layout-2/product/a8.jpg" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-icon icon-inline">
                    <button  onclick="openCart()" type="button" >
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
                <div class="product-detail detail-inline">
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--product end-->

  <!--instagram start-->
  <section class="instagram">
    <div class="container-fluid">
      <div class="row">
        <div class="col p-0">
          <div class="insta-contant1 no-arrow">
            <div class="slide-7">
              <div>
                <div class="instagram-box">
                  <img src="../assets/images/insta/1.jpg" class="img-fluid  " alt="insta">
                  <div class="insta-cover">
                    <i class="fa fa-instagram" ></i>
                  </div>
                </div>
              </div>
              <div>
                <div class="instagram-box">
                  <img src="../assets/images/insta/2.jpg" class="img-fluid  " alt="insta">
                  <div class="insta-cover">
                    <i class="fa fa-instagram" ></i>
                  </div>
                </div>
              </div>
              <div>
                <div class="instagram-box">
                  <img src="../assets/images/insta/3.jpg" class="img-fluid  " alt="insta">
                  <div class="insta-cover">
                    <i class="fa fa-instagram" ></i>
                  </div>
                </div>
              </div>
              <div>
                <div class="instagram-box">
                  <img src="../assets/images/insta/4.jpg" class="img-fluid  " alt="insta">
                  <div class="insta-cover">
                    <i class="fa fa-instagram" ></i>
                  </div>
                </div>
              </div>
              <div>
                <div class="instagram-box">
                  <img src="../assets/images/insta/5.jpg" class="img-fluid  " alt="insta">
                  <div class="insta-cover">
                    <i class="fa fa-instagram" ></i>
                  </div>
                </div>
              </div>
              <div>
                <div class="instagram-box">
                  <img src="../assets/images/insta/6.jpg" class="img-fluid  " alt="insta">
                  <div class="insta-cover">
                    <i class="fa fa-instagram" ></i>
                  </div>
                </div>
              </div>
              <div>
                <div class="instagram-box">
                  <img src="../assets/images/insta/7.jpg" class="img-fluid  " alt="insta">
                  <div class="insta-cover">
                    <i class="fa fa-instagram" ></i>
                  </div>
                </div>
              </div>
              <div>
                <div class="instagram-box">
                  <img src="../assets/images/insta/8.jpg" class="img-fluid  " alt="insta">
                  <div class="insta-cover">
                    <i class="fa fa-instagram" ></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="insta-sub-contant1">
              <div class="insta-title">
                <h4><span>#</span>INSTAGRAM</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--instagra end-->

<!-- tap to top -->
<div class="tap-top">
    <div>
      <i class="fa fa-angle-double-up"></i>
    </div>
  </div>
  <!-- tap to top End -->

  <!-- Add to cart bar -->
  <div id="cart_side" class=" add_to_cart top">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
      <div class="cart_top">
        <h3>my cart</h3>
        <div class="close-cart">
          <a href="javascript:void(0)" onclick="closeCart()">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="cart_media">
        <ul class="cart_product">
          <li>
            <div class="media">
              <a href="#">
                <img alt="" class="mr-3" src="../assets/images/layout-2/product/1.jpg">
              </a>
              <div class="media-body">
                <a href="#">
                  <h4>item name</h4>
                </a>
                <h4>
                  <span>1 x $ 299.00</span>
                </h4>
              </div>
            </div>
            <div class="close-circle">
              <a href="#">
                <i class="ti-trash" aria-hidden="true"></i>
              </a>
            </div>
          </li>
          <li>
            <div class="media">
              <a href="#">
                <img alt="" class="mr-3" src="../assets/images/layout-2/product/a1.jpg">
              </a>
              <div class="media-body">
                <a href="#">
                  <h4>item name</h4>
                </a>
                <h4>
                  <span>1 x $ 299.00</span>
                </h4>
              </div>
            </div>
            <div class="close-circle">
              <a href="#">
                <i class="ti-trash" aria-hidden="true"></i>
              </a>
            </div>
          </li>
          <li>
            <div class="media">
              <a href="#"><img alt="" class="mr-3" src="../assets/images/layout-2/product/1.jpg"></a>
              <div class="media-body">
                <a href="#">
                  <h4>item name</h4>
                </a>
                <h4><span>1 x $ 299.00</span></h4>
              </div>
            </div>
            <div class="close-circle">
              <a href="#">
                <i class="ti-trash" aria-hidden="true"></i>
              </a>
            </div>
          </li>
        </ul>
        <ul class="cart_total">
          <li>
            <div class="total">
              <h5>subtotal : <span>$299.00</span></h5>
            </div>
          </li>
          <li>
            <div class="buttons">
              <a href="cart.html" class="btn btn-normal btn-xs view-cart">view cart</a>
              <a href="#" class="btn btn-normal btn-xs checkout">checkout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Add to cart bar end-->

  <!--Newsletter modal popup start-->
  <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
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
  </div>
  <!--Newsletter Modal popup end-->

  <!-- Quick-view modal popup start-->
  <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content quick-view-modal">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="row">
            <div class="col-lg-6 col-xs-12">
              <div class="quick-view-img"><img src="../assets/images/layout-2/product/a1.jpg" alt="" class="img-fluid "></div>
            </div>
            <div class="col-lg-6 rtl-text">
              <div class="product-right">
                <h2>Women Pink Shirt</h2>
                <h3>$32.96</h3>
                <ul class="color-variant">
                  <li class="bg-light0"></li>
                  <li class="bg-light1"></li>
                  <li class="bg-light2"></li>
                </ul>
                <div class="border-product">
                  <h6 class="product-title">product details</h6>
                  <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                </div>
                <div class="product-description border-product">
                  <div class="size-box">
                    <ul>
                      <li class="active"><a href="#">s</a></li>
                      <li><a href="#">m</a></li>
                      <li><a href="#">l</a></li>
                      <li><a href="#">xl</a></li>
                    </ul>
                  </div>
                  <h6 class="product-title">quantity</h6>
                  <div class="qty-box">
                    <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                      <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                  </div>
                </div>
                <div class="product-buttons"><a href="#" class="btn btn-normal">add to cart</a> <a href="#" class="btn btn-normal">view detail</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Quick-view modal popup end-->





  <!-- Add to account bar end-->

  <!-- Add to wishlist bar -->
  <div id="wishlist_side" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
    <div class="cart-inner">
      <div class="cart_top">
        <h3>my wishlist</h3>
        <div class="close-cart">
          <a href="javascript:void(0)" onclick="closeWishlist()">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="cart_media">
        <ul class="cart_product">
          <li>
            <div class="media">
              <a href="#">
                <img alt="" class="mr-3" src="../assets/images/layout-1/media-banner/1.jpg">
              </a>
              <div class="media-body">
                <a href="#">
                  <h4>item name</h4>
                </a>
                <h4>
                  <span>sm</span>
                  <span>, blue</span>
                </h4>
                <h4>
                  <span>$ 299.00</span>
                </h4>
              </div>
            </div>
            <div class="close-circle">
              <a href="#">
                <i class="ti-trash" aria-hidden="true"></i>
              </a>
            </div>
          </li>
          <li>
            <div class="media">
              <a href="#">
                <img alt="" class="mr-3" src="../assets/images/layout-1/media-banner/2.jpg">
              </a>
              <div class="media-body">
                <a href="#">
                  <h4>item name</h4>
                </a>
                <h4>
                  <span>sm</span>
                  <span>, blue</span>
                </h4>
                <h4>
                  <span>$ 299.00</span>
                </h4>
              </div>
            </div>
            <div class="close-circle">
              <a href="#">
                <i class="ti-trash" aria-hidden="true"></i>
              </a>
            </div>
          </li>
          <li>
            <div class="media">
              <a href="#"><img alt="" class="mr-3" src="../assets/images/layout-1/media-banner/3.jpg"></a>
              <div class="media-body">
                <a href="#"><h4>item name</h4></a>
                <h4>
                  <span>sm</span>
                  <span>, blue</span>
                </h4>
                <h4><span>$ 299.00</span></h4>
              </div>
            </div>
            <div class="close-circle">
              <a href="#">
                <i class="ti-trash" aria-hidden="true"></i>
              </a>
            </div>
          </li>
        </ul>
        <ul class="cart_total">
          <li>
            <div class="total">
              <h5>subtotal : <span>$299.00</span></h5>
            </div>
          </li>
          <li>
            <div class="buttons">
              <a href="wishlist.html" class="btn btn-normal btn-block  view-cart">view wislist</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Add to wishlist bar end-->

  <!-- add to  setting bar  start-->
  <div id="mySetting" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
    <div class="cart-inner">
      <div class="cart_top">
        <h3>my setting</h3>
        <div class="close-cart">
          <a href="javascript:void(0)" onclick="closeSetting()">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="setting-block">
        <div >
          <h5>language</h5>
          <ul>
            <li><a href="#">english</a></li>
            <li><a href="#">french</a></li>
          </ul>
          <h5>currency</h5>
          <ul>
            <li><a href="#">uro</a></li>
            <li><a href="#">rupees</a></li>
            <li><a href="#">pound</a></li>
            <li><a href="#">doller</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- facebook chat section end -->

  <!-- notification product -->
  <div class="product-notification" id="dismiss">
    <span  onclick="dismiss();" class="close" aria-hidden="true">×</span>
    <div class="media">
      <img class="mr-2" src="../assets/images/layout-1/product/5.jpg" alt="Generic placeholder image">
      <div class="media-body">
        <h5 class="mt-0 mb-1">Latest trending</h5>
        Cras sit amet nibh libero, in gravida nulla.
      </div>
    </div>
  </div>
  <!-- notification product -->

    {{-- ############################ Beshkichu ############################## --}}

        <!-- Hero/Intro Slider Start -->
        <div class="section ">
            <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
                <!-- Hero slider Active -->
                <div class="swiper-wrapper">
                    <!-- Single slider item -->
                    @foreach ($sliders as $slider)
                        <div class="hero-slide-item-2 slider-height swiper-slide d-flex bg-color">
                            <div class="container align-self-center">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5 align-self-center sm-center-view">
                                        <div class="hero-slide-content hero-slide-content-2 slider-animated-1">
                                            @if ($slider->promotions)
                                                <span class="category">{{ $slider->promotions }}</span>
                                            @endif
                                            <h2 class="title">{{ $slider->title }}</h2>
                                            @if ($slider->url)
                                                <a target="_blank" href="{{ $slider->url }}" class="btn btn-lg slider-btn btn-hover-dark"> Shop Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>

                                            @endif
                                        </div>
                                    </div>
                                    <div
                                        class="col-xl-6 col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center position-relative">
                                        <div class="show-case">
                                            <div class="hero-slide-image">
                                                <img src="{{ asset('assets/images/slider-image/'.$slider->image) }}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination swiper-pagination-white"></div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>

        <!-- Hero/Intro Slider End -->

        <!-- Feature Area Srart -->
        <div class="feature-area  mt-n-65px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <!-- single item -->
                        <div class="single-feature">
                            <div class="feature-icon">
                                <img src="{{ asset('assets/images/icons/1.png') }}" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Free Shipping</h4>
                                <span class="sub-title">Capped at $39 per order</span>
                            </div>
                        </div>
                    </div>
                    <!-- single item -->
                    <div class="col-lg-4 col-md-6 mb-md-30px mb-lm-30px mt-lm-30px">
                        <div class="single-feature">
                            <div class="feature-icon">
                                <img src="{{ asset('assets/images/icons/2.png') }}" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Card Payments</h4>
                                <span class="sub-title">12 Months Installments</span>
                            </div>
                        </div>
                    </div>
                    <!-- single item -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-feature">
                            <div class="feature-icon">
                                <img src="{{ asset('assets/images/icons/3.png') }}" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Easy Returns</h4>
                                <span class="sub-title">Shop With Confidence</span>
                            </div>
                        </div>
                        <!-- single item -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Area End -->

        <!-- Product Area Start -->
        <div class="product-area pt-100px pb-100px">
            <div class="container">
                <!-- Section Title & Tab Start -->
                <div class="row">
                    <!-- Section Title Start -->
                    <div class="col-12">
                        <div class="section-title text-center mb-0">
                            <h2 class="title">#Product</h2>
                            <!-- Tab Start -->
                            <div class="nav-center">
                                <ul class="product-tab-nav nav align-items-center justify-content-center">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#tab-product--all">All</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#tab-product--new">New</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Tab End -->
                        </div>
                    </div>
                    <!-- Section Title End -->
                </div>
                <!-- Section Title & Tab End -->

                <div class="row">
                    <div class="col">
                        <div class="tab-content mb-30px0px">
                            <!-- All tab start -->
                            <div class="tab-pane fade show active" id="tab-product--all">
                                <div class="row">
                                    @if ($productAll)
                                        @foreach ($productAll as $product)
                                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                                data-aos-delay="200">
                                                <!-- Single Prodect -->
                                                <div class="product">
                                                    <div class="thumb">
                                                        <a href="{{ route('frontend.product.single',$product->slug) }}" class="image">
                                                            <img src="{{ asset('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/thumbnail/'.$product->thumbnail }}" alt="{{ $product->name }}" />
                                                        </a>
                                                        <div class="actions">
                                                            @php
                                                                $w = $wishlistProduct->where('cookie_id',Cookie::get('jesco_ecommerce'))->where('product_id',$product->id)->first();
                                                            @endphp

                                                            @if ($w)
                                                                <button type="button" style='background:#fb5d5d;color:#ffffff' data-id="{{ $product->id }}" href="javascript:void(0)" class="action wishlist add-wishlist wishlist-product{{$product->id}}"  title="Wishlist">
                                                                    <i class="pe-7s-like"></i>
                                                                </button>
                                                            @else
                                                                <button type="button" data-id="{{ $product->id }}" href="javascript:void(0)" class="action wishlist add-wishlist wishlist-product{{$product->id}}"  title="Wishlist">
                                                                    <i class="pe-7s-like"></i>
                                                                </button>
                                                            @endif
                                                            <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                                            <a href="compare.html" class="action compare" title="Compare">
                                                                <i class="pe-7s-refresh-2"></i>
                                                            </a>
                                                        </div>
                                                        <a href="{{ route('frontend.product.single',$product->slug) }}" title="Add To Cart"  class="add-to-cart">Add To Cart</a>
                                                    </div>
                                                    <div class="content">
                                                        <span class="ratings">
                                                            <span class="rating-wrap">
                                                                <span class="star" style="width: 100%"></span>
                                                            </span>
                                                            <span class="rating-num">( 5 Review )</span>
                                                            <span style="position: absolute; right:0" class="badge rounded bg-primary text-white">{{ $product->category->name }}</span>

                                                        </span>
                                                        <h5 class="title" ><a href="#">{{ $product->name }}</a>
                                                        </h5>

                                                        <span class="price">
                                                            <span class="new">৳{{ $product->attribute->min('offer_price') }}</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!-- All tab end -->
                            <!-- New tab start -->
                            <div class="tab-pane fade" id="tab-product--new">
                                <div class="row">
                                    @if ($productNew)
                                        @foreach ($productNew as $product)
                                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                                data-aos-delay="200">
                                                <!-- Single Prodect -->
                                                <div class="product">
                                                    <div class="thumb">
                                                        <a href="{{ route('frontend.product.single',$product->slug) }}" class="image">
                                                            <img src="{{ asset('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/thumbnail/'.$product->thumbnail }}" alt="{{ $product->name }}" />
                                                        </a>
                                                        <div class="actions">
                                                            <button type="button" data-id="{{ $product->id }}" href="javascript:void(0)" class="action wishlist add-wishlist wishlist-product{{$product->id}}"  title="Wishlist">
                                                                <i class="pe-7s-like"></i>
                                                            </button>
                                                            <a href="#" class="action quickview" data-link-action="quickview"
                                                                title="Quick view" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                                            <a href="compare.html" class="action compare" title="Compare"><i
                                                                    class="pe-7s-refresh-2"></i></a>
                                                        </div>
                                                        <a href="{{ route('frontend.product.single',$product->slug) }}" title="Add To Cart" class="add-to-cart">Add To Cart</a>
                                                    </div>
                                                    <div class="content">
                                                        <span class="ratings">
                                                            <span class="rating-wrap">
                                                                <span class="star" style="width: 100%"></span>
                                                            </span>
                                                            <span class="rating-num">( 5 Review )</span>
                                                            <span style="position: absolute; right:0" class="badge rounded bg-primary text-white">{{ $product->category->name }}</span>
                                                        </span>
                                                        <h5 class="title"><a href="single-product.html">{{ $product->name }}</a>
                                                        </h5>
                                                        <span class="price">
                                                            <span class="new">৳{{ $product->attribute->min('regular_price') }}</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!-- New tab end -->
                        </div>
                        <a href="{{ route('frontend.product') }}" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Load More <i
                                class="fa fa-arrow-right ml-15px" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End -->

        <!-- Banner Area Start -->
        <div class="banner-area pt-100px pb-100px plr-15px">
            <div class="row m-0">
                <div class="col-12 col-lg-4 mb-md-30px mb-lm-30px">
                    <div class="single-banner-2">
                        <img src="{{ asset('assets/images/banner/4.jpg') }}" alt="">
                        <div class="item-disc">
                            <h4 class="title">Best Collection <br>
                                For Women</h4>
                            <a href="shop-left-sidebar.html" class="shop-link btn btn-primary ">Shop Now <i
                                    class="fa fa-shopping-basket ml-5px" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 center-col mb-md-30px mb-lm-30px">
                    <div class="single-banner-2">
                        <img src="{{ asset('assets/images/banner/5.jpg') }}" alt="">
                        <div class="item-disc">
                            <h4 class="title">Best Collection <br>
                                For Men</h4>
                            <a href="shop-left-sidebar.html" class="shop-link btn btn-primary">Shop Now <i
                                    class="fa fa-shopping-basket ml-5px" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-banner-2">
                        <img src="{{ asset('assets/images/banner/6.jpg') }}" alt="">
                        <div class="item-disc">
                            <h4 class="title">New Collection <br>
                                For Kids</h4>
                            <a href="shop-left-sidebar.html" class="shop-link btn btn-primary">Shop Now <i
                                    class="fa fa-shopping-basket ml-5px" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->

        <!-- Product Area Start -->
        <div class="product-area pt-100px pb-100px">
            <div class="container">
                <!-- Section Title & Tab Start -->
                <div class="row">
                    <!-- Section Title Start -->
                    <div class="col-lg col-md col-12">
                        <div class="section-title mb-0">
                            <h2 class="title">#newarrivals</h2>
                        </div>
                    </div>
                    <!-- Section Title End -->

                    <!-- Tab Start -->
                    <div class="col-lg-auto col-md-auto col-12">
                        <ul class="product-tab-nav nav">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                    href="#tab-product-all">All</a></li>
                        </ul>
                    </div>
                    <!-- Tab End -->
                </div>
                <!-- Section Title & Tab End -->

                <div class="row">
                    <div class="col">
                        <div class="tab-content top-borber">
                            <!-- 1st tab start -->
                            <div class="tab-pane fade show active" id="tab-product-all">
                                <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                                    <div class="new-product-wrapper swiper-wrapper">
                                        @if ($productNew)
                                            @foreach ($productNew as $product)
                                                <div class="new-product-item swiper-slide">
                                                <!-- Single Prodect -->
                                                    <div class="product">
                                                        <div class="thumb">
                                                            <a href="{{ route('frontend.product.single',$product->slug) }}" class="image">
                                                                <img src="{{ asset('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/thumbnail/'.$product->thumbnail }}" alt="{{ $product->name }}" />
                                                            </a>
                                                            <div class="actions">
                                                                <button type="button" data-id="{{ $product->id }}" href="javascript:void(0)" class="action wishlist add-wishlist wishlist-product{{$product->id}}"  title="Wishlist">
                                                                    <i class="pe-7s-like"></i>
                                                                </button>
                                                                <a href="#" class="action quickview" data-link-action="quickview"
                                                                    title="Quick view" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                                                <a href="compare.html" class="action compare" title="Compare"><i
                                                                        class="pe-7s-refresh-2"></i></a>
                                                            </div>
                                                            <a href="{{ route('frontend.product.single',$product->slug) }}" title="Add To Cart" class="add-to-cart">Add To Cart</a>
                                                        </div>
                                                        <div class="content">
                                                            <span class="ratings">
                                                                <span class="rating-wrap">
                                                                    <span class="star" style="width: 100%"></span>
                                                                </span>
                                                                <span class="rating-num">( 5 Review )</span>
                                                                <span style="position: absolute; right:0" class="badge rounded bg-primary text-white">{{ $product->category->name }}</span>
                                                            </span>
                                                            <h5 class="title"><a href="single-product.html">{{ $product->name }}</a>
                                                            </h5>
                                                            <span class="price">
                                                                <span class="new">৳{{ $product->attribute->min('regular_price') }}</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- Single Prodect -->
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-buttons">
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- 1st tab end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End -->

        <!-- Deal Area Start -->
        <div class="deal-area deal-bg deal-bg-2" data-bg-image="{{ asset('assets/images/deal-img/deal-bg-2.jpg') }}">
            <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <div class="deal-inner position-relative pt-100px pb-100px">
                            <div class="deal-wrapper">
                                <span class="category">#FASHION SHOP</span>
                                <h3 class="title">Deal Of The Day</h3>
                                <div class="deal-timing">
                                    <div data-countdown="2021/05/15"></div>
                                </div>
                                <a href="shop-left-sidebar.html" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Shop
                                    Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                            </div>
                            <div class="deal-image">
                                <img class="img-fluid" src="{{ asset('assets/images/deal-img/woman.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Deal Area End -->
        <!--  Blog area Start -->
        <div class="main-blog-area pb-100px pt-100px">
            <div class="container">
                <!-- section title start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center mb-30px0px">
                            <h2 class="title">#blog</h2>
                            <p class="sub-title">Lorem ipsum dolor sit amet consectetur adipisicing eiusmod.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- section title start -->

                <div class="row">
                    <div class="col-lg-4 mb-md-30px mb-lm-30px">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="blog-single-left-sidebar.html"><img src="{{ asset('assets/images/blog-image/1.jpg') }}"
                                        class="img-responsive w-100" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <div class="blog-athor-date">
                                    <a class="blog-date height-shape" href="#"><i class="fa fa-calendar"
                                            aria-hidden="true"></i> 24 Aug, 2021</a>
                                    <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 1.5
                                        K</a>
                                </div>
                                <h5 class="blog-heading"><a class="blog-heading-link"
                                        href="blog-single-left-sidebar.html">There are many variations of
                                        passages of Lorem</a></h5>

                                <a href="blog-single-left-sidebar.html" class="btn btn-primary blog-btn"> Read More<i
                                        class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <div class="col-lg-4 mb-md-30px mb-lm-30px">
                        <div class="single-blog ">
                            <div class="blog-image">
                                <a href="blog-single-left-sidebar.html"><img src="{{ asset('assets/images/blog-image/2.jpg') }}"
                                        class="img-responsive w-100" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <div class="blog-athor-date">
                                    <a class="blog-date height-shape" href="#"><i class="fa fa-calendar"
                                            aria-hidden="true"></i> 24 Aug, 2021</a>
                                    <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 1.5
                                        K</a>
                                </div>
                                <h5 class="blog-heading"><a class="blog-heading-link"
                                        href="blog-single-left-sidebar.html">It is a long established factoi
                                        ader will be distracted</a></h5>

                                <a href="blog-single-left-sidebar.html" class="btn btn-primary blog-btn"> Read More<i
                                        class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <div class="col-lg-4">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="blog-single-left-sidebar.html"><img src="{{ asset('assets/images/blog-image/3.jpg') }}"
                                        class="img-responsive w-100" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <div class="blog-athor-date">
                                    <a class="blog-date height-shape" href="#"><i class="fa fa-calendar"
                                            aria-hidden="true"></i> 24 Aug, 2021</a>
                                    <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 1.5
                                        K</a>
                                </div>
                                <h5 class="blog-heading"><a class="blog-heading-link"
                                        href="blog-single-left-sidebar.html">Contrary to popular belieflo
                                        lorem Ipsum is not</a></h5>
                                <a href="blog-single-left-sidebar.html" class="btn btn-primary blog-btn"> Read More<i
                                        class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                </div>
            </div>
        </div>
        <!--  Blog area End -->

@endsection
@section('footer_js')
<script>
    <script src="{{ asset('assets/js/slider-animat.js') }}"></script>
    <script src="{{ asset('assets/js/timer.js') }}"></script>
        $(document).ready(function(){
            $('.add-wishlist').click(function(){
                var product_id = $(this).attr('data-id');
                $.ajax({
                    type: "GET",
                    url: "{{ url('wishlist/add') }}/"+product_id,
                    success:function(res){
                        console.log(res);
                        if(res.product_id == product_id){
                            var buttonWishlist = "<button type='button' href='javascript:void(0)' style='background:#fb5d5d;color:#ffffff'  class='action wishlist' data-id='{{ $product->id }}' title='Wishlist'><i class='pe-7s-like'></i></button>";
                            $(".wishlist-product"+res.product_id).html(buttonWishlist);
                        }else{
                            var buttonWishlist = "<button type='button' href='javascript:void(0)' class='action wishlist' data-id='{{ $product->id }}' title='Wishlist'><i class='pe-7s-like'></i></button>";
                            $(".wishlist-product"+product_id).html(buttonWishlist);
                        }
                    }
                });
            });

        });
</script>
@endsection

