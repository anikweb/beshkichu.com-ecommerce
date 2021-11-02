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
                      <li class="breadcrumb-item active">Profile</li>
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
                        <h3 class="card-title">Change Password</h3>
                   </div>
                   <div class="card-body">
                    <form action="{{ route('backend.change.password.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 m-auto">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" name="current_password" value="{{ old('current_password') }}" id="current_password" class="form-control @error('current_password') is-invalid @enderror @if(session('error')) is-invalid @endif" placeholder="Enter Current Password">
                                        @error('current_password')
                                            <div class="text-danger">
                                                <i class="fa fa-exclamation-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @if (session('error'))
                                            <div class="text-danger">
                                                <i class="fa fa-exclamation-circle"></i>
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <label for="new_password">New Password</label>
                                        <input type="password" name="new_password" value="{{ old('new_password') }}" id="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="Enter New Password">
                                        @error('new_password')
                                            <div class="text-danger">
                                                <i class="fa fa-exclamation-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password">
                                        @error('confirm_password')
                                            <div class="text-danger">
                                                <i class="fa fa-exclamation-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 text-center py-2">
                                        <button class="btn btn-primary">Change Password</button>
                                    </div>
                                </div>
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
    </script>
@endsection
