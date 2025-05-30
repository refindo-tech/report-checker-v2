<header class="page-header" role="banner">
    <!-- we need this logo when user switches to nav-function-top -->
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative"
            data-toggle="modal" data-target="#modal-shortcut">
            <img src="{{ isset($profileApp->app_logo) && $profileApp->app_logo ? asset($profileApp->app_logo) : asset('admin/img/logoTRB.png') }}"
                alt="{{ isset($profileApp->app_nama) && $profileApp->app_nama ? $profileApp->app_nama . ' WebApp' : 'Karoseri WebApp' }}"
                aria-roledescription="logo">
            <span class="page-logo-text mr-1">{{ $profileApp->app_nama ?? '' }}</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <!-- DOC: nav menu layout change shortcut -->
    <div class="hidden-md-down dropdown-icon-menu position-relative">
        <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden"
            title="Hide Navigation">
            <i class="ni ni-menu"></i>
        </a>
        <ul>
            <li>
                <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify"
                    title="Minify Navigation">
                    <i class="ni ni-minify-nav"></i>
                </a>
            </li>
            <li>
                <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed"
                    title="Lock Navigation">
                    <i class="ni ni-lock-nav"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- DOC: mobile button appears during mobile width -->
    <div class="hidden-lg-up">
        <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
            <i class="ni ni-menu"></i>
        </a>
    </div>
    <div class="search">
        <form class="app-forms hidden-xs-down" role="search" action="/page_search" autocomplete="off">
            <input type="text" id="search-field" placeholder="Search for anything" class="form-control"
                tabindex="1">
            <a href="#" onclick="return false;" class="btn-danger btn-search-close js-waves-off d-none"
                data-action="toggle" data-class="mobile-search-on">
                <i class="fal fa-times"></i>
            </a>
        </form>
    </div>
    <div class="ml-auto d-flex">
        <!-- activate app search icon (mobile) -->
        <div class="hidden-sm-up">
            <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on"
                data-focus="search-field" title="Search">
                <i class="fal fa-search"></i>
            </a>
        </div>

        @foreach (App\Helpers\Fitures::getFiturAktif() as $fiturView)
            @include($fiturView)
        @endforeach

        <div>
            <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com"
                class="header-icon d-flex align-items-center justify-content-center ml-2">
                @if (auth()->user()->image)
                    <img src="{{ asset('profile/' . auth()->user()->image) }}"
                        style="width: 30px; height: 30px;" class="profile-image rounded-circle"
                        alt="{{ auth()->user()->name }}">
                @else
                    <img src="/admin/img/users/user.jpg" class="profile-image rounded-circle"
                        alt="{{ auth()->user()->name }}">
                @endif
                <!--
                    you can also add username next to the avatar with the codes below:
                    <span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
                    <i class="ni ni-chevron-down hidden-xs-down"></i>
                -->
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                <a href="{{ route('profil_admin') }}" class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                    <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                        <span class="mr-2">
                            @if (auth()->user()->image)
                                <img src="{{ asset('profile/' . auth()->user()->image) }}"
                                    class="rounded-circle profile-image" alt="{{ auth()->user()->name }}">
                            @else
                                <img src="/admin/img/users/user.jpg" class="rounded-circle profile-image"
                                    alt="{{ auth()->user()->name }}">
                            @endif
                        </span>
                        <div class="info-card-text">
                            <div class="fs-lg text-truncate text-truncate-lg">{{ auth()->user()->name }}</div>
                            <span class="text-truncate text-truncate-md opacity-80">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider m-0"></div>
                @if (auth()->user()->getRoleNames()->first() == 'SuperAdmin')
                    <a href="#" class="dropdown-item" data-action="app-reset">
                        <span data-i18n="drpdwn.reset_layout">Reset Layout</span>
                    </a>
                    <a href="#" class="dropdown-item" data-action="app-fullscreen">
                        <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
                        <i class="float-right text-muted fw-n">F11</i>
                    </a>
                    <a href="#" class="dropdown-item" data-action="app-print">
                        <span data-i18n="drpdwn.print">Print</span>
                        <i class="float-right text-muted fw-n">Ctrl + P</i>
                    </a>
                    {{-- <div class="dropdown-multilevel dropdown-multilevel-left">
                        <div class="dropdown-item">
                            Language
                        </div>
                        <div class="dropdown-menu">
                            <a href="#?lang=fr" class="dropdown-item" data-action="lang" data-lang="fr">Français</a>
                            <a href="#?lang=en" class="dropdown-item active" data-action="lang"
                                data-lang="en">English (US)</a>
                            <a href="#?lang=es" class="dropdown-item" data-action="lang" data-lang="es">Español</a>
                            <a href="#?lang=ru" class="dropdown-item" data-action="lang" data-lang="ru">Русский
                                язык</a>
                            <a href="#?lang=jp" class="dropdown-item" data-action="lang" data-lang="jp">日本語</a>
                            <a href="#?lang=ch" class="dropdown-item" data-action="lang" data-lang="ch">中文</a>
                            <a href="#?lang=id" class="dropdown-item" data-action="lang" data-lang="id">Bahasa
                                Indonesia</a>
                        </div>
                    </div> --}}
                @endif
                @if (auth()->user()->getRoleNames()->first() !== 'SuperAdmin')
                    <div class="dropdown-divider m-0"></div>
                    <a href="#" class="dropdown-item" data-action="app-fullscreen">
                        <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
                        <i class="float-right text-muted fw-n">F11</i>
                    </a>
                    <div class="dropdown-divider m-0"></div>
                @endif
                <form id="logout-form" action="/logout" method="post">
                    @csrf
                    {{-- <button type="submit" id="logout" class="dropdown-item fw-500 pt-3 pb-3"
                        data-title="Konfirmasi" data-message="Apakah Anda yakin ingin logout?" title="Logout">Log
                        out</button> --}}
                    <button type="button" id="ya-atau-tidak" class="dropdown-item fw-500 pt-3 pb-3"
                        data-title="Konfirmasi" data-message="Apakah Anda yakin ingin logout?"
                        title="Logout">Keluar</button>
                </form>

            </div>
        </div>
    </div>
</header>
