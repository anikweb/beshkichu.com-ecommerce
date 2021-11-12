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
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
       <div class="row">
           <div class="col-md-12">
               <div class="card card-primary">
                   <div class="card-header">
                        <h3 class="card-title">Add Product</h3>
                   </div>
                   <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="name">Name <span>*</span> </label>
                                            <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Product Name">
                                            @error('name')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Category <span>*</span></label>
                                            <select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror">
                                                <option value="">-Select-</option>
                                                @foreach ($categories as $category)
                                                    <option @if(old('category_id')==$category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="subcategory_id">Subcategory <span>*</span></label>
                                            <select name="subcategory_id"  id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                                                <option value="">-Select-</option>
                                            </select>
                                            @error('subcategory_id')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <div class="form-group">
                                            <p class="mb-2 font-weight-bold">Choose Thumbnail <span>*</span>
                                            <div>
                                                <img  class="image-responsive rounded " width="200px" src="{{ asset('assets/images/image-placeholder.jpg') }}" alt="thumbnail" id="thumbnail_preview">
                                            </div>
                                            <label for="thumbnail" class="btn btn-success mt-1"><i class="fa fa-hand-pointer"></i> Choose Thumbnail</label>
                                            <input onchange="document.getElementById('thumbnail_preview').src = window.URL.createObjectURL(this.files[0])" type="file" class="d-none" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror">
                                            @error('thumbnail')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">Gender <span>*</span></label>
                                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                        <option @if(old('gender')=='none') selected @endif value="none">-None-</option>
                                        <option @if(old('gender')=='male') selected @endif value="male">Male</option>
                                        <option @if(old('gender')=='female') selected @endif value="female">Female</option>
                                        <option @if(old('gender')=='both') selected @endif value="both">Both</option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="warranty">Warranty</label>
                                    <select name="warranty" id="warranty" class="form-control">
                                        <option value="4">None</option>
                                        @foreach ($warranties as $warranty)
                                            @if ($warranty->warranty != 'none')
                                                <option @if(old('warranty')==$warranty->id) selected @endif value="{{ $warranty->id }}">{{ $warranty->warranty }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="return">Return</label>
                                    <select name="return" id="return" class="form-control">
                                        <option value="6">None</option>
                                        @foreach ($returns as $return)
                                            @if ($return->name != 'none')
                                                <option @if(old('return')==$return->id) selected @endif value="{{ $return->id }}">{{ $return->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="promotions">Promotions</label>
                                    <select name="promotions" id="promotions" class="form-control">
                                        <option value="">-None-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="main_upper_material">Main Upper Material</label>
                                    <input type="text" name="main_upper_material" value="{{ old('main_upper_material') }}" id="main_upper_material" class="form-control" placeholder="Type Main Upper Material">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="outsole_material">Outsole Material</label>
                                    <input type="text" name="outsole_material" value="{{ old('outsole_material') }}" id="outsole_material" class="form-control" placeholder="Enter brand name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="text" name="brand" value="{{ old('brand') }}" id="brand" class="form-control" placeholder="Enter brand name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="origin">Origin</label>
                                    <input type="text" name="origin" id="origin" value="{{ old('origin') }}" class="form-control" placeholder="Enter origin name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="authentic">Authenticity</label>
                                    <select name="authentic" id="authentic" class="form-control">
                                        <option @if(old('authentic')=='none') selected @endif value="none">-None-</option>
                                        <option @if(old('authentic')=='50') selected @endif value="50">50% Authentic</option>
                                        <option @if(old('authentic')=='60') selected @endif value="60">60% Authentic</option>
                                        <option @if(old('authentic')=='70') selected @endif value="70">70% Authentic</option>
                                        <option @if(old('authentic')=='80') selected @endif value="70">80% Authentic</option>
                                        <option @if(old('authentic')=='90') selected @endif value="90">90% Authentic</option>
                                        <option @if(old('authentic')=='100') selected @endif value="100">100% Authentic</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="summary">Summary <span>*</span></label>
                                            <textarea name="summary" id="summary" value="{{ old('summary') }}" rows="5" class="form-control @error('summary') is-invalid @enderror" placeholder="Type Summary"></textarea>
                                            @error('summary')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description <span>*</span></label>
                                            <textarea name="description" id="description" value="{{ old('description') }}"  rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Type Description"></textarea>
                                            @error('description')
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
                        <div class="row">
                            <hr>
                            <div class="col-md-6">
                                <label for="shipping_charge">Shipping Charge (tk/per kg)</label>
                                <input type="number"  name="shipping_charge" value="{{ old('shipping_charge') }}" id="shipping_charge" class="form-control @error('shipping_charge') is-invalid @enderror" placeholder="Enter Shipping charge">
                                @error('shipping_charge')
                                    <div class="text-danger">
                                        <i class="fa fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="ocen">Delivery Deadline(min-max) :</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="delivery_deadline_min" id="delivery_deadline_min" class="form-control @error('delivery_deadline_min') is-invalid @enderror">
                                            <option value="">-Select-</option>
                                            @for ( $i= 1;  $i<=100 ; $i++)
                                                <option @if(old('delivery_deadline_min')==$i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('delivery_deadline_min')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <select name="delivery_deadline_max" id="delivery_deadline_max" class="form-control @error('delivery_deadline_max') is-invalid @enderror">
                                            <option value="">-Select-</option>
                                            @for ( $i= 1;  $i<=100 ; $i++)
                                                <option @if(old('delivery_deadline_max')==$i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('delivery_deadline_max')
                                            <div class="text-danger">
                                                <i class="fa fa-exclamation-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Product</button>
                            </div>
                        </div>
                    </form>
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
        // select 2
        $('#gender').select2();
        $('#warranty').select2();
        $('#return').select2();
        $('#promotions').select2();
        $('#authentic').select2();
       
        $('#delivery_deadline_min').select2();
        $('#delivery_deadline_max').select2();
        $('#category').select2();
        $('#subcategory_id').select2();
        $('#category').change(function(){
            var category_id = $('#category').val();

            $.ajax({
                type:"GET",
                url:"{{ url('products/get/subcategory' )}}/"+category_id,
                success:function(res){
                if(res){
                    // alert(res.name);
                    $("#subcategory_id").empty();
                    $("#subcategory_id").append("<option value=''>-Select-</option>");
                    $.each(res,function(key,value){
                        $("#subcategory_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }else{
                    $("#subcategory_id").empty();
                }
                }
            });
        });
    </script>
@endsection
