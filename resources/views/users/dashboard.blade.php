@extends('primary')

@section('title', 'User Dashboard')

@section('sidebar')
@include('users.sidebar');
@endsection

@section('content')
<div class="main-content container-fluid">
  <div class="row">
    <div class="col-xs-12 col-md-6 col-lg-6">
        <div class="widget widget-tile">
          <div id="spark1" class="chart sparkline"></div>
          <div class="data-info">
            <div class="desc">Plans subsrcibed to</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span data-toggle="counter" data-end="<?php echo $sub_plans_num; ?>" class="number"><?php echo $sub_plans_num; ?></span>
            </div>
          </div>
        </div>
    </div>
    <!--<div class="col-xs-12 col-md-6 col-lg-4">
      <div class="widget widget-tile">
        <div id="spark2" class="chart sparkline"></div>
        <div class="data-info">
          <div class="desc">Pending pay</div>
          <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end="<?php //echo $pending_payment_amt;?>" data-prefix="&#8358;" class="number"><?php //echo $pending_payment_amt;?></span>
          </div>
        </div>
      </div>
    </div>-->
    <div class="col-xs-12 col-md-6 col-lg-6">
        <div class="widget widget-tile">
          <div id="spark3" class="chart sparkline"></div>
          <div class="data-info">
            <div class="desc">Downlinks</div>
            <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end="{{ $downlines_paired }}" class="number">{{ $downlines_paired }}</span>
            </div>
          </div>
        </div>
    </div>
    <!--<div class="col-xs-12 col-md-6 col-lg-3">-->
    <!--    <div class="widget widget-tile">-->
    <!--      <div id="clockdiv" class="chart sparkline">-->
    <!--        <div class="days-wrap">-->
    <!--          <span class="days">00</span>-->
    <!--          DAYS-->
    <!--        </div>-->
    <!--        <div class="hours-wrap">-->
    <!--          <span class="hours">00</span>-->
    <!--          HOURS-->
    <!--        </div>-->
    <!--        <div class="minutes-wrap">-->
    <!--          <span class="minutes">00</span>-->
    <!--          MINUTES-->
    <!--        </div>-->
    <!--        <div class="seconds-wrap">-->
    <!--          <span class="seconds">00</span>-->
    <!--          SECONDS-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--</div>-->
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default panel-table">
        <div class="panel-heading"> 
          <!--<div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>-->
          <div class="title">Receiving</div>
        </div>
        <div class="panel-body table-responsive">
          <table class="table table-striped table-borderless">
            <thead>
              <tr>
                <th>User</th>
                <th>Amount</th>
                <th>Date</th>
                <th>State</th>
                <th class="actions">Action</th>
              </tr>
            </thead>
            <tbody class="no-border-x">
              <tr>
                @if(count($down_payments))
                @foreach($down_payments as $link) &nbsp; &nbsp;
                <?php $time = new DateTime($link->created_at); ?>
                <td>{{ $link->payer_username }}</td>
                <td>&#8358;{{ $link->amount }}</td>
                <td>{{ date('Y-m-d', $time->getTimestamp()) }}</td>
                @if($link->status == "completed")
                <td class="text-success">Completed
                @elseif($link->status == "disputed")
                <td class="text-danger">Disputed
                @elseif($link->status == "waiting")
                   Attention required<td class="text-danger">
                  @endif
                </td>
                <td class="actions">
                  @if($link->status == 'waiting')
                  <a href="'payment/claim/' . $link->sub_key" class="btn btn-primary">Mark as complete</a>
                  @endif
                </td>
              @endforeach
              @else
                <!-- <td colspan="5" align="center"><div class="alert alert-warning"><p>You have not selected any package yet</p> <a href="packages/choose" class="btn btn-default">Pick one</a></div></td> -->
                <!-- Bug alert. This notification should appear only if the user hasnt selected a package. -->
                <!--<td colspan="5" align="center"><div class="alert alert-warning"><p>Please check back again later. </p><p>if you have not selected any package yet kindly <a href="packages/choose" class="btn btn-default">Pick one</a></p></div></td>-->
                
              @endif
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Bug Alert. After a confirmation, the request should move to this giving section. As it stands after a confirmation it remains empty -->
    <div class="col-md-6">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <!--<div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>-->
          <div class="title">Giving</div>
        </div>
        <div class="panel-body table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>User</th>
                <th>Bank</th>
                <th>Account Name</th>
                <th>Account Number</th>
                <th class="actions">Action</th>
              </tr>
            </thead>
            <tbody> 
                @foreach($up_payments as $ptm)
                <?php //$uplink = $this->crud_model->user_details($ptm['uplink_username']); ?>
              <tr>
                <td class="user-avatar"> <img src="assets/img/avatar6.png" alt="Avatar">{{ $ptm->upline_username }}</td>
                <td>{{ $ptm->uplineUser()->bank_name }}</td>
                <td>{{ $ptm->uplineUser()->account_name }}</td>
                <td>{{ $ptm->uplineUser()->account_number }}</td>
                <td class="actions">
                    @if($ptm->status == "incomplete")
                    <a href="packages/subscription/{{$ptm->sub_key}}" class="btn btn-primary">I Paid</a>@else
                    <button class="btn btn-default" disabled="disabled">Cleared</button>
                    @endif
                </td>
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