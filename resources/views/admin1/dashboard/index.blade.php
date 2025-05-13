@extends('admin1.layout.index')
@section('content')
    <div class="page-container">

        <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="">
                                    Đơn hàng đã thanh toán</h5>
                                <h3 class="mt-2 mb-1 fw-bold">0</h3>
                            </div>
                            <div class="avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle text-success rounded fs-28">
                                            <iconify-icon icon="solar:bag-check-bold"></iconify-icon>
                                        </span>
                            </div>
                        </div>
                    </div>

                    <div class="apex-charts" id="chart1"></div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="">
                                    Đơn hàng chờ thanh toán</h5>
                                <h3 class="mt-2 mb-1 fw-bold">0</h3>

                            </div>
                            <div class="avatar-lg flex-shrink-0">
                                <span class="avatar-title bg-warning-subtle text-warning rounded fs-28">
                                    <iconify-icon icon="solar:cart-large-minimalistic-line-duotone"></iconify-icon>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="apex-charts" id="chart3"></div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="">
                                    Tài liệu đã mua</h5>
                                <h3 class="mt-2 mb-1 fw-bold">0</h3>

                            </div>
                            <div class="avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle text-info rounded fs-28">
                                            <iconify-icon icon="solar:document-text-linear"></iconify-icon>
                                        </span>
                            </div>
                        </div>
                    </div>

                    <div class="apex-charts" id="chart2"></div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="">
                                    Tổng tiền đã chi</h5>
                                <h3 class="mt-2 mb-1 fw-bold">0</h3>

                            </div>
                            <div class="avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-28">
                                            <iconify-icon icon="solar:wallet-bold"></iconify-icon>
                                        </span>
                            </div>
                        </div>
                    </div>

                    <div class="apex-charts" id="chart4"></div>
                </div>
            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-xl-6">--}}
{{--                <div class="card">--}}
{{--                    <div class="d-flex card-header justify-content-between align-items-center">--}}
{{--                        <div>--}}
{{--                            <h4 class="header-title">Thống kê bài viết</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="card-body px-0 pt-0">--}}
{{--                        <div class="bg-light bg-opacity-50">--}}
{{--                            <div class="row text-center">--}}
{{--                                <div class="col-md-3 col-6">--}}
{{--                                    <p class="text-muted mt-3 mb-1">TỔNG</p>--}}
{{--                                    <h4 class="mb-3">--}}
{{--                                        <span>{{number_format($count_total, 0, ',', '.')}}</span>--}}
{{--                                    </h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3 col-6">--}}
{{--                                    <p class="text-muted mt-3 mb-1">Tin tức sự kiện</p>--}}
{{--                                    <h4 class="mb-3">--}}
{{--                                        <span>{{number_format($count_news, 0, ',', '.')}}</span>--}}
{{--                                    </h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3 col-6">--}}
{{--                                    <p class="text-muted mt-3 mb-1">Tin tức sinh viên</p>--}}
{{--                                    <h4 class="mb-3">--}}
{{--                                        <span>{{number_format($count_studentNews, 0, ',', '.')}}</span>--}}
{{--                                    </h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3 col-6">--}}
{{--                                    <p class="text-muted mt-3 mb-1">Tin tức đào tạo</p>--}}
{{--                                    <h4 class="mb-3">--}}
{{--                                        <span>{{number_format($count_trainningNews, 0, ',', '.')}}</span>--}}
{{--                                    </h4>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div dir="ltr" class="px-1 mt-2">--}}
{{--                            <div id="revenue-chart" class="apex-charts" data-colors="#02c0ce,#777edd"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-xl-6">--}}
{{--                <div class="card">--}}
{{--                    <div class="d-flex card-header justify-content-between align-items-center">--}}
{{--                        <div>--}}
{{--                            <h4 class="header-title">Thống kê khác</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="card-body px-0 pt-0">--}}
{{--                        <div class="border-top border-bottom border-light border-dashed">--}}
{{--                            <div class="row text-center align-items-center">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <p class="text-muted mt-3 mb-1">Giáo trình, bài giảng</p>--}}
{{--                                    <h4 class="mb-3">--}}
{{--                                        <span>{{number_format($count_curr, 0, ',', '.')}}</span>--}}
{{--                                    </h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 border-start border-light border-dashed">--}}
{{--                                    <p class="text-muted mt-3 mb-1">Ấn phẩm khoa học</p>--}}
{{--                                    <h4 class="mb-3">--}}
{{--                                        <span>{{number_format($count_scientific, 0, ',', '.')}}</span>--}}
{{--                                    </h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 border-start border-end border-light border-dashed">--}}
{{--                                    <p class="text-muted mt-3 mb-1">Thư viện ảnh</p>--}}
{{--                                    <h4 class="mb-3">--}}
{{--                                        <span>{{number_format($count_lib, 0, ',', '.')}}</span>--}}
{{--                                    </h4>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div dir="ltr" class="px-2">--}}
{{--                            <div id="statistics-chart" class="apex-charts" data-colors="#0acf97,#45bbe0"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection
@section('script')
    <script src="admin/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="admin/js/pages/dashboard.js"></script>
    <script>
        $(document).ready(function() {
            createChart("#chart1", "--abstack-success");
            createChart("#chart2", "--abstack-info");
            createChart("#chart3", "--abstack-warning");
            createChart("#chart4", "--abstack-primary");
            {{--createChartLine('{{$arr_news}}', '{{$arr_studentNews}}', '{{$arr_trainningNews}}', '{{$years}}');--}}
            {{--createChartStatistics('{{$arr_curr}}', '{{$arr_scientific}}', '{{$arr_lib}}', '{{$years}}')--}}
        });
    </script>
@endsection
