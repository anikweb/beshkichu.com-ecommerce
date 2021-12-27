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
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
                {{-- number_format($monthReport->sum('total_price'), 2, ',', '.'); --}}
                <h3>{{number_format($monthReport->sum('total_price')+$monthReport->sum('shipping_fee'), 2, '.', ',')}}৳</h3>

                <p>Total Seles Amount ( {{ date('F-Y') }} )</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $uniqueVisitors->count() }}</h3>
                <p>Total Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ count($new_order) }}</h3>
                    <p>Unpaid Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $pickup_order->count() }}</h3>
                    <p>Order:Pickup In Progress</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $customerRole->count() }}</h3>

                    <p>Total Customer</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      {{-- {{ $users->getPermissionNames() }} --}}
      <section class="col-lg-7 connectedSortable ui-sortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Sales
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="#monthly-chart" data-toggle="tab">Monthy</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#yearly-chart" data-toggle="tab">Yearly</a>
                </li>
              </ul>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="monthly-chart" >
                    <a class="btn-sm btn-primary" href="{{ route('monthly.seles.export') }}">  Export All Transaction to Exel</a>
                <div>
                    <canvas id="monthlyReport"></canvas>
                </div>
            </div>
            <div class="chart tab-pane" id="yearly-chart">
                <div>
                    <canvas id="yearlyReport"></canvas>
                </div>
            </div>
            </div>
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable ui-sortable">
        <!-- solid sales graph -->
        <div class="card bg-gradient-info">
          <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
              <i class="fas fa-th mr-1"></i>
              Sales Graph
            </h3>

            <div class="card-tools">
              <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas class="chart chartjs-render-monitor" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 627px;" width="627" height="250"></canvas>
          </div>
          <!-- /.card-body -->
          <div class="card-footer bg-transparent">
            <div class="row">
              <div class="col-4 text-center">
                <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

                <div class="text-white">Mail-Orders</div>
              </div>
              <!-- ./col -->
              <div class="col-4 text-center">
                <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

                <div class="text-white">Online</div>
              </div>
              <!-- ./col -->
              <div class="col-4 text-center">
                <div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

                <div class="text-white">In-Store</div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->
  </div>
@endsection
@section('footer_js')
{{--  @php

@endphp  --}}
  <script>
    // Chart
    // Yearly Report Chart Start

    const ctx_1 = document.getElementById('yearlyReport').getContext('2d');
    const yearlyReport = new Chart(ctx_1, {
        type: 'line',
        data: {
            labels: [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'Jully',
                'August',
                'September',
                'October',
                'November',
                'December',
            ],
            datasets: [{
                label: 'Yearly Sales Report',
                data: [
                {{ $janMonthTotalReport->count() }},
                {{ $febMonthTotalReport->count() }},
                {{ $marMonthTotalReport->count() }},
                {{ $aprMonthTotalReport->count() }},
                {{ $mayMonthTotalReport->count() }},
                {{ $junMonthTotalReport->count() }},
                {{ $julMonthTotalReport->count() }},
                {{ $augMonthTotalReport->count() }},
                {{ $sepMonthTotalReport->count() }},
                {{ $octMonthTotalReport->count() }},
                {{ $novMonthTotalReport->count() }},
                {{ $decMonthTotalReport->count() }},
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }]
        }
    });
    // Yearly Report Chart End
    // Monthly Report Chart Start
    const ctx_2 = document.getElementById('monthlyReport').getContext('2d');
    var current_date = {{ date('m') }};
    if(current_date == 1||current_date == 3||current_date == 5||current_date == 7||current_date == 8||current_date == 10||current_date == 12){
      const monthlyReport = new Chart(ctx_2, {
          type: 'bar',
          data: {
              labels: [
                  '01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'
              ],
              datasets: [{
                  label: '{{ date("F") }} Report',
                  data: [
                  {{ $day1Report->count() }},
                  {{ $day2Report->count() }},
                  {{ $day3Report->count() }},
                  {{ $day4Report->count() }},
                  {{ $day5Report->count() }},
                  {{ $day6Report->count() }},
                  {{ $day7Report->count() }},
                  {{ $day8Report->count() }},
                  {{ $day9Report->count() }},
                  {{ $day10Report->count() }},
                  {{ $day11Report->count() }},
                  {{ $day12Report->count() }},
                  {{ $day13Report->count() }},
                  {{ $day14Report->count() }},
                  {{ $day15Report->count() }},
                  {{ $day16Report->count() }},
                  {{ $day17Report->count() }},
                  {{ $day18Report->count() }},
                  {{ $day19Report->count() }},
                  {{ $day20Report->count() }},
                  {{ $day21Report->count() }},
                  {{ $day22Report->count() }},
                  {{ $day23Report->count() }},
                  {{ $day24Report->count() }},
                  {{ $day25Report->count() }},
                  {{ $day26Report->count() }},
                  {{ $day27Report->count() }},
                  {{ $day28Report->count() }},
                  {{ $day29Report->count() }},
                  {{ $day30Report->count() }},
                  {{ $day31Report->count() }},
                  ],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                  ],
                  borderWidth: 1
              }]
          }
      });
    }
    if(current_date == 2||current_date == 4||current_date == 6||current_date == 9||current_date == 11){
      const monthlyReport = new Chart(ctx_2, {
          type: 'bar',
          data: {
              labels: [
                  '01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30',
              ],
              datasets: [{
                  label: '{{ date("F") }} Report',
                  data: [
                  {{ $day1Report->count() }},
                  {{ $day2Report->count() }},
                  {{ $day3Report->count() }},
                  {{ $day4Report->count() }},
                  {{ $day5Report->count() }},
                  {{ $day6Report->count() }},
                  {{ $day7Report->count() }},
                  {{ $day8Report->count() }},
                  {{ $day9Report->count() }},
                  {{ $day10Report->count() }},
                  {{ $day11Report->count() }},
                  {{ $day12Report->count() }},
                  {{ $day13Report->count() }},
                  {{ $day14Report->count() }},
                  {{ $day15Report->count() }},
                  {{ $day16Report->count() }},
                  {{ $day17Report->count() }},
                  {{ $day18Report->count() }},
                  {{ $day19Report->count() }},
                  {{ $day20Report->count() }},
                  {{ $day21Report->count() }},
                  {{ $day22Report->count() }},
                  {{ $day23Report->count() }},
                  {{ $day24Report->count() }},
                  {{ $day25Report->count() }},
                  {{ $day26Report->count() }},
                  {{ $day27Report->count() }},
                  {{ $day28Report->count() }},
                  {{ $day29Report->count() }},
                  {{ $day30Report->count() }},
                  ],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                  ],
                  borderWidth: 1
              }]
          }
      });
    }

    // Monthly Report Chart End

    // Chart
  </script>
@endsection

