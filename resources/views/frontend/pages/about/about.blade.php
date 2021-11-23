@extends('frontend.master')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>about</h2>
                        <ul>
                            <li><a href="{{ route('frontend') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">about</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<!-- about section start -->
<section class="about-page section-big-py-space">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-section">
                    <img src="{{ asset('assets/images/about-image/'.$about->image) }}" class="img-fluid w-100" alt="{{ basicSettings()->site_title }}">
                </div>
            </div>
            <div class="col-lg-6">
                <p>{{ $about->summary }}</p>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->
@endsection
