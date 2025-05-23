@extends('inc.main')
@section('title', 'Light Gallery')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/miscellaneous/lightgallery/lightgallery.bundle.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'Miscellaneous'])
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-globe'></i> Light Gallery<sup class='badge badge-primary fw-500'>PREMIUM
                    ADDON</sup>
                <small>
                    blank description
                </small>
            </h1>
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
                        <p>LightGallery is a premium plugin, market value of $100, included as part of SmartAdmin WebApp,
                            meaning you do not need to purchase a separate license for LightGallery when using it with
                            SmartAdmin. This professional plugin is extreamly popular among the photographic community and
                            comes packed with tons of features and goodies.</p>
                        <p>
                            This particular version is catered especially for SmartAdmin, therefore making it unique for
                            your webapp. The plugin is 100% responsive, comes with many extensions, such as autoplay,
                            fullscreen, hash, pager, thumbnail, and zoom. To top it all off, we have integrated
                            jquery.mousehweel and justifiedGallery plugin for justified thumbnails and mousehweel controls.
                        </p>
                        <p class="m-0">
                            Find in-depth, guidelines, tutorials and more on LightGallery's <a
                                href="http://sachinchoolur.github.io/lightGallery/docs/" target="_blank">Official
                                Documentation</a>
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
                            Advanced <span class="fw-300"><i>Example</i></span>
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
                            <div id="js-lightgallery">
                                <a class="" href="/admin/img/demo/gallery/1.jpg"
                                    data-sub-html="The free in pointed they their for the so fame.">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/1.jpg" alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/2.jpg"
                                    data-sub-html="Sinking self-interest along four magazine he each specially rewritten">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/2.jpg" alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/3.jpg"
                                    data-sub-html="More and of are the of wonder, make written it checks, intrigued its the in.">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/3.jpg" alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/4.jpg"
                                    data-sub-html="And review, them. Turns second was enough those however the I wanting, written, above release unmoved would by slowly have peacefully">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/4.jpg" alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/5.jpg"
                                    data-sub-html="Was up the fresh candidates, concepts example">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/5.jpg" alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/6.jpg"
                                    data-sub-html="Few one what is him for team- little deceleration the the surely is well ran lifted">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/6.jpg" alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/7.jpg"
                                    data-sub-html="Concepts diet, personalities those life quietly every dressing epic in of men, presented. External their and music">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/7.jpg" alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/8.jpg"
                                    data-sub-html="Hunt, problems the on where your into so of which have he set he on instead, have shared of behind people">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/8.jpg" alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/9.jpg"
                                    data-sub-html="Him bread deep was meals we've amped rather it of some contact familiar this learn">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/9.jpg" alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/10.jpg"
                                    data-sub-html="And greatest lie as any as is and brown and tone as check to I o'clock time">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/10.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/11.jpg"
                                    data-sub-html="Ut horses support succeeding, one clear cheerful, on would">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/11.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/12.jpg"
                                    data-sub-html="harmonics, several from there character headline">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/12.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/13.jpg"
                                    data-sub-html="what effort initial each real the refinements. I have in here's will. ">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/13.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/14.jpg"
                                    data-sub-html="Neuter. Contribution his from to more because being the in design rather, concept both of.">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/14.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/15.jpg"
                                    data-sub-html="With to contact that had posterity in at and in to the entirely as so">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/15.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/16.jpg"
                                    data-sub-html="Convince let are officers, that sign up from this as the turner">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/16.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/17.jpg"
                                    data-sub-html="Contracts. Who up texts rung best not the rendering feel thought">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/17.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/18.jpg"
                                    data-sub-html="The diet, right far sign apart supplies was first look have I somehow eye times always are how even ">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/18.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/19.jpg"
                                    data-sub-html=" Little is always the to weary she and various">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/19.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/20.jpg"
                                    data-sub-html="wamples towards how eating elite. Him bread deep was meals we've amped rather it of some contact familiar">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/20.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/21.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/21.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/22.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/22.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/23.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/23.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/24.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/24.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/25.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/25.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/26.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/26.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/27.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/27.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/28.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/28.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/29.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/29.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/30.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/30.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/31.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/31.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/32.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/32.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/33.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/33.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/34.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/34.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/35.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/35.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/36.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/36.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/37.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/37.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/38.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/38.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/39.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/39.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/40.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/40.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/41.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/41.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/42.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/42.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/43.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/43.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/44.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/44.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/45.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/45.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/46.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/46.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/47.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/47.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/48.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/48.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/49.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/49.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/50.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/50.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/51.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/51.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/52.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/52.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/53.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/53.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/54.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/54.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/55.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/55.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/56.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/56.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/57.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/57.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/58.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/58.jpg"
                                        alt="image">
                                </a>
                                <a class="" href="/admin/img/demo/gallery/59.jpg">
                                    <img class="img-responsive" src="/admin/img/demo/gallery/thumb/59.jpg"
                                        alt="image">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('pages-script')
    {{--         <!-- lightgallery bundle:
	 DOC: we added justifiedGallery for responsive thumbnail view and mousewheel.js for controlling next/prev using mousewheel
		+ jquery.justifiedGallery.js (addon)
		+ jquery.mousewheel.js (addon)
		+ lightgallery.js (core)
		+ lg-autoplay.js (extension)
		+ lg-fullscreen.js (extension)
		+ lg-hash.js (extension)
		+ lg-pager.js (extension)
		+ lg-thumbnail.js (extension)
		+ lg-zoom.js (extension) --> --}}
    <script src="/admin/js/miscellaneous/lightgallery/lightgallery.bundle.js"></script>
    <script>
        $(document).ready(function() {
            var $initScope = $('#js-lightgallery');
            if ($initScope.length) {
                $initScope.justifiedGallery({
                    border: -1,
                    rowHeight: 150,
                    margins: 8,
                    waitThumbnailsLoad: true,
                    randomize: false,
                }).on('jg.complete', function() {
                    $initScope.lightGallery({
                        thumbnail: true,
                        animateThumb: true,
                        showThumbByDefault: true,
                    });
                });
            };
            $initScope.on('onAfterOpen.lg', function(event) {
                $('body').addClass("overflow-hidden");
            });
            $initScope.on('onCloseAfter.lg', function(event) {
                $('body').removeClass("overflow-hidden");
            });
        });
    </script>
@endsection
