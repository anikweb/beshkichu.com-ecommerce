@extends('frontend.master')
@section('content')
<section class="p-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <img width="50%" src="{{ asset('assets/images/errors/500.gif') }}" alt="500 Server not found">
                <h2 class="py-2">SERVER ERROR</h2>
                <a href="{{ route('frontend') }}" class="btn btn-normal my-3">Back to Home</a>
            </div>
        </div>
    </div>
</section>
@endsection
