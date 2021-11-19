@extends('frontend.master')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>faq</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">faq</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    <!--section start-->
    <section class="faq-section section-big-py-space bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="accordion theme-accordion" id="accordionExample">
                        @foreach ($faqs as $faq)
                            <div class="card">
                                <div class="card-header" id="heading{{ $loop->index }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapseOne">{{ $faq->title }}</button>
                                    </h5>
                                </div>
                                <div id="collapse{{ $loop->index }}" class="collapse @if($loop->index == 0)show @endif" aria-labelledby="heading{{ $loop->index }}" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>{{ $faq->summary }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
