@extends('backend.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Terms and Conditions</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('terms-and-conditions.index') }}">Terms and Conditions</a></li>
                      <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Terms and Conditions</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('terms-and-conditions.update',$termCondition->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $termCondition->id }}" name="terms_id">
                            <textarea name="description" id="description"  class="form-control" >{{ $termCondition->description }}</textarea>
                            <button type="submit" class="btn btn-primary my-2"><i class="fa fa-save"></i> Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_js')
    <script>
        @if (session('success'))
            toastr["success"]("{{ session('success') }}");
        @elseif(session('error'))
            toastr["error"]("{{ session('error') }}");
        @endif
        CKEDITOR.replace('description');
    </script>
@endsection
