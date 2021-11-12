@extends('backend.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                  {{-- <li class="breadcrumb-item"><a href="{{ route('products.attribute.index') }}">Atrribute</a></li> --}}
                  <li class="breadcrumb-item active">Attribute Edit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="row">
        <div class="col-md-11 mx-auto">
            <div class="card card-primary">
                <div class="card-header">
                     <h3 class="card-title">Attribute</h3>
                </div>
                 <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('products.attribute.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">
                                <input type="hidden" name="product_id" value="{{ $attribute->product->id }}">
                                <div class="row">
                                    <div class="col-md-6 m-auto">
                                        <div  class="form-group text-center ">
                                            <span class="font-weight-bold d-block pb-3">Image</span>
                                            <input onchange="document.getElementById('imageGallery_preview').src = window.URL.createObjectURL(this.files[0])" type="file" name="image_galleries" id="imageGallery" class="d-none">
                                            <img @error('image_galleries') style="border:1px solid red" @enderror id="imageGallery_preview"  width="300px" src="{{ asset('assets/images/product').'/'.$attribute->product->created_at->format('Y/m/d/').$attribute->product->id.'/image_galleries/'.$attribute->image->name }}" alt="{{ basicSettings()->site_title }}">
                                            @error('image_galleries')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="row ">
                                                <div class="col-md-5 mx-auto">
                                                    <label for="imageGallery" class="btn btn-info mt-2 d-block  " >Select Sample</label>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12 m-auto">
                                        <div class="form-group">
                                            <label for="size">Size<span class="badge text-danger">*</span> </label>
                                            <select name="size_id[]" class="form-control size_input" id="size" multiple="multiple">
                                                <option value="">None</option>
                                                @for ($i = 34; $i < 50; $i++)
                                                    <option
                                                        @foreach ($attribute->size as $size)
                                                            @if ($size->size_id == $i)
                                                                selected
                                                            @endif
                                                        @endforeach
                                                    value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-auto">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="rPrice">Regular Price <span class="text-danger">*</span> </label>
                                            <input type="text" name="rPrice" value="{{ $attribute->regular_price }}" class="form-control @error('rPrice') is-invalid @enderror" id="rPrice" placeholder="Enter Regular Price">
                                            @error('rPrice')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ofrPrice">Offer Price</label>
                                            <input type="text" name="ofrPrice"  value="{{ $attribute->offer_price }}" class="form-control @error('ofrPrice') is-invalid @enderror" id="ofrPrice" placeholder="Enter Offer Price">
                                            @error('ofrPrice')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-save"></i>
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
 </div>
@endsection
@section('internal_style')
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background: #17a2b8 !important;
        color: #fff !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #fff !important;
    }
    .select2-container--default .select2-selection--single {
        height: 38px !important;
    }
    .select2-container{
        width: 100% !important;
    }
</style>
@endsection
@section('footer_js')
<script>
     // Notification
     @if (session('success'))
        toastr["success"]("{{ session('success') }}");
    @elseif(session('error'))
        toastr["error"]("{{ session('error') }}");
    @endif
    $("#size").select2();
</script>
@endsection
