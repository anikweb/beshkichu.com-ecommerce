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
                      <li class="breadcrumb-item active">Contact Information</li>
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
                        <h3 class="card-title">Contact Information</h3>
                   </div>
                   <div class="card-body">
                    <form action="{{ route('contact.information.update') }}" method="POST">
                        @csrf
                        <input name="contact_id" type="hidden" value="{{ $contact_information->id }}">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th width='1'>1</th>
                                        <th>Mobile</th>
                                        <th>
                                            <button type="button" class="add-field btn btn-primary ">Add New</button>
                                            <div class="multi-field-wrapper ">
                                                <div class="multi-fields">
                                                    <div class="row multi-field input-group ">
                                                        <div class="col-md-12">
                                                        @foreach($contact_mobiles as $contact_mobile)
                                                        <div class="multi-field-r-item input-group my-2">
                                                            <input value="{{ $contact_mobile->id }}" type="hidden" name="mobileId[]" class="form-control">
                                                            <input value="{{ $contact_mobile->number }}" type="text" name="mobile[]" class="form-control @error('mobile[]') is-invalid @enderror" placeholder="Enter Mobile">
                                                            <div class="input-group-append remove-field d-inline-block">
                                                                <!-- <i class=" fas fa-minus-circle"></i> -->
                                                                <span style="height: 38px;cursor:pointer" class="input-group-text  text-danger"><i class=" fas fa-minus-circle"></i></span>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('mobile[]')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width='1'>1</th>
                                        <th>Phone</th>
                                        <th>
                                            <input type="text" name="phone" value="{{ $contact_information->phone }}" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone">
                                            @error('phone')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width='1'>1</th>
                                        <th>Email</th>
                                        <th>
                                            <input type="text" value="{{ $contact_information->email }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
                                            @error('email')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width='1'>2</th>
                                        <th>Region</th>
                                        <th>
                                            <select class="form-control" name="region_id" id="region_id" @error('region_id') style="border:1px solid red" @enderror>
                                                <option value="">Select</option>
                                                @foreach ($divisions as $division)
                                                    <option @if($contact_information->division_id == $division->id) selected @endif value="{{ $division->id }}">{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('region_id')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width='1'>3</th>
                                        <th>District</th>
                                        <th>
                                            <select  class="form-control" name="district_id" id="district_id" @error('district_id') style="border:1px solid red" @enderror>
                                                <option value="{{ $contact_information->division_id }}">{{ $contact_information->division->name }}</option>
                                            </select>
                                            @error('district_id')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width='1'>4</th>
                                        <th>Upazila</th>
                                        <th>
                                            <select class="form-control" name="upazila_id" id="upazila_id" @error('upazila_id') style="border:1px solid red" @enderror>
                                                <option value="{{ $contact_information->upazila_id }}">{{ $contact_information->upazila->name }}</option>
                                            </select>
                                            @error('upazila_id')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width='1'>5</th>
                                        <th>Street Address</th>
                                        <th>
                                            <input type="text" name="street_address" value="{{ $contact_information->street_address }}" id="street_address" class="form-control @error('street_address') is-invalid @enderror" placeholder="Enter Street Address">
                                            @error('street_address')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width='1'>5</th>
                                        <th>ZIP Code</th>
                                        <th>
                                            <input type="text" name="zip_code" value="{{ $contact_information->zip_code }}" id="zip_code" class="form-control @error('zip_code') is-invalid @enderror" placeholder="Enter zip code">
                                            @error('zip_code')
                                                <div class="text-danger">
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save Changes</button>
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
        $(document).ready(function(){
            $("#region_id").change(function(){
                var region_id = $("#region_id").val();
                // alert(region_id);
                $.ajax({
                    type:"GET",
                    url:"{{url('/get/district')}}/"+region_id,
                    success:function(res){
                        if(res){
                           console.log(res);
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

        $('.multi-field-wrapper').each(function(){
            var $wrapper = $('.multi-fields', this);
            $('.add-field').click(function(){
                $('.multi-field-r-item:first-child').clone(true).appendTo($wrapper).find('input').val('');
            });
            $('.remove-field').click(function(){
                if($('.multi-field-r-item', $wrapper).length >1){
                    $(this).parent('.multi-field-r-item').remove();
                }
            });
        });
    </script>
@endsection
