<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Apex Realty CRM</title>
  
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{{ url('/') }}"><b>Apex Realty CRM</b></a>
      </div>

      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Welcome, please login to your dashboard.</p>

          {{-- <x-alert/> --}}

          <form  action="{{ route('login.post') }}" method="POST" role="form">
            @csrf
            <div class="input-group mb-3">
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                  <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                  </div>
              </div>
            </div>

            <div class="input-group mb-3">
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                  <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-8">
                  <div class="icheck-primary">
                  <input type="checkbox" id="remember" name="remember" >
                  <label for="remember">
                      Remember Me
                  </label>
                  </div>
              </div>
              <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('js/adminlte.min.js') }}"></script>
  </body>
</html>