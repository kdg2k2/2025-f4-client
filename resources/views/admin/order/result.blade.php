@extends('admin.layout.index')
@section('css')
    <link rel="stylesheet" href="\template-admin\admin\css\checkout.css">
@endsection
@section('content')
    <div class="page-body">
        <div class="container invoice-2">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mt-5 px-3 py-5" style="width: 100%;">
                        <div class="text-center checkout-header">
                            <div class="status">
                                <i class="icon-checkout text-warning fal fa-history"></i>
                                <p class="title-checkout my-2 text-warning">Đang xử lý đơn hàng</p>
                            </div>
                            <p class="order-code"></p>
                        </div>
                        <div class="card-body">
                            <table class="table-wrapper table-responsive table-borderless theme-scrollbar">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table class="table-responsives table-borderless" style="width: 100%;">
                                                <tbody>
                                                    <tr class="info-checkout">
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span
                                                style="display:block; background: rgba(82, 82, 108, 0.3); height:1px; width: 100%; margin-bottom:20px;">
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table style="width: 100%;border-spacing:0;">
                                                <thead>
                                                    <tr style="background: #308e87;">
                                                        <th style="padding: 18px 15px; text-align: left"><span
                                                                style="color: #fff; font-size: 16px; font-weight: 600;">Mô
                                                                tả</span>
                                                        </th>
                                                        <th
                                                            style="padding: 18px 15px; text-align: center;border-right: 3px solid #fff;">
                                                            <span
                                                                style="color: #fff; font-size: 16px; font-weight: 600;">Giá
                                                                tiền</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="checkout-table">
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table style="width:100%;">
                                                <tbody>
                                                    <tr
                                                        style="display:flex; justify-content: space-between; margin:28px 0;align-items: center;">
                                                        <td>
                                                        </td>
                                                        <td>
                                                            <span
                                                                style=" font-size: 16px; font-weight: 500; opacity: 0.8; font-weight: 600;">Tổng
                                                                tiền</span>
                                                            <h4
                                                                style="font-weight:600; margin: 12px 0 5px 0; font-size: 26px; color:#308e87;">
                                                                <span class="checkout-total">0</span>
                                                            </h4>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <span
                                                style="display:block;background: rgba(82, 82, 108, 0.3);height: 1px;width: 100%;margin-bottom:30px;"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span style="display: flex; justify-content: end; gap: 15px;">
                                                <a style="background: rgba(48, 142, 135, 1); color:rgba(255, 255, 255, 1);border-radius: 10px;padding: 12px 27px;font-weight: 600;outline: 0;border: 0; text-decoration: none;"
                                                    href="/admin/orders">
                                                    Xem đơn hàng
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-Fluid Ends-->
    </div>
@endsection

@section('script')
    <script src="\template-admin\admin\js\order\result.js"></script>
@endsection
