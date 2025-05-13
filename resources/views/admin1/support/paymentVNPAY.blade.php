@extends('admin1.layout.index')
@section('content')
    <div class="page-container">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Cổng thanh toán VNPAY</h2>
                        <p>Cổng thanh toán <strong>VNPAY</strong> là giải pháp thanh toán do Công ty Cổ phần
                            Giải pháp Thanh toán Việt Nam (VNPAY) phát triển. Khách hàng có thể sử dụng thẻ, tài
                            khoản ngân hàng, tính năng QR Pay/VNPAY-QR tích hợp trên Mobile Banking hoặc ví điện
                            tử liên kết để thanh toán các giao dịch và nhập mã giảm giá (nếu có).</p>

                        <h5>Hình thức hỗ trợ:</h5>
                        <div style="text-align: center; margin-bottom: 10px">
                            <p style="text-align: center; font-size: 16px; font-weight: bold"> Quét mã VNPAY-QR
                                trên 40+ Ứng dụng Mobile Banking và
                                15+
                                Ví điện tử liên kết</p>
                            <img src="assets/images/vnpay/1.png" class="img-fluid w-75"/>
                            <img src="assets/images/vnpay/2.png" class="img-fluid w-75"/>
                            <p style="text-align: center; font-size: 16px; font-weight: bold">40+ Thẻ ATM và tài
                                khoản ngân hàng nội địa</p>
                            <img src="assets/images/vnpay/3.png" class="img-fluid w-75"/>
                            <p style="text-align: center; font-size: 16px; font-weight: bold">5 Thẻ thanh toán
                                quốc tế</p>

                            <img src="assets/images/vnpay/4.png" class="img-fluid"/>
                            <p></p>
                            <img src="assets/images/vnpay/5.png" class="img-fluid"/>
                            <p style="text-align: center; font-size: 16px; font-weight: bold">(Phụ thuộc vào tổ
                                chức thẻ và ngân hàng phát hành thẻ.
                                <a target="_blank" href="https://support.apple.com/en-us/102897">Chi tiết danh
                                    sách tại đây</a>)
                            </p>
                            <h3 style="text-align: center; font-size: 18px; font-weight: bold">Các phương thức
                                thanh toán qua VNPAY</h5>
                                <img src="assets/images/vnpay/6.png" class="img-fluid w-50"/>
                        </div>
                        <h5>1. Phương thức thanh toán qua “Ứng dụng thanh toán hỗ trợ VNPAY-QR”</h5>
                        <ol>
                            <li>Quý khách lựa chọn sản phẩm, dịch vụ và chọn <strong>Thanh toán ngay</strong> hoặc <strong>Đặt hàng</strong>.<br>
                                Tại trang thanh toán, kiểm tra sản phẩm đã đặt, điền thông tin người nhận hàng, chọn phương thức <strong>thanh toán VNPAY</strong> và nhấn nút “Đặt hàng ngay”.</li>
                            <li>Màn hình chuyển sang giao diện cổng thanh toán VNPAY. Chọn phương thức “Ứng dụng thanh toán hỗ trợ VNPAY-QR”.</li>
                            <li>Hệ thống hiển thị mã QR cùng số tiền thanh toán. Dùng ứng dụng ngân hàng để quét mã.<br>
                                <em>*Lưu ý: Mã QR có hiệu lực trong 15 phút</em><br>
                                Để thanh toán thành công, quý khách nên chuẩn bị ứng dụng và thao tác sẵn sàng để tránh lỗi thời gian và mất ưu đãi.</li>
                            <li>Kiểm tra thông tin, chọn nguồn tiền thanh toán từ tài khoản, ví điện tử hoặc thẻ tín dụng. Nhập mã giảm giá (nếu có) và hoàn tất thanh toán.</li>
                        </ol>
                        <p><strong>Hướng dẫn thanh toán qua tính năng QR Pay/VNPAY-QR</strong><br>
                        </p>
                        <img src="assets/images/vnpay/7.png" class="img-fluid"/>

                        <h5>2. Phương thức thanh toán qua “Thẻ nội địa và tài khoản ngân hàng”</h5>
                        <ol>
                            <li>Lựa chọn sản phẩm, dịch vụ và chọn <strong>Thanh toán ngay</strong> hoặc <strong>Đặt hàng</strong>.<br>
                                Điền đầy đủ thông tin và chọn phương thức VNPAY rồi nhấn “Đặt hàng ngay”.</li>
                            <li>Chọn “Thẻ nội địa và tài khoản ngân hàng” và chọn ngân hàng từ danh sách.</li>
                            <li>Nhập thông tin thẻ hoặc tài khoản. Nhập mã OTP được gửi về điện thoại để hoàn tất.<br>
                                <em>*Lưu ý: Giao dịch sẽ hết hạn sau 15 phút</em></li>
                            <li>Hoàn tất thanh toán và nhận thông báo xác nhận đơn hàng thành công.</li>
                        </ol>
                        <p><strong>Giao diện thanh toán qua Thẻ nội địa và tài khoản ngân hàng</strong><br>
                        </p>
                        <img src="assets/images/vnpay/8.png" class="img-fluid"/>
                        <h5>3. Phương thức thanh toán qua “Thẻ thanh toán quốc tế (Visa, MasterCard, JCB, UnionPay)”</h5>
                        <p>Thực hiện tương tự như phương thức “Thẻ nội địa và tài khoản ngân hàng”.</p>

                        <h5>4. Phương thức thanh toán qua “Ví điện tử VNPAY”</h5>
                        <p>Thực hiện tương tự như phương thức “Ứng dụng thanh toán hỗ trợ VNPAY-QR”.</p>

                        <h5>5. Phương thức thanh toán qua “Apple Pay”</h5>
                        <ol>
                            <li>Truy cập website bằng Safari, chọn sản phẩm và thanh toán.</li>
                            <li>Tại cổng thanh toán VNPAY, chọn phương thức “Apple Pay”.<br><em>*Lưu ý: Giao dịch sẽ hết hạn sau 15 phút</em></li>
                            <li>Xác nhận bằng Face ID hoặc Touch ID.</li>
                            <li>Thanh toán thành công và nhận thông báo xác nhận đơn hàng tại app.</li>
                        </ol>
                        <p><strong>Hướng dẫn thanh toán qua Apple Pay</strong><br></p>
                        <img src="assets/images/vnpay/9.png" class="img-fluid"/>

                        <hr>
                        <h5>KÊNH HỖ TRỢ VNPAY</h5>
                        <ul>
                            <li><strong>Tổng đài:</strong> *3388 hoặc 1900 55 55 77</li>
                            <li><strong>Zalo OA:</strong> <a href="https://zalo.me/4134983655549474109" target="_blank">zalo.me/4134983655549474109</a></li>
                            <li><strong>Email:</strong> <a href="mailto:hotro@vnpay.vn">hotro@vnpay.vn</a></li>
                            <li><strong>Fanpage:</strong> <a href="https://facebook.com/VNPAYQR.vn" target="_blank">facebook.com/VNPAYQR.vn</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
