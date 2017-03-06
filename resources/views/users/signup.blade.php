<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="{{ url('') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/logo-fav.png">
    <title>Register a New Account - {{ config('settings.app_name') }}</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
              <div class="panel-heading">
                <img src="assets/img/logo-xx.png" alt="logo" width="102" height="27" class="logo-img">
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
                {{ Form::open(array('url' => url('signup'), 'class' => 'form', 'method' => 'POST')) }}
                  <div class="login-form">
                    <div class="form-group">
                      <input id="name" name="name" value="{{ old('name') }}" type="text" placeholder="Full name" autocomplete="off" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                      <input id="phone" name="phone" value="{{ old('phone') }}" type="text" placeholder="Phone number" autocomplete="off" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                      <input id="name" name="bank_name" value="{{ old('bank_name') }}" type="text" placeholder="Bank name" autocomplete="off" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                      <input id="name" name="account_name" value="{{ old('account_name') }}" type="text" placeholder="Account name" autocomplete="off" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                      <input id="name" name="account_number" value="{{ old('account_number') }}" type="text" placeholder="Account number" autocomplete="off" class="form-control" required="required">
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
            <div class="splash-footer"><span>Already have an account? <a href="login">Login here</a></span></div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/main.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      });
      
    </script>
  </body>
</html>