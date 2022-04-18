@php
    $userLogin = App\User::Where('id', Auth::id())->first();
@endphp
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo me-5" href="{{ route('admin.home') }}"><img
                src="{{ asset('/') }}images/logo.png" class="me-2" alt="logo" style="width: auto;" /></a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('admin.home') }}"><img
                src="{{ asset('/') }}images/logo-icon.png" alt="logo" style="height: auto;"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <h4 class="font-weight-bold mb-0 me-2">{{ $userLogin->name }}</h4>
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <img src="{{ asset('avatar_user/'.$userLogin->photo) }}" alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                    aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('logout1') }}">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="ti-view-list"></span>
        </button>
    </div>
</nav>
