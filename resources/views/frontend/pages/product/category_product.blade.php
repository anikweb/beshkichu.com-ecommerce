@extends('frontend.master')
@section('content')

    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>{{ $category->name }}</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">{{ $category->name }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section start -->
    <section class="section-big-pt-space ratio_asos bg-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                        <a href="#"><img src="{{ asset('assets/images/category/1.jpg') }}" class="img-fluid  w-100" alt=""></a>
                                        <div class="top-banner-content small-section">
                                             {{-- <h4>fashion</h4>
                                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h5>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> --}}
                                        </div>
                                    </div>
                                    <div class="collection-product-wrapper">
                                        {{--  <div class="product-top-filter">
                                            <div class="container-fluid p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="product-filter-content">
                                                            <div class="search-count">
                                                                <h5>Showing Products 1-24 of 10 Result</h5></div>
                                                            <div class="collection-view">
                                                                <ul>
                                                                    <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                    <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                                </ul>
                                                            </div>
                                                            <div class="collection-grid-view">
                                                                <ul>
                                                                    <li><img src="../assets/images/category/icon/2.png" alt="" class="product-2-layout-view"></li>
                                                                    <li><img src="../assets/images/category/icon/3.png" alt="" class="product-3-layout-view"></li>
                                                                    <li><img src="../assets/images/category/icon/4.png" alt="" class="product-4-layout-view"></li>
                                                                    <li><img src="../assets/images/category/icon/6.png" alt="" class="product-6-layout-view"></li>
                                                                </ul>
                                                            </div>
                                                            <div class="product-page-per-view">
                                                                <select>
                                                                    <option value="High to low">24 Products Par Page</option>
                                                                    <option value="Low to High">50 Products Par Page</option>
                                                                    <option value="Low to High">100 Products Par Page</option>
                                                                </select>
                                                            </div>
                                                            <div class="product-page-filter">
                                                                <select>
                                                                    <option value="High to low">Sorting items</option>
                                                                    <option value="Low to High">50 Products</option>
                                                                    <option value="Low to High">100 Products</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  --}}
                                        <div class="product-wrapper-grid">
                                            <div class="row">
                                                @foreach ($productLatest as $product)
                                                    <div class="col-xl-2 col-lg-3 col-md-4 col-6 col-grid-box">
                                                        <div class="product">
                                                            <a href="{{ route('frontend.product.single',$product->slug) }}">
                                                                <div class="product-box">
                                                                    <div class="product-imgbox">
                                                                        <div class="product-front">
                                                                            <img src="{{ asset('assets/images/product/'.$product->created_at->format('Y/m/d').'/'.$product->id.'/thumbnail/'.$product->thumbnail) }}" class="img-fluid  " alt="product">
                                                                        </div>
                                                                        <div class="product-back">
                                                                            @foreach ($product->imageGallery as $imageGallery)
                                                                                @if ($loop->index == 0)
                                                                                <img src="{{ asset('assets/images/product/'.$product->created_at->format('Y/m/d').'/'.$product->id.'/image_galleries/'.$imageGallery->name) }}" class="img-fluid  " alt="product">
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
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
                                                                        <div class="icon-detail p-3">
                                                                            <a href="{{ route('frontend.product.single',$product->slug) }}" title="Add to cart">
                                                                                <i class="ti-bag" ></i>
                                                                            </a>
                                                                            {{-- <a href="javascript:void(0)" title="Add to Wishlist">
                                                                                <i class="ti-heart" aria-hidden="true"></i>
                                                                            </a> --}}
                                                                            {{--  <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                                                <i class="ti-search" aria-hidden="true"></i>
                                                                            </a>
                                                                            <a href="compare.html" title="Compare">
                                                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                                                            </a>  --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                    </div>
                                                    @endforeach

                                            </div>
                                        <div class="paginate-btn py-3">
                                                {{ $productLatest->links() }}
                                        </div>
                                        </div>
                                        {{--  <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="container-fluid p-0">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                            <nav aria-label="Page navigation">
                                                                <ul class="pagination">
                                                                    <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span> <span class="sr-only">Previous</span></a></li>
                                                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span> <span class="sr-only">Next</span></a></li>
                                                                </ul>
                                                            </nav>
                                                        </div>
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                            <div class="product-search-count-bottom">
                                                                <h5>Showing Products 1-24 of 10 Result</h5></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  --}}
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
