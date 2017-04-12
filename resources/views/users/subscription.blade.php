@extends('primary')

@section('title', 'Subscribed')

@section('sidebar')
@include('users.sidebar')
@endsection

@section('content')
<div class="main-content container-fluid">
  <div class="row">
    <h1 class="display-heading text-center">Packages</h1>
    <p class="display-description text-center text-sucess">Next action. Please read the instructions below <b>CAREFULLY!</b></p>
    <div class="col-sm-offset-3 col-sm-6">{!! flash_message('subscribe_success') !!}</div>
  </div>
  <div class="row">
    <div class="col-sm-offset-2 col-sm-8">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        
      </div>
    </div>
  </div>
  <div class="row pricing-tables">
    <div class="col-md-offset-1 col-md-10">
      <div class="col-md-4">
        
        <div class="panel panel-default">
          <div class="panel-heading panel-heading-divider">
            <span class="panel-subtitle">Make your payment before the timer runs out</span>
          </div>
          <div class="panel-body">
            <p><div id="clockdiv">
              <div class="days-wrap">
                <span class="days"></span>
                DAY
              </div>
              <div class="hours-wrap">
                <span class="hours"></span>
                HOUR
              </div>
              <div class="minutes-wrap">
                <span class="minutes"></span>
                MINUTE
              </div>
              <div class="seconds-wrap">
                <span class="seconds"></span>
                SECOND
              </div>
            </div></p>
          </div>
        </div>
        
        <div class="panel panel-default">
          <div class="panel-heading panel-heading-contrast panel-heading-divider">Next Step
            <span class="panel-subtitle">Pay the following sums respectively into the following accounts</span>
          </div>
          <div class="panel-body">
              <ul class="user-timeline">
                <li class="latest">PAY THE SUM OF &#8358;{{ $package->cost }}</li>
                <li>
                  <div class="user-timeline-date">{{ $upline->account_name }}</div>
                  <div class="user-timeline-title">{{ $upline->account_number }}</div>
                  <div class="user-timeline-description">{{ $upline->bank_name }}</div>
                  <br/>
                  <div class="user-timeline-title">{{ $upline->phone }}</div>
                  <div class="user-timeline-title">{{ $upline->phone2 }}</div>
                  <div class="user-timeline-description">Contact Details</div>
                </li>
              </ul>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            Upload tellers
          </div>
          <div class="panel-body">
            <p class="xs-mt-30 xs-mb-20 text-center"><a href="{{ url('payment/claim/' . $sub->sub_key) }}" class="btn btn-space btn-primary btn-lg btn-rounded">I have paid</a></p>
          </div>
        </div>
        <div class="panel panel-full-color panel-full-danger">
          <div class="panel-heading panel-heading-contrast">Instructions
            <div class="tools"><span class="icon mdi mdi-close"></span></div><span class="panel-subtitle">Please read these instructions carefully!</span>
          </div>
          <div class="panel-body">
              <p class="text-uppercase">Use your username as payer's name. In your case, use <b>{{ $user->username }}</b></p>
              <p class="text-uppercase">Make payment before two working days after you receive this notice. That is before the timer clock elapses. Payments made <b>aftewards</b> will be regarded as <b>void!</b></p>
              <p class="text-uppercase">Payments are not considered made untill you claim it is made by clicking the button above. After then, your payee will have two more working days to dispute your claimed payment. If neither your payee nor the admin disputes your payment on or before two days, your payment will be considered valid and you will be placed in the chain to receive payment.</p>
              <p class="text-uppercase">Payments not up to the stated amount, that is &#8358;{{ $package->cost }} will be considered invalid</p>
              <p class="text-uppercase">Please upload a proof of payment for every transaction. There will be not refund or whatsoever for payments deemed invalid.</p>
          </div>
        </div>
      </div>
      </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  var endtime = "{{ end_time($sub->created_at, config('settings.delete_records_after')) }}";
  var now = "{{ date('Y-m-d H:i:s', time()) }}";
</script>
{{ HTML::script(url('assets/js/countdown.js')) }}
@endsection
