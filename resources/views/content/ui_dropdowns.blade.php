@extends('inc.main')
@section('title', 'Dropdowns')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'UI Components'])
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-window'></i> Dropdowns
                <small>
                    Toggle contextual overlays for displaying lists of links and more with the Bootstrap dropdown plugin.
                </small>
            </h1>
        </div>
        <div class="alert alert-primary">
            <div class="d-flex flex-start w-100">
                <div class="mr-2 d-none d-sm-block">
                    <span class="icon-stack icon-stack-lg">
                        <i class="base base-6 icon-stack-3x opacity-100 color-primary-500"></i>
                        <i class="base base-10 icon-stack-2x opacity-100 color-primary-300 fa-flip-vertical"></i>
                        <i class="fal fa-info icon-stack-1x opacity-100 color-white"></i>
                    </span>
                </div>
                <div class="d-flex flex-fill">
                    <div class="flex-fill">
                        <span class="h5">Basic overview</span>
                        <br> Dropdowns are toggleable, contextual overlays for displaying lists of links and more. They’re
                        made interactive with the included Bootstrap dropdown JavaScript plugin. They’re toggled by
                        clicking, not by hovering; this is an intentional design decision. Dropdowns are built on a third
                        party library, Popper.js, which provides dynamic positioning and viewport detection.
                        <br>
                        <br>
                        Find more facts and uses at the bootstrap <a
                            href="https://getbootstrap.com/docs/4.5/components/dropdowns/" target="_blank">official
                            documentation</a>.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <!-- Kitchen Sink -->
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Kitchen <span class="fw-300"><i>Sink example</i></span>
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
                                A composition of all working elements
                            </div>
                            <div class="dropdown-menu d-block position-relative float-none"
                                style="width: 14rem; z-index: 2">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <span class="badge badge-success float-right ml-3">17</span>Action</a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <span class="badge badge-pill badge-primary float-right ml-3">29</span>Another
                                    action</a>
                                <a class="dropdown-item disabled" href="javascript:void(0)">Disabled link</a>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">Dropdown header</h6>
                                <a class="dropdown-item active" href="javascript:void(0)">
                                    <i class="ni ni-big-plus"></i> &nbsp;Has icon</a>
                                <div class="dropdown-multilevel">
                                    <div class="dropdown-item">
                                        Multilevel
                                    </div>
                                    <div class="dropdown-menu">
                                        <a href="javascript:void(0);" class="dropdown-item">Menu Item</a>
                                        <a href="javascript:void(0);" class="dropdown-item">Another Item</a>
                                        <a href="javascript:void(0);" class="dropdown-item disabled">Disabled</a>
                                        <div class="dropdown-multilevel">
                                            <div class="dropdown-item">
                                                Second Level
                                            </div>
                                            <div class="dropdown-menu">
                                                <a href="javascript:void(0);" class="dropdown-item">Menu Item</a>
                                                <a href="javascript:void(0);" class="dropdown-item">Another Item</a>
                                                <div class="dropdown-multilevel dropdown-multilevel-left">
                                                    <div class="dropdown-item">
                                                        Third Level
                                                    </div>
                                                    <div class="dropdown-menu">
                                                        <a href="javascript:void(0);" class="dropdown-item">Menu Item</a>
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item disabled">Disabled</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Links and buttons -->
                <div id="panel-2" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Links <span class="fw-300"><i>& buttons</i></span>
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
                            <div class="panel-tag">
                                Wrap the dropdown’s toggle (your button or link) and the dropdown menu within
                                <code>.dropdown</code>, or another element that declares <code>position: relative;</code>.
                                Dropdowns can be triggered from <code>&lt;a&gt;</code> or <code>&lt;button&gt;</code>
                                elements to better fit your potential needs.
                            </div>
                            <h5 class="frame-heading">
                                Button
                            </h5>
                            <div class="frame-wrap">
                                <div class="demo demo-h-spacing">
                                    <div class="btn-group">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown button
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info rounded-circle btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fal fa-plus"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger rounded-circle btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fal fa-plus"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-icon rounded"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fal fa-plus"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="frame-heading">
                                Link
                            </h5>
                            <div class="frame-wrap">
                                <div class="demo demo-h-spacing d-flex">
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Dropdown link
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-warning rounded-circle btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fal fa-plus"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-primary rounded-circle btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fal fa-plus"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-default btn-icon" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fal fa-plus"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dropdown buttons -->
                <div id="panel-3" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Dropdown <span class="fw-300"><i>buttons</i></span>
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
                            <h5 class="frame-heading">
                                Variations
                            </h5>
                            <div class="frame-wrap w-100">
                                <div class="demo">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Primary</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Success</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Info</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Warning</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Danger</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-dark dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Dark</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="frame-heading">
                                Split button
                            </h5>
                            <div class="frame-wrap w-100 mb-0">
                                <div class="demo">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Primary</button>
                                        <button type="button"
                                            class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success">Success</button>
                                        <button type="button"
                                            class="btn btn-success dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info">Info</button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning">Warning</button>
                                        <button type="button"
                                            class="btn btn-warning dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger">Danger</button>
                                        <button type="button"
                                            class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-dark">Dark</button>
                                        <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Multilevel -->
                <div id="panel-4" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Multilevel <span class="fw-300"><i>dropdown</i></span>
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
                            <div class="panel-tag">
                                Add multilevel menu by wrapping the child node selectors with
                                <code>.dropdown-multilevel</code>, change direction of by adding
                                <code>.dropdown-multilevel-left</code> (right by default)
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="ni ni-energy mr-1"></i> Multilevel default
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <div class="dropdown-multilevel">
                                        <div class="dropdown-item">
                                            Multilevel
                                        </div>
                                        <div class="dropdown-menu">
                                            <a href="javascript:void(0);" class="dropdown-item">First level</a>
                                            <div class="dropdown-multilevel">
                                                <div class="dropdown-item">
                                                    Second Level
                                                </div>
                                                <div class="dropdown-menu">
                                                    <a href="javascript:void(0);" class="dropdown-item">Level two</a>
                                                    <a href="javascript:void(0);" class="dropdown-item disabled">Disabled
                                                        menu</a>
                                                    <div class="dropdown-multilevel dropdown-multilevel-left">
                                                        <div class="dropdown-item">
                                                            Third Level (left)
                                                        </div>
                                                        <div class="dropdown-menu">
                                                            <a href="javascript:void(0);" class="dropdown-item">Menu
                                                                Item</a>
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item disabled">Disabled</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div id="panel-5" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Content <span class="fw-300"><i>types</i></span>
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
                            <div class="demo demo-no-mb">
                                <div class="btn-group">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Text
                                    </button>
                                    <div class="dropdown-menu p-4 text-muted"
                                        style="max-width: 200px; background-image: url(img/backgrounds/bg-4.png);">
                                        <p>
                                            Some example text that's free-flowing within the dropdown menu.
                                        </p>
                                        <p class="mb-0">
                                            And this is more example text.
                                        </p>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Forms
                                    </button>
                                    <div class="dropdown-menu dropdown-lg"
                                        style="background-image: url(img/backgrounds/bg-1.png);">
                                        <form class="p-4" novalidate="">
                                            <div class="form-group">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="email" id="username" class="form-control"
                                                    placeholder="your id or email" value="drlantern@gotbootstrap.com"
                                                    required="">
                                                <div class="invalid-feedback">No, you missed this one.</div>
                                                <div class="help-block">Your unique username to app</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" id="password" class="form-control"
                                                    placeholder="password" value="password123" required="">
                                                <div class="invalid-feedback">Sorry, you missed this one.</div>
                                                <div class="help-block">Your password</div>
                                            </div>
                                            <div class="form-group text-left">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="rememberme">
                                                    <label class="custom-control-label" for="rememberme"> Remember me for
                                                        the next 30 days</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-block">Sign in</button>
                                        </form>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">New around here? Sign up</a>
                                        <a class="dropdown-item" href="#">Forgot password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sizing -->
                <div id="panel-6" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Sizing <span class="fw-300"><i>dropdowns</i></span>
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
                            <div class="panel-tag">
                                Button dropdowns work with buttons of all sizes, including default and split dropdown
                                buttons
                            </div>
                            <div class="demo mb-2">
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Large button
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-lg btn-secondary">Large split button</button>
                                    <button type="button"
                                        class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>
                            <div class="demo mb-2">
                                <div class="btn-group">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Default size
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-secondary">Split button</button>
                                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>
                            <div class="demo mb-2">
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Small button
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-secondary">Small split button</button>
                                    <button type="button"
                                        class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>
                            <div class="demo mb-0">
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-xs dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Extra small
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-xs btn-secondary">Extra small</button>
                                    <button type="button"
                                        class="btn btn-xs btn-secondary dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <!-- No arrow -->
                <div id="panel-7" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            No <span class="fw-300"><i>arrow</i></span>
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
                            <div class="panel-tag">
                                Remove directional arrow from dropdown button by adding <code>.no-arrow</code> to
                                <code>.dropdown-toggle</code>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle no-arrow"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    No arrow
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="button">Action</button>
                                    <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Animated -->
                <div id="panel-8" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Animated <span class="fw-300"><i>dropdowns</i></span>
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
                            <div class="panel-tag">
                                Add animations to dropdowns by adding <code>.dropdown-menu-animated</code>,
                                <code>.fadeup</code>, <code>.fadedown</code>, <code>.faderight</code>,
                                <code>.fadeleft</code> to <code>.dropdown-menu</code>
                            </div>
                            <div class="demo">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle bg-trans-gradient"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Custom
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-animated">
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle bg-brand-gradient"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Fadeinup
                                    </button>
                                    <div class="dropdown-menu fadeinup">
                                        <h6 class="dropdown-header">Fade in from bottom</h6>
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle bg-brand-gradient"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Fadeindown
                                    </button>
                                    <div class="dropdown-menu fadeindown">
                                        <h6 class="dropdown-header">Fade in from top</h6>
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle bg-brand-gradient"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Fadeinright
                                    </button>
                                    <div class="dropdown-menu fadeinright">
                                        <h6 class="dropdown-header">Fade in from right</h6>
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle bg-brand-gradient"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Fadeinleft
                                    </button>
                                    <div class="dropdown-menu fadeinleft">
                                        <h6 class="dropdown-header">Fade in from left</h6>
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Directions -->
                <div id="panel-9" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Directional <span class="fw-300"><i>Arrows</i></span>
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
                            <div class="panel-tag">
                                Trigger dropdown menus above elements by adding <code>.dropup</code>,
                                <code>.dropright</code>, and <code>.dropleft</code> to the parent element.
                            </div>
                            <h5 class="frame-heading">
                                Dropup
                            </h5>
                            <div class="frame-wrap">
                                <div class="demo demo-no-mb">
                                    <div class="btn-group dropup">
                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropup
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group dropup">
                                        <button type="button" class="btn btn-secondary">
                                            Split dropup
                                        </button>
                                        <button type="button"
                                            class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="frame-heading">
                                Dropright
                            </h5>
                            <div class="frame-wrap">
                                <div class="demo demo-no-mb">
                                    <div class="btn-group dropright">
                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropright
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group dropright">
                                        <button type="button" class="btn btn-secondary">
                                            Split dropright
                                        </button>
                                        <button type="button"
                                            class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="frame-heading">
                                Dropleft
                            </h5>
                            <div class="frame-wrap">
                                <div class="demo demo-no-mb">
                                    <div class="btn-group dropleft">
                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropleft
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <div class="btn-group dropleft" role="group">
                                            <button type="button"
                                                class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropleft</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary">
                                            Split dropleft
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container -->
                <div id="panel-10" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Container <span class="fw-300"><i>examples</i></span>
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
                            <div class="panel-tag">
                                You can add any content to dropdown containers and change its width by adding the class
                                <code>.dropdown-sm</code>, <code>.dropdown-md</code>, <code>.dropdown-lg</code>, and
                                <code>.dropdown-xl</code>
                            </div>
                            <div class="demo">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        dropdown-sm
                                    </button>
                                    <div class="dropdown-menu dropdown-sm">
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else</button>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        dropdown-md
                                    </button>
                                    <div class="dropdown-menu dropdown-md">
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        dropdown-lg
                                    </button>
                                    <div class="dropdown-menu dropdown-lg">
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        dropdown-xl
                                    </button>
                                    <div class="dropdown-menu dropdown-xl">
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Headers -->
                <div id="panel-11" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Headers <span class="fw-300"><i>examples</i></span>
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
                            <div class="panel-tag">
                                Customize <code>.dropdown-header</code> using utility classes. Change <a href="#"
                                    target="_blank">backgrounds</a>, <a href="#" target="_blank">colors</a>, and
                                paddings using various <a href="#" target="_blank">helpers</a>
                            </div>
                            <div class="demo">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Custom header 1
                                    </button>
                                    <div class="dropdown-menu p-0">
                                        <div
                                            class="dropdown-header bg-trans-gradient d-flex flex-row px-4 py-4 rounded-top text-white">
                                            <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                                <span class="mr-2">
                                                    <img src="img/demo/avatars/avatar-admin.png"
                                                        class="rounded-circle profile-image" alt="Dr. Codex Lantern">
                                                </span>
                                                <div class="info-card-text">
                                                    <div class="fs-lg text-truncate text-truncate-lg">Dr. Codex Lantern
                                                    </div>
                                                    <span
                                                        class="text-truncate text-truncate-md opacity-80">drlantern@gotbootstrap.com</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else</button>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Custom header 2
                                    </button>
                                    <div class="dropdown-menu p-0">
                                        <div
                                            class="dropdown-header bg-brand-gradient d-flex flex-row px-4 py-4 rounded-top text-white">
                                            <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                                <span class="mr-2">
                                                    <img src="img/demo/avatars/avatar-admin.png"
                                                        class="rounded-circle profile-image" alt="Dr. Codex Lantern">
                                                </span>
                                                <div class="info-card-text">
                                                    <div class="fs-lg text-truncate text-truncate-lg">Dr. Codex Lantern
                                                    </div>
                                                    <span
                                                        class="text-truncate text-truncate-md opacity-80">drlantern@gotbootstrap.com</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else</button>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Custom header 3
                                    </button>
                                    <div class="dropdown-menu p-0">
                                        <div
                                            class="dropdown-header bg-danger-900 bg-info-gradient d-flex flex-row px-4 py-4 rounded-top text-white">
                                            <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                                <span class="mr-2">
                                                    <img src="img/demo/avatars/avatar-admin.png"
                                                        class="rounded-circle profile-image" alt="Dr. Codex Lantern">
                                                </span>
                                                <div class="info-card-text">
                                                    <div class="fs-lg text-truncate text-truncate-lg">Dr. Codex Lantern
                                                    </div>
                                                    <span
                                                        class="text-truncate text-truncate-md opacity-80">drlantern@gotbootstrap.com</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Alignment -->
                <div id="panel-12" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Menu <span class="fw-300"><i>alignment</i></span>
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
                            <div class="panel-tag">
                                By default, a dropdown menu is automatically positioned 100% from the top and along the left
                                side of its parent. Add <code>.dropdown-menu-right</code> to a <code>.dropdown-menu</code>
                                to right align the dropdown menu.
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Right-aligned menu
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button">Action</button>
                                    <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive alignment -->
                <div id="panel-13" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Responsive <span class="fw-300"><i>alignment</i></span>
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
                            <div class="panel-tag">
                                If you want to use responsive alignment, disable dynamic positioning by adding the
                                <code>data-display="static"</code> attribute and use the responsive variation classes. To
                                align left/right the dropdown menu with the given breakpoint or larger, add
                                <code>.dropdown-menu{-sm|-md|-lg|-xl}-right</code> or
                                <code>.dropdown-menu{-sm|-md|-lg|-xl}-left</code>
                            </div>
                            <h5 class="frame-heading">
                                Left-aligned but right aligned when large screen
                            </h5>
                            <div class="frame-wrap">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-toggle="dropdown" data-display="static" aria-haspopup="true"
                                        aria-expanded="false">
                                        Left aligned large screens
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-lg-right">
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                            </div>
                            <h5 class="frame-heading">
                                Right-aligned but left aligned when large screen
                            </h5>
                            <div class="frame-wrap mb-0">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-toggle="dropdown" data-display="static" aria-haspopup="true"
                                        aria-expanded="false">
                                        Right aligned large screens
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
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
