@extends('frontend.master')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>Return Policy</h2>
                        <ul>
                            <li><a href="{{ route('frontend') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<!-- about section start -->
<section class="about-page section-big-py-space">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2 class="mb-2 text-dark">Shoes Measurement</h2>
            </div>
            <div class="col-md-12 mx-auto">
                <div id="tabs">
                    <ul >
                        <li><a  href="#tabs-1">Inches</a></li>
                        <li><a href="#tabs-2">cm</a></li>
                    </ul>
                    <div id="tabs-1">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-head">
                                    <tr style="background: #002340;color:white;" class="table-row">
                                        <th >Inches</th>
                                        <th>US Men's</th>
                                        <th>US Woman's</th>
                                        <th>UK</th>
                                        <th>EU</th>
                                        <th>JP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($size_guide_inches as $size_guide_inche)
                                        <tr>
                                            <td style="background: #002340;color:white">{{$size_guide_inche->inches.'"'}}</td>
                                            <td>@if ($size_guide_inche->us_mens){{$size_guide_inche->us_mens}} @else -- @endif</td>
                                            <td>@if ($size_guide_inche->us_womans){{$size_guide_inche->us_womans}} @else -- @endif</td>
                                            <td>@if ($size_guide_inche->uk){{$size_guide_inche->uk}} @else -- @endif</td>
                                            <td>@if ($size_guide_inche->eu){{$size_guide_inche->eu}} @else -- @endif</td>
                                            <td>@if ($size_guide_inche->jp){{$size_guide_inche->jp}} @else -- @endif</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tabs-2">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="background: #002340;color:white;">
                                        <th>cm</th>
                                        <th>US Men's</th>
                                        <th>US Woman's</th>
                                        <th>UK</th>
                                        <th>EU</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($size_guide_cms as $size_guide_cm)
                                        <tr>
                                            <td style="background: #002340;color:white;">{{ $size_guide_cm->cm }}</td>
                                            <td>@if ($size_guide_cm->us_mens){{ $size_guide_cm->us_mens }} @else -- @endif</td>
                                            <td>@if ($size_guide_cm->us_womans){{ $size_guide_cm->us_womans }} @else -- @endif</td>
                                            <td>@if ($size_guide_cm->uk){{ $size_guide_cm->uk }} @else -- @endif</td>
                                            <td>@if ($size_guide_cm->eu){{ $size_guide_cm->eu }} @else -- @endif</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <h2 class="m-0"><em>HOW TO MEASURE</em></h2>
                <p class="mb-2">Follow these easy steps to get the right size. For the best fit, measure your feet at the end of the day.</p>
                <div class="card bg-light">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <p class="text-dark">1.Step on а piece of paper with your heel slightly touching a wall behind.</p>
                                <p class="text-dark">2.Мark the end of your longest toe on the paper (you might need a friend to help you) and measure from the wall to the marking.</p>
                                <p class="text-dark">3.Do the same for the other foot and compare measurements with our size chart to get the right size.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/Measure-length.jpg') }}" alt="Measure-length" class="card-img-top">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->
@endsection
@section('footer_js')
    <script>
        $( function() {
            $( "#tabs" ).tabs();
        } );
    </script>
@endsection
