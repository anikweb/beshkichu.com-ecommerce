@extends('frontend.master')

@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Reset Password</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">reset password</a></li>
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
                        <h3 class="text-center">Reset Password</h3>
                        {{-- @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div><i class="fa fa-exclamation-circle"></i>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif --}}
                        <form class="theme-form" action="{{ route('password.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <input type="hidden" name="email" value="{{ $request->email }}">

                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter New Password">
                                    @error('password')
                                        <div class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" id="password_confirmation" placeholder="Confirm Password">

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

