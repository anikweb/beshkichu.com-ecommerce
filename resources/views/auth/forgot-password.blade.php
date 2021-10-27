@extends('frontend.master')

@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>forget password</h2>
                            <ul>
                                <li><a href="#">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="#">forget password</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="login-page pwd-page section-big-py-space bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="theme-card">
                    <h3>Forget Your Password</h3>
                    @if (session('status'))
                        <div class="alert alert-success">
                            <i class="fa fa-check"></i>
                            {{ session('status') }}
                        </div>
                    @endif
                    @error('email')
                        <div class="alert alert-danger">
                        {{ $message }}
                        </div>
                    @enderror
                    <form class="theme-form" action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control @error('email') is-inavlid @enderror" name="email" value="{{ old('email') }}"  id="email" placeholder="Enter Your Email" autofocus>
                                @error('password')
                                    <div class="text-danger">
                                        <i class="fa fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            </div><button type="submit" class="btn btn-normal">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

