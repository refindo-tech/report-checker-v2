@extends('inc.main')
@section('title', 'Alerts')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'UI Components'])
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-window'></i> Alerts
                <small>
                    Provide contextual feedback messages for typical user actions with the handful of available and flexible
                    alert messages.
                </small>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-12 col-xl-6">
                <!--Basic alerts-->
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Basic <span class="fw-300"><i>Alerts</i></span>
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
                            <div class="demo-v-spacing">
                                <div class="alert alert-primary" role="alert">
                                    <strong>Heads up!</strong> This alert needs your attention, but it's not super
                                    important.
                                </div>
                                <div class="alert alert-success" role="alert">
                                    <strong>Well Done!</strong> You successfully read this important alert message.
                                </div>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Oh snap!</strong> Change a few things up and try submitting again.
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                                </div>
                                <div class="alert alert-info" role="alert">
                                    <strong>Info!</strong> Alert for passing information to user.
                                </div>
                                <div class="alert alert-secondary" role="alert">
                                    <strong>Hello World!</strong> This is default alert message box.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Dismissable Alerts-->
                <div id="panel-2" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Dismissable <span class="fw-300"><i>Alerts</i></span>
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
                            <div class="demo-v-spacing">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Heads up!</strong> This alert needs your attention, but it's not super
                                    important.
                                </div>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                    <strong>Well Done!</strong> You successfully read this important alert message.
                                </div>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-trash-alt"></i></span>
                                    </button>
                                    <strong>Oh snap!</strong> Change a few things up and try submitting again.
                                </div>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times-square"></i></span>
                                    </button>
                                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                                </div>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times-circle"></i></span>
                                    </button>
                                    <strong>Info!</strong> Alert for passing information to user.
                                </div>
                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-window-close"></i></span>
                                    </button>
                                    <strong>Hello World!</strong> This is default alert message box.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Large Alerts-->
                <div id="panel-3" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Large <span class="fw-300"><i>Alerts</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="demo-v-spacing">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon width-1">
                                            <i class="fal fa-sync fs-xl fa-spin"></i>
                                        </div>
                                        <div class="flex-1">
                                            <span class="h6 m-0 fw-700">Task 55% Complete</span>
                                            <div class="progress mt-1 progress-xs">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success-600"
                                                    role="progressbar" style="width: 55%" aria-valuenow="55"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert bg-success-500 alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon width-1">
                                            <i class="fal fa-check fs-xl"></i>
                                        </div>
                                        <div class="flex-1">
                                            <span class="h6 m-0 fw-700">Task 100% Complete</span>
                                            <div class="progress mt-1 progress-xs">
                                                <div class="progress-bar progress-bar-striped bg-warning-500"
                                                    role="progressbar" style="width: 100%" aria-valuenow="100"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert border-info bg-transparent text-info fade show" role="alert">
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon">
                                            <i class="fal fa-exclamation-triangle"></i>
                                        </div>
                                        <div class="flex-1">
                                            <span class="h5 m-0 fw-700">Compilation error occured! </span>
                                        </div>
                                        <button type="button" class="btn btn-info btn-pills btn-sm btn-w-m  mr-1">
                                            Repair
                                        </button>
                                        <button type="button" class="btn btn-danger btn-pills btn-sm btn-w-m"
                                            data-dismiss="alert" aria-label="Close">
                                            Dismiss
                                        </button>
                                    </div>
                                </div>
                                <div class="alert border-danger bg-transparent text-secondary fade show" role="alert">
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon">
                                            <span class="icon-stack icon-stack-md">
                                                <i class="base-7 icon-stack-3x color-danger-900"></i>
                                                <i class="fal fa-times icon-stack-1x text-white"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <span class="h5 color-danger-900">This branch is out-of-date with the base
                                                branch </span>
                                        </div>
                                        <a href="#" class="btn btn-outline-danger btn-sm btn-w-m">Report</a>
                                    </div>
                                </div>
                                <div class="alert border-faded bg-transparent text-secondary fade show" role="alert">
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon">
                                            <span class="icon-stack icon-stack-md">
                                                <i class="base-7 icon-stack-3x color-success-600"></i>
                                                <i class="fal fa-check icon-stack-1x text-white"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <span class="h5 color-success-600">All checks have passed!</span>
                                            <br>
                                            2 successful checks
                                        </div>
                                        <a href="#" class="btn btn-outline-success btn-sm btn-w-m">Review</a>
                                    </div>
                                </div>
                                <div class="alert bg-info-400 text-white fade show" role="alert">
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon">
                                            <i class="fal fa-info-circle"></i>
                                        </div>
                                        <div class="flex-1">
                                            <span class="h5">This branch is out-of-date with the base branch</span>
                                            <br>
                                            Some pipes failed during build.
                                        </div>
                                        <a href="#" class="btn btn-warning btn-pills btn-sm width-8">Fix</a>
                                    </div>
                                </div>
                                <div class="alert bg-fusion-400 border-0 fade show">
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon">
                                            <i class="fal fa-shield-check text-warning"></i>
                                        </div>
                                        <div class="flex-1">
                                            <span class="h5">Download complete</span>
                                            <br>
                                            Install the latest version of SmartAdmin WebApp
                                        </div>
                                        <a href="#" class="btn btn-warning btn-w-m fw-500 btn-sm"
                                            data-dismiss="alert" aria-label="Close">Install</a>
                                    </div>
                                </div>
                                <div class="alert bg-warning-500 alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon">
                                            <span class="icon-stack icon-stack-sm">
                                                <i class="base-7 icon-stack-3x color-fusion-200"></i>
                                                <i class="base-7 icon-stack-2x color-fusion-500"></i>
                                                <i class="ni ni-graph icon-stack-1x text-white"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <span class="h5">Large Icon Stack</span>
                                            <br>
                                            Custom alert background with <strong>large</strong> sized icon stack.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <!--Alert outline-->
                <div id="panel-4" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Alert <span class="fw-300"><i>Outline</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="demo-v-spacing">
                                <div class="alert border border-primary bg-transparent text-primary" role="alert">
                                    <strong>Heads up!</strong> This alert needs your attention, but it's not super
                                    important.
                                </div>
                                <div class="alert border-success bg-transparent text-success" role="alert">
                                    <strong>Well Done!</strong> You successfully read this important alert message.
                                </div>
                                <div class="alert border-danger bg-transparent text-danger" role="alert">
                                    <strong>Oh snap!</strong> Change a few things up and try submitting again.
                                </div>
                                <div class="alert border-warning bg-transparent color-warning-900" role="alert">
                                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                                </div>
                                <div class="alert border-info bg-transparent text-info" role="alert">
                                    <strong>Info!</strong> Alert for passing information to user.
                                </div>
                                <div class="alert border-secondary bg-transparent text-secondary" role="alert">
                                    <strong>Hello World!</strong> This is default alert message box.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Alternative Backgrounds-->
                <div id="panel-5" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Alternative <span class="fw-300"><i>Backgrounds</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="demo-v-spacing">
                                <div class="alert bg-info-500" role="alert">
                                    <strong>Info!</strong> Alert for passing information to user.
                                </div>
                                <div class="alert bg-primary-200 text-white" role="alert">
                                    <strong>Heads up!</strong> This alert needs your attention, but it's not super
                                    important.
                                </div>
                                <div class="alert bg-danger-400 text-white" role="alert">
                                    <strong>Oh snap!</strong> Change a few things up and try submitting again.
                                </div>
                                <div class="alert bg-fusion-200 text-white" role="alert">
                                    <strong>Hello World!</strong> This is default alert message box.
                                </div>
                                <div class="alert bg-warning-700 text-white" role="alert">
                                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                                </div>
                                <div class="alert bg-success-400 text-white" role="alert">
                                    <strong> Well Done!</strong> You successfully read this important alert message.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Stack Icon-->
                <div id="panel-6" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Stack <span class="fw-300"><i>Icon</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="demo-v-spacing">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon width-2">
                                            <span class="icon-stack" style="font-size: 22px;">
                                                <i class="base-2 icon-stack-3x color-primary-400"></i>
                                                <i class="base-10 text-white icon-stack-1x"></i>
                                                <i class="ni md-profile color-primary-800 icon-stack-2x"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <strong>Custom stack icon size! </strong>
                                            You can change the stack icon size with font-size style property.
                                        </div>
                                    </div>
                                </div>
                                <div class="alert border-primary bg-transparent text-primary alert-dismissible fade show"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon width-2">
                                            <span class="icon-stack" style="font-size: 22px;">
                                                <i class="base-2 icon-stack-3x color-primary-400"></i>
                                                <i class="base-10 text-white icon-stack-1x"></i>
                                                <i class="ni md-profile color-primary-800 icon-stack-2x"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <strong>Custom stack icon size! </strong>
                                            You can change the stack icon size with font-size style property.
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon width-3">
                                            <span class="icon-stack icon-stack-sm">
                                                <i class="base-2 icon-stack-3x color-success-600"></i>
                                                <i class="base-10 text-white icon-stack-1x"></i>
                                                <i class="ni md-profile color-success-800 icon-stack-2x"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <span class="h5 m-0 fw-700">Small Icon Stack!</span>
                                            Custom alert background with <strong>small</strong> sized icon stack.
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon">
                                            <span class="icon-stack icon-stack-md">
                                                <i class="base-2 icon-stack-3x color-info-400"></i>
                                                <i class="base-10 text-white icon-stack-1x"></i>
                                                <i class="ni md-profile color-info-800 icon-stack-2x"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <span class="h4">Medim Icon Stack</span>
                                            <br>
                                            Custom alert background with <strong>medium</strong> sized icon stack.
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-warning alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon width-6">
                                            <span class="icon-stack icon-stack-lg">
                                                <i class="base-2 icon-stack-3x color-warning-400"></i>
                                                <i class="base-10 text-white icon-stack-1x"></i>
                                                <i class="ni md-profile color-warning-800 icon-stack-2x"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <span class="h3">Large Icon Stack</span>
                                            <br>
                                            Custom alert background with <strong>large</strong> sized icon stack.
                                        </div>
                                    </div>
                                </div>
                                <div class="alert bg-danger-600 alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon width-8">
                                            <span class="icon-stack icon-stack-xl">
                                                <i class="base-2 icon-stack-3x color-danger-400"></i>
                                                <i class="base-10 text-white icon-stack-1x"></i>
                                                <i class="ni md-profile color-danger-800 icon-stack-2x"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1 pl-1">
                                            <span class="h2">
                                                Hold on there Sparky!
                                            </span>
                                            <br>
                                            Better fix those errors before you can complete this request
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <div class="alert-icon width-8">
                                            <span class="icon-stack icon-stack-xl">
                                                <i class="base-2 icon-stack-3x color-danger-400"></i>
                                                <i class="base-10 text-white icon-stack-1x"></i>
                                                <i class="ni md-profile color-danger-800 icon-stack-2x"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1 pl-1">
                                            <span class="h2">
                                                Hold on there Sparky!
                                            </span>
                                            <br>
                                            Better fix those errors before you can complete this request
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
