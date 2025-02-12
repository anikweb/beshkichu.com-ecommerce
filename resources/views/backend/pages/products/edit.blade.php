@extends('backend.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard {{ $product->category->name }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                      <li class="breadcrumb-item active">Edit</li>
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
                        <h3 class="card-title">Edit Product</h3>
                   </div>
                   <div class="card-body">
                    <form id="product_update_form" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="name">Name <span>*</span> </label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}">
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
                                                    <option @if ($product->category->id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
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
                                            <select name="subcategory_id" id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                                                <option  value="{{  $product->subcategory->id  }}">{{ $product->subcategory->name }}</option>
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
                                            <p class="mb-2 font-weight-bold">Thumbnail <span>*</span>
                                            <div>
                                                <img  class="image-responsive rounded " width="200px" src="{{  asset('assets/images/product/'.$product->created_at->format('Y/m/d/').$product->id.'/thumbnail/'.$product->thumbnail) }}" alt="thumbnail" id="thumbnail_preview">
                                            </div>
                                            <label for="thumbnail" class="btn btn-success mt-1"><i class="fa fa-hand-pointer"></i> Change Thumbnail</label>
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
                                        <option value="">-None-</option>
                                        <option @if ($product->gender=='male') selected @endif value="male">Male</option>
                                        <option @if ($product->gender=='female') selected @endif value="female">Female</option>
                                        <option @if ($product->gender=='both') selected @endif value="both">Both</option>
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
                                        <option value="4">-None-</option>
                                        @foreach ($warranties as $warranty)
                                            @if ($warranty->warranty != 'none')
                                                <option @if ($product->warranty == $warranty->id) selected @endif value="{{ $warranty->id }}">{{ $warranty->warranty }}</option>

                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="return">Return</label>
                                    <select name="return" id="return" class="form-control">
                                        <option value="6">-None-</option>
                                        @foreach ($returns as $return)
                                            @if ($return->name != 'none')
                                                <option @if ($product->return == $return->id) selected @endif value="{{ $return->id }}">{{ $return->name }}</option>

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
                                    <input type="text" name="main_upper_material" value="{{ $product->main_upper_material }}" id="main_upper_material" class="form-control" placeholder="Type Main Upper Material">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="outsole_material">Outsole Material</label>
                                    <input type="text" name="outsole_material" value="{{ $product->outsole_material }}" id="outsole_material" class="form-control" placeholder="Enter brand name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="text" name="brand" value="{{ $product->brand }}" id="brand" class="form-control" placeholder="Enter brand name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="origin">Origin</label>
                                    <input type="text" name="origin" value="{{ $product->origin }}" id="origin" class="form-control" placeholder="Enter origin name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="authentic">Authenticity</label>
                                    <select name="authentic" id="authentic" class="form-control">
                                        <option value="50">-None-</option>
                                        <option @if ($product->authentic == '50') selected @endif value="50">50% Authentic</option>
                                        <option @if ($product->authentic == '60') selected @endif value="60">60% Authentic</option>
                                        <option @if ($product->authentic == '70') selected @endif value="70">70% Authentic</option>
                                        <option @if ($product->authentic == '80') selected @endif value="80">80% Authentic</option>
                                        <option @if ($product->authentic == '90') selected @endif value="90">90% Authentic</option>
                                        <option @if ($product->authentic == '100') selected @endif value="100">100% Authentic</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="summary">Summary <span>*</span></label>
                                            <textarea name="summary" id="summary"  rows="5" class="form-control @error('summary') is-invalid @enderror" placeholder="Type Summary">{{ $product->summary }}</textarea>
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
                                            <textarea name="description" id="description"  rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Type Description">{{ $product->description }}</textarea>
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
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-info submit_btn"><i class="fa fa-save"></i> Save Changes</button>
                            </div>
                        </div>
                    </form>
                   </div>
               </div>
           </div>
       </div>
    </div>
@endsection
@section('footer_js')
    <script>
        // Notification
        @if (session('success'))
            toastr["success"]("{{ session('success') }}");
        @elseif(session('error'))
            toastr["error"]("{{ session('error') }}");
        @endif
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
        //  Dynamic Field Add/Remove
        $('.multi-field-wrapper').each(function(){
            var $wrapper = $('.multi-fields', this);
            $('.add-field').click(function(){
                $('.multi-field-r-item:first-child').clone(true).appendTo($wrapper).find('input').val('');
            });
            $('.remove-field').click(function(){
                if($('.multi-field-r-item', $wrapper).length >1){
                    $(this).parent('.multi-field-r-item').remove();
                }
            });
        });
        $('.submit_btn').click(function(){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure to edit this product?',
                // text: 'Invoice No:',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Save Change!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                'Succcess!',
                'This order is product updated.',
                'success'
                )
                setTimeout(function(){
                    $("#product_update_form").submit();
                }, 1300);
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'Cancel to edit',
                'error',
                )
            }
            })
        });


    </script>
@endsection
