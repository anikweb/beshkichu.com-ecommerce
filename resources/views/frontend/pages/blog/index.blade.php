
@extends('frontend.master')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>blog</h2>
                        <ul>
                            <li><a href="{{ route('frontend') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javasript:void(0)">blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-py-space blog-page ratio2_3">
    <div class="custom-container">
        @if ($blogs->count())
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-7">
                    @foreach ($blogs as $blog)
                        <div class="row blog-media">
                            <div class="col-xl-6">
                                <div class="blog-left">
                                    <a href="{{ route('frontend.blog.show',$blog->slug) }}">
                                        <img src="{{ asset('assets/images/blog/'.$blog->image) }}" class="img-fluid" alt="{{ $blog->title }}">
                                    </a>
                                    <div class="date-label">
                                        {{ $blog->created_at->format('d M Y') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="blog-right">
                                    <div>
                                        <a href="{{ route('frontend.blog.show',$blog->slug) }}">
                                            <h4>{{ $blog->title }}</h4>
                                        </a>
                                        <ul class="post-social">
                                            @can('role management')
                                            <li>Posted By : {{ $blog->user->name.' ('.$blog->user->roles->first()->name.')'}}</li>
                                            @endcan
                                        </ul>
                                        <p>
                                            @php
                                            if (strlen($blog->description) > 300){
                                                echo $str = substr($blog->description, 0, 300) . '...';
                                            }else{
                                                echo $blog->description;
                                            }
                                            @endphp

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-xl-3 col-lg-4 col-md-5 order-sec">
                    <div class="blog-sidebar">
                        <div class="theme-card">
                            <h4>Recent Blog</h4>
                            <ul class="recent-blog">
                                @foreach ($recent_blogs as $recent_blog)
                                <li>
                                    <a href="{{ route('frontend.blog.show',$recent_blog->slug) }}">
                                        <div class="media"> <img class="img-fluid " src="{{ asset('assets/images/blog/'.$recent_blog->image) }}" alt="{{ $recent_blog->title }}">
                                            <div class="media-body align-self-center">
                                                <h5 class="m-0">{{ Str::limit($recent_blog->title,'35') }}</h5>
                                                <h6>{{ $recent_blog->created_at->diffForHumans() }}</h6>
                                                {{-- <p>0 hits</p> --}}
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12 text-center"> <h3><i class="fa fa-exclamation-circle"></i> No Blogs Found</h3></div>
            </div>
        @endif
    </div>
</section>
<!-- Section ends -->
@endsection
