@extends('plain')

@section('title', 'User Login')

@section('content')
  <div class="main-content container-fluid">
    <div class="splash-container">
      <div class="panel panel-default panel-border-color panel-border-color-primary">
        <div class="panel-heading">
          <a href="/"><img src="/assets/citisumo.jpg" alt="CitiSumo" width="200" height="160" class="logo-img"></a>
          <span class="splash-description">Please enter your user information.</span>
           
            @if ($errors)
              @foreach($errors as $error) 
              <div role="alert" class="alert alert-contrast alert-danger alert-dismissible">
                  <div class="icon"><span class="mdi mdi-close-circle-o"></span></div>
                  <div class="message"><button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="mdi mdi-close"></span></button>
                      <strong>Error! </strong>
                      {{ $error }}
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
          
          @if (Session::has('password_change'))
          <div role="alert" class="alert alert-contrast alert-success alert-dismissible">
              <div class="icon"><span class="mdi mdi-check"></span></div>
              <div class="message">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="mdi mdi-close"></span></button><strong>Good! </strong>
                {!! session('password_change') !!}
              </div>
            </div>
          @endif
          
          @if (Session::has('login_error'))
          <div role="alert" class="alert alert-contrast alert-danger alert-dismissible">
              <div class="icon"><span class="mdi mdi-check"></span></div>
              <div class="message">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="mdi mdi-close"></span></button><strong>Oops! </strong>
                 {{ session('login_error') }}
              </div>
            </div>
          @endif
        </div>
        
        <div class="panel-body">
          {{ Form::open(array('url' => url('/account/login'), 'class' => 'form', 'method' => 'post')) }}
          {{ csrf_field() }}
            <div class="form-group">
              {{ Form::text("login", old ('login'), ['placeholder' => 'Username or phone number', 'autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required']) }}
            </div>
            <div class="form-group">
              {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required']) }}
            </div>
            <div class="form-group row login-tools">
              <div class="col-xs-6 login-remember">
                <div class="be-checkbox">
                  <input type="checkbox" id="remember">
                  <label for="remember">Remember Me</label>
                </div>
              </div>
              <div class="col-xs-6 login-forgot-password"><a href="/account/forgot-password">Forgot Password?</a></div>
            </div>
            <div class="form-group login-submit">
              <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Sign me in</button>
            </div>
          {{ Form::close() }}
        </div>
      </div>
      <div class="splash-footer"><span>Don't have an account? <a href="/account/signup">Create one now</a></span></div>
    </div>
  </div>
@endsection