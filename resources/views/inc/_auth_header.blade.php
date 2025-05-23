<div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
    <div class="d-flex align-items-center container p-0">
        <div
            class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9 border-0">
            <a href="/" class="page-logo-link press-scale-down d-flex align-items-center">
                <img src="/admin/img/logountirta.png" alt="{{ $profileApp->app_nama ?? '' }} WebApp"
                aria-roledescription="logo" style="height: 50px; width: auto;">
            </a>
        </div>
        {{ $slot }}
    </div>
</div>
