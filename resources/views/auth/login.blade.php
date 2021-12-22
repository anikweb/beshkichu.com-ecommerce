@extends('frontend.master')

@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Login</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">login</a></li>
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
                <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
                    <div class="theme-card">
                        <h3 class="text-center">Login</h3>
                        <form class="theme-form" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">

                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" >
                                @error('email')
                                    <div class="text-danger">
                                        <i class="fa fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="review">Password</label>
                                <input type="password" name="password" value="{{ old('password') }}" autocomplete="current-password" class="form-control @error('password')is-invalid @enderror" id="review" placeholder="Enter your password">
                                @error('password')
                                    <div class="text-danger">
                                        <i class="fa fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-normal" >LOGIN</button>
                            <a class="float-right txt-default mt-2" href="{{ route('password.request') }}" id="fgpwd">Forgot your password?</a>
                        </form>
                        <p class="mt-3">Sign up for a free account at our store. Registration is quick and easy. It allows you to be able to order from our shop. To start shopping click register.</p>
                        <a href="{{ route('register') }}" class="txt-default pt-3 d-block">Create an Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
