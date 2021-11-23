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
                      <li class="breadcrumb-item active">About</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
       <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Featured Image</h3>

                </div>
                <div class="card-body mx-auto">
                    <img id="image_preview" class="img-responsive w-100" src="{{ asset('assets/images/about-image/'.$about->image) }}" alt="">
                    @error('image')
                        <div class="text-danger">
                            <i class="fa fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    <form action="{{ route('about.image.update') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="about_id" value="{{ $about->id }}">
                        <label for="image" class="btn btn-primary mt-2">Change</label>
                        <input onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])" class="d-none" type="file" name="image" id="image">
                        <button type="submit" class="btn btn-success"> Update</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">About</h3>
                </div>
                <div class="card-body">
                    <p>{{$about->summary}}</p>
                    @error('summary')
                        <div class="text-danger">
                            <i class="fa fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="button" class="btn btn-primary summary-btn" data-id="{{ $about->id }}"  data-target="#exampleModalCenter" data-toggle="modal"><i class="fa fa-edit"></i> Edit</button>
                </div>
            </div>
        </div>
       </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <form action="{{ route('about.update',$about->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Summary</h5>
                        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea name="summary" id="summary" class="form-control" rows="15">{{ $about->summary }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
    </div>
    {{-- Image Modal  --}}
    {{-- <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <form action="{{ route('about.image.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $about->id }}">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="ModalCenterTitle">Summary</h5>
                        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea name="summary" id="summary" class="form-control" rows="15">{{ $about->summary }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
    </div> --}}
@endsection
@section('footer_js')
    <script>
        @if (session('success'))
            toastr["success"]("{{ session('success') }}");
        @elseif(session('error'))
            toastr["error"]("{{ session('error') }}");
        @endif
    </script>
@endsection
