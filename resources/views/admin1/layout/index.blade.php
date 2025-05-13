<!DOCTYPE html>
<html lang="vi">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <base href="{{ asset('') }}">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>XANH - VÌ CỘNG ĐỒNG</title>
    @yield('header')
    <link href="admin/css/vendor.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="admin/vendor/sumoselect/sumoselect.css">
    <link rel="stylesheet" href="admin/vendor/flatpickr/flatpickr.min.css">
    <link href="admin/css/toastify.css" rel="stylesheet" type="text/css" />
    <script src="admin/js/config.js"></script>
</head>

<body>
    <div class="wrapper">
        @include('admin1.layout.sidebar')
        @include('admin1.layout.header')
        <div class="page-content">
            @yield('content')
            @include('admin1.layout.footer')
        </div>
    </div>
    @include('admin1.layout.settings')

    <div id="confirm_delete" class="modal fade" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="confirm_delete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-bg-danger border-0">
                    <h4 class="modal-title" id="danger-header-modalLabel">Xác nhận xóa dữ liệu</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Cảnh báo</h5>
                    <p>Xác nhận xóa dữ liệu sẽ xóa tất cả những dữ liệu liên quan đến dữ liệu bị xóa. Để xóa dữ liệu
                        chọn
                        <span class="text-danger"><b>"Xác nhận"</b></span>
                        , để hủy xóa dữ liệu chọn <span class="text-primary bold"><b>"Hủy"</b></span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light close_btn" data-bs-dismiss="modal">Hủy
                    </button>
                    <a href="#" id="btn_delete" class="btn btn-danger">Xác nhận</a>
                </div>
            </div>
        </div>
    </div>

    @yield('modal')

    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="admin/js/vendor.min.js"></script>
    <script src="admin/js/app.js"></script>
    <script src="admin/vendor/sumoselect/jquery.sumoselect.js"></script>
    <script src="admin/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="admin/js/toastify.js"></script>
    <script src="admin/js/global.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            @if (session('success'))
                showToast(@json(session('success')), "success");
            @endif

            @if (session('err'))
                showToast(@json(session('err')), "err");
            @endif

            @if ($errors->all())
                $errs = @Json($errors->all());
                $.each($errs, (i, v) => {
                    showToast(v, "err");
                })
            @endif
        });
    </script>
    @yield('script')
</body>

</html>
