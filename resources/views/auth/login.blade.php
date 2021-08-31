<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ Config::get('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta property="og:url" content="http://demo.madebytilde.com/elephant">
    <meta property="og:type" content="website">
    <meta property="og:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
    <meta property="og:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta property="og:image" content="http://demo.madebytilde.com/elephant.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@madebytilde">
    <meta name="twitter:creator" content="@madebytilde">
    <meta name="twitter:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
    <meta name="twitter:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta name="twitter:image" content="http://demo.madebytilde.com/elephant.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="/images/logos/favicon.ico">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#1c90fb">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="css/app/vendor.min.css">
    <!-- /build -->
    <!-- build:css css/elephant.min.css -->
    <link rel="stylesheet" href="css/app/elephant.min.css">
    <!-- /build -->
    <!-- build:css css/application.min.css -->
    <link rel="stylesheet" href="css/app/application.min.css">
    <link rel="stylesheet" href="css/app/login-2.min.css">
  
  </head>
  <body>
    
    <div class="login">
    @if(session()->has('authenticated'))
    <div  style="margin-top:15px; margin-left:15px; margin-right:15px">
        <div class="panel panel-body text-center" data-toggle="match-height" style="height: 138px;">
          <H4>Bienvenido</H4>
          <p>
            <small>Por favor ingrese sus credenciales para sus primer inicio de sesión.</small>
          </p>
        </div>
    </div>
    @endif
      <div class="login-body">
        <a class="login-brand" href="/">
          <img class="img-responsive" src="images/logos/logo.png" alt="{{Config::get('app.name')}}">
        </a>
        <div class="login-form">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email">Email</label>
              <input id="email" 
                class="form-control" 
                type="email" 
                name="email" 
                spellcheck="false" 
                autocomplete="off" 
                data-msg-required="Por favor ingrese su email." 
                value="{{ old('email') }}" 
                required 
                autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password">Password</label>
              <input id="password" 
                class="form-control" 
                type="password" 
                name="password" 
                minlength="6" 
                data-msg-minlength="La contraseña debe contener al menos 6 caracteres." 
                data-msg-required="Por favor ingrese su contraseña." 
                required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
              <label class="custom-control custom-control-primary custom-checkbox">
                <input class="custom-control-input"
                type="checkbox"
                name="remember"
                {{ old('remember') ? 'checked' : ''}}>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-label">Recordarme</span>
              </label>
              <span aria-hidden="true"> · </span>
              {{-- <a href="{{ url('/password/reset') }}">Reestablecer contraseña</a> --}}
              <a href="/">Reestablecer contraseña</a>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Entrar</button>
          </form>
        </div>
      </div>
      <div class="login-footer">
        Todavía no tiene una cuenta? <a href="/register">Registrarme</a>
      </div>
    </div>
    <script src="js/vendor.js"></script>
    <script src="js/elephant.min.js"></script>
    <script src="js/application.min.js"></script>
  </body>
