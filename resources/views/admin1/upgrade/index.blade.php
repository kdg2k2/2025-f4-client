@extends('admin1.layout.index')
@section('content')
    <div class="page-container">

        <div class="row justify-content-center">
            <div class="col-xxl-9">

                <!-- Pricing Title-->
                <div class="text-center">
                    <h3 class="mb-2">Chọn gói tài khoản</h3>
                </div>

                <div class="row mt-sm-4 align-items-end justify-content-center my-3">
                    <div class="col-lg-4">
                        <div class="card h-100 overflow-hidden">
                            <div class="card-header p-3 text-bg-primary text-center">
                                <h4 class="fw-bold fs-22">Kết Nối Thông Tin Lâm Nghiệp</h4>
                                <h5 class="mt-2 mb-0 fw-normal text-white text-opacity-50">Phù hợp với khách hàng muốn trải nghiệm một số dịch vụ cơ bản</h5>
                            </div>
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-2">
                                    <h1 class="display-5 fw-semibold mb-0"> 100.000 VNĐ/</h1>
                                    <div class="d-block">
                                        <p class="text-muted fs-5 mb-0">30 ngày</p>
                                    </div>
                                </div>
                                <h5 class="text-primary fw-semibold my-3">Gồm các dịch vụ :</h5>
                                <ul class="d-flex flex-column gap-2 list-unstyled fs-15">
                                    <li>
                                        <i class="ri-check-line text-primary fs-4 align-middle me-1"></i>
                                        10 lượt tải tài liệu
                                    </li>
                                    <li>
                                        <i class="ri-check-line text-primary fs-4 align-middle me-1"></i>
                                        Hỗ trợ 24/7
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="" class="btn btn-outline-primary btn-lg fw-semibold w-100">ĐĂNG KÝ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100">
                            <div class="card-header p-3 text-bg-success text-center">
                                <h4 class="fw-bold fs-22">Thấu Hiểu Dữ Liệu Lâm Nghiệp</h4>
                                <h5 class="mt-2 mb-0  text-white text-opacity-50 fw-normal">Dành cho khách hàng sử dụng dịch vụ thường xuyên và có nhu cầu lớn</h5>
                            </div>
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-2">
                                    <h1 class="display-5 fw-semibold mb-0"> 250.000 VNĐ/</h1>
                                    <div class="d-block">
                                        <p class="text-muted fs-5 mb-0">30 ngày</p>
                                    </div>
                                </div>
                                <h5 class="text-primary fw-semibold my-3">Gồm các dịch vụ :</h5>
                                <ul class="d-flex flex-column gap-2 list-unstyled fs-15">
                                    <li>
                                        <i class="ri-check-line text-primary fs-4 align-middle me-1"></i>
                                        10 lượt tải tài liệu
                                    </li>

                                    <li>
                                        <i class="ri-check-line text-primary fs-4 align-middle me-1"></i>
                                        Hỗ trợ 24/7
                                    </li>
                                </ul>
                            </div>

                            <div class="card-footer">
                                <a href="" class="btn btn-danger btn-lg fw-semibold w-100">ĐĂNG KÝ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 overflow-hidden">
                            <div class="card-header p-3 text-bg-primary text-center">
                                <h4 class="fw-bold fs-22">Chỉ Huy Chiến Lược Lâm Nghiệp</h4>
                                <h5 class="mt-2 mb-0 text-white text-opacity-50 fw-normal">Dành cho các tổ chức có nhu cầu sử dụng dịch vụ lớn và thường xuyên</h5>
                            </div>
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-2">
                                    <h1 class="display-5 fw-semibold mb-0"> 500.000 VNĐ/</h1>
                                    <div class="d-block">
                                        <p class="text-muted fs-5 mb-0">30 ngày</p>
                                    </div>
                                </div>
                                <h5 class="text-primary fw-semibold my-3">Gồm các dịch vụ :</h5>
                                <ul class="d-flex flex-column gap-2 list-unstyled fs-15">
                                    <li>
                                        <i class="ri-check-line text-primary fs-4 align-middle me-1"></i>
                                        Không giới hạn lượt tải tài liệu
                                    </li>

                                    <li>
                                        <i class="ri-check-line text-primary fs-4 align-middle me-1"></i>
                                        Hỗ trợ 24/7
                                    </li>
                                </ul>
                            </div>

                            <div class="card-footer">
                                <a href="" class="btn btn-outline-primary btn-lg fw-semibold w-100">ĐĂNG KÝ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->
        </div>

    </div>
@endsection
