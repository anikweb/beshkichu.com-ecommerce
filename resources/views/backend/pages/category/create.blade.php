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
                      <li class="breadcrumb-item active">Create Category</li>
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
                        <h3 class="card-title">Add Category</h3>
                   </div>
                   <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="name">Enter Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name of Category">
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
                                            <img id="image_preview" width="300px" src="{{ asset('assets/images/image-placeholder.jpg') }}" alt="{{ basicSettings()->site_title }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-plus-circle"></i> Create</button>
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
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
