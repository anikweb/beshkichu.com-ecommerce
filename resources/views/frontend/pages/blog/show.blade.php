@extends('frontend.master')
@section('meta_tag')
    {{-- <meta name="keywords"                  content="{{ $product->category->name }}"> --}}
    <meta property="og:url"                content="{{ url()->current() }}" />
    {{-- <meta property="og:type"               content="{{ $product->category->name }}" /> --}}
    <meta property="og:title"              content="{{ $blog->title }}" />
    <meta property="og:description"        content="{{ $blog->description   }}" />
    <meta property="og:image"              content="{{ asset('assets/images/blog/'.$blog->image) }}" />
@endsection
@section('content')
{{-- Facebook Comment Plugin  --}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="R1ACYKSI"></script>
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>blog detail</h2>
                        <ul>
                            <li><a href="{{ route('frontend') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">blog-detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="blog-detail-page section-big-py-space ratio2_3">
    <div class="container">
        <div class="row section-big-pb-space">
            <div class="col-sm-12 blog-detail">
               <div class="creative-card">
                   <img src="{{ asset('assets/images/blog/'.$blog->image) }}" class="img-fluid w-100 " alt="{{ $blog->title }}">
                   <h3>{{ $blog->title }}</h3>
                   <ul class="post-social">
                       <li>{{ $blog->created_at->format('d M Y') }}</li>
                       @can('role management')
                        <li>Posted By : {{ $blog->user->name.' ('.$blog->user->roles->first()->name.')'}}</li>

                       @endcan


                   </ul>
                   <p>
                       @php
                           echo $blog->description;
                       @endphp
                   </p>
               </div>
            </div>
        </div>
        <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="5"></div>
        <h4 class=""><i class="fa fa-share"></i> Share via </h4>
        <div class="product-icon">
            @foreach ($SocialShare as $key => $item)
                @if ($key == 'facebook')
                    <a target="_blank" href="{{ $item }}" class="btn text-white mr-2 my-1" style="background: #4267b2"> <i class="fa fa-facebook"></i> {{ Str::title($key) }}</a>
                @endif
                @if ($key == 'linkedin')
                    <a target="_blank" href="{{ $item }}" class="btn text-white  mr-2 my-1" style="background: #0176af"> <i class="fa fa-linkedin"></i> {{ Str::title($key) }}</a>
                @endif
                @if ($key == 'twitter')
                    <a target="_blank" href="{{ $item }}" class="btn text-white  mr-2 my-1" style="background: #1c99e6"> <i class="fa fa-twitter"></i> {{ Str::title($key) }}</a>
                @endif
                @if ($key == 'whatsapp')
                    <a target="_blank" href="{{ $item }}" class="btn text-white  mr-2 my-1" style="background: #44bc54"> <i class="fa fa-whatsapp"></i> {{ Str::title($key) }}</a>
                @endif
                @if ($key == 'telegram')
                    <a target="_blank" href="{{ $item }}" class="btn text-white  mr-2 my-1" style="background: #0393d9"> <i class="fa fa-telegram-plane"></i> {{ Str::title($key) }}</a>
                @endif
            @endforeach
        </div>
        {{-- <div class="row section-big-pb-space">
            <div class="col-sm-12 ">
                <h3>Comments</h3>
                <div class="creative-card">
                    <ul class="comment-section">
                        <li>
                            <div class="media"><img src="../assets/images/avtar/3.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h6>Mark Jecno <span>( 12 Jannuary 2018 at 1:30AM )</span></h6>
                                    <p>Donec rhoncus massa quis nibh imperdiet dictum. Vestibulum id est sit amet felis fringilla bibendum at at leo. Proin molestie ac nisi eu laoreet. Integer faucibus enim nec ullamcorper tempor. Aenean nec felis dui.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-body">
                                    <p>No Comments Here to show!</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class=" row blog-contact">
            <div class="col-sm-12  ">
                <div class="creative-card">
                    <h2>Leave Your Comment</h2>
                    <form class="theme-form">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Your name" required="">
                            </div>
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-12">
                                <label for="exampleFormControlTextarea1">Comment</label>
                                <textarea class="form-control" placeholder="Write Your Comment" id="exampleFormControlTextarea1" rows="6"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-normal" type="submit">Post Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
</section>
<!--Section ends-->
@endsection
