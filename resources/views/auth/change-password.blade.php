@extends('frontend.master')

@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Change Password</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('my-account.index') }}">Personal Information</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">Change password</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="login-page section-big-py-space bg-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="theme-card">
                        <h3 class="text-center">Change Password</h3>
                        @if(session('success'))
                            <div class="alert alert-success text-success text-center">
                                <i class="fa fa-check-circle"></i>
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger text-danger text-center">
                                <i class="fa fa-exclamation-circle"></i>
                                {{ session('error') }}
                            </div>
                        @endif
                        <form class="theme-form" action="{{ route('my-account.changePassword.update') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" name="current_password" value="{{ old('current_password') }}" class="form-control @error('current_password') is-invalid @enderror" id="current_password" placeholder="Enter current password">
                                    @error('current_password')
                                        <div class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" name="new_password" value="{{ old('new_password') }}" class="form-control @error('new_password') is-invalid @enderror" id="new_password" placeholder="Enter New Password">
                                    @error('new_password')
                                        <div class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="confirm_password">New Password</label>
                                    <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" placeholder="Confirm password">
                                    @error('confirm_password')
                                        <div class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-normal">Done</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

