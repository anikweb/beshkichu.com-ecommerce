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
                        <h3 class="card-title">Edit Profile</h3>
                   </div>
                   <form action="{{ route('backend.user.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="personal_information_id" value="{{ $users->id }}">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Name</td>
                                            <td>
                                                <input type="text" name="name" value="{{ $users->user->name }}" id="name" class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Username</td>
                                            <td>
                                                <input type="text" name="username" value="{{ $users->username }}" id="username" class="form-control @error('username') is-invalid @enderror">
                                                @error('username')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Mobile</td>
                                            <td>
                                                <input type="text" name="mobile" value="@if(isset($users->mobile)){{$users->mobile}}@endif" id="mobile" class="form-control @error('mobile') is-invalid @enderror">
                                                @error('mobile')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Date of Birth</td>
                                            <td>
                                                <input type="date" name="birth_date" value="@if(isset($users->birth_date)){{$users->birth_date}}@endif" id="birth_date" class="form-control @error('birth_date') is-invalid @enderror">
                                                @error('birth_date')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Gender</td>
                                            <td>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option @if ($users->gender == 'male') selected @endif value="male">Male</option>
                                                    <option @if ($users->gender == 'female') selected @endif value="female">Female</option>
                                                    <option @if ($users->gender == 'other') selected @endif value="other">Other</option>
                                                </select>
                                                @error('gender')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Region</td>
                                            <td>
                                                <select class="form-control @error('region_id') is-invalid @enderror" name="region_id" id="region_id">
                                                    @foreach ($regions as $region)
                                                        <option @if(isset($users->region_id) && $users->region_id == $region->id ) selected @endif value="{{ $region->id }}"> {{ $region->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('region_id')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">District</td>
                                            <td>
                                                <select name="district_id" class="form-control @error('district_id') is-invalid @enderror" id="district_id">
                                                    @if (isset($users->district_id))
                                                        <option value="{{ $users->district_id }}">{{ $users->district->name }}</option>
                                                    @else
                                                        <option value="">-Select-</option>
                                                    @endif
                                                </select>
                                                @error('district_id')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Upazila</td>
                                            <td>
                                                <select name="upazila_id" class="form-control @error('upazila_id') is-invalid @enderror" id="upazila_id">
                                                    @if (isset($users->upazila_id))
                                                        <option value="{{ $users->upazila_id }}">{{ $users->upazila->name }}</option>
                                                    @else
                                                        <option value="">-Select-</option>
                                                    @endif
                                                </select>
                                                @error('upazila_id')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Street Address</td>
                                            <td>
                                                <input type="text" name="street_address1" value="@if(isset($users->street_address1)){{$users->street_address1}}@endif" id="street_address1" class="form-control @error('street_address1') is-invalid @enderror">
                                                @error('street_address1')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <input type="text" name="street_address2" value="@if(isset($users->street_address2)){{$users->street_address2}}@endif" id="street_address2" class="form-control mt-2 @error('street_address2') is-invalid @enderror">
                                                @error('street_address2')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Zip Code</td>
                                            <td>
                                                <input type="text" name="zip_code" value="@if(isset($users->zip_code)){{$users->zip_code}}@endif" id="street_address1" class="form-control @error('zip_code') is-invalid @enderror">
                                                @error('zip_code')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                            </div>
                        </div>
                   </form>
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
        $("#region_id").change(function(){
                var region_id = $("#region_id").val();
                // alert(region_id);
                $.ajax({
                    type:"GET",
                    url:"{{url('get/district')}}/"+region_id,
                    success:function(res){
                        if(res){
                            $("#district_id").empty();
                            $("#district_id").append('<option>Select</option>');
                            $.each(res,function(key,value){
                                $("#district_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                            });
                            $("#district_id").change(function(){
                                var district_id = $("#district_id").val();
                               $.ajax({
                                    type:"GET",
                                    url:"{{url('get/upazila')}}/"+district_id,
                                    success:function(res){
                                        if(res){
                                            $("#upazila_id").empty();
                                            $("#upazila_id").append('<option>Select</option>');
                                            $.each(res,function(key,value){
                                                $("#upazila_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                                            });
                                        }else{
                                            $("#state").empty();
                                        }
                                    }
                                });
                            });
                        }else{
                            $("#state").empty();
                        }
                    }
                });
            });
    </script>
@endsection
