@extends('inc.main')
@section('title', 'Licensing')
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'Documentation'])
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'book',
                'heading1' => 'Documentation:',
                'heading2' => 'Licensing',
                'pagedescription' => 'Product licenses explained',
            ])
            @endcomponent
        </div>
        <div class="card mb-g">
            <div class="card-body">
                <div class="alert alert-warning">
                    <span class="h5">Wrapbootstrap License</span>
                    <div class="row">
                        <div class="col-sm-12 col-md">
                            The licenses cannot be upgraded, however you may own more than one license types (for instance,
                            you may purchase the Single App. License for evaluation purpose and later purchase the Extended
                            licenses when your end-product is getting ready to be published).
                        </div>
                        <div class="col-auto mt-3 mt-sm-0">
                            <a href="http://support.wrapbootstrap.com/help/usage-licenses" class="btn btn-warning"
                                target="blank_">License Page</a>
                        </div>
                    </div>
                </div>
                <h3 class="fw-500">
                    Product usage licenses
                    <small>
                        Use of an item is bound by the license you purchase. A license grants you a non-exclusive and
                        non-transferable right to use and incorporate the item in your personal or commercial projects.
                    </small>
                </h3>
                <h4>Single Application License</h4>
                <ol class="mb-g">
                    <li>Your use of the item is restricted to a single installation.</li>
                    <li>You may use the item in work which you are creating for your own purposes or for your client.</li>
                    <li>You must not incorporate the item in a work which is created for redistribution or resale by you or
                        your client.</li>
                    <li>The item may not be redistributed or resold.</li>
                    <li>If the item contains licensed components, those components must only be used within the item and you
                        must not extract and use them on a stand-alone basis.</li>
                    <li>If the item was created using materials which are the subject of a GNU General Public License (GPL),
                        your use of the item is subject to the terms of the GPL in place of the foregoing conditions (to the
                        extent the GPL applies).</li>
                </ol>
                <h4>Extended License</h4>
                <p>This license must be purchased if you intend to license, sublicense, redistribute, or resell the final
                    product.</p>
                <ol class="mb-g">
                    <li>Your use of the item may extend to multiple installations.</li>
                    <li>You may use the item in work which you are creating for your own purposes or for your clients.</li>
                    <li>You may license, sublicense, redistribute, or resell the item in the following circumstances:
                        <ol>
                            <li>the item is incorporated into a larger work you have created; or</li>
                            <li>if you modify the item and resell the end product.</li>
                        </ol>
                    </li>
                    <li>If the item contains licensed components, those components must only be used within the item and you
                        must not extract and use them on a stand-alone basis.</li>
                    <li>If the item was created using materials which are the subject of a GNU General Public License (GPL),
                        your use of the item is subject to the terms of the GPL in place of the foregoing conditions (to the
                        extent the GPL applies).</li>
                </ol>
            </div>
        </div>
        <div class="card mb-g">
            <div class="card-body">
                <h3 class="fw-500">
                    FAQ
                    <small>
                        Freequently asked questions for license usage
                    </small>
                </h3>
                <div class="accordion" id="accordionExample">
                    <div class="mb-g">
                        <div class="card-header p-3 pl-4 bg-warning-300">
                            <a href="#" class="m-0 fw-500 h5 text-dark" data-toggle="collapse" data-target="#faq-1">
                                How do I upgrade or downgrade licenses once purchased?
                            </a>
                        </div>
                        <div id="faq-1" class="collapse show" data-parent="#accordionExample">
                            <div class="card-body bg-warning-50 pt-4 pr-4 pb-5 pl-4">
                                Currently there is no way to upgrade your license(s) on wrapbootstrap, however you may
                                purchase the Single Application License for an evaluation purpose and later obtain the
                                license you actually need before releasing your end product.
                            </div>
                        </div>
                        <div class="card-header p-3 pl-4 bg-warning-300">
                            <a href="#" class="m-0 fw-500 h5 text-dark" data-toggle="collapse" data-target="#faq-2">
                                I plan to make a SaaS based application where I would sell the users access/time to the end
                                product, which license type do I need?
                            </a>
                        </div>
                        <div id="faq-2" class="collapse" data-parent="#accordionExample">
                            <div class="card-body bg-warning-50 pt-4 pr-4 pb-5 pl-4">
                                If you modified the template and want to resell the end product, then the platform used for
                                it does not matter that much; in this case SaaS is used to sell the users access/time to the
                                product you created, so in essence you are reselling the product. For this purpose you would
                                need to obtain an extended license.
                            </div>
                        </div>
                        <div class="card-header p-3 pl-4 bg-warning-300">
                            <a href="#" class="m-0 fw-500 h5 text-dark" data-toggle="collapse" data-target="#faq-3">
                                I plan on creating an end product that can be accessed via github publicly, what license do
                                I need?
                            </a>
                        </div>
                        <div id="faq-3" class="collapse" data-parent="#accordionExample">
                            <div class="card-body bg-warning-50 pt-4 pr-4 pb-5 pl-4">
                                The source codes cannot be distributed publicly as is. If it does need to be distributed
                                among the development community a proper license must be purchased (Extended license), and
                                the codes needs to be suppressed enough so it is not distinguishable from the end product.
                            </div>
                        </div>
                        <div class="card-header p-3 pl-4 bg-warning-300">
                            <a href="#" class="m-0 fw-500 h5 text-dark" data-toggle="collapse" data-target="#faq-4">
                                I have multiple developers that will be using SmartAdmin, which license type is best suited?
                            </a>
                        </div>
                        <div id="faq-4" class="collapse" data-parent="#accordionExample">
                            <div class="card-body bg-warning-50 pt-4 pr-4 pb-5 pl-4">
                                You must purchase a single application license per machine or per developer that intend to
                                work on the application at the same time.
                            </div>
                        </div>
                        <div class="card-header p-3 pl-4 bg-warning-300">
                            <a href="#" class="m-0 fw-500 h5 text-dark" data-toggle="collapse" data-target="#faq-5">
                                Does the Extended license allow me to distribute or resell multiple end products?
                            </a>
                        </div>
                        <div id="faq-5" class="collapse" data-parent="#accordionExample">
                            <div class="card-body bg-warning-50 pt-4 pr-4 pb-5 pl-4">
                                No. You are allowed to create only 'one' end product for distribution or resell per Extended
                                License.
                            </div>
                        </div>
                        <div class="card-header p-3 pl-4 bg-warning-300">
                            <a href="#" class="m-0 fw-500 h5 text-dark" data-toggle="collapse" data-target="#faq-6">
                                Can I get audited for my proper license usage?
                            </a>
                        </div>
                        <div id="faq-6" class="collapse" data-parent="#accordionExample">
                            <div class="card-body bg-warning-50 pt-4 pr-4 pb-5 pl-4">
                                We will conduct audits if we have any reason to believe you are using incorrect license type
                                for your end-product. However, with that being said, we believe in the honor system and have
                                faith that everyone is using the correct license.
                            </div>
                        </div>
                        <div class="card-header p-3 pl-4 bg-warning-300">
                            <a href="#" class="m-0 fw-500 h5 text-dark" data-toggle="collapse" data-target="#faq-7">
                                I found SmartAdmin on a free website, do I still need to pay to use it?
                            </a>
                        </div>
                        <div id="faq-7" class="collapse" data-parent="#accordionExample">
                            <div class="card-body bg-warning-50 pt-4 pr-4 pb-5 pl-4">
                                Yes you will need to pay to use SmartAdmin. SmartAdmin is sold exclusively on
                                Wrapbootstrap.com; if you happen to find this item available on any other website, please
                                report it to us immideately so we can take proper action.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-g">
            <div class="card-body">
                <h3 class="fw-500 m-0">
                    Plugin licenses
                    <small class="m-0">
                        Use of an item is bound by the license you purchase. A license grants you a non-exclusive and
                        non-transferable right to use and incorporate the item in your personal or commercial projects. All
                        third party plugins used in SmartAdmin WebApp are MIT or Customized license (license catered for
                        redistrubtion with this theme). Please check the <a href="/info_app_docs">documentation
                            page</a> under plugins section for details about each plugin.
                    </small>
                </h3>
            </div>
        </div>
        <div class="card mb-g">
            <div class="card-body">
                <h3 class="fw-500 m-0">
                    Image licenses
                    <small class="m-0">
                        Some images used in this template are gathered from <a href="https://www.pexels.com"
                            target="_blank">pexels.com</a>, where images are free to use for personal and commercial
                        projects, attribution is not required. Giving credit to the photographer or Pexels is not necessary.
                        One or more images or video was purchased from <a href="photodune.net"
                            target="_blank">photodune.net</a> whereby we own the extended license for the image / video and
                        the rights to redistribute with SmartAdmin WebApp. All the images used in the gallery page was
                        gatherd from <a href="https://unsplash.com/license" target="_blank">unsplash.com</a>, whereby you
                        do not need to ask permission from or provide credit to the photographer or Unsplash.
                    </small>
                </h3>
            </div>
        </div>
        <div class="card mb-g">
            <div class="card-body">
                <h3 class="fw-500 m-0">
                    Other licenses
                    <small class="m-0">
                        There are other products that uses custom license structure, these products are binded to SmartAdmin
                        brand, and the licenses are applied based on the licenses you own for SmartAdmin WebApp. These
                        products are (but not limited to): Fontawesome 5 Pro, Light Gallery, AltEditor, and SmartPanels.
                    </small>
                </h3>
            </div>
        </div>
    </main>
@endsection
