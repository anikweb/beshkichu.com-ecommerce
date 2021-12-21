@extends('frontend.master')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Contact us</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    <!--section start-->
    <section class="section-big-py-space bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="background:#002340; color:white">
                            <h3 style="font-weight: 100">For Support</h3>
                        </div>
                        <div class="card-body">
                            <h4 style="font-weight: 100"> Email: <a href="mailto:{{  contactInformation()->email }}">{{  contactInformation()->email }}</a> </h4>
                            <h4 style="font-weight: 100"> Cell:
                                @foreach (contactMobile() as $mobile)
                                    <span>{{ $mobile->number }}</span>
                                @endforeach</span>
                            </h4>
                            @if (contactInformation()->phone)
                                <h4 style="font-weight: 100"> Phone:
                                    {{ contactInformation()->phone }}
                                </h4>
                            @endif
                        </div>
                    </div>
                    <div class="card mt-2 ">
                        <div class="card-header"  style="background:#002340;color:white !important">
                            <h3 style="font-weight: 100">Business Address:</h3>
                        </div>
                        <div class="card-body">
                            <h4 style="font-weight: 100">{{ contactInformation()->street_address.','.contactInformation()->upazila->name.','.contactInformation()->division->name.'-'.contactInformation()->zip_code }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background:#002340;color:white !important">
                            <h3 style="font-weight: 100">Live Location</h3>
                        </div>
                        <div class="card-body">
                            @php
                                echo $map->embed_code;
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
