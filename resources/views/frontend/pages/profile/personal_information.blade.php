@extends('frontend.master')
@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>dashboard</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">dashbord</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-big-py-space bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="account-sidebar"><a class="popup-btn">my account</a></div>
                    <div class="dashboard-left">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                        <div class="block-content ">
                            <ul>
                                <li class="active"><a href="{{ route('my-account.index') }}">Account Info</a></li>
                                <li><a href="{{route('my-account.orders')}}">My Orders</a></li>
                                <li><a href="{{route('my-account.delivered.order')}}">Delevered Order</a></li>
                                <li><a href="#">Newsletter</a></li>
                                <li><a href="{{route('my-account.changePassword')}}">Change Password</a></li>
                                <li class="last"><a href="javascript:void(0)"  onclick="event.preventDefault(); document.getElementById('logout_form').submit()">Log Out</a></li>
                                <form id="logout_form" action="{{ route('logout') }}" method="POST">
                                @csrf

                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard">
                            <div class="page-title">
                                <h2>My Dashboard</h2></div>
                            <div class="welcome-msg">
                                <p>Hello, {{ Auth::user()->name }}!</p>
                                <p>From your My Account Dashboard you have the ability to view your recent account activity, update your account information and download your order invoice. Select a link below to view or edit information.</p>
                            </div>
                            <div class="box-account box-info">
                                <div class="box-head">
                                    <h2>Account Information</h2></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box">
                                            <div class="box-title">
                                                <h3>Contact Information</h3>

                                            </div>
                                            <div class="box-content">
                                                <h6>Name: {{ Auth::user()->name }}</h6>
                                                <h6>Username: {{ $personalInformation->username }}</h6>
                                                <h6>Email: {{ $personalInformation->user->email }}</h6>
                                                <h6><a href="{{route('my-account.changePassword')}}">Change Password</a></h6></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box">
                                            <div class="box-title">
                                                <h3>Personal Information</h3>
                                                <a href="{{ route('my-account.personal.information.edit',$personalInformation->username) }}">Edit</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">

                                                    <h6>Date of Birth:
                                                        <strong>
                                                            @if (isset($personalInformation->birth_date))
                                                            {{ $personalInformation->birth_date }}
                                                            @endif
                                                        </strong></h6>
                                                    <h6>Gender:
                                                        <strong>
                                                            @if (isset($personalInformation->gender))
                                                            {{ $personalInformation->gender }}
                                                            @endif
                                                        </strong></h6>
                                                    <h5 class="py-2">Default Billing Address</h5>
                                                    <h6>Street Address:
                                                        <strong>
                                                            @if (isset($personalInformation->street_address1))
                                                            {{ $personalInformation->street_address1 }}
                                                            @endif
                                                        </strong>
                                                        <strong>
                                                            @if (isset($personalInformation->street_address2))
                                                            {{ ','.$personalInformation->street_address2 }}
                                                            @endif
                                                        </strong>

                                                    </h6>
                                                    <h6>Upazila:
                                                        <strong>
                                                            @if (isset($personalInformation->upazila->name))
                                                            {{ $personalInformation->upazila->name }}
                                                            @endif
                                                        </strong></h6>
                                                    <h6>District:
                                                        <strong>
                                                            @if (isset($personalInformation->district->name))
                                                            {{ $personalInformation->district->name }}
                                                            @endif
                                                        </strong></h6>
                                                    <h6>Division:
                                                        <strong>
                                                            @if (isset($personalInformation->region->name))
                                                            {{ $personalInformation->region->name }}
                                                            @endif
                                                        </strong></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box">
                                            <div class="box-title">
                                                <h3>Newsletters</h3><a href="#">Edit</a></div>
                                            <div class="box-content">
                                                <p>You are currently not subscribed to any newsletter.</p>
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
@endsection
