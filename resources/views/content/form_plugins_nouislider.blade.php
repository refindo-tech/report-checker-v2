@extends('inc.main')
@section('title', 'Nouislider')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/.../styles.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'Form Plugins'])
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-credit-card-front'></i> Nouislider<sup
                    class='badge badge-primary fw-500'>ADDON</sup>
                <small>
                    blank description
                </small>
            </h1>
            <div class="subheader-block">
                Right content of header
            </div>
        </div>
        <div class="alert alert-primary">
            <div class="d-flex flex-start w-100">
                <div class="mr-2 hidden-md-down">
                    <span class="icon-stack icon-stack-lg">
                        <i class="base base-6 icon-stack-3x opacity-100 color-primary-500"></i>
                        <i class="base base-10 icon-stack-2x opacity-100 color-primary-300 fa-flip-vertical"></i>
                        <i class="ni ni-blog-read icon-stack-1x opacity-100 color-white"></i>
                    </span>
                </div>
                <div class="d-flex flex-fill">
                    <div class="flex-fill">
                        <span class="h5">About</span>
                        <p>Points.</p>
                        <p class="m-0">
                            Find in-depth, guidelines, tutorials and more on Addon's <a href="#"
                                target="_blank">Official Documentation</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Panel <span class="fw-300"><i>Title</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10"
                                data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="panel-tag">
                                Panel tag <code>code</code>
                            </div>
                            Text
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
