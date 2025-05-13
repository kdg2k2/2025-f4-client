@extends('pages.layouts.index')
@section('content')
    <div class="main-content app-content">
        <section class="section banner-1 banner-section banner-arrow-down">
            <img src="../assets/images/patterns/4.png" alt="img" class="patterns-3">
            <img src="../assets/images/patterns/6.png" alt="img" class="patterns-4">
            <img src="../assets/images/patterns/9.png" alt="img" class="patterns-8 op-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="">
                            <p class="mb-3 content-1 h5 text-white text-center">Câu hỏi thường gặp</p>
                            <p class="mb-0 tx-26 text-center">Mọi điều thông tin bạn cần biết về sản phẩm.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row mb-4">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="web-hosting" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="accordion accordion-style-1" id="acc-style-1">

                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#acc-1" aria-expanded="false"
                                                        aria-controls="acc-1"><font
                                                        style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">1. Làm thế nào để mua tài
                                                            liệu trên website?</font></font></button>
                                            </h2>
                                            <div id="acc-1" class="accordion-collapse collapse show"
                                                 data-bs-parent="#acc-style-1">
                                                <div class="accordion-body"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">Để mua tài liệu, bạn chỉ
                                                            cần chọn tài liệu mình muốn, thêm vào giỏ hàng, sau đó điền
                                                            thông tin thanh toán và hoàn tất giao dịch. Bạn sẽ nhận được
                                                            tài liệu qua email hoặc trong tài khoản người dùng của
                                                            mình.</font></font></div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#acc-2"
                                                        aria-expanded="false" aria-controls="acc-2"><font
                                                        style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">2. Tôi có thể thanh toán
                                                            bằng những phương thức nào?</font></font>
                                                </button>
                                            </h2>
                                            <div id="acc-2" class="accordion-collapse collapse"
                                                 data-bs-parent="#acc-style-1">
                                                <div class="accordion-body">
                                                    <p>Khách hàng có thể thanh toán qua VNPAY bằng các hình thức
                                                        sau:</p>
                                                    <ul>
                                                        <li>Thẻ ATM nội địa (đã đăng ký Internet Banking)</li>
                                                        <li>Thẻ tín dụng/ghi nợ (Visa, MasterCard,...)</li>
                                                        <li>Quét mã QR qua ứng dụng ngân hàng hoặc ví điện tử có liên
                                                            kết VNPAY
                                                        </li>
                                                        <li>Ví VNPAY</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#acc-3"
                                                        aria-expanded="false" aria-controls="acc-3"><font
                                                        style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">3. Tôi có thể yêu cầu hoàn
                                                            tiền không?</font></font></button>
                                            </h2>
                                            <div id="acc-3" class="accordion-collapse collapse"
                                                 data-bs-parent="#acc-style-1">
                                                <div class="accordion-body">Do sản phẩm là tài liệu số, chúng tôi không
                                                    áp dụng chính sách hoàn tiền sau khi giao dịch hoàn tất, trừ khi có
                                                    sự cố kỹ thuật xảy ra.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#acc-4"
                                                        aria-expanded="false" aria-controls="acc-4"><font
                                                        style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">4. Làm sao để nhận hỗ trợ
                                                            khi gặp vấn đề?</font></font></button>
                                            </h2>
                                            <div id="acc-4" class="accordion-collapse collapse"
                                                 data-bs-parent="#acc-style-1">
                                                <div class="accordion-body">Trong trường hợp gặp phải bất kỳ vấn đề gì,
                                                    bạn có thể liên hệ với chúng tôi qua email hỗ trợ hoặc hotline trên
                                                    website.
                                                </div>
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
