@extends('plain')

@section('title', 'Signup')

@section('content')
<div class="main-content container-fluid">
  <div class="splash-container">
    <div class="panel panel-default panel-border-color panel-border-color-primary">
      <div class="panel-heading">
        <img src="{{ url('assets/img/grandpayer-admin.png') }}" alt="{{ config('settings.app_name') }}" width="160" height="70" class="logo-img">
        <span class="splash-description">Please enter your user information.</span>
       
        @if (count($errors))
            @foreach($errors as $error) 
            <div role="alert" class="alert alert-contrast alert-danger alert-dismissible">
                <div class="icon"><span class="mdi mdi-close-circle-o"></span></div>
                <div class="message"><button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="mdi mdi-close"></span></button>
                    <strong>Error! </strong>
                    {!! $error !!}
                </div>
            </div>
            @endforeach
        @endif
        
        @if (Session::has('signup_success'))
        <div role="alert" class="alert alert-contrast alert-success alert-dismissible">
            <div class="icon"><span class="mdi mdi-check"></span></div>
            <div class="message">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="mdi mdi-close"></span></button><strong>Good! </strong>
              {!! session('signup_success') !!}
            </div>
          </div>
        @endif
        @if (Session::has('login_error'))
        <div role="alert" class="alert alert-contrast alert-danger alert-dismissible">
            <div class="icon"><span class="mdi mdi-check"></span></div>
            <div class="message">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="mdi mdi-close"></span></button><strong>Oops! </strong>
               {!! session('login_error') !!}
            </div>
          </div>
        @endif
      </div>
      <div class="panel-body">
        {{ Form::open(array('url' => url('/account/signup'), 'class' => 'form', 'method' => 'POST')) }}
          <div class="login-form">
            <div class="form-group">
              {{ Form::text('name', old ('name'), ['placeholder' => 'Full name', 'autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required']) }}
            </div>
            <div class="form-group">
              {{ Form::text('phone', old('phone'), ['placeholder' => 'Phone number', 'autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required']) }}
            </div>
            <div class="form-group">
              {{ Form::text('bank_name', old('bank_name'), ['placeholder' => 'Bank name', 'autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required']) }}
            </div>
            <div class="form-group">
              {{ Form::text('account_name', old('account_name'), ['placeholder' => 'Account name', 'autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required']) }}
            </div>
            <div class="form-group">
              {{ Form::text('account_number', old('account_number'), ['placeholder' => 'Account number', 'autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required']) }}
            </div>
            <div class="form-group row login-submit">
              <div class="col-xs-6">
                <button data-dismiss="modal" type="submit" class="btn btn-default btn-xl">Register</button>
              </div>
            </div>
          </div>
        {{ Form::close() }}
      </div>
    </div>
    <div class="splash-footer"><span>Already have an account? <a href="{{ url('account/login') }}">Login here</a></span></div>
  </div>
</div>
@endsection