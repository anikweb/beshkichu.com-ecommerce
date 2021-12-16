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
                      <li class="breadcrumb-item active">Google Map</li>
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
                        <h3 class="card-title">Google Map Update</h3>
                   </div>
                   <div class="card-body">
                        <form action="{{ route('contact.information.google.map.update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <i class="fa fa-exclamation-circle"></i> Before Save, You need to customize embed code in iframe tag. change width height attribute to 'width=100%', 'height=310px'.
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Title <span>*</span></label>
                                        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ $map->title }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="embed-code">Google Map Embed Code <span>*</span></label>
                                        <textarea name="embed_code" id="embed-code" class="form-control"  placeholder="Enter google map embed code" rows="5">{{ $map->embed_code }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </div>
                        </form>
                   </div>
               </div>
           </div>
           <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">{{ $map->title }}</h3>
                    </div>
                    <div class="card-body">
                        @php
                            echo $map->embed_code;
                        @endphp
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
    </script>
@endsection
