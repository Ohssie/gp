@extends('primary')

@section('title', $user->name)

@section('sidebar')
@include($user->isAdmin() ? 'admin.sidebar' : 'users.sidebar')
@endsection

@section('content')
<div class="main-content container-fluid">
  <div class="user-profile">
    <div class="row">
      <div class="col-md-6">
        <div class="user-display">
          <div class="user-display-bg"><img src="/assets2/img/user-profile-display.png" alt="Profile Background"></div>
          <div class="user-display-bottom">
            <div class="user-display-avatar"><img src="/assets2/img/guy.png" alt="Avatar"></div>
            <div class="user-display-info">
              <div class="name">{{ $user->name }}</div>
              <div class="nick"><span class="mdi mdi-account"></span> {{ $user->username }}</div>
            </div>
            <div class="row user-display-details">
              <div class="col-xs-4">
                <div class="title">Downlines Paid</div>
                <div class="counter">26</div>
              </div>
              <div class="col-xs-4">
                <div class="title">Received</div>
                <div class="counter">26</div>
              </div>
              <div class="col-xs-4">
                <div class="title">Packages</div>
                <div class="counter">26</div>
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
                  <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                  <td class="item">Phone<span class="icon s7-phone"></span></td>
                  <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                  <td class="icon"><span class="mdi mdi-case"></span></td>
                  <td class="item">Packages<span class="icon s7-phone"></span></td>
                  <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                  <td class="icon"><span class="mdi mdi-balance"></span></td>
                  <td class="item">Bank details<span class="icon s7-gift"></span></td>
                  <td><a href="{{ url('account/edit-account/' . $user->username) }}" class="btn btn-primary">Edit account</a></td>
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
    </div>
  </div>
</div>
@endsection