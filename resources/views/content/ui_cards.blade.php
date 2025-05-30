@extends('inc.main')
@section('title', 'Cards')
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'UI Components'])
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-window'></i> Cards
                <small>
                    Cards provide a flexible and extensible content container with multiple variants and options.
                </small>
            </h1>
        </div>
        <div class="alert alert-primary alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fal fa-times"></i>
                </span>
            </button>
            <div class="d-flex flex-start w-100">
                <div class="mr-2 d-sm-none d-md-block">
                    <span class="icon-stack icon-stack-lg">
                        <i class="base base-6 icon-stack-3x opacity-100 color-primary-500"></i>
                        <i class="base base-10 icon-stack-2x opacity-100 color-primary-300 fa-flip-vertical"></i>
                        <i class="fal fa-info icon-stack-1x opacity-100 color-white"></i>
                    </span>
                </div>
                <div class="d-flex flex-fill">
                    <div class="flex-fill">
                        <span class="h5">About</span>
                        <p>Cards are built with as little markup and styles as possible, but still manage to deliver a ton
                            of control and customization. Built with flexbox, they offer easy alignment and mix well with
                            other Bootstrap components. They have no <code>margin</code> by default, so use spacing
                            utilities as needed. Although cards are a lightweight solution for 'widget' or 'panel', we
                            recommend you check out SmartAdmin's <a href="/ui_panels" title="Components Panels"
                                target="_blank">panels page</a> for further flexible and an alternative option.</p>
                        <p class="mb-0">While we displayed some examples of cards here, you can learn more details of its
                            usage at the official <a href="https://getbootstrap.com/docs/4.5/components/card/"
                                target="_blank">bootstrap documentation</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <!-- Kitchen sink example -->
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Kitchen <span class="fw-300"><i>sink example</i></span>
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
                                The most basic example of cards with enforced width
                            </div>
                            <div class="card border m-auto m-lg-0" style="max-width: 18rem;">
                                <img src="/admin/img/card-backgrounds/cover-3-lg.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Vestibulum at eros</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- List group -->
                <div id="panel-2" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            List <span class="fw-300"><i>group</i></span>
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
                                Create lists of content in a card with a flush list group.
                            </div>
                            <div class="card border  m-auto m-lg-0" style="width: 18rem;">
                                <div class="card-header">
                                    Featured
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Vestibulum at eros</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Quote -->
                <div id="panel-3" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Quote <span class="fw-300"><i>example</i></span>
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
                                Here we adjust <code>card-header</code> padding using provided <a href="#"
                                    title="utility classes">utility classes</a>
                            </div>
                            <div class="card m-auto border">
                                <div class="card-header py-2">
                                    <div class="card-title">
                                        Quote
                                    </div>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                                            ante.</p>
                                        <footer class="blockquote-footer">Someone famous in <cite
                                                title="Source Title">Source Title</cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header and footer -->
                <div id="panel-4" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Header <span class="fw-300"><i>and footer</i></span>
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
                                Add an optional header and/or footer within a card.
                            </div>
                            <div class="card m-auto border">
                                <div class="card-header">
                                    Featured
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                                <div class="card-footer text-muted py-2">
                                    2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Background & borders -->
                <div id="panel-5" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Background <span class="fw-300"><i>&amp; Borders</i></span>
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
                                <code>.card-header</code>, <code>.card-body</code>, and <code>.card-footer</code> background
                                cam be changed using <a href="utilities_color_pallet.html" target="_blank"
                                    title="BG Color Utility">color</a> and <a href="utilities_borders.html"
                                    target="_blank" title="border utilities">border</a> utilities
                            </div>
                            <!-- demo controls -->
                            <div class="mb-g">
                                <div class="row">
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="form-group">
                                            <label>Select target</label>
                                            <select class="js-bg-target custom-select">
                                                <option value="#cp-2 .card-header">card-header</option>
                                                <option value="#cp-2 .card-body">card-body</option>
                                                <option value="#cp-2 .card-footer">card-footer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="form-group">
                                            <label>Select background</label>
                                            <select class="js-bg-color custom-select"></select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-4">
                                        <div class="form-group">
                                            <label>Card border</label>
                                            <select class="js-border-color custom-select">
                                                <option value="border-primary">border-primary</option>
                                                <option value="border-secondary">border-secondary</option>
                                                <option value="border-info">border-info</option>
                                                <option value="border-danger">border-danger</option>
                                                <option value="border-warning">border-warning</option>
                                                <option value="border-success">border-success</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="cp-2" class="card border">
                                <div class="card-header bg-info-600">
                                    Different colors
                                </div>
                                <div class="card-body p-0 bg-info-300">
                                    <div class="custom-scroll" style="height: 160px">
                                        <div class="px-4 py-3">
                                            <div class="fs-xl fw-500 mb-3">
                                                He system office. Of to wonder, windshield to seven. Whenever
                                                <div class="fs-nano fw-300">SATURDAY, 27TH JANUARY 2018 15 minutes ago.
                                                </div>
                                            </div>
                                            <div class="fs-lg mb-3">Of totally to issues for to the decelerate city, the at
                                                how discharge than like…. It history; Their letters, away, the and stupid
                                                employees, divine them his a only live lobby, little regretting conduct,
                                                know out testimony the latest even and systematic be service, name of every
                                                accept bits turned.</div>
                                            In the a soon in facilitate reflections, he more had from preceding think the
                                            lay low the where initial feedback dropped at be its to in little instruments,
                                            of himself found phase they poverty disappointment is her and to thought, that
                                            the by is really chime in the of we sovereignty. On which, office. The that he
                                            each been ago she from these is name much phase. Counter-productive towards far
                                            and transmitting offers in of the with between was and over since failing.
                                            Slowly cheating far with gone in, irregular refute. No success six way
                                            differences authentic destined pass pouring.
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-info-800 py-2">
                                    2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <!-- Collapse -->
                <div id="panel-6" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Collapse <span class="fw-300"><i>example</i></span>
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
                                Utilizing bootstrap's collapse component with <code>.card</code>
                            </div>
                            <div id="cp-1" class="card border">
                                <div class="card-header">
                                    <button class="btn btn-sm btn-default" data-toggle="collapse"
                                        data-target="#cp-1 > .card-body" aria-expanded="true">
                                        <span class="collapsed-hidden">Expand</span>
                                        <span class="collapsed-reveal">Collapse</span>
                                    </button>
                                </div>
                                <div class="card-body p-0 show">
                                    <!-- notice we place the padding inside another div and remove the padding from the card body -->
                                    <div class="p-4">
                                        <p class="card-text">With supporting text below as a natural lead-in to additional
                                            content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation tabs -->
                <div id="panel-7" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Navigation <span class="fw-300"><i>tabs</i></span>
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
                                Add some navigation to a card’s header (or block) with built-in nav components.
                            </div>
                            <div class="card border">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link disabled" href="#" tabindex="-1"
                                                aria-disabled="true">Disabled</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation pills -->
                <div id="panel-8" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Navigation <span class="fw-300"><i>pills</i></span>
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
                                Add some navigation to a card’s header (or block) with built-in nav components.
                            </div>
                            <div class="card border">
                                <div class="card-header">
                                    <ul class="nav nav-pills card-header-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link disabled" href="#" tabindex="-1"
                                                aria-disabled="true">Disabled</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header options -->
                <div id="panel-9" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Header <span class="fw-300"><i>Options</i></span>
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
                                Display of some example optional "stuff" you can add to <code>.card-header</code>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card border mb-g">
                                        <!-- notice the additions of utility paddings and display properties on .card-header -->
                                        <div class="card-header bg-fusion-500 pr-3 d-flex align-items-center flex-wrap">
                                            <!-- we wrap header title inside a span tag with utility padding -->
                                            <div class="card-title">Dropdowns</div>
                                            <button class="btn btn-icon btn-xs btn-danger ml-auto fs-xl"
                                                data-toggle="dropdown">
                                                <i class="fal fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                                                <button class="dropdown-item">
                                                    Option 1
                                                </button>
                                                <button class="dropdown-item">
                                                    Option 2
                                                </button>
                                                <div class="dropdown-divider m-0"></div>
                                                <button class="dropdown-item">
                                                    Refresh
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                additional content.</p>
                                        </div>
                                    </div>
                                    <div class="card border mb-4 mb-xl-0">
                                        <!-- notice the additions of utility paddings and display properties on .card-header -->
                                        <div
                                            class="card-header bg-trans-gradient py-2 pr-2 d-flex align-items-center flex-wrap">
                                            <!-- we wrap header title inside a span tag with utility padding -->
                                            <div class="card-title text-white">Input</div>
                                            <div class="d-flex position-relative ml-auto" style="max-width: 10rem;">
                                                <i
                                                    class="fal fa-search position-absolute pos-left fs-lg px-3 py-2 mt-1"></i>
                                                <input type="text" class="form-control bg-subtlelight pl-6"
                                                    placeholder="Search">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                additional content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card border mb-g">
                                        <!-- notice the additions of utility paddings and display properties on .card-header -->
                                        <div class="card-header bg-danger-700 pr-3 d-flex align-items-center flex-wrap">
                                            <!-- we wrap header title inside a div tag with utility padding -->
                                            <div class="card-title">Buttons</div>
                                            <button class="btn btn-xs btn-info ml-auto">
                                                Add new
                                            </button>
                                            <button class="btn btn-xs btn-icon width-1 fs-xl btn-success ml-1">
                                                <i class="fal fa-arrow-down"></i>
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                additional content.</p>
                                        </div>
                                    </div>
                                    <div class="card border mb-0">
                                        <!-- notice the additions of utility paddings and display properties on .card-header -->
                                        <div class="card-header bg-success-500 d-flex pr-2 align-items-center flex-wrap">
                                            <!-- we wrap header title inside a span tag with utility padding -->
                                            <div class="card-title">Checkbox</div>
                                            <div class="custom-control d-flex custom-switch ml-auto">
                                                <input id="demo-switch" type="checkbox" class="custom-control-input"
                                                    checked="checked">
                                                <label class="custom-control-label fw-500" for="demo-switch"></label>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                additional content.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card group -->
                <div id="panel-10" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Card <span class="fw-300"><i>Group</i></span>
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
                                Use card groups to render cards as a single, attached element with equal width and height
                                columns. Card groups use <code>display: flex;</code> to achieve their uniform sizing.
                            </div>
                            <div class="card-group">
                                <div class="card">
                                    <div class="w-100 bg-fusion-50 rounded-top border-top-right-radius-0"
                                        style="padding:40px 0 40px;"></div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This card has supporting text below as a natural lead-in to
                                            additional content.</p>
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="w-100 bg-fusion-50" style="padding:40px 0 40px;"></div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This card has supporting text below as a natural lead-in to
                                            additional content.</p>
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="w-100 bg-fusion-50 rounded-top border-top-left-radius-0 "
                                        style="padding:40px 0 40px;"></div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This card has supporting text below as a natural lead-in to
                                            additional content.</p>
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card decks -->
                <div id="panel-11" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Card <span class="fw-300"><i>Decks</i></span>
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
                                Need a set of equal width and height cards that aren’t attached to one another? Use card
                                decks.
                            </div>
                            <div class="card-deck">
                                <div class="card">
                                    <div class="w-100 bg-fusion-50 rounded-top" style="padding:40px 0 40px;"></div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in to additional content.</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="w-100 bg-fusion-50 rounded-top" style="padding:40px 0 40px;"></div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This card has supporting text below as a natural lead-in to
                                            additional content.</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="w-100 bg-fusion-50 rounded-top" style="padding:40px 0 40px;"></div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in to additional content.</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-12" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Card <span class="fw-300"><i>Columns</i></span>
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
                                Cards can be organized into <a href="https://masonry.desandro.com/"
                                    target="_blank">Masonry</a>-like columns with just CSS by wrapping them in
                                <code>.card-columns</code>. Cards are built with CSS <code>column</code> properties instead
                                of flexbox for easier alignment. Cards are ordered from top to bottom and left to right.
                            </div>
                            <div class="alert alert-warning">
                                <strong>Heads up!</strong> Your mileage with card columns may vary. To prevent cards
                                breaking across columns, we must set them to <code>display: inline-block</code> as
                                <code>column-break-inside: avoid</code> isn’t a bulletproof solution yet.
                            </div>
                            <div class="card-columns">
                                <div class="card">
                                    <div class="w-100 bg-fusion-300" style="padding:40px 0 40px;"></div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title that wraps to a new line</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                                <div class="card p-3">
                                    <blockquote class="blockquote mb-0 card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                                            ante.</p>
                                        <footer class="blockquote-footer">
                                            <small class="text-muted">
                                                Someone famous in <cite title="Source Title">Source Title</cite>
                                            </small>
                                        </footer>
                                    </blockquote>
                                </div>
                                <div class="card">
                                    <div class="w-100 bg-fusion-300" style="padding:40px 0 40px;"></div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This card has supporting text below as a natural lead-in to
                                            additional content.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                                <div class="card bg-primary text-white text-center p-3">
                                    <blockquote class="blockquote mb-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.
                                        </p>
                                        <footer class="blockquote-footer text-white">
                                            <small>
                                                Someone famous in <cite title="Source Title">Source Title</cite>
                                            </small>
                                        </footer>
                                    </blockquote>
                                </div>
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This card has a regular title and short paragraphy of text
                                            below it.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="w-100 bg-fusion-300" style="padding:40px 0 40px;"></div>
                                </div>
                                <div class="card p-3 text-right">
                                    <blockquote class="blockquote mb-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                                            ante.</p>
                                        <footer class="blockquote-footer">
                                            <small class="text-muted">
                                                Someone famous in <cite title="Source Title">Source Title</cite>
                                            </small>
                                        </footer>
                                    </blockquote>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is another card with title and supporting text below.
                                            This card has some additional content to make it slightly taller overall.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
@section('pages-script')
    <script>
        /* infinite nav pills */
        $('#js-nav-pills-menu').menuSlider({
            element: $('#js-nav-pills-menu'),
            wrapperId: 'test-nav'
        });


        var ng_bgColors,
            ng_bgColors_URL = "/admin/media/data/ng-bg-colors.json",
            formatBgColors = [];

        $.when(
            $.getJSON(ng_bgColors_URL, function(data) {
                ng_bgColors = data;
            })
        ).then(function() {
            if (ng_bgColors) {

                formatBgColors.push($('<option></option>').attr("value", null).text("select background"));

                //formatTextColors
                jQuery.each(ng_bgColors, function(index, item) {
                    formatBgColors.push($('<option></option>').attr("value", item).addClass(item).text(
                        item))
                });

                $("select.js-bg-color").empty().append(formatBgColors);

            } else {
                console.log("somethign went wrong!")
            }
        });

        /* change background */
        $(document).on('change', '.js-bg-color', function() {
            var setBgColor = $('select.js-bg-color').val();
            var setValue = $('select.js-bg-target').val();

            $('select.js-bg-color').removeClassPrefix('bg-').addClass(setBgColor);
            $(setValue).removeClassPrefix('bg-').addClass(setBgColor);
        })

        /* change border */
        $(document).on('change', '.js-border-color', function() {
            var setBorderColor = $('select.js-border-color').val();
            $("#cp-2").removeClassPrefix('border-').addClass(setBorderColor);
            $('select.js-border-color').removeClassPrefix('border-').addClass(setBorderColor);
        })

        /* change target */
        $(document).on('change', '.js-bg-target', function() {
            //reset color selection
            $('select.js-bg-color').prop('selectedIndex', 0).removeClassPrefix('bg-');
        })
    </script>
@endsection
