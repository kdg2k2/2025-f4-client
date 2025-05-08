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
                    <div class="row">
                        <div class="col-lg-1 col-md-3"></div>
                        <div class="col-lg-10 col-md-6">
                            <a href="/">
                                <img width="300" src="../assets/images/brand/logo-color.png" alt="img"
                                    class="auth-logo logo-color mb-4 mx-auto">
                                <img width="300" src="../assets/images/brand/logo-white.png" alt="img"
                                    class="auth-logo logo-dark mb-4 mx-auto">
                            </a>
                            <div class="card border mb-0">
                                <div class="card-body p-sm-6">
                                    <h3 class="mb-1">Đổi mật khẩu</h3>
                                    <p class="mb-4 tx-muted">Nhập mật khẩu mới của bạn</p>
                                    <form class="form-horizontal" id="post-form">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="mb-2 fw-500">Mật khẩu<span
                                                            class="tx-danger ms-1">*</span></label>
                                                    <div class="input-group">
                                                        <input name="password" class="form-control ms-0 border-end-0"
                                                            type="password" placeholder="Create a Password"
                                                            id="password">
                                                        <a href="javascript:void(0)"
                                                            class="input-group-text bg-transparent tx-muted">
                                                            <i class="fe fe-eye tx-muted op-7" id="showPassword"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="mb-2 fw-500">Xác nhận mật khẩu<span
                                                            class="tx-danger ms-1">*</span></label>
                                                    <div class="input-group">
                                                        <input name="password_confirmation"
                                                            class="form-control ms-0 border-end-0" type="password"
                                                            placeholder="Create a Password" id="re-password">
                                                        <a href="javascript:void(0)"
                                                            class="input-group-text bg-transparent tx-muted">
                                                            <i class="fe fe-eye tx-muted op-7" id="showPassword"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="d-grid mb-3">
                                                    <button type="submit" class="btn btn-primary">
                                                        Đổi mật khẩu
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-3"></div>
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
    <script src="assets/js/show-password.js"></script>

    <script>
        const api = @json(route('api.forget-password.change-pass')) + '?code=' + @json($code);

        $(document).ready(function() {
            $("#post-form").on("submit", async function(e) {
                try {
                    e.preventDefault();
                    const formData = new FormData(this);

                    const {
                        message
                    } = await http.post(api, formData, @json(csrf_token()));

                    alertSuccess(message);

                    this.reset();

                    setTimeout(() => (window.location.href = '/login'), 2000);
                } catch (error) {
                    let {
                        message
                    } = error.responseJSON;

                    alertErr(message);
                }
            });
        });
    </script>
</body>

</html>
