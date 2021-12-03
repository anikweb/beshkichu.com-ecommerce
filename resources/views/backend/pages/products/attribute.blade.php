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
                      <li class="breadcrumb-item active">Attribute</li>
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
                        <h3 class="card-title">Attribute</h3>
                   </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Sizes</th>
                                            <th class="text-center">Regular Price</th>
                                            <th class="text-center">Offer Price</th>
                                            @if (auth()->user()->can('product edit'))
                                                <th class="text-center">Action</th>
                                            @endif
                                        </thead>
                                        <tbody>
                                            @forelse ($attributes as $attribute)
                                                <tr>
                                                    <td class="text-center">{{ $attributes->firstItem() + $loop->index }}</td>
                                                    <td width="160px" class="text-center">
                                                        <img width="150px" src="{{ asset('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/image_galleries/'.$attribute->image->name }}" alt="{{ $product->name }}">
                                                    </td>
                                                    <td class="text-center">
                                                        @foreach ($attribute->size as $size)
                                                            <span class="btn-sm btn-info">{{ $size->size_id }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td class="text-center">৳{{ $attribute->regular_price }}</td>
                                                    <td class="text-center">৳{{ $attribute->offer_price }}</td>
                                                    @if (auth()->user()->can('product edit'))
                                                        <td class="text-center">
                                                            @can('product edit')
                                                            <a href="{{ route('products.attribute.edit',$attribute->id) }}" type="button" class="btn btn-primary edit-btn"><i class="fa fa-edit"></i></a>
                                                            @endcan
                                                            {{-- <a class="btn btn-danger"><i class="fa fa-trash"></i></a> --}}
                                                        </td>
                                                    @endif
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="6"><i class="fa fa-exclamation-circle"></i> No data to show!</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $attributes->links() }}
                                    </div>
                                </div>
                            </div>
                            @can('product add')
                            <div class="col-md-12">
                                <div class="btn btn-primary" data-toggle="modal" data-target="#add_modal">Add New</div>
                            </div>
                            @endcan
                        </div>
                    </div>
               </div>
           </div>
       </div>
    </div>
    {{-- Add Modal  --}}
    <div class="modal fade bd-example-modal-lg" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('products.attribute.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="product_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Attribute</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 m-auto">
                                        <div  class="form-group text-center ">
                                            <span class="font-weight-bold d-block pb-3">Image</span>
                                            <input onchange="document.getElementById('imageGallery_preview').src = window.URL.createObjectURL(this.files[0])" type="file" name="image_galleries" id="imageGallery" class="d-none">
                                            <img @error('image_galleries') style="border:1px solid red" @enderror id="imageGallery_preview"  width="100%" src="{{ asset('assets/images/image-placeholder.jpg') }}" alt="{{ basicSettings()->site_title }}">
                                            @error('image_galleries')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="imageGallery" class="btn btn-info mt-2">Select Sample</label>

                                        </div>
                                    </div>
                                    <div class="col-md-12 m-auto">
                                        <div class="form-group">
                                            <label for="size">Size<span class="badge text-danger">*</span> </label>
                                            <select name="size_id[]" class="form-control size_input" id="size" multiple="multiple">
                                                <option value="">None</option>
                                                @for ($i = 20; $i < 50; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                                    <option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL</option>
                                                    <option value="XXXL">XXXL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-auto">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="rPrice">Regular Price <span class="text-danger">*</span> </label>
                                            <input type="text" name="rPrice" class="form-control @error('rPrice') is-invalid @enderror" id="rPrice" placeholder="Enter Regular Price">
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
                                            <input type="text" name="ofrPrice" class="form-control @error('ofrPrice') is-invalid @enderror" id="ofrPrice" placeholder="Enter Offer Price">
                                            @error('ofrPrice')
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
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="sub" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
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
        $('.edit-btn').click(function(){
            var attribute_id = $(this).attr('data-attribute');
            $('#attribute_id').val(attribute_id);
            var regular_price = $(this).attr('data-rPrice');
            $('#eRPrice').val(regular_price);
            var offer_price = $(this).attr('data-fPrice');
            // alert(offer_price);
            $('#eOfrPrice').val(offer_price);


        });
        $('#size').select2();
        $('.size_input').select2();
    </script>
@endsection
