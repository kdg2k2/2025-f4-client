@extends('admin1.layout.index')
@section('content')
    <div class="page-container">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3 anchor" id="general">Câu hỏi thường gặp</h4>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        1. Làm thế nào để mua tài
                                        liệu trên website?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Để mua tài liệu, bạn chỉ
                                        cần chọn tài liệu mình muốn, thêm vào giỏ hàng, sau đó điền
                                        thông tin thanh toán và hoàn tất giao dịch. Bạn sẽ nhận được
                                        tài liệu qua email hoặc trong tài khoản người dùng của
                                        mình.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        2. Tôi có thể thanh toán
                                        bằng những phương thức nào?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        3. Tôi có thể yêu cầu hoàn
                                        tiền không?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Do sản phẩm là tài liệu số, chúng tôi không
                                        áp dụng chính sách hoàn tiền sau khi giao dịch hoàn tất, trừ khi có
                                        sự cố kỹ thuật xảy ra.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        4. Làm sao để nhận hỗ trợ
                                        khi gặp vấn đề?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Trong trường hợp gặp phải bất kỳ vấn đề gì,
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
@endsection
