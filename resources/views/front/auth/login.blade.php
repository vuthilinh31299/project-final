
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
       
    </head>
    <body class="app flex-row align-items-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
                
              <div class="card-group">
                <div class="card p-4">
                  <div class="card-body">
                    <h1>Login User</h1>
                    <p class="text-muted">Đăng nhập tài khoản</p>                    
                    <form action="{{route('front.postLogin')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="icon-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="email" placeholder="Nhập email">
                            @if( count($errors) && $errors->first('email') )
                                <div class="error_be">* {{$errors->first('email')}}</div>
                            @endif 
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="icon-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu">
                            @if( count($errors) && $errors->first('password') )
                                <div class="error_be">* {{$errors->first('password')}}</div>
                            @endif 
                        </div>
                        
                        <button type="submit" class="btn btn-success">đăng nhập</button>
                        
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
