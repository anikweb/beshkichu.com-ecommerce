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
                      <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
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
                        <h3 class="card-title">Edit</h3>
                   </div>
                   <div class="card-body">
                        <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="name">Enter Name</label>
                                    <input type="text" name="name" value="{{ $category->name }}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name of Role">
                                    @error('name')
                                        <div class="text-danger">
                                            <i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="name">Choose Image</label>
                                            <div class="custom-file mb-3">
                                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label" for="customFile">Choose Slider Image</label>
                                                </div>
                                            @error('image')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <img id="image_preview" width="300px" src="{{ asset('assets/images/layout-2/collection-banner/'.$category->image) }}" alt="{{ $category->image }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save Changes</button>
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
        @if (session('success'))
            toastr["success"]("{{ session('success') }}");
        @elseif(session('error'))
            toastr["error"]("{{ session('error') }}");
        @endif
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
