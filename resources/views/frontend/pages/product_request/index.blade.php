
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
                                    <div class="row main-wrapper">
                                        <div class="col-md-12">
                                            <p class="text-dark h2">Tell suppliers what you need</p>
                                            <p class="text-muted">The more specific your information, the faster response you will get.</p>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email" class="text-dark h6">Email <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Enter you email">
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
                                                        <input type="tel" name="mobile" id="mobile" class="form-control  @error('mobile') is-invalid @enderror" placeholder="Enter your mobile">
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
                                                        <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" placeholder="Enter product name or title">
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
                                                        <textarea name="details" id="details" rows="6" class="form-control  @error('details') is-invalid @enderror" placeholder="Detailed the product you want to source"></textarea>
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
                                                        <label for="quantity" class="text-dark h6">Purchase Quantity <span class="text-danger">*</span></label>
                                                        <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Quantity">
                                                        @error('quantity')
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
                                                        <label for="valid_to" class="text-dark h6">Valid to <span class="text-danger">*</span></label>
                                                        <input type="date" min="{{ date('Y-m-d') }}" name="valid_to" id="valid_to" class="form-control  @error('valid_to') is-invalid @enderror">
                                                        @error('valid_to')
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
    </style>
@endsection
@section('footer_js')
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection
