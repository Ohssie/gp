@extends('plain')

@section('title', 'Forgot Password')

@section('content')
  <div class="main-content container-fluid">
    <div class="splash-container">
      <div class="panel panel-default panel-border-color panel-border-color-primary">
        <div class="panel-heading">
          <a href="/"><img src="/assets/citisumo.jpg" alt="CitiSumo" width="200" height="160" class="logo-img"></a>
          <span class="splash-description">Please enter your account information.</span>
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
                <{!! session('signup_success') !!}
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
          {{ Form::open(array('url' => url('/account/forgotpass'), 'class' => 'form', 'method' => 'post')) }}
          {{ csrf_field() }}
            <div class="form-group">
              <input id="login" value="{{ old('phone') }}" name="phone" type="text" placeholder="Phone number" autocomplete="off" class="form-control" required>
            </div>
            <div class="form-group login-submit">
              <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Send me my details</button>
            </div>
          {{ Form::close() }}
        </div>
      </div>
      <div class="splash-footer"><span><a href="login">Back to login</a></span> | <span><a href="signup">Create new account</a></span></div>
    </div>
  </div>
@endsection