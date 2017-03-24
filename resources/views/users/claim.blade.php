@extends('primary')

@section('title', 'Payment Dispute Area')

@section('content')
<div class="main-content container-fluid">
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
          <?php
          $flashes = flash_message();
          ?>
          @if (strlen($flashes) > 2)
            {!! $flashes !!}
          @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p class="xs-mt-10 xs-mb-10 text-center">
              @if($user->username == $upline->username)
                @if($payment->status != "disputed")
                <a class="btn btn-rounded btn-space btn-danger" href="/payment/dispute/{{$sub_key}}">Dispute Payment</a>
                @endif
                <a class="btn btn-rounded btn-space btn-success" href="/payment/complete/{{$sub_key}}">Mark as Complete</a>
               @endif
              </p>
            <form id="my-dropzone" action="payment/upload/{{ $sub_key }}" class="dropzone">
            <div class="dz-message">
              <div class="icon"><span class="mdi mdi-cloud-upload"></span></div>
              <h2>Drag and Drop files here</h2>
            </div>
          </form>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading panel-heading-divider">
              <span class="panel-subtitle">
              @if($payment->payee_username == $user->username)
              Confirm or dispute payment before timer elapses
              @else
              Wait for the receiver to confirm this payment
              @endif
              </span>
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
            <!--<div class="panel panel-default panel-contrast">-->
            <!--  <div class="panel-heading">-->
            <!--    Chat-->
            <!--  </div>-->
            <!--  <div class="panel-body panel-body-contrast">-->
            <!--    <ul class="chat-message">-->
                  
                  <!--<?php foreach($messages as $msg): ?>-->
                  
                  <!--<li class="<?php if ($msg->sender_username == $this->user->username()) { ?>self<?php } elseif ($msg->sender_username == $this->user->admin_username()) { ?>admin<?php } else {?>friend<?php } ?>"><span><?php echo $msg->message; ?></span></li>-->
                  
                  <!--<?php endforeach; ?>-->
                  
            <!--    </ul>-->
            <!--  </div>-->
            <!--  <div class="panel-footer">-->
            <!--    <form class="" action="{{ url('payment/send_message') }}" method="post">-->
            <!--      <div class="input-group xs-mb-15">-->
            <!--        <input type="hidden" name="reference" value="{{ $sub_key }}"/>-->
            <!--        <input type="hidden" name="receiver" value="{{ $payment->payee_username }}"/>-->
            <!--        <input type="text" class="form-control" name="chat"><span class="input-group-btn">-->
            <!--          <button type="submit" class="btn btn-primary">send</button></span>-->
            <!--      </div>-->
            <!--    </form>-->
            <!--  </div>-->
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.chat-message {
  list-style: none;
}
.chat-message li {
  width: 100%;
  margin-bottom: 14px;
}

.chat-message li.self {
  text-align: left;
  
}
.chat-message li.friend {
  text-align: right;
  
}
.chat-message li.admin {
  text-align: center;
}
.chat-message li span {
  padding: 6px 9px;
  border-radius: 4px;
  margin: 4px;
  text-align: left;
  
}
.chat-message li.self span {
  border: 1px solid #dadada;
  
}
.chat-message li.friend span {
  background: #4285f4;
  color: #fff;
  
}
.chat-message li.admin span {
  background: #ea4335;
  color: #fff;
  
}
</style>
@endsection

@section('sidebar')
  @include('users.sidebar')
@endsection

@section('scripts')
<script type="text/javascript">
  var endtime = "{{ end_time($sub->created_at, config('settings.delete_records_after')) }}";
  var now = "{{ date('Y-m-d H:i:s', time()) }}";
  
  var files = false;
  <?php //if($payment_docs && !empty($payment_docs)): ?>
  files = '';<?php //echo json_encode($payment_docs); ?>
  <?php //endif; ?>
</script>
{{ HTML::script(url('assets/js/countdown.js')) }}
@endsection