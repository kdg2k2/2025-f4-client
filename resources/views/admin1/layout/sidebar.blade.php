<div class="sidenav-menu">

    <a href="{{ route('admin.dashboard') }}" class="logo">
        <span class="logo-light">
            <span class="logo-lg"><img src="admin/images/logo.png" alt="logo"></span>
            <span class="logo-sm"><img src="assets/img/logo/logo.png" alt="small logo"></span>
        </span>

        <span class="logo-dark">
            <span class="logo-lg"><img src="admin/images/logo-dark.png" alt="dark logo"></span>
            <span class="logo-sm"><img src="assets/img/logo/logo.png" alt="small logo"></span>
        </span>
    </a>

    <button class="button-close-fullsidebar">
        <i class="ri-close-line align-middle"></i>
    </button>

    <div data-simplebar>

        <ul class="side-nav">
            <li class="side-nav-title">THÔNG TIN CHUNG</li>
            <li class="side-nav-item @if (Request()->is('admin/dashboard')) active @endif">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="chart-pie"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title">Danh sách dịch vụ</li>

            <li class="side-nav-item">
                <a href="{{ route('admin.upgrate.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="circle-arrow-up"></i></span>
                    <span class="menu-text"> Nâng cấp tài khoản </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('admin.document.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="file-text"></i></span>
                    <span class="menu-text"> Văn bản, tài liệu </span>
                </a>
            </li>

            <li class="side-nav-title">Tài khoản</li>

            <li class="side-nav-item">
                <a href="" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="shopping-bag"></i></span>
                    <span class="menu-text"> Đơn hàng </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="history"></i></span>
                    <span class="menu-text"> Lịch sử thanh toán </span>
                </a>
            </li>


            <li class="side-nav-title">Hỗ trợ</li>

            <li class="side-nav-item">
                <a href="{{ route('admin.faq') }}" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="message-circle-question"></i></span>
                    <span class="menu-text"> Câu hỏi thường gặp </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="file-digit"></i></span>
                    <span class="menu-text"> Hướng dẫn sử dụng </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('admin.PaymentVNPAY') }}" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="scan-line"></i></span>
                    <span class="menu-text"> Hướng dẫn thanh toán </span>
                </a>
            </li>
        </ul>

        <div class="clearfix"></div>
    </div>
</div>
