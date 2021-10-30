@extends('frontend.master')
@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>wishlist</h2>
                            <ul>
                                <li><a href="{{ route('frontend.wishlist.index') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="#">wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="wishlist-section section-big-py-space bg-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                        <tr class="table-head">
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        <tbody>
                            @forelse ($wishlists as $wishlist)
                            <tr>
                                <td>
                                    <a href="#"><img class="img-responsive ml-15px rounded" src="{{ asset('assets/images/product').'/'.$wishlist->product->created_at->format('Y/m/d/').$wishlist->product->id.'/thumbnail/'.$wishlist->product->thumbnail }}" alt="{{ $wishlist->product->name }}"></a>
                                </td>
                                <td><a href="#">{{ $wishlist->product->name }}</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col-xs-3">
                                            <h2 class="td-color">৳{{ $wishlist->product->attribute->min('offer_price') }}</h2></div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color">
                                                <a href="{{ route('frontend.wishlist.remove',$wishlist->product_id) }}" class="icon mr-1"><i class="ti-close"></i></a>
                                                <a href="{{ route('frontend.product.single',$wishlist->product->slug) }}" class="cart"><i class="ti-shopping-cart"></i></a>
                                            </h2>
                                            </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>৳{{ $wishlist->product->attribute->min('offer_price') }}</h2>
                                </td>
                                <td>
                                    <a href="{{ route('frontend.wishlist.remove',$wishlist->product_id) }}" class="icon mr-3"><i class="ti-close"></i> </a>
                                    <a href="{{ route('frontend.product.single',$wishlist->product->slug) }}" class="cart"><i class="ti-shopping-cart"></i></a>

                                </td>

                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row wishlist-buttons">
                <div class="col-12">
                    <a href="{{ route('frontend.product') }}" class="btn btn-normal">continue shopping</a>

                </div>
            </div>
        </div>
    </section>
@endsection
