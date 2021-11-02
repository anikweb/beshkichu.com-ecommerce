@extends('frontend.master')
@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Personal Information</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('my-account.index') }}">Personal Information</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">Edit</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-big-py-space bg-light">
        <div class="container">
            <div class="checkout-page contact-page">
                <div class="checkout-form">
                    <form action="{{ route('my-account.personal.information.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="personal_information_id" value="{{ $personalInformation->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-title">
                                <div class="theme-form">
                                    <div class="row check-out ">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="name">Full Name</label>
                                            <input type="text" name="name" id="name" @error('name') style="border: 1px solid red" @enderror placeholder="Enter full name" value="{{ $personalInformation->user->name }}">
                                            @error('name')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="username">Username</label>
                                                <input type="text" name="username" id="username" @error('username') style="border: 1px solid red" @enderror value="{{ $personalInformation->username }}">
                                                @error('username')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="mobile">Mobile</label>
                                                <input type="text" name="mobile" id="mobile" @error('mobile') style="border: 1px solid red" @enderror value="@if(isset($personalInformation->mobile)){{$personalInformation->mobile}}@endif">
                                                @error('mobile')
                                                    <div class="text-danger">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label>Birthdate</label>
                                            <input type="date" class="form-control" name="birth_date" value="@if(isset($personalInformation->birth_date)){{$personalInformation->birth_date}}@endif">
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="region_id">Region</label>
                                                    <select name="region_id" class="form-control" id="region_id">
                                                        <option value="">Select</option>
                                                        @foreach ($regions as $region)
                                                            <option @if ($personalInformation->region_id ==$region->id ) selected @endif value="{{ $region->id }}">{{ $region->name }}</option>
                                                        @endforeach
                                                    </select>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="district_id">District</label>
                                            <select name="district_id" class="form-control" id="district_id">
                                                <option  value="{{ $personalInformation->district_id }}">@if(isset($personalInformation->district->name)){{$personalInformation->district->name}}@endif</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="upazila_id">Upazila</label>
                                            <select name="upazila_id" class="form-control" id="upazila_id">
                                                <option value="{{ $personalInformation->upazila_id }}">@if(isset($personalInformation->upazila->name)){{ $personalInformation->upazila->name }}@endif</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="street_address1">Street Address </label>
                                                <input type="text" id="street_address1" name="street_address1" value="{{ $personalInformation->street_address1 }}">
                                                <input type="text" class="mt-2" name="street_address2" id="street_address2" value="{{ $personalInformation->street_address2 }}">
                                        </div>
                                        <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                            <label >Gender: </label>
                                                <span class="custom-radio"><input type="radio" value="male" name="gender" @if ($personalInformation->gender =='male')checked @endif> Male</span>
                                                <span class="custom-radio"><input type="radio" value="female" name="gender" @if ($personalInformation->gender =='female')checked @endif> Female</span>
                                                <span class="custom-radio"><input type="radio" value="other" name="gender" @if ($personalInformation->gender =='other')checked @endif> Other</span>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-normal" type="submit"><i class="fa fa-save"></i> Save Changes</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_js')
    <script>
        $(document).ready(function(){
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
        });
    </script>
@endsection
