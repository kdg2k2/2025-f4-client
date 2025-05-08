<!DOCTYPE html>
<html lang="vi" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-hover" data-theme-mode="light">

<head>
    <base href="{{ asset('') }}">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="style">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/js/nostfly-main/nostfly.css">
</head>

<body class="main-body light-theme login-card">
    <div class="page justify-content-center">
        <div class="main-content app-content pt-0">
            <section class="section banner-pd-1">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-9 mt-3">
                            <a href="/">
                                <img width="300" src="../assets/images/brand/logo-color.png" alt="img"
                                    class="auth-logo logo-color mb-4 mx-auto">
                                <img width="300" src="../assets/images/brand/logo-white.png" alt="img"
                                    class="auth-logo logo-dark mb-4 mx-auto">
                            </a>
                            <div class="card border mb-0">
                                <div class="card-body p-sm-6">
                                    <h4 class="mb-1">Xác thực tài khoản</h4>
                                    <div class="form-horizontal theme-form mt-4">
                                        <p class="message mb-4 tx-muted">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="template-admin/admin/js/vendors/jquery/jquery.min.js"></script>
    <script src="asset/js/nostfly-main/nostfly.js"></script>
    <script src="asset/js/nostfly-main/use-nostfly.js"></script>
    <script src="asset/js/fetch.js"></script>
    <script src="asset/js/loading.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="\template-admin\admin\js\auth\verify.js"></script>
</body>

</html>
