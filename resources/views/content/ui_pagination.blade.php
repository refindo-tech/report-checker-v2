@extends('inc.main')
@section('title', 'Pagination')
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'UI Components'])
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-window'></i> Pagination
                <small>
                    Examples for showing pagination to indicate a series of related content exists across multiple pages.
                </small>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Basic <span class="fw-300"><i>example</i></span>
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
                                <p>We use a large block of connected links for our pagination, making links hard to miss and
                                    easily scalable—all while providing large hit areas. Pagination is built with list HTML
                                    elements so screen readers can announce the number of available links. Use a wrapping
                                    <code>&lt;nav&gt;</code> element to identify it as a navigation section to screen
                                    readers and other assistive technologies.
                                </p>
                                <p>In addition, as pages likely have more than one such navigation section, it’s advisable
                                    to provide a descriptive <code>aria-label</code> for the <code>&lt;nav&gt;</code> to
                                    reflect its purpose. For example, if the pagination component is used to navigate
                                    between a set of search results, an appropriate label could be
                                    <code>aria-label="Search results pages"</code>.</p>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div id="panel-2" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Different <span class="fw-300"><i>states</i></span>
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
                                <p>Pagination links are customizable for different circumstances. Use <code>.disabled</code>
                                    for links that appear un-clickable and <code>.active</code> to indicate the current
                                    page.</p>
                                <p>While the <code>.disabled</code> class uses <code>pointer-events: none</code> to
                                    <em>try</em> to disable the link functionality of <code>&lt;a&gt;</code>s, that CSS
                                    property is not yet standardized and doesn’t account for keyboard navigation. As such,
                                    you should always add <code>tabindex="-1"</code> on disabled links and use custom
                                    JavaScript to fully disable their functionality.
                                </p>
                            </div>
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">1</a>
                                    </li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                            <hr class="my-5">
                            <p>You can optionally swap out active or disabled anchors for <code>&lt;span&gt;</code>, or omit
                                the anchor in the case of the prev/next arrows, to remove click functionality and prevent
                                keyboard focus while retaining intended styles.</p>
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">1</a>
                                    </li>
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">
                                            2
                                            <span class="sr-only">(current)</span>
                                        </span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div id="panel-3" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Using <span class="fw-300"><i>icons</i></span>
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
                                Looking to use an icon or symbol in place of text for some pagination links? Be sure to
                                provide proper screen reader support with aria attributes.
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-lg-4">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true"><i class="fal fa-angle-left"></i></span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true"><i class="fal fa-angle-right"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-lg-4">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true"><i class="fal fa-hand-point-left"></i></span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true"><i
                                                            class="fal fa-hand-point-right"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-4" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Pagination <span class="fw-300"><i>sizing</i></span>
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
                                <p>Fancy larger or smaller pagination? Add <code>.pagination-lg</code> or
                                    <code>.pagination-sm</code> for additional sizes.
                                </p>
                            </div>
                            <h5 class="frame-heading">
                                Large
                            </h5>
                            <div class="frame-wrap">
                                <nav aria-label="...">
                                    <ul class="pagination pagination-lg">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true"><i class="fal fa-chevron-left"></i></span>
                                            </a>
                                        </li>
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">
                                                1
                                                <span class="sr-only">(current)</span>
                                            </span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true"><i class="fal fa-chevron-right"></i></span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <h5 class="frame-heading">
                                Default
                            </h5>
                            <div class="frame-wrap">
                                <nav aria-label="...">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true"><i class="fal fa-chevron-left"></i></span>
                                            </a>
                                        </li>
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">
                                                1
                                                <span class="sr-only">(current)</span>
                                            </span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true"><i class="fal fa-chevron-right"></i></span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <h5 class="frame-heading">
                                Small
                            </h5>
                            <div class="frame-wrap">
                                <nav aria-label="...">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true"><i class="fal fa-chevron-left"></i></span>
                                            </a>
                                        </li>
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">
                                                1
                                                <span class="sr-only">(current)</span>
                                            </span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true"><i class="fal fa-chevron-right"></i></span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <h5 class="frame-heading">
                                Extra Small
                            </h5>
                            <div class="frame-wrap">
                                <nav aria-label="...">
                                    <ul class="pagination pagination-xs">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true"><i class="fal fa-chevron-left"></i></span>
                                            </a>
                                        </li>
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">
                                                1
                                                <span class="sr-only">(current)</span>
                                            </span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true"><i class="fal fa-chevron-right"></i></span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-5" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Aligning <span class="fw-300"><i>pagination</i></span>
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
                                With left being default, you may change the alignment of pagination components with flexbox
                                utilities.
                            </div>
                            <h5 class="frame-heading">
                                Default
                            </h5>
                            <div class="frame-wrap">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"
                                                aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">
                                                1
                                                <span class="sr-only">(current)</span>
                                            </span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <h5 class="frame-heading text-center">
                                Center
                            </h5>
                            <div class="frame-wrap">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"
                                                aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">
                                                1
                                                <span class="sr-only">(current)</span>
                                            </span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <h5 class="frame-heading text-right">
                                Right
                            </h5>
                            <div class="frame-wrap">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"
                                                aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">
                                                1
                                                <span class="sr-only">(current)</span>
                                            </span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
