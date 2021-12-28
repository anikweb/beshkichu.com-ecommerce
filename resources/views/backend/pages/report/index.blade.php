@extends('backend.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Search Reports</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active">Search Reports</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!--container-fluid -->
    </div>
    <div class="content">
       <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Search Report</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('report.search') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="year">Select Year <span>*</span></label>
                                        <select name="year" id="year" name="year" class="form-control">
                                            @for ($i = 2020; $i <= date('Y'); $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @php
                                            $months  = ['January','February', 'March','April','May','June','July','August','September','October','November','December'];
                                        @endphp
                                        <label for="month">Select Month <span>*</span></label>
                                        <select name="month" id="month" name="month" class="form-control">
                                            @foreach ($months as $month)
                                                <option value="{{ $loop->index+1 }}">{{ $month }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if (isset($orders))
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">Report  @if(isset($orders->first()->created_at)) of {{ $orders->first()->created_at->format('F-Y') }} @endif</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h4 class="card-title">Total Amount of Seles</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-text m-0 p-0">{{ number_format($orders->sum('total_price'),2,'.',',') }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h4 class="card-title">Total Amount of Shipping Charge</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-text m-0 p-0">{{ number_format($orders->sum('shipping_charge'),2,'.',',') }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h4 class="card-title">Total Amount of Discount</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-text m-0 p-0">{{ number_format($orders->sum('discount'),2,'.',',') }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="result_table" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Invoice</th>
                                            <th>Product</th>
                                            <th>Size</th>
                                            <th>Customer</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Discount</th>
                                            <th>Shipping Charge</th>
                                            <th>Sub Total</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->index +1 }}</td>
                                                <td>{{ $order->invoice_no }}</td>
                                                <td>{{ $order->order_details->first()->product->name }}</td>
                                                <td>{{ $order->order_details->first()->size_id }}</td>
                                                <td>{{ $order->billing_details->name }}</td>
                                                <td>{{ $order->billing_details->email }}</td>
                                                <td>{{ $order->billing_details->phone }}</td>
                                                <td>{{ $order->billing_details->street_adress1.','.$order->billing_details->upazila->name.','.$order->billing_details->district->name }}</td>
                                                <td>{{ number_format($order->discount,2,'.',',') }}</td>
                                                <td>{{ number_format($order->shipping_charge,2,'.',',') }}</td>
                                                <td>{{ number_format($order->sub_total,2,'.',',') }}</td>
                                                <td>{{ number_format($order->total_price,2,'.',',') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="12"><i class="fa fa-exclamation-circle"></i> No data to show!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
       </div>
    </div>
@endsection
@section('internal_style')
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background: #17a2b8 !important;
        color: #fff !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #fff !important;
    }
    .select2-container--default .select2-selection--single {
        height: 38px !important;
    }
</style>
@endsection
@section('footer_js')
    <script>
        $('#year').select2();
        $('#month').select2();
        $(document).ready( function () {
            $('#result_table').DataTable();
        } );
    </script>
@endsection
