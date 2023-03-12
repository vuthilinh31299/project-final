<?php 
    header('Cache-Control: no-store, must-revalidate');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap dashboard Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>DaNang Free Walking Tour - Dashboard</title>
    <!-- Icons-->
    <link href="admin_asset/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="admin_asset/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="admin_asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="admin_asset/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    @include('dashboard.layout.header')
    <div class="app-body">
        @include('dashboard.layout.menu')
        <main class="main">
            <div class="container-fluid">
                <div class="animated fadeIn">
                    @yield('content')
                    @yield('js')
                </div>
            </div>
        </main>   
    </div>
 
    @include('dashboard.layout.footer')
</body>
<style type="text/css">
    .page-item.disabled {
        display: none !important;
    }
</style>
</html>
