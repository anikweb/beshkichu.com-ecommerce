@extends('frontend.master')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>Privacy Policy</h2>
                        <ul>
                            <li><a href="{{ route('frontend') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">Privacy Policy</a></li>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>
                    @php
                        echo $policy->description;
                    @endphp
                </p>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->
@endsection
@section('inline_style')
<style>
    h1,h2,h3,h4,h5,h6{
        color: black;
        font-weight: 100;
    }
    strong{
        color:black;
    }
</style>
@endsection
