@extends('inc.main')
@section('title', 'General Error')
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader"></div>
        <div class="h-alt-hf d-flex flex-column align-items-center justify-content-center text-center">
            <div class="alert alert-danger bg-white pt-4 pr-5 pb-3 pl-5" id="demo-alert">
                <h1 class="fs-xxl fw-700 color-fusion-500 d-flex align-items-center justify-content-center m-0">
                    <img class="profile-image-sm rounded-circle bg-danger-700 mr-1 p-1" src="/admin/img/logo.png"
                        alt="SmartAdmin WebApp Logo">
                    <span class="color-danger-700">> To err is human; to forgive, divine.</span>
                </h1>
                <h3 class="fw-500 mb-0 mt-3">
                    You have experienced a technical error.
                </h3>
                <p class="container container-sm mb-0 mt-1">
                    Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day,
                    going forward, a new normal that has evolved from generation X.
                </p>
                <div class="mt-4">
                    <a href="#" class="btn btn-outline-default bg-fusion-800">
                        <span class="fw-700">Cancel</span>
                    </a>
                    <a href="#" class="btn btn-primary">
                        <span class="fw-700">Continue</span>
                    </a>
                </div>
            </div>
            <p class="fs-sm  mt-4 mb-0 text-muted container container-sm">
                Furthermore you can change the color of your error to 4 unique states,
                <a href="#" data-action="toggle-swap" data-class="alert alert-danger bg-white pt-4 pr-5 pb-3 pl-5"
                    data-target="#demo-alert">
                    <span><code>alert-danger</code></span>
                </a>,
                <a href="#" data-action="toggle-swap" data-class="alert alert-success pt-4 pr-5 pb-3 pl-5"
                    data-target="#demo-alert">
                    <span><code>alert-success</code></span>
                </a>,
                <a href="#" data-action="toggle-swap" data-class="alert alert-info pt-4 pr-5 pb-3 pl-5"
                    data-target="#demo-alert">
                    <span><code>alert-info</code></span>
                </a>, and
                <a href="#" data-action="toggle-swap" data-class="alert alert-warning pt-4 pr-5 pb-3 pl-5"
                    data-target="#demo-alert">
                    <span><code>alert-warning</code></span>
                </a>
            </p>
        </div>
    </main>
@endsection
