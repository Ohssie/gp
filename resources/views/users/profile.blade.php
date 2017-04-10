@extends('primary')

@section('title', $user->name)

@section('sidebar')
@include($user->isAdmin() ? 'admin.sidebar' : 'users.sidebar')
@endsection

@section('content')
<br/><br/><br/>
<div class="main-content container-fluid">
  <div class="user-profile">
    <div class="row">
      <div class="col-md-7">
        <div class="user-display">
          <div class="user-display-bg">
             
            <!--<img src="/assets2/img/user-profile-display.png" alt="Profile Background">-->
          </div>
          <div class="user-display-bottom">
            <div class="user-display-avatar"><img src="/assets2/guy.png" alt="Avatar"></div>
            <div class="user-display-info">
              <div class="name">{{ $user->name }}</div>
              <div class="nick"><span class="mdi mdi-account"></span> {{ $user->username }}</div>
            </div>
            <div class="row user-display-details">
              <div class="col-xs-4">
                <!--<div class="title">Downlines Paid</div>
                <div class="counter">26</div>-->
              </div>
              <div class="col-xs-4">
                <!--<div class="title">Received</div>
                <div class="counter">26</div>-->
              </div>
              <div class="col-xs-4">
                <!--<div class="title">Packages</div>
                <div class="counter">26</div>-->
              </div>
            </div>
          </div>
        </div>
        <div class="user-info-list panel panel-default">
          <div class="panel-heading panel-heading-divider">About Me</div>
          <div class="panel-body">
            <table class="no-border no-strip skills">
              <tbody class="no-border-x no-border-y">
                <tr>
                  <td class="icon"><span class="mdi mdi-email"></span></td>
                  <td class="item">Email Address<span class="icon s7-phone"></span></td>
                  <td>{{ $user->email }}</td>
                </tr>
                <tr>
                  <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                  <td class="item">Phone<span class="icon s7-phone"></span></td>
                  <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                  <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                  <td class="item">Alt. Phone<span class="icon s7-phone"></span></td>
                  <td>{{ $user->phone2 }}</td>
                </tr>
                <tr>
                  <td class="icon"><span class="mdi mdi-link"></span></td>
                  <td class="item">Referral Link<span class="icon s7-phone"></span></td>
                  <td>{{ url('') . '/referral/' . $user->username }}</td>
                </tr>
                <!--<tr>-->
                <!--  <td class="icon"><span class="mdi mdi-case"></span></td>-->
                <!--  <td class="item">Packages<span class="icon s7-phone"></span></td>-->
                <!--  <td>{{ $user->phone }}</td>-->
                <!--</tr>-->
                <tr>
                  <td class="icon"><span class="mdi mdi-balance"></span></td>
                  <td class="item">Bank details<span class="icon s7-gift"></span></td>
                  <!--<td><a href="{{ url('account/edit-account/' . $user->username) }}" class="btn btn-primary">Edit account</a></td>-->
                </tr>
              </tbody>
            </table>
            <ul class="user-timeline">
             <li class="latest">
                <div class="user-timeline-date">{{ $user->account_name }}</div>
                <div class="user-timeline-title">{{ $user->account_number }}</div>
                <div class="user-timeline-description">{{ $user->bank_name }}</div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="col-xs-12 col-md-6 col-lg-8">
          <div class="widget widget-tile">
            <!--<div id="spark1" class="chart sparkline"><canvas width="85" height="35" style="display: inline-block; width: 85px; height: 35px; vertical-align: top;"></canvas></div>-->
            <div class="data-info">
              <div class="desc">Referral Bonus</div>
              <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span data-toggle="counter" data-end="{{ $total }}" class="number">{{ $total }} Naira</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-5">
        <div class="panel panel-default panel-border-color panel-border-color-success">
          <div class="panel-heading panel-heading-divider">Account Settings<span class="panel-subtitle">Please, always remember your password.</span>
          	<div class="col-sm-offset-2 col-sm-8">
          		{!! flash_message() !!}
          	</div>
          </div>
          <div class="panel-body">
            {{ Form::open(['url' => url('/passwordChange'), 'method' => 'post', 'style' => 'border-radius: 0px;', 'class' => 'form-horizontal group-border-dashed']) }}
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-3 control-label">Old password</label>
                <div class="col-sm-6">
                  {{ Form::password('old_password', ['placeholder' => 'Old Password', 'class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">New Password</label>
                <div class="col-sm-6">
                  {{ Form::password('new_password', ['placeholder' => 'New Password', 'class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                  <button type="submit" class="btn btn-space btn-success">Change Password</button>
                </div>
              </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection