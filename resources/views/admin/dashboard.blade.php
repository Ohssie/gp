@extends('primary')

@section('title', 'Admin Dashboard')

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<div class="main-content container-fluid">
  <div class="row">
    <div class="col-xs-12 col-md-6 col-lg-6">
      <div class="widget widget-tile">
        <div id="spark1" class="chart sparkline"></div>
        <div class="data-info">
          <div class="desc">Users</div>
          <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span data-toggle="counter" data-end="{{ $num_users }}" class="number">0</span>
          </div>
        </div>
      </div>
  </div>
  <!--<div class="col-xs-12 col-md-6 col-lg-3">-->
  <!--    <div class="widget widget-tile">-->
  <!--      <div id="spark2" class="chart sparkline"></div>-->
  <!--      <div class="data-info">-->
  <!--        <div class="desc">Monthly growth</div>-->
  <!--        <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end="80" data-suffix="%" class="number">0</span>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--</div>-->
  <!--<div class="col-xs-12 col-md-6 col-lg-3">-->
  <!--    <div class="widget widget-tile">-->
  <!--      <div id="spark3" class="chart sparkline"></div>-->
  <!--      <div class="data-info">-->
  <!--        <div class="desc">Impressions</div>-->
  <!--        <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end="532" class="number">0</span>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--</div>-->
  <!--<div class="col-xs-12 col-md-6 col-lg-3">-->
  <!--    <div class="widget widget-tile">-->
  <!--      <div id="spark4" class="chart sparkline"></div>-->
  <!--      <div class="data-info">-->
  <!--        <div class="desc">Downloads</div>-->
  <!--        <div class="value"><span class="indicator indicator-negative mdi mdi-chevron-down"></span><span data-toggle="counter" data-end="113" class="number">0</span>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  <div class="row">
    <div class="col-md-12">
      <div class="widget widget-fullwidth be-loading">
        <div class="widget-head">
          <div class="tools">
            <div class="dropdown"><span data-toggle="dropdown" class="icon mdi mdi-more-vert visible-xs-inline-block dropdown-toggle"></span>
              <ul role="menu" class="dropdown-menu">
                <li><a href="#">Week</a></li>
                <li><a href="#">Month</a></li>
                <li><a href="#">Year</a></li>
                <li class="divider"></li>
                <li><a href="#">Today</a></li>
              </ul>
            </div><span class="icon mdi mdi-chevron-down"></span><span class="icon toggle-loading mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span>
          </div>
          <div class="button-toolbar hidden-xs">
            <div class="btn-group">
              <button type="button" class="btn btn-default">Week</button>
              <button type="button" class="btn btn-default active">Month</button>
              <button type="button" class="btn btn-default">Year</button>
            </div>
            <div class="btn-group">
              <button type="button" class="btn btn-default">Today</button>
            </div>
          </div><span class="title">Recent Movement</span>
        </div>
        <div class="widget-chart-container">
          <div class="widget-chart-info"> 
            <ul class="chart-legend-horizontal" id="sub-stats">
            </ul>
          </div>
          <div id="main-chart" style="height: 260px;"></div>
        </div>
        <div class="be-spinner">
          <svg width="40px" height="40px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33" r="30" class="circle"></circle>
          </svg>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default panel-table">
        <div class="panel-heading"> 
          <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
          <div class="title">Pending approvals</div>
        </div>
        <div class="panel-body table-responsive">
          <table class="table table-striped table-borderless">
            <thead>
              <tr>
                <th style="width:25%;">Username</th>
                <th class="number">Amount Paid</th>
                <th style="width:25%;">Date</th>
                <th style="width:20%;" class="actions">Action</th>
              </tr>
            </thead>
            <tbody class="no-border-x">
              @foreach($pending_payment as $pending)
              <tr>
                <td>{{ $pending->payer_username }}</td>
                <td class="number">&#8358;{{ $pending->package()->cost }}</td>
                <td>{{ date('d M, y', strtotime($pending->created_at)) }}</td>
                <td class="actions"><a href="{{ url('payment/claim/' . $pending->sub_key) }}" class="btn btn-warning">Approve</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
          <div class="title">Last approvals</div>
        </div>
        <div class="panel-body table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th style="width:37%;">User</th>
                <th style="width:36%;">Amount approved</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($approved_payments as $approved)              
              <tr>
                <td>{{ $approved->payer_username }}</td>
                <td>&#8358;{{ $approved->package()->cost }}</td>
                <td>{{ date('d M, y', strtotime($approved->updated_at)) }}</td>
              </tr>
              @endforeach              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
{{ HTML::script(url('assets/js/dashboard.js')) }}
@endsection