@extends('pages.layouts.index')
@section('content')
    <div class="main-content app-content">
        <section class="banner-section section banner-1">
            <img src="assets/images/patterns/1.png" alt="img" class="patterns-2">
            <img src="assets/images/patterns/4.png" alt="img" class="patterns-3">
            <img src="assets/images/patterns/6.png" alt="img" class="patterns-4">
            <img src="assets/images/patterns/6.png" alt="img" class="patterns-6">
            <img src="assets/images/patterns/10.png" alt="img" class="patterns-8 op-2">

            <div class="container">
                <div
                    class="swiper homeSwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                    <div class="swiper-wrapper" id="swiper-wrapper">
                        <div class="swiper-slide swiper-slide-active">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <div class="mb-4">
                                        <h1 class="content-1 text-white">Miễn phí tải các loại tài liệu</h1>
                                        <p class="mb-4 content-2 tx-18">Chúng tôi cung cấp gói miễn phí để quý khách có thể
                                            tải xuống tài liệu mong muốn</p>
                                        <ul class="list-unstyled mb-0">
                                            <li class="list-item mb-2">
                                                <i class="fe fe-chevron-right bg-white-2 rounded-circle p-1 me-2"></i>Đăng
                                                ký xong có ngay 3 lượt tải tài liệu
                                            </li>
                                            <li class="list-item mb-2">
                                                <i class="fe fe-chevron-right bg-white-2 rounded-circle p-1 me-2"></i>Mỗi
                                                tháng hỗ trợ 3 lượt tải miễn phí
                                            </li>
                                            <li class="list-item mb-3">
                                                <i class="fe fe-chevron-right bg-white-2 rounded-circle p-1 me-2"></i>Hỗ trợ
                                                24/7 nếu có vấn đề không mong muốn
                                            </li>
                                        </ul>
                                    </div>
                                    <a data-href="1" href="#" class="btn btn-secondary me-2 btn-upgrade">
                                        <i class="fe fe-shopping-cart me-2"></i> Đăng ký ngay
                                    </a>

                                </div>
                                <div class="col-lg-5">
                                    <div class="text-center mt-5 mt-md-0">
                                        <img src="assets/images/png/47.png" class="img-fluid" alt="img" width="430">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="row align-items-stretch">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h1 class="content-1 text-white">Tải tài liệu không giới hạn</h1>
                                        <p class="mb-4 content-2 tx-18">Chúng tôi cung cấp gói tài khoản Chỉ Huy Chiến Lược
                                            Lâm Nghiệp dành cho các tổ chức có nhu cầu sử dụng dịch vụ lớn và thường xuyên
                                        </p>
                                        <ul class="list-unstyled mb-0">
                                            <li class="list-item mb-2">
                                                <i class="fe fe-chevron-right bg-white-2 rounded-circle p-1 me-2"></i>Không
                                                giới hạn lượt tải tài liệu
                                            </li>
                                            <li class="list-item mb-2">
                                                <i class="fe fe-chevron-right bg-white-2 rounded-circle p-1 me-2"></i>Chi
                                                phí đăng ký phù hợp với tất cả mọi người
                                            </li>
                                            <li class="list-item mb-3">
                                                <i class="fe fe-chevron-right bg-white-2 rounded-circle p-1 me-2"></i>Hỗ trợ
                                                24/7 nếu có vấn đề không mong muốn
                                            </li>
                                        </ul>
                                    </div>
                                    <a data-id="4" class="btn btn-secondary me-2 btn-upgrade">
                                        <i class="fe fe-shopping-cart me-2"></i> Đăng ký ngay
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <div class="banner-bg mt-4 mt-md-0">
                                        <img src="assets/images/png/50.png" class="img-fluid" alt="img" width="430">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false">
                </div>
                <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                    aria-label="Previous slide" aria-disabled="true"></div>
            </div>
        </section>

        <section class="section"><img src="assets/images/patterns/12.png" alt="img"
                class="patterns-8 sub-pattern-1 z-index-0 op-1"> <img src="assets/images/patterns/11.png" alt="img"
                class="patterns-3 z-index-0">
            <div class="container">
                <div class="heading-section">
                    <div class="heading-subtitle"><span class="tx-primary tx-16 fw-semibold">Dịch vụ</span></div>
                    <div class="heading-title">Các dịch vụ được cung cấp</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card feature-card-9 shadow-none border">
                            <div class="card-body">
                                <div class="mb-3">
                                    <img src="assets/images/icon/doc.png" class="reseller-img" alt="img">
                                </div>
                                <h5 class="mb-3 subtitle">Tài liệu</h5>
                                <p class="mb-0">Dễ dàng tìm kiếm, xem trực tiếp và tải về tài liệu bất cứ lúc nào. Các
                                    loại tài liệu gồm văn bản pháp lý, công văn, sổ tay, tài liệu tham khảo, đề án, dự
                                    án, vv... trong nhiều lĩnh vực Lâm nghiệp</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card feature-card-9 shadow-none border">
                            <div class="card-body">
                                <div class="mb-3">
                                    <img src="assets/images/icon/maps.png" class="reseller-img" alt="img">
                                </div>
                                <h5 class="mb-3 subtitle">Bản đồ <span style="font-size: 14px;">(Sắp ra mắt)</span></h5>
                                <p class="mb-0">Dễ dàng lựa chọn các dữ liệu bản đồ mong muốn đến các cấp đơn vị hành
                                    chính. Các dữ
                                    liệu gồm bản đồ về hiện trạng rừng, chi trả dịch vụ môi trường rừng, lưu vực, biến
                                    động rừng.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card feature-card-9 shadow-none border">
                            <div class="card-body">
                                <div class="mb-3">
                                    <img src="assets/images/icon/satellite.png" class="reseller-img" alt="img">
                                </div>
                                <h5 class="mb-3 subtitle">Ảnh nền vệ tinh <span style="font-size: 14px;">(Sắp ra mắt)</span>
                                </h5>
                                <p class="mb-0">Chỉ vài thao tác đơn giản người dùng có thể sử dụng được dịch vụ cung
                                    cấp ảnh nền vệ tinh. Các ảnh nền vệ tinh được hỗ trợ gồm Landsat, Sentinel-2,
                                    PlanetScope, ESRI Imagery, vv...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section bg-gray-100" id="plans">
            <div class="container">
                <div id="pricing" class="heading-section" style="padding-top: 90px;margin-top: -90px;">
                    <div class="heading-subtitle"><span class="tx-primary tx-16 fw-semibold">Gói tài khoản</span></div>
                    <div class="heading-title">Chọn gói hoàn hảo cho bạn</div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card pricing-card border">
                            <div class="card-body">
                                <svg class="pricing-icon" xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                    <path fill="#bccef4"
                                        d="M12,14.19531c-0.17551-0.00004-0.34793-0.04618-0.5-0.13379l-9-5.19726C2.02161,8.58794,1.85779,7.97612,2.13411,7.49773C2.22187,7.34579,2.34806,7.2196,2.5,7.13184l9-5.19336c0.30964-0.17774,0.69036-0.17774,1,0l9,5.19336c0.4784,0.27632,0.64221,0.88814,0.36589,1.36653C21.77813,8.65031,21.65194,8.7765,21.5,8.86426l-9,5.19726C12.34793,14.14913,12.17551,14.19527,12,14.19531z">
                                    </path>
                                    <path fill="#9ab5ee"
                                        d="M21.5,11.13184l-1.96411-1.13337L12.5,14.06152c-0.30947,0.17839-0.69053,0.17839-1,0L4.46411,9.99847L2.5,11.13184c-0.47839,0.27632-0.64221,0.88814-0.36589,1.36653C2.22187,12.65031,2.34806,12.7765,2.5,12.86426l9,5.19726c0.30947,0.17838,0.69053,0.17838,1,0l9-5.19726c0.4784-0.27632,0.64221-0.88814,0.36589-1.36653C21.77813,11.34579,21.65194,11.2196,21.5,11.13184z">
                                    </path>
                                    <path fill="#5885e4"
                                        d="M21.5,15.13184l-1.96411-1.13337L12.5,18.06152c-0.30947,0.17838-0.69053,0.17838-1,0l-7.03589-4.06305L2.5,15.13184c-0.47839,0.27632-0.64221,0.88814-0.36589,1.36653C2.22187,16.65031,2.34806,16.7765,2.5,16.86426l9,5.19726c0.30947,0.17838,0.69053,0.17838,1,0l9-5.19726c0.4784-0.27632,0.64221-0.88814,0.36589-1.36653C21.77813,15.34579,21.65194,15.2196,21.5,15.13184z">
                                    </path>
                                </svg>
                                <h4 class="mb-3">Miễn phí</h4>
                                <p class="mb-4 14 tx-gray-600">Phù hợp với khách hàng muốn dùng thử các dịch vụ của chúng
                                    tôi</p>
                                <h6 class="mb-4 tx-28">0 VNĐ<span class="tx-14 tx-muted op-7">/ 30 ngày</span></h6>
                                <ul class="list-unstyled tx-14 fw-600 mb-4">
                                    <li class="list-item mb-3">
                                        <div class="d-flex align-items-center-start">
                                            <span class="me-2 tx-primary"><i class="bi bi-check-circle"></i></span>
                                            <span class="flex-grow-1">
                                                3 lượt tải tài liệu
                                            </span>
                                        </div>
                                    </li>
                                    <li class="list-item mb-3">
                                        <div class="d-flex align-items-center-start">
                                            <span class="me-2 tx-primary"><i class="bi bi-check-circle"></i></span>
                                            <span class="flex-grow-1">
                                                Thêm 3 lượt tải tài liệu / tháng
                                            </span>
                                        </div>
                                    </li>
                                    <li class="list-item mb-3">
                                        <div class="d-flex align-items-center-start">
                                            <span class="me-2 tx-primary"><i class="bi bi-check-circle"></i></span>
                                            <span class="flex-grow-1">
                                                Hỗ trợ 24/7
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="d-grid">
                                    <button data-id="1" class="btn btn-primary-transparent btn-upgrade">
                                        Đăng ký
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card pricing-card border">
                            <div class="card-body">
                                <svg class="pricing-icon" xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                    <path fill="#9ab5ee"
                                        d="M21.951 9.67a1 1 0 0 0-.807-.68l-5.699-.828-2.548-5.164A.978.978 0 0 0 12 2.486v16.28l5.097 2.679a1 1 0 0 0 1.451-1.054l-.973-5.676 4.123-4.02a1 1 0 0 0 .253-1.025z">
                                    </path>
                                    <path fill="#5885e4"
                                        d="M11.103 2.998 8.555 8.162l-5.699.828a1 1 0 0 0-.554 1.706l4.123 4.019-.973 5.676a1 1 0 0 0 1.45 1.054L12 18.765V2.503c-.356.001-.703.167-.897.495z">
                                    </path>
                                </svg>
                                <h4 class="mb-3">Kết Nối Thông Tin Lâm Nghiệp</h4>
                                <p class="mb-4 14 tx-gray-600">
                                    Phù hợp với khách hàng muốn trải nghiệm một số dịch vụ cơ bản
                                </p>
                                <h6 class="mb-4 tx-28">100.000 VNĐ<span class="tx-14 tx-muted op-7">/ 30 ngày</span>
                                </h6>
                                <ul class="list-unstyled tx-14 fw-600 mb-4">
                                    <li class="list-item mb-3">
                                        <div class="d-flex align-items-center-start">
                                            <span class="me-2 tx-primary"><i class="bi bi-check-circle"></i></span>
                                            <span class="flex-grow-1">
                                                10 lượt tải tài liệu
                                            </span>
                                        </div>
                                    </li>
                                    <li class="list-item mb-3">
                                        <div class="d-flex align-items-center-start">
                                            <span class="me-2 tx-primary"><i class="bi bi-check-circle"></i></span>
                                            <span class="flex-grow-1">
                                                Hỗ trợ 24/7
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="d-grid">
                                    <button data-id="2" class="btn btn-primary-transparent btn-upgrade">
                                        Đăng ký
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card pricing-card border border-primary">
                            <div class="card-body">
                                <svg class="pricing-icon" xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                    <path fill="#9ab5ee"
                                        d="M19 6H5a3 3 0 0 0-3 3v2.72L8.837 14h6.326L22 11.72V9a3 3 0 0 0-3-3z"></path>
                                    <path fill="#5885e4"
                                        d="M10 6V5h4v1h2V5a2.002 2.002 0 0 0-2-2h-4a2.002 2.002 0 0 0-2 2v1h2zm-1.163 8L2 11.72V18a3.003 3.003 0 0 0 3 3h14a3.003 3.003 0 0 0 3-3v-6.28L15.163 14H8.837z">
                                    </path>
                                </svg>
                                <h4 class="mb-3">Thấu Hiểu Dữ Liệu Lâm Nghiệp</h4>
                                <p class="mb-4 14 tx-gray-600">
                                    Dành cho khách hàng sử dụng dịch vụ thường xuyên và có nhu cầu lớn
                                </p>
                                <h6 class="mb-4 tx-28">250.000 VNĐ<span class="tx-14 tx-muted op-7">/ 30 ngày</span>
                                </h6>
                                <ul class="list-unstyled tx-14 fw-600 mb-4">
                                    <li class="list-item mb-3">
                                        <div class="d-flex align-items-center-start">
                                            <span class="me-2 tx-primary"><i class="bi bi-check-circle"></i></span>
                                            <span class="flex-grow-1">
                                                50 lượt tải tài liệu
                                            </span>
                                        </div>
                                    </li>
                                    <li class="list-item mb-3">
                                        <div class="d-flex align-items-center-start">
                                            <span class="me-2 tx-primary"><i class="bi bi-check-circle"></i></span>
                                            <span class="flex-grow-1">
                                                Hỗ trợ 24/7
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="d-grid">
                                    <button data-id="3" href="javascript:void(0);" class="btn btn-primary btn-upgrade">
                                        Đăng ký
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card pricing-card border">
                            <div class="card-body">
                                <svg class="pricing-icon" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                    viewBox="0 0 24 24">
                                    <path fill="#5885e4"
                                        d="m17.737 14.622-2.426 2.23a11.603 11.603 0 0 1-4.299 2.37l.644 3.004a1 1 0 0 0 1.469.661l3.905-2.202a3.035 3.035 0 0 0 1.375-3.304zM7.266 8.776l2.088-2.48-2.604-.628a2.777 2.777 0 0 0-3.387 1.357l-2.2 3.9a1 1 0 0 0 .661 1.469l3.073.659a12.887 12.887 0 0 1 2.369-4.277zm9.468.04a1.5 1.5 0 1 0-1.5-1.5 1.5 1.5 0 0 0 1.5 1.5z">
                                    </path>
                                    <path fill="#9ab5ee"
                                        d="M22.601 2.062a1 1 0 0 0-.713-.713A11.249 11.249 0 0 0 10.47 4.972L7.266 8.776a12.936 12.936 0 0 0-2.924 6.71 1 1 0 0 0 .284.837l3.1 3.1a1 1 0 0 0 .708.293c.028 0 .057-.001.086-.004a11.847 11.847 0 0 0 6.79-2.86l3.664-3.368A11.204 11.204 0 0 0 22.6 2.062Zm-5.867 6.754a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5Z">
                                    </path>
                                </svg>
                                <h4 class="mb-3">Chỉ Huy Chiến Lược Lâm Nghiệp</h4>
                                <p class="mb-4 14 tx-gray-600">
                                    Dành cho các tổ chức có nhu cầu sử dụng dịch vụ lớn và thường xuyên
                                </p>
                                <h6 class="mb-4 tx-28">500.000 VNĐ<span class="tx-14 tx-muted op-7">/ month</span>
                                </h6>
                                <ul class="list-unstyled tx-14 fw-600 mb-4">
                                    <li class="list-item mb-3">
                                        <div class="d-flex align-items-center-start">
                                            <span class="me-2 tx-primary"><i class="bi bi-check-circle"></i></span>
                                            <span class="flex-grow-1">
                                                Không giới hạn lượt tải tài liệu
                                            </span>
                                        </div>
                                    </li>
                                    <li class="list-item mb-3">
                                        <div class="d-flex align-items-center-start">
                                            <span class="me-2 tx-primary"><i class="bi bi-check-circle"></i></span>
                                            <span class="flex-grow-1">
                                                Hỗ trợ 24/7
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="d-grid">
                                    <button data-id="4" class="btn btn-primary-transparent btn-upgrade">
                                        Đăng ký
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section bg-pattern-2 bg-image1">
            <div class="container">
                <div class="heading-section">
                    <div class="heading-title text-white">Vì sao chọn chúng tôi</div>
                    <div class="heading-description text-white op-8">Một số lý do vì sao nên sử dụng dịch vụ của chúng
                        tôi
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-4 col-md-6">
                        <div class="card feature-card-15">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="tx-primary">Dịch vụ chất lượng cao</h5>
                                </div>
                                <p>Chúng tôi cam kết mang đến dịch vụ chuyên nghiệp đáp ứng mọi nhu cầu của khách hàng.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card feature-card-15">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="tx-primary">Hỗ trợ khách hàng 24/7</h5>
                                </div>
                                <p>Đội ngũ tư vấn viên thân thiện, luôn sẵn sàng hỗ trợ bạn mọi lúc, mọi nơi – kể cả ngày
                                    lễ.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card feature-card-15">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="tx-primary">Giá cả cạnh tranh</h5>
                                </div>
                                <p>Giá thành hợp lý, minh bạch – đảm bảo bạn luôn nhận được giá trị xứng đáng với số tiền bỏ
                                    ra.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card feature-card-15">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="tx-primary">Giao diện thân thiện</h5>
                                </div>
                                <p>Thiết kế đơn giản, dễ sử dụng giúp bạn dễ dàng thao tác và tận hưởng trải nghiệm dịch vụ.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card feature-card-15">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="tx-primary">Bảo mật thông tin</h5>
                                </div>
                                <p>Cam kết bảo vệ dữ liệu người dùng với công nghệ bảo mật tiên tiến nhất.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card feature-card-15">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="tx-primary">Cập nhật và đổi mới</h3>
                                </div>
                                <p>Không ngừng cải tiến và cập nhật tính năng mới để đáp ứng xu hướng và nhu cầu sử dụng.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div id="notification" class="heading-section" style="padding-top: 90px;margin-top: -90px;">
                    <div class="heading-subtitle"><span class="tx-primary tx-16 fw-semibold">Thông báo</span></div>
                    <div class="heading-title">Thông báo mới</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-lg-0">
                            <div class="position-relative">
                                <a href="thong-bao/thong-bao-lich-nghi-le-ngay-30-4-va-ngay-1-5">
                                    <img class="card-img-top" src="assets/images/blog/3.jpg" alt="blog-image">
                                </a>
                                <span class="badge bg-success blog-badge">29-04-2025</span>
                            </div>

                            <div class="card-body d-flex flex-column">
                                <h5><a href="thong-bao/thong-bao-lich-nghi-le-ngay-30-4-va-ngay-1-5"
                                        class="tx-color-default">Thông báo lịch nghỉ lễ ngày 30/4 và ngày 1/5</a></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card mb-lg-0">
                            <div class="position-relative">
                                <a href="thong-bao/thong-bao-lich-nghi-le-gio-to-hung-vuong">
                                    <img class="card-img-top" src="assets/images/blog/6.jpg" alt="blog-image">
                                </a>
                                <span class="badge bg-success blog-badge">04-04-2025</span>
                            </div>

                            <div class="card-body d-flex flex-column">
                                <h5><a href="thong-bao/thong-bao-lich-nghi-le-gio-to-hung-vuong"
                                        class="tx-color-default">Thông báo lịch nghỉ lễ Giỗ Tổ Hùng Vương</a></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card mb-lg-0">
                            <div class="position-relative">
                                <a href="thong-bao/thong-bao-lich-nghi-tet-duong-lich-nam-2025">
                                    <img class="card-img-top" src="assets/images/blog/5.jpg" alt="blog-image">
                                </a>
                                <span class="badge bg-success blog-badge">31-12-2024</span>
                            </div>

                            <div class="card-body d-flex flex-column">
                                <h5><a href="thong-bao/thong-bao-lich-nghi-tet-duong-lich-nam-2025"
                                        class="tx-color-default">Thông báo lịch nghỉ Tết dương lịch năm 2025</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section blob-bg-sec banner-pd-3">
            <img src="assets/images/patterns/18.png" alt="img"
                class="patterns-5 transform-rotate-180 height-inherit bottom-0 op-1">
            <img src="assets/images/patterns/18.png" alt="img" class="patterns-7 height-inherit bottom-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="heading-section text-start mb-4">
                            <div class="heading-title text-white">Ứng dụng mobile</div>
                        </div>
                        <p class="mb-3 op-8">Khách hàng sử dụng ứng dụng được hỗ trợ trên Android và IOS để trực tiếp
                            tải dữ liệu về điện thoại. Vui lòng truy cập vào liên kết dưới đây để tải ứng dụng đúng với
                            hệ điều hành mà bạn đang sử dụng.</p>
                        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.forestry_4_v7&pli=1"
                            class="text-white">
                            <img src="assets/images/icon/google-play.svg" />
                        </a>
                        <a target="_blank" href="https://apps.apple.com/vn/app/forestry-4-0/id6452552409?l=vi"
                            class="text-white">
                            <img src="assets/images/icon/app-store.svg" />
                        </a>
                    </div>
                    <div class="col-lg-5">
                        <div class="text-center mt-5 mt-lg-0">
                            <img src="assets/images/png/57.png" alt="img" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section overflow-hidden">
            <div class="container">
                <div class="heading-section">
                    <div class="heading-subtitle"><span class="tx-primary tx-16 fw-semibold">Đánh giá của khách hàng</span>
                    </div>
                    <div class="heading-title">Khách hàng nói gì về chúng tôi</div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-3 text-center text-lg-start feature-client-bg">
                        <div
                            class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="bg-client position-relative">
                            <img src="assets/images/patterns/9.png" alt="img"
                                class="patterns-11 z-index-0 filter-invert op-2">
                            <div
                                class="swiper testimonialSwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                                <div class="swiper-wrapper" id="swiper-wrapper">
                                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <img src="https://management.xuanmaijsc.vn/user/IMG_20230123_200304.jpg"
                                                        alt="img" class="avatar avatar-lg rounded-circle me-2">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0 text-white">Nguyễn Văn Ánh</h6>
                                                        <span class="tx-13">10-05-2025</span>
                                                    </div>
                                                </div>
                                                <p class="mt-2 tx-14 mb-0">
                                                    Kho tài liệu cực kỳ phong phú, từ sách học thuật, giáo trình cho đến tài
                                                    liệu tham khảo hiếm. Có thể tìm thấy cả những nội dung mà các trang khác
                                                    không có. Rất phù hợp cho học sinh, sinh viên, giảng viên và cả người đi
                                                    làm. Dịch vụ thật sự đáng đồng tiền
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="1">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <img src="https://management.xuanmaijsc.vn/user/lesyhoa.jpg" alt="img"
                                                        class="avatar avatar-lg rounded-circle me-2">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0 text-white">Lê Sỹ Hòa</h6>
                                                        <span class="tx-11">10-05-2025</span>
                                                    </div>
                                                </div>
                                                <p class="mt-2 tx-14 mb-0">
                                                    Dịch vụ hỗ trợ khách hàng làm việc rất chuyên nghiệp. Mình gặp chút trục
                                                    trặc khi tải tài liệu, gửi mail thì được phản hồi ngay trong ngày. Nhân
                                                    viên hướng dẫn tận tình, xử lý vấn đề nhanh chóng. Cảm thấy rất được tôn
                                                    trọng và hỗ trợ.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="assets/js/upgrade.js"></script>
@endsection