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
                      <li class="breadcrumb-item active">Create Post</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <form action="{{ route('blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                                <h3 class="card-title">Create Post</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="title">Title <span>*</span> </label>
                                            <input type="text" name="title" value="{{ $blog->title }}" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title">
                                            @error('title')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="category_id">Category <span>*</span> </label>
                                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                <option value="" class="text-muted">Select</option>
                                                @foreach ($categories as $category)
                                                <option @if($blog->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 text-center mt-2">
                                            <img id="image_preview" width="100%" src="{{ asset('assets/images/blog/'.$blog->image) }}" alt="{{ basicSettings()->site_title }}">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <label for="feature_image">Choose Featured Image</label>
                                            <div class="custom-file mb-3">
                                                <input type="file" name="feature_image" class="custom-file-input @error('feature_image') is-invalid @enderror" id="feature_image" onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label" for="feature_image">{{ $blog->image }}</label>
                                            </div>
                                            @error('feature_image')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12" >
                                        <label for="description">Description <span>*</span></label>
                                        <div @error('description') style="border: 1px solid red" @enderror>
                                            <textarea  name="description" id="description" class="form-control">{{ $blog->description }}</textarea>
                                        </div>
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
                </div>
            </div>
        </form>
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
        CKEDITOR.replace('description');
    </script>
@endsection
