@extends('backend.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Terms & Conditions</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active">Terms & Conditions</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                 <a href="{{ route('terms-and-conditions.edit',$terms->id) }}" class="btn btn-secondary mb-1" >Edit</a>
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Terms & Conditions</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                             @php
                                echo $terms->description;
                            @endphp
                        </p>
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
    </script>
@endsection
