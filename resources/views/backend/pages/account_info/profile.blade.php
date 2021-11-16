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
           <div class="col-md-12 py-2">
               <label for="">Choose action</label>
               <div class="row">
                   <div class="col-md-3">
                    <form action="{{ route('backend.choose.action') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">

                                <select name="action" id="action" class="form-control">
                                    <option value="1">Edit Profile</option>
                                    <option value="2">Change Password</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-info" type="submit">Apply</button>
                            </div>
                        </div>

                    </form>
                   </div>
               </div>
           </div>
           <div class="col-md-12">
               <div class="card card-primary">
                   <div class="card-header">
                        <h3 class="card-title">Profile</h3>
                   </div>
                   <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Name</td>
                                    <td>{{ $users->user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Username</td>
                                    <td>{{ $users->username }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Role</td>
                                    <td>{{ $users->user->roles->first()->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Email</td>
                                    <td>{{ $users->user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Mobile</td>
                                    <td>@if (isset($users->mobile)){{ $users->mobile }} @else Null @endif</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Date of Birth</td>
                                    <td>@if (isset($users->birth_date)){{ $users->birth_date }} @else Null @endif</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Gender</td>
                                    <td>@if (isset($users->gender))
                                            @if ($users->gender =='male')
                                                {{ 'Male' }}
                                            @elseif ($users->gender =='female')
                                                {{ 'Female' }}
                                            @elseif ($users->gender =='other')
                                                {{ 'Other' }}
                                            @endif

                                        @else Null @endif</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Address</td>
                                    <td>
                                        <p class=" m-0">Region: <span class="font-weight-bold">@if (isset($users->region->name)) {{ $users->region->name }} @endif</span></p>
                                        <p class=" m-0">District: <span class="font-weight-bold">@if (isset($users->district->name)) {{ $users->district->name }} @endif</span></p>
                                        <p class=" m-0">Upazila: <span class="font-weight-bold">@if (isset($users->upazila->name)) {{ $users->upazila->name }} @endif</span></p>
                                        <p class=" m-0">Street Address1: <span class="font-weight-bold">{{ $users->street_address1 }}</span></p>
                                        <p class=" m-0">Street Address2: <span class="font-weight-bold">{{ $users->street_address2 }}</span></p>
                                        <p class=" m-0">Zip Code: <span class="font-weight-bold">{{ $users->zip_code }}</span></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
