@extends('frontend.master')
@section('content')
<section class="p-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                    <img width="50%" src="{{ asset('assets/images/errors/400.gif') }}" alt="404 Page not Found">
                    <h2 class="py-2">PAGE NOT FOUND</h2>
                    <a href="{{ route('frontend') }}" class="btn btn-normal my-3">Back to Home</a>
            </div>
        </div>
    </div>
</section>
@endsection
