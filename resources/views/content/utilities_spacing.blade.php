@extends('inc.main')
@section('title', 'Spacing')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'Utilities'])
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'bolt',
                'heading1' => 'Spacing',
            ])
                @slot('pagedescription')
                    Bootstrap includes a wide range of shorthand responsive margin and padding utility classes to modify an
                    element’s appearance.
                @endslot
            @endcomponent

        </div>
        <div class="alert alert-primary">
            <div class="d-flex flex-start w-100">
                <div class="mr-2 hidden-md-down">
                    <span class="icon-stack icon-stack-lg">
                        <i class="base base-6 icon-stack-3x opacity-100 color-primary-500"></i>
                        <i class="base base-10 icon-stack-2x opacity-100 color-primary-300 fa-flip-vertical"></i>
                        <i class="fal fa-shekel-sign icon-stack-1x opacity-100 color-white"></i>
                    </span>
                </div>
                <div class="d-flex flex-fill">
                    <div class="flex-fill">
                        <span class="h5">How it works</span>
                        <p>Assign responsive-friendly <code>margin</code> or <code>padding</code> values to an element or a
                            subset of its sides with shorthand classes. Includes support for individual properties, all
                            properties, and vertical and horizontal properties. Classes are built from a default Sass map
                            ranging from <code>.25rem</code> to <code>3rem</code>.</p>
                        <p>
                            We have further added quick margin and padding options for by using gutter space variable
                            <code>.m-g</code>, margin bottom gutter <code>.mb-g</code>. Padding gutter can be adding by
                            using <code>.p-g</code> modifier. The <code>*-g</code> will change based on the gutter variable.
                        </p>
                        Learn more about this component on bootstrap's
                        <a href="https://getbootstrap.com/docs/4.5/utilities/spacing/" target="_blank">official
                            documentation</a> also on this <a href="https://codepen.io/nextgenadmin/pen/VRExxJ"
                            target="_blank">codepen example</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Default <span class="fw-300"><i>Panel</i></span>
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
                                <p>Spacing utilities that apply to all breakpoints, from <code>xs</code> to <code>xl</code>,
                                    have no breakpoint abbreviation in them. This is because those classes are applied from
                                    <code>min-width: 0</code> and up, and thus are not bound by a media query. The remaining
                                    breakpoints, however, do include a breakpoint abbreviation.
                                </p>
                                <p>The classes are named using the format <code>{property}{sides}-{size}</code> for
                                    <code>xs</code> and <code>{property}{sides}-{breakpoint}-{size}</code> for
                                    <code>sm</code>, <code>md</code>, <code>lg</code>, and <code>xl</code>.
                                </p>
                            </div>
                            <p>Where <em>property</em> is one of:</p>
                            <ul class="list-spaced">
                                <li><code>t</code> - for classes that set <code>margin-top</code> or
                                    <code>padding-top</code>
                                </li>
                                <li><code>b</code> - for classes that set <code>margin-bottom</code> or
                                    <code>padding-bottom</code>
                                </li>
                                <li><code>l</code> - for classes that set <code>margin-left</code> or
                                    <code>padding-left</code>
                                </li>
                                <li><code>r</code> - for classes that set <code>margin-right</code> or
                                    <code>padding-right</code>
                                </li>
                                <li><code>x</code> - for classes that set both <code>*-left</code> and <code>*-right</code>
                                </li>
                                <li><code>y</code> - for classes that set both <code>*-top</code> and <code>*-bottom</code>
                                </li>
                                <li>blank - for classes that set a <code>margin</code> or <code>padding</code> on all 4
                                    sides of the element</li>
                            </ul>
                            <p>Where <em>size</em> is one of:</p>
                            <ul class="list-spaced">
                                <li><code>0</code> - for classes that eliminate the <code>margin</code> or
                                    <code>padding</code> by setting it to <code>0</code>
                                </li>
                                <li><code>1</code> - (by default) for classes that set the <code>margin</code> or
                                    <code>padding</code> to <code>$spacer * .25</code>
                                </li>
                                <li><code>2</code> - (by default) for classes that set the <code>margin</code> or
                                    <code>padding</code> to <code>$spacer * .5</code>
                                </li>
                                <li><code>3</code> - (by default) for classes that set the <code>margin</code> or
                                    <code>padding</code> to <code>$spacer</code>
                                </li>
                                <li><code>4</code> - (by default) for classes that set the <code>margin</code> or
                                    <code>padding</code> to <code>$spacer * 1.5</code>
                                </li>
                                <li><code>5</code> - (by default) for classes that set the <code>margin</code> or
                                    <code>padding</code> to <code>$spacer * 2</code>
                                </li>
                                <li><code>6</code> - (by default) for classes that set the <code>margin</code> or
                                    <code>padding</code> to <code>$spacer * 2.5</code>
                                </li>
                                <li><code>auto</code> - for classes that set the <code>margin</code> to auto</li>
                            </ul>
                            <p>
                                Example padding:
                            </p>
                            <div class="demo">
                                <div class="p-2 p-sm-3 p-md-4 p-lg-5 p-xl-6 bg-danger-50 pattern-2">
                                    <div class="bg-success-600 pattern-1 pl-2">.p-2 .p-sm-3 .p-md-4 .p-lg-5 .p-xl-6</div>
                                </div>
                                <div class="p-1 p-sm-2 p-md-3 p-lg-4 p-xl-5 bg-danger-50 pattern-2">
                                    <div class="bg-success-600 pattern-1 pl-2">.p-1 .p-sm-2 .p-md-3 .p-lg-4 .p-xl-5</div>
                                </div>
                                <div class="p-0 p-sm-1 p-md-2 p-lg-3 p-xl-4 bg-danger-50 pattern-2">
                                    <div class="bg-success-600 pattern-1 pl-2">.p-0 .p-sm-1 .p-md-2 .p-lg-3 .p-xl-4</div>
                                </div>
                                <div class="p-3 p-sm-0 p-md-1 p-lg-2 p-xl-3 bg-danger-50 pattern-2">
                                    <div class="bg-success-600 pattern-1 pl-2">.p-1 .p-sm-0 .p-md-1 .p-lg-2 .p-xl-3</div>
                                </div>
                                <div class="p-4 p-sm-4 p-md-0 p-lg-1 p-xl-2 bg-danger-50 pattern-2">
                                    <div class="bg-success-600 pattern-1 pl-2">.p-4 .p-sm-4 .p-md-0 .p-lg-1 .p-xl-2</div>
                                </div>
                                <div class="p-5 p-sm-6 p-md-3 p-lg-0 p-xl-1 bg-danger-50 pattern-2">
                                    <div class="bg-success-600 pattern-1 pl-2">.p-5 .p-sm-6 .p-md-3 .p-lg-0 .p-xl-1</div>
                                </div>
                                <div class="p-6 p-sm-5 p-md-5 p-lg-6 p-xl-0 bg-danger-50 pattern-2">
                                    <div class="bg-success-600 pattern-1 pl-2">.p-6 .p-sm-5 .p-md-5 .p-lg-6 .p-xl-0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-2a" class="panel">
                    <div class="panel-hdr">
                        <h2 data-filter-tags="child hover">
                            Horizontal <span class="fw-300"><i>centering</i></span>
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
                                <p>Additionally, Bootstrap also includes an <code>.mx-auto</code> class for horizontally
                                    centering fixed-width block level content—that is, content that has <code>display:
                                        block</code> and a <code>width</code> set—by setting the horizontal margins to
                                    <code>auto</code>.
                                </p>
                            </div>
                            <div class="w-100 bg-danger-50 pattern-2 p-3">
                                <div class="mx-auto p-2 bg-info-500 pattern-1 shadow" style="width:200px">
                                    Centered element
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-3" class="panel">
                    <div class="panel-hdr">
                        <h2 data-filter-tags="child hover">
                            Negative <span class="fw-300"><i>margin</i></span>
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
                                The syntax is nearly the same as the default, positive margin utilities, but with the
                                addition of <code>n</code> before the requested size.
                            </div>
                            <p>
                                Here’s an example of customizing the Bootstrap grid at the medium (<code>md</code>)
                                breakpoint and above. We’ve increased the <code>.col</code> padding with
                                <code>.px-md-5</code> and then counteracted that with <code>.mx-md-n5</code> on the parent
                                <code>.row</code>.
                            </p>
                            <div class="row mx-md-n5">
                                <div class="col px-md-5">
                                    <div class="p-3 border bg-light">Custom column padding</div>
                                </div>
                                <div class="col px-md-5">
                                    <div class="p-3 border bg-light">Custom column padding</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-2" class="panel">
                    <div class="panel-hdr">
                        <h2 data-filter-tags="child hover">
                            Margin <span class="fw-300"><i>examples</i></span>
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
                                Margin specific viewports example
                                <div class="row mt-1 text-dark">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-lg-2">
                                        *-xs-* &lt;576px
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-lg-2">
                                        *-sm-* ≥576px
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-lg-2">
                                        *-md-* ≥768px
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-lg-2">
                                        *-lg-* ≥992px
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-lg-2">
                                        *-xl-* ≥1200px
                                    </div>
                                </div>
                            </div>
                            <div class="demo">
                                <div class="row bg-danger-50 pattern-2">
                                    <div class="col bg-info text-white ml-1 ml-sm-2 ml-md-3 ml-lg-4 ml-xl-5 pattern-1">
                                        .ml-1 .ml-sm-2 .ml-md-3 .ml-lg-4 .ml-xl-5
                                    </div>
                                </div>
                                <div class="row bg-danger-50 pattern-2">
                                    <div class="col bg-info text-white mx-xs-1 mx-sm-2 mx-md-3 mx-lg-4 mx-xl-5 pattern-1">
                                        .mx-1 .mx-sm-2 .mx-md-3 .mx-lg-4 .mx-xl-5
                                    </div>
                                </div>
                                <div class="row bg-danger-50 pattern-2">
                                    <div class="col bg-info text-white my-1 my-sm-2 my-md-3 my-lg-4 my-xl-5 pattern-1">
                                        .my-1 .my-sm-2 .my-md-3 .my-lg-4 .my-xl-5
                                    </div>
                                </div>
                                <div class="row bg-danger-50 pattern-2">
                                    <div class="col bg-info text-white m-1 m-sm-2 m-md-3 m-lg-4 m-xl-5 pattern-1">
                                        .m-1 .m-sm-2 .m-md-3 .m-lg-4 .m-xl-5
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
