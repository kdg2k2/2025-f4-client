<header class="app-topbar">
    <div class="page-container topbar-menu">
        <div class="d-flex align-items-center gap-2">

            <a href="{{ route('admin.dashboard') }}" class="logo">
                <span class="logo-light">
                    <span class="logo-lg"><img src="{{ config('app.logo-white') }}" alt="logo"></span>
                    <span class="logo-sm"><img src="{{ config('app.logo-white') }}" alt="small logo"></span>
                </span>

                <span class="logo-dark">
                    <span class="logo-lg"><img src="{{ config('app.logo') }}" alt="dark logo"></span>
                    <span class="logo-sm"><img src="{{ config('app.logo') }}" alt="small logo"></span>
                </span>
            </a>

            <button class="sidenav-toggle-button px-2">
                <i class="ri-menu-2-line fs-24"></i>
            </button>

            <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="ri-menu-2-line fs-24"></i>
            </button>
        </div>

        <div class="d-flex align-items-center gap-2">
            <div class="topbar-item d-sm-flex">
                <button class="topbar-link" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                    type="button">
                    <i data-lucide="settings" class="fs-22"></i>
                </button>
            </div>

            <div class="topbar-item d-sm-flex">
                <button class="topbar-link" id="light-dark-mode" type="button">
                    <i data-lucide="moon" class="light-mode-icon fs-22"></i>
                    <i data-lucide="sun" class="dark-mode-icon fs-22"></i>
                </button>
            </div>

            <div class="topbar-item nav-user">
                <div class="dropdown">
                    <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown"
                        data-bs-offset="0,25" type="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{auth()->user()->avatar ?? 'assets/img/logo/logo.png'}}"
                            width="32" height="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                        <span class="d-lg-flex flex-column gap-1 d-none">
                            <span class="fw-semibold">{{ auth()->user()->name }}</span>
                        </span>
                        <i class="ri-arrow-down-s-line d-none d-lg-block align-middle ms-2"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Xin chào !</h6>
                        </div>

                        <div class="border-bottom border-dashed"></div>
                        <a href="" class="dropdown-item">
                            <i data-lucide="circle-arrow-up" class="me-1 fs-16 align-middle"></i>
                            <span class="align-middle">Nâng cấp</span>
                        </a>

                        <div class="border-bottom border-dashed"></div>

                        <a href="" class="dropdown-item">
                            <i data-lucide="info" class="me-1 fs-16 align-middle"></i>
                            <span class="align-middle">Thông tin cá nhân</span>
                        </a>

                        <div class="border-bottom border-dashed"></div>
                        <a href="" class="dropdown-item">
                            <i data-lucide="user-cog" class="me-1 fs-16 align-middle"></i>
                            <span class="align-middle">Đổi mật khẩu</span>
                        </a>

                        <div class="border-bottom border-dashed"></div>
                        <a href="" class="dropdown-item fw-semibold text-danger">
                            <i data-lucide="log-out" class="me-1 fs-16 align-middle"></i>
                            <span class="align-middle">Thoát hệ thống</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
