@extends('frontend.master')
@section('content')
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Orders</h2>
                            <ul>
                                <li><a href="{{ route('frontend') }}">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('my-account.index') }}">Account Info</a></li>
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
            <div class="row">
                <div class="col-lg-3">
                    <div class="account-sidebar"><a class="popup-btn">my account</a></div>
                    <div class="dashboard-left">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                        <div class="block-content ">
                            <ul>
                                <li><a href="{{ route('my-account.index') }}">Account Info</a></li>
                                <li><a href="{{route('my-account.orders')}}">My Orders</a></li>
                                <li class="active"><a href="{{route('my-account.delivered.order')}}">Delevered Order</a></li>
                                <li><a href="#">Newsletter</a></li>
                                <li><a href="#">Change Password</a></li>
                                <li class="last"><a href="javascript:void(0)"  onclick="event.preventDefault(); document.getElementById('logout_form').submit()">Log Out</a></li>
                                <form id="logout_form" action="{{ route('logout') }}" method="POST">
                                @csrf

                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="dashboard-right">
                       <div class="card card-primary">
                           <div class="card-header bg-info text-white">
                            <h3 class="text-center">My Delivered Orders</h3>
                           </div>
                           <div class="card-body">
                            <div class="table-responsive p-2">
                                <table  class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($billings as $billing)
                                            @if ($billing->order_summary->first()->current_status == 4 )
                                                <tr>
                                                    <td>{{ $billing->order_summary->first()->invoice_no }}</td>
                                                    <td>{{ $billing->created_at->format('D-M-y, h:i A') }}</td>
                                                    <td>
                                                        @foreach ($billing->order_summary as $order_summary)
                                                        {{ '৳'.($order_summary->total_price+$order_summary->shipping_fee) }}
                                                        @endforeach
                                                    </td>
                                                    <td><a href="{{ route('my-account.invoice.download',$billing->id) }}" class="view"><i class="fa fa-download"></i> Download Invoice</a></td>
                                                </tr>
                                            @endif
                                        @empty
                                        <tr>
                                            <td colspan="3"> <i class="fa fa-exclamation-circle"></i> Empty</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="p-3">
                                    {{ $billings->links() }}
                                </div>
                            </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
