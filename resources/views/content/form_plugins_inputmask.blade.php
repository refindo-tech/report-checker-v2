@extends('inc.main')
@section('title', 'Input Mask')
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'Form Plugins'])
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-credit-card-front'></i> Input Mask<sup
                    class='badge badge-primary fw-500'>ADDON</sup>
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
                        <p>Inputmask is a javascript library which creates an input mask. Inputmask can run against vanilla
                            javascript, jQuery and jqlite. An inputmask helps the user with the input by ensuring a
                            predefined format. This can be useful for dates, numerics, phone numbers. It also easy to use
                            and understand, possibility to define aliases which hide complexity, non-greedy masks, regex and
                            dynamic masks.</p>
                        <p class="m-0">
                            Find in-depth, guidelines, tutorials and more on InputMask's <a
                                href="https://github.com/RobinHerbots/Inputmask" target="_blank">Official Documentation</a>
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
                            Masks <span class="fw-300"><i>Example</i></span>
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
                                Input masks can be used to force the user to enter data conform a specific format. Unlike
                                validation, the user can't enter any other key than the ones specified by the mask
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-20">
                                        <form action="#">
                                            <div class="form-group">
                                                <label class="form-label">ISBN</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fal fa-scanner-touchscreen width-1 text-align-center"></i></span>
                                                    </div>
                                                    <input type="text" placeholder=""
                                                        data-inputmask="'mask': '999-99-999-9999-9'" class="form-control">
                                                </div>
                                                <span class="help-block">e.g "999-99-999-9999-9"</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">URL</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fal fa-desktop width-1 text-align-center"></i></span>
                                                    </div>
                                                    <input type="text" placeholder="" data-inputmask="'alias': 'url'"
                                                        class="form-control">
                                                </div>
                                                <span class="help-block">http:// or ftp://</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fal fa-mouse-pointer width-1 text-align-center"></i></span>
                                                    </div>
                                                    <input type="text" placeholder="" data-inputmask="'alias': 'email'"
                                                        class="form-control">
                                                </div>
                                                <span class="help-block">xx@xxx.xx</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">IP</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fal fa-wifi width-1 text-align-center"></i></span>
                                                    </div>
                                                    <input type="text" placeholder="" data-inputmask="'alias': 'ip'"
                                                        class="form-control">
                                                </div>
                                                <span class="help-block">192.168.110.310</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">IPV6</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fal fa-window-alt width-1 text-align-center"></i></span>
                                                    </div>
                                                    <input type="text" placeholder=""
                                                        data-inputmask="'mask': '9999:9999:9999:9:999:9999:9999:9999'"
                                                        class="form-control">
                                                </div>
                                                <span class="help-block">4deg:1340:6547:2:540:h8je:ve73:98pd</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">MAC Address</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fal fa-desktop-alt width-1 text-align-center"></i></span>
                                                    </div>
                                                    <input type="text" placeholder="" data-inputmask="'alias': 'mac'"
                                                        class="form-control">
                                                </div>
                                                <span class="help-block">99:99:99:99:99:99</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">VIN</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fal fa-car width-1 text-align-center"></i></span>
                                                    </div>
                                                    <input type="text" placeholder="" data-inputmask="'alias': 'vin'"
                                                        class="form-control">
                                                </div>
                                                <span class="help-block">Vehicle Insurance Number</span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-20">
                                        <form action="#">
                                            <div class="form-group">
                                                <label class="form-label">Tax ID</label>
                                                <input type="text" placeholder=""
                                                    data-inputmask="'mask': '99-9999999'" class="form-control">
                                                <span class="help-block">99-9999999</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Phone</label>
                                                <input type="text" placeholder=""
                                                    data-inputmask="'mask': '(999) 999-9999'" class="form-control">
                                                <span class="help-block">(999) 999-9999</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Currency</label>
                                                <input type="text" placeholder=""
                                                    data-inputmask="'mask': '$ 999,999,999.99'" class="form-control">
                                                <span class="help-block">$ 999,999,999.99</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Currency (alias)</label>
                                                <input type="text" placeholder="" data-inputmask="'alias': 'currency'"
                                                    class="form-control">
                                                <span class="help-block">$ xx.x</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Date Format</label>
                                                <input type="text" placeholder=""
                                                    data-inputmask="'mask': '99/99/9999'" class="form-control">
                                                <span class="help-block">dd/mm/yyyy</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Date Format Alt</label>
                                                <input type="text" placeholder=""
                                                    data-inputmask="'mask': '99-99-9999'" class="form-control">
                                                <span class="help-block">dd-mm-yyyy</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Date time</label>
                                                <input type="text" placeholder="" data-inputmask="'alias': 'datetime'"
                                                    class="form-control">
                                                <span class="help-block">'alias': 'datetime'</span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('pages-script')
    <script src="/admin/js/formplugins/inputmask/inputmask.bundle.js"></script>
    <script>
        $(document).ready(function() {
            $(":input").inputmask();
        });
    </script>
@endsection
