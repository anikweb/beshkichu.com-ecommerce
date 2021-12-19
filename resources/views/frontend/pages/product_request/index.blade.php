
@extends('frontend.master')
@section('content')
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>Product Request</h2>
                        <ul>
                            <li><a href="{{ route('frontend') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascipt:void(0)">Product Request</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-big-py-space bg-light mt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('product-request.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row px-0 px-md-5 mx-0 mx-md-5">
                                        <div class="col-md-12">
                                            <p class="text-dark h2 text-center text-md-left">Tell suppliers what you need.</p>
                                            <p class="text-muted text-center text-md-left">The more specific your information, the faster response you will get.</p>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email" class="text-dark h6">Email <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" placeholder="Enter you email">
                                                        @error('email')
                                                            <div class="text-danger">
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mobile" class="text-dark h6">Mobile <span class="text-danger">*</span></label>
                                                        <input type="tel" name="mobile" id="mobile" value="{{ old('mobile') }}" class="form-control  @error('mobile') is-invalid @enderror" placeholder="Enter your mobile">
                                                        @error('mobile')
                                                            <div class="text-danger">
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="product_name" class="h6 text-dark">Product Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="product_name" id="product_name" value="{{ old('product_name') }}" class="form-control @error('product_name') is-invalid @enderror" placeholder="Enter product name or title">
                                                        @error('product_name')
                                                            <div class="text-danger">
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="details" class="h6 text-dark">Details <span class="text-danger">*</span></label>
                                                        <textarea name="details" id="details" rows="6" class="form-control  @error('details') is-invalid @enderror" placeholder="Detailed the product you want to source">{{ old('details') }}</textarea>
                                                        @error('details')
                                                            <div class="text-danger">
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 py-md-5">
                                                    <ul class="list-group">
                                                        <li>Please enter details like:</li>
                                                        <li>-Material</li>
                                                        <li>-Size/Dimension</li>
                                                        <li>-Application</li>
                                                        <li>-Any other requirements</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input  @error('image') is-invalid @enderror" id="validatedCustomFile" name="image">
                                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                                            @error('image')
                                                                <div class="text-danger">
                                                                    <i class="fa fa-exclamation-circle"></i>
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="targeted_price" class="text-dark h6">Targeted Price <span class="text-danger">*</span></label>
                                                        <input type="number" name="targeted_price" id="targeted_price" value="{{ old('targeted_price') }}" class="form-control @error('targeted_price') is-invalid @enderror" placeholder="Enter targeted price">
                                                        @error('targeted_price')
                                                            <div class="text-danger">
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="currency" class="text-dark h6">Currency <span class="text-danger">*</span></label>
                                                        @php
                                                            $currency_names = ['USD(US$)','EUR(€)','INR(₹)','BDT(৳)','CNY(¥)','SAR(﷼)','MYR(RM)'];
                                                            $currency_name = Arr::sort($currency_names);
                                                        @endphp
                                                        <select name="currency" id="currency" class="form-control @error('currency') is-invalid @enderror">
                                                            @foreach ($currency_name as $item)
                                                                <option value="{{ $item }}">{{$item}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('currency')
                                                            <div class="text-danger">
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="quantity" class="text-dark h6">Purchase Quantity <span class="text-danger">*</span></label>
                                                        <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Quantity">
                                                        @error('quantity')
                                                            <div class="text-danger">
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-0 pt-0 mt-md-4 pt-md-1">
                                                    <div class="form-group">
                                                        @php
                                                            $p = ['Container','Pice','Bag','Box','Foot','Meter','Pair','Ream','Roll','Set','Square Meter','Square Foot','Ton','Yard','Other'];
                                                            $s = Arr::sort($p);
                                                        @endphp
                                                        <select name="quantity_type" id="quantity_type" class="form-control @error('quantity_type') is-invalid @enderror">
                                                            @foreach ($s as $item)
                                                                <option value="{{ $item }}">{{$item}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('quantity_type')
                                                            <div class="text-danger">
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="valid_to" class="text-dark h6">Valid to <span class="text-danger">*</span></label>
                                                        <input type="date" min="{{ date('Y-m-d') }}" name="valid_to" value="{{ old('valid_to') }}" id="valid_to" class="form-control  @error('valid_to') is-invalid @enderror @if(session('date_error')) is-invalid @endif">
                                                        @error('valid_to')
                                                            <div class="text-danger">
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        @if(session('date_error'))
                                                            <div class="text-danger">
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                {{ session('date_error') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" style="background:#002340" class="btn text-white">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('inline_style')
    <style>
        .main-wrapper {
            width: 1210px;
            margin: auto;
        }
        .select2-selection{
            height: 35px !important;
        }
    </style>
@endsection
@section('footer_js')
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $(document).ready(function() {
        $("#currency").select2();
        $("#quantity_type").select2();
        // $("").selectize(options);
    });

</script>
@endsection
