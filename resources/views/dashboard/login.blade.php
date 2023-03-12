<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.0.0
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
    <head>
        <!-- <base href="admin_asset/./"> -->
        <base href="{{asset('')}}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Open Source Bootstrap dashboard Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
        <title>Login - Dashboard</title>
        <!-- Icons-->
        <link href="admin_asset/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
        <link href="admin_asset/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
        <link href="admin_asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="admin_asset/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
        <!-- Main styles for this application-->
        <link href="admin_asset/css/style.css" rel="stylesheet">
        <link href="admin_asset/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
        <!-- Global site tag (gtag.js) - Google Analytics-->
        <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            // Shared ID
            gtag('config', 'UA-118965717-3');
            // Bootstrap ID
            gtag('config', 'UA-118965717-5');
        </script>
    </head>
    <body class="app flex-row align-items-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
              <div class="card-group">
                <div class="card p-4">
                  <div class="card-body">
                    <h1>Login</h1>
                    <p class="text-muted">Sign In to Dashboard</p>                    
                    <form action="{{route('dashboard.postLogin')}}" method="POST">
                        {{ csrf_field() }}
                        @if(session('error'))
                            <span class="text-danger mb-3">{{session('error')}}</span>
                        @endif
                        @if( count($errors) && $errors->first('email') )
                            <span class="text-danger mb-3">{{$errors->first('email')}}</span>
                        @endif
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="icon-user"></i>
                                </span>
                            </div>
                            <input name="email" class="form-control" type="text" placeholder="Email" value="{{old('email') ? old('email') : ''}}">
                        </div>
                        @if( count($errors) && $errors->first('password') )
                            <span class="text-danger mb-3">{{$errors->first('password')}}</span>
                        @endif
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                   <i class="icon-lock"></i>
                                </span>
                            </div>
                           <input name="password" class="form-control" type="password" placeholder="Password" value="{{old('password') ? old('password') : ''}}">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary px-4" type="submit">Login</button>
                            </div>
                        </div>  
                    </form>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- CoreUI and necessary plugins-->
        <script src="admin_asset/vendors/jquery/js/jquery.min.js"></script>
        <script src="admin_asset/vendors/popper.js/js/popper.min.js"></script>
        <script src="admin_asset/vendors/bootstrap/js/bootstrap.min.js"></script>
        <script src="admin_asset/vendors/pace-progress/js/pace.min.js"></script>
        <script src="admin_asset/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
        <script src="admin_asset/vendors/@coreui/coreui/js/coreui.min.js"></script>

    </body>
</html>
