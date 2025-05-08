@extends('emails.base')
@section('content')
    <table style="text-align: left; width: 100%;" align="left" border="0" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td style="text-align: center;">
                    <img src="https://dichvu.tanmaixanh.vn/assets/images/brand/logo-color.png" alt=""
                        style="margin: 30px 0px; border-radius: 10px; width: 50%">
                </td>
            </tr>
            <tr>
                <td>
                    <h4 style="font-size: 16px; color: #444444;">Xin chào {{ $userName }},</h4>
                    <p style="font-size: 14px; color: #717171; margin: 15px 0;">
                        Truy cập đường dẫn bên dưới để đổi mật khẩu
                    </p>
                    <p style="font-size: 14px; color: #red; margin: 15px 0;">
                        Lưu ý đường dẫn chỉ có thời hạn là 10 phút
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="text-align: left; width: 100%;" align="left" border="0" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td style="text-align:center">
                    <a href="{{ $url }}" target="_blank"
                        style="
                        padding: 10px 15px;
                        background-color: #308e87;
                        color: #fff;
                        border: none;
                        border-radius: 10px;
                        ">
                        Đổi mật khẩu
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
