@extends('primary')

@section('title', 'Manage Users')

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<div class="main-content container-fluid">
  <div class="row">
    <!--<div class="col-sm-4">-->
    <!--    <div class="widget widget-fullwidth  panel-border-color panel-border-color-primary">-->
    <!--      <div class="widget-head">-->
    <!--        <div class="tools"><span class="icon mdi mdi-chevron-down"></span><span class="icon mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span></div>-->
    <!--        <span class="title">Signup Chart</span><span class="description">This chart shows the signups per month</span>-->
    <!--      </div>-->
    <!--      <div class="widget-chart-container">-->
    <!--        <div id="line-chart3" style="height: 320px; padding: 0px; position: relative;"></div>-->
    <!--        <div class="chart-table xs-pt-15">-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="col-sm-8">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
        <div class="panel-heading panel-heading-divider">Create Account</div>
        <div class="panel-body">
          {!! error_message($errors) !!}
          {!! flash_message() !!}
          {{ Form::open(['url' => url('admin/create-user'), 'class' => 'form', 'method' => 'post']) }}
          <div class="col-sm-6">
            <div class="form-group xs-pt-10">
              <label>Full name</label>
              {{ Form::text('name', old('name'), ['placeholder' => 'Audu John', 'class' => 'form-control input-xs', 'required' => 'required']) }}
            </div>
            <div class="form-group">
              <label>Phone</label>
              {{ Form::text('phone', old('phone'), ['placeholder' => '08023456789', 'class' => 'form-control input-xs', 'required' => 'required']) }}
            </div>
            <div class="form-group">
              <label>Bank name</label>
              {{ Form::text('bank_name', old('bank_name'), ['placeholder' => 'Money Bank', 'class' => 'form-control input-xs', 'required' => 'required']) }}
            </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
              <label>Account Name</label>
              {{ Form::text('account_name', old('account_name'), ['placeholder' => 'Audu Chidera', 'class' => 'form-control input-xs', 'required' => 'required']) }}
            </div>
            <div class="form-group">
              <label>Account Number</label>
              {{ Form::text('account_number', old('account_number'), ['placeholder' => '0123456789', 'class' => 'form-control input-xs', 'required' => 'required']) }}
            </div>
            <div class="form-group">
              <label>Account type</label>
               <select class="select2 input-xs" name="role" style="height:30px !important;padding:6px 9px !important;">
                    <option value="user" selected>Regular user</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            </div>
            <div class="row xs-pt-15">
              <div class="col-xs-6">
              </div>
              <div class="col-xs-6">
                <p class="text-right">
                  <button type="submit" class="btn btn-space btn-primary">Create</button>
                  <button type="reset" class="btn btn-space btn-default">Cancel</button>
                </p>
              </div>
            </div>
          {{ Form::close() }}
        </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">People
          <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
        </div>
        <div class="panel-body">
          <table id="table3" class="table table-striped table-hover table-fw-widget">
            <thead>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Phone</th>
                <!--<th>Package(s)</th>-->
                <th>Joined</th>
                <!--<th>Action</th>-->
              </tr>
            </thead>
            <tbody>
              
              @foreach($people as $person)
              
              <tr class="">
                <td>{{ $person->name }}</td>
                <td>{{ $person->username }}</td>
                <td>{{ $person->phone }}</td>
                <td>{{ $person->created_at }}</td>
                <!--<td class="center">
                  <div class="btn-group btn-hspace">
                    <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="icon-dropdown mdi mdi-chevron-down"></span></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="people/edit/{{ $user->username }}">Edit user</a></li>
                      <li><a href="people/profile/{{ $person->username }}">View user</a></li>
                      <li class="divider"></li>
                      <li><a href="people/delete/{{ $person->username }}" class="delete">Delete user</a></li>
                    </ul>
                  </div>
                </td>-->
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
<script type="text/javascript" src="/assets/js/manage.js"></script>
@endsection