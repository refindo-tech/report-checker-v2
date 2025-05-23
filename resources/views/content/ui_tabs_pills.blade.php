@extends('inc.main')
@section('title', 'Tabs &amp; Pills')
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'UI Components'])
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-window'></i> Tabs & Pills
                <small>
                    Takes the basic nav from above and adds the <code>.nav-tabs</code> class to generate a tabbed interface.
                    Use them to create tabbable regions with our tab JavaScript plugin.
                </small>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Default <span class="fw-300"><i>Tabs</i></span>
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
                                The most minimalistic approach to tabs. We add <code>.nav.nav-tabs</code> to an UL and
                                <code>.tab-content</code> to adjacet element. Tabs are triggered by the data attribute
                                <code>data-toggle="tab"</code> and <code>href="#tab_content"</code> you will link the tab
                                you would like to display
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_default-1"
                                        role="tab">Home</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                        aria-haspopup="true" aria-expanded="false">Profile</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-toggle="tab" href="#tab_default-2"
                                            role="tab">Personal</a>
                                        <a class="dropdown-item" href="#">Friends</a>
                                        <a class="dropdown-item" href="#">Settings</a>
                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_default-3"
                                        role="tab">Set</a></li>
                                <li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#"
                                        role="tab">Disabled</a></li>
                            </ul>
                            <div class="tab-content p-3">
                                <div class="tab-pane fade show active" id="tab_default-1" role="tabpanel">
                                    Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                    aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                    helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu
                                    banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.
                                </div>
                                <div class="tab-pane fade" id="tab_default-2" role="tabpanel">
                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                    artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
                                    enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud
                                    organic.
                                </div>
                                <div class="tab-pane fade" id="tab_default-3" role="tabpanel">
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                    pitchfork.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-2" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Tab <span class="fw-300"><i>sizes</i></span>
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
                                Tabs are flexible and can be resized using the utility classes
                            </div>
                            <div class="demo-v-spacing">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fs-xs py-1 px-2" data-toggle="tab" href="#"
                                            role="tab">
                                            <i class="fal fa-home text-success"></i>
                                            <span class="hidden-sm-down ml-1">Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-xs py-1 px-2" data-toggle="tab" href="#"
                                            role="tab">
                                            <i class="fal fa-user text-primary"></i>
                                            <span class="hidden-sm-down ml-1">Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-xs py-1 px-2" data-toggle="tab" href="#"
                                            role="tab">
                                            <i class="fal fa-cog text-danger"></i>
                                            <span class="hidden-sm-down ml-1">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#" role="tab">
                                            <i class="fal fa-home text-success"></i>
                                            <span class="hidden-sm-down ml-1">Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#" role="tab">
                                            <i class="fal fa-user text-primary"></i>
                                            <span class="hidden-sm-down ml-1">Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#" role="tab">
                                            <i class="fal fa-cog text-danger"></i>
                                            <span class="hidden-sm-down ml-1">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fs-lg px-4" data-toggle="tab" href="#"
                                            role="tab">
                                            <i class="fal fa-home text-success"></i>
                                            <span class="hidden-sm-down ml-1">Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-lg px-4" data-toggle="tab" href="#" role="tab">
                                            <i class="fal fa-user text-primary"></i>
                                            <span class="hidden-sm-down ml-1">Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-lg px-4" data-toggle="tab" href="#" role="tab">
                                            <i class="fal fa-cog text-danger"></i>
                                            <span class="hidden-sm-down ml-1">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fs-xl py-3 px-5" data-toggle="tab" href="#"
                                            role="tab">
                                            <i class="fal fa-home text-success"></i>
                                            <span class="hidden-sm-down ml-1">Home</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-xl py-3 px-5" data-toggle="tab" href="#"
                                            role="tab">
                                            <i class="fal fa-user text-primary"></i>
                                            <span class="hidden-sm-down ml-1">Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fs-xl py-3 px-5" data-toggle="tab" href="#"
                                            role="tab">
                                            <i class="fal fa-cog text-danger"></i>
                                            <span class="hidden-sm-down ml-1">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-3" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Directional <span class="fw-300"><i>tabs</i></span>
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
                                Direction of the tabs can be changed by adding <code>.justify-content-end</code> and
                                <code>justify-content-center</code> to <code>.nav.nav-tabs</code>
                                <br>
                                <br>
                                <div id="js_change_tab_direction" class="btn-group btn-group-sm btn-group-toggle"
                                    data-toggle="buttons">
                                    <label class="btn btn-info active">
                                        <input type="radio" name="radioNameTabDirection" checked=""
                                            value="nav nav-tabs"> Left aligned
                                    </label>
                                    <label class="btn btn-info">
                                        <input type="radio" name="radioNameTabDirection"
                                            value="nav nav-tabs justify-content-center"> Center aligned
                                    </label>
                                    <label class="btn btn-info">
                                        <input type="radio" name="radioNameTabDirection"
                                            value="nav nav-tabs justify-content-end"> Right aligned
                                    </label>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                        href="#tab_direction-1" role="tab">Home</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_direction-2"
                                        role="tab">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_direction-3"
                                        role="tab">Time</a></li>
                            </ul>
                            <div class="tab-content p-3">
                                <div class="tab-pane fade show active" id="tab_direction-1" role="tabpanel">
                                    Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                    aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                    helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu
                                    banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.
                                </div>
                                <div class="tab-pane fade" id="tab_direction-2" role="tabpanel">
                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                    artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
                                    enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud
                                    organic.
                                </div>
                                <div class="tab-pane fade" id="tab_direction-3" role="tabpanel">
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                    pitchfork.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-4" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Justified <span class="fw-300"><i>tabs</i></span>
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
                                For equal-width elements, use <code>.nav-justified</code>. All horizontal space will be
                                occupied by nav links
                            </div>
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                        href="#tab_justified-1" role="tab">Home</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_justified-2"
                                        role="tab">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_justified-3"
                                        role="tab">Time</a></li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1">Disabled</a>
                                </li>
                            </ul>
                            <div class="tab-content p-3">
                                <div class="tab-pane fade show active" id="tab_justified-1" role="tabpanel">
                                    Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                    aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                    helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu
                                    banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.
                                </div>
                                <div class="tab-pane fade" id="tab_justified-2" role="tabpanel">
                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                    artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
                                    enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud
                                    organic.
                                </div>
                                <div class="tab-pane fade" id="tab_justified-3" role="tabpanel">
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                    pitchfork.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-5" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Borders <span class="fw-300"><i>& icons</i></span>
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
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab_borders_icons-1"
                                        role="tab"><i class="fal fa-home mr-1"></i> Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-2" role="tab"><i
                                            class="fal fa-user mr-1"></i> Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-3" role="tab"><i
                                            class="fal fa-clock mr-1"></i> Time</a>
                                </li>
                            </ul>
                            <div class="tab-content border border-top-0 p-3">
                                <div class="tab-pane fade show active" id="tab_borders_icons-1" role="tabpanel">
                                    Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                    aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                    helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu
                                    banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.
                                </div>
                                <div class="tab-pane fade" id="tab_borders_icons-2" role="tabpanel">
                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                    artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
                                    enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud
                                    organic.
                                </div>
                                <div class="tab-pane fade" id="tab_borders_icons-3" role="tabpanel">
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                    pitchfork.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-6" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Default <span class="fw-300"><i>Panel</i></span>
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
                                Add a clean look to your tabs by adding <code>.nav-tabs-clean</code> to
                                <code>.nav-tabs</code>
                            </div>
                            <ul class="nav nav-tabs nav-tabs-clean" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-home"
                                        role="tab">Home</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-profile"
                                        role="tab">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-time"
                                        role="tab">Time</a></li>
                            </ul>
                            <div class="tab-content p-3">
                                <div class="tab-pane fade show active" id="tab-home" role="tabpanel"
                                    aria-labelledby="tab-home">Raw denim you probably haven't heard of them jean shorts
                                    Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche
                                    tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh
                                    dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid.
                                    Aliquip placeat salvia cillum iphone.</div>
                                <div class="tab-pane fade" id="tab-profile" role="tabpanel"
                                    aria-labelledby="tab-profile">Food truck fixie locavore, accusamus mcsweeney's marfa
                                    nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR
                                    leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                    photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                    vinyl cillum PBR. Homo nostrud organic. </div>
                                <div class="tab-pane fade" id="tab-time" role="tabpanel" aria-labelledby="tab-time">
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                    pitchfork.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-7" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Default <span class="fw-300"><i>Pills</i></span>
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
                                The nav pills is the same HTML structure as tabs, but we replace <code>.nav-tabs</code> with
                                <code>.nav-pills</code>
                            </div>
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="pill"
                                        href="#nav_pills_default-1">Home</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="pill"
                                        href="#nav_pills_default-2">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="pill"
                                        href="#nav_pills_default-3">Set</a></li>
                                <li class="nav-item"><a class="nav-link disabled" data-toggle="pill"
                                        href="#">Disabled</a></li>
                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="nav_pills_default-1" role="tabpanel">
                                    Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                    aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                    helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu
                                    banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.
                                </div>
                                <div class="tab-pane fade" id="nav_pills_default-2" role="tabpanel">
                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                    artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
                                    enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud
                                    organic.
                                </div>
                                <div class="tab-pane fade" id="nav_pills_default-3" role="tabpanel">
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                    pitchfork.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-8" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Pills <span class="fw-300"><i>as nav</i></span>
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
                                We can display nav pills inside the <code>nav</code> HTML element, which then allows you to
                                inherit properties of buttons, various sizes and different colors
                            </div>
                            <div class="demo-v-spacing">
                                <nav class="nav nav-pills">
                                    <a class="nav-item nav-link active btn-xs" href="#" data-toggle="pill"><i
                                            class="fal fa-home mr-1"></i> Home</a>
                                    <a class="nav-item nav-link btn-xs" href="#" data-toggle="pill"><i
                                            class="fal fa-user mr-1"></i> Profile</a>
                                    <a class="nav-item nav-link btn-xs" href="#" data-toggle="pill"><i
                                            class="fal fa-cog mr-1"></i> Settings</a>
                                </nav>
                                <nav class="nav nav-pills">
                                    <a class="nav-item nav-link active btn-lg" href="#" data-toggle="pill"><i
                                            class="fal fa-home mr-1"></i> Home</a>
                                    <a class="nav-item nav-link btn-lg" href="#" data-toggle="pill"><i
                                            class="fal fa-user mr-1"></i> Profile</a>
                                    <a class="nav-item nav-link btn-lg" href="#" data-toggle="pill"><i
                                            class="fal fa-cog mr-1"></i> Settings</a>
                                </nav>
                                <nav class="nav nav-pills">
                                    <a href="javascript:void(0);"
                                        class="nav-item nav-link active btn btn-icon btn-lg rounded-circle mr-1"
                                        data-toggle="pill">
                                        <i class="fal fa-home"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                        class="nav-item nav-link btn btn-icon btn-lg rounded-circle mr-1"
                                        data-toggle="pill">
                                        <i class="fal fa-user"></i>
                                    </a>
                                    <a class="nav-item nav-link  btn btn-icon btn-lg rounded-circle" href="#"
                                        data-toggle="pill"><i class="fal fa-cog"></i></a>
                                </nav>
                                <nav class="nav nav-pills">
                                    <a href="javascript:void(0);"
                                        class="nav-item nav-link active btn btn-icon rounded-circle mr-1"
                                        data-toggle="pill">
                                        <i class="fal fa-home"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                        class="nav-item nav-link btn btn-icon rounded-circle mr-1" data-toggle="pill">
                                        <i class="fal fa-user"></i>
                                    </a>
                                    <a class="nav-item nav-link  btn btn-icon rounded-circle" href="#"
                                        data-toggle="pill"><i class="fal fa-cog"></i></a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-9" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Directional <span class="fw-300"><i>pills</i></span>
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
                                Direction of the pills can be changed by adding <code>.justify-content-end</code> and
                                <code>justify-content-center</code> to <code>.nav.nav-tabs</code>
                                <br>
                                <br>
                                <div id="js_change_pill_direction" class="btn-group btn-group-sm btn-group-toggle"
                                    data-toggle="buttons">
                                    <label class="btn btn-success active">
                                        <input type="radio" name="radioNamePillDirection" checked=""
                                            value="nav nav-pills"> Left aligned
                                    </label>
                                    <label class="btn btn-success">
                                        <input type="radio" name="radioNamePillDirection"
                                            value="nav nav-pills justify-content-center"> Center aligned
                                    </label>
                                    <label class="btn btn-success">
                                        <input type="radio" name="radioNamePillDirection"
                                            value="nav nav-pills justify-content-end"> Right aligned
                                    </label>
                                </div>
                            </div>
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                        href="#js_change_pill_direction-1">Home</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                        href="#js_change_pill_direction-2">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                        href="#js_change_pill_direction-3">Time</a></li>
                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="js_change_pill_direction-1" role="tabpanel">
                                    Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                    aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                    helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu
                                    banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.
                                </div>
                                <div class="tab-pane fade" id="js_change_pill_direction-2" role="tabpanel">
                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                    artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
                                    enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud
                                    organic.
                                </div>
                                <div class="tab-pane fade" id="js_change_pill_direction-3" role="tabpanel">
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                    pitchfork.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-10" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Justified <span class="fw-300"><i>pills</i></span>
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
                                For equal-width elements, use <code>.nav-justified</code>. All horizontal space will be
                                occupied by nav links
                            </div>
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                        href="#js_change_pill_justified-1">Home</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                        href="#js_change_pill_justified-2">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                        href="#js_change_pill_justified-3">Time</a></li>
                                <li class="nav-item"><a class="nav-link disabled" data-toggle="tab"
                                        href="#">Disabled</a></li>
                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="js_change_pill_justified-1" role="tabpanel">
                                    Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                    aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                    helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu
                                    banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.
                                </div>
                                <div class="tab-pane fade" id="js_change_pill_justified-2" role="tabpanel">
                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                    artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
                                    enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud
                                    organic.
                                </div>
                                <div class="tab-pane fade" id="js_change_pill_justified-3" role="tabpanel">
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                    pitchfork.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-11" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Pill <span class="fw-300"><i>borders & icons</i></span>
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
                            <div class="border px-3 pt-3 pb-0 rounded">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                            href="#js_pill_border_icon-1"><i class="fal fa-home mr-1"></i>Home</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                            href="#js_pill_border_icon-2"><i class="fal fa-user mr-1"></i>Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                            href="#js_pill_border_icon-3"><i class="fal fa-clock mr-1"></i>Time</a></li>
                                </ul>
                                <div class="tab-content py-3">
                                    <div class="tab-pane fade show active" id="js_pill_border_icon-1" role="tabpanel">
                                        Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu
                                        stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg
                                        carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.
                                        Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat
                                        salvia cillum iphone.
                                    </div>
                                    <div class="tab-pane fade" id="js_pill_border_icon-2" role="tabpanel">
                                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee
                                        squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes
                                        anderson artisan four loko farm-to-table craft beer twee. Qui photo booth
                                        letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl
                                        cillum PBR. Homo nostrud organic.
                                    </div>
                                    <div class="tab-pane fade" id="js_pill_border_icon-3" role="tabpanel">
                                        Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                        organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                        pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                        hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                        pitchfork.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-12" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Pill <span class="fw-300"><i>vertical</i></span>
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
                            <div class="row">
                                <div class="col-auto">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill"
                                            href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                            aria-selected="true">
                                            <i class="fal fa-home"></i>
                                            <span class="hidden-sm-down ml-1"> Home</span>
                                        </a>
                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                            aria-selected="false">
                                            <i class="fal fa-user"></i>
                                            <span class="hidden-sm-down ml-1"> Profile</span>
                                        </a>
                                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                            href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                            aria-selected="false">
                                            <i class="fal fa-envelope"></i>
                                            <span class="hidden-sm-down ml-1"> Messages</span>
                                        </a>
                                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill"
                                            href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                            aria-selected="false">
                                            <i class="fal fa-cog"></i>
                                            <span class="hidden-sm-down ml-1"> Settings</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">
                                            <h3>
                                                Home
                                            </h3>
                                            <p> Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt
                                                tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor,
                                                williamsburg carles vegan helvetica. </p>
                                            <p> Organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag
                                                gentrify pitchfork tattooed craft beer, iphone skateboard locavore.</p>
                                            <span class="fs-sm d-flex align-items-center mt-3 flex-wrap">
                                                <a href="#" class="mr-1 mt-1" title="Cell A-0012">
                                                    <img src="/admin/img/thumbs/pic-7.png" class="img-share"
                                                        alt="pic-7" style="">
                                                </a>
                                                <a href="#" class="mr-1 mt-1" title="Patient A-473 saliva">
                                                    <img src="/admin/img/thumbs/pic-8.png" class="img-share"
                                                        alt="pic-8" style="">
                                                </a>
                                                <a href="#" class="mr-1 mt-1" title="Patient A-473 blood cells">
                                                    <img src="/admin/img/thumbs/pic-11.png" class="img-share"
                                                        alt="pic-11" style="">
                                                </a>
                                                <a href="#" class="mr-1 mt-1" title="Patient A-473 Membrane O.C">
                                                    <img src="/admin/img/thumbs/pic-12.png" class="img-share"
                                                        alt="pic-12" style="">
                                                </a>
                                            </span>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                            aria-labelledby="v-pills-profile-tab">
                                            <h3>
                                                Profile
                                            </h3>
                                            <div class="d-flex flex-row rounded-top mb-3">
                                                <div class="d-flex flex-row align-items-center mt-1 mb-1">
                                                    <span class="mr-2">
                                                        <img src="/admin/img/demo/avatars/avatar-admin.png"
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
                                            <p>
                                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin
                                                coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next
                                                level wes anderson artisan four loko farm-to-table craft beer twee.
                                            </p>
                                            <p>
                                                Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean
                                                shorts ullamco ad vinyl cillum PBR. Homo nostrud organic.
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                            aria-labelledby="v-pills-messages-tab">
                                            <h3>
                                                Messages
                                            </h3>
                                            <ul class="notification">
                                                <li>
                                                    <a href="#" class="d-flex align-items-center py-2 px-0">
                                                        <span class="d-flex flex-column flex-1">
                                                            <span class="name">Melissa Ayre</span>
                                                            <span class="msg-a fs-sm">Re: New security codes</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="d-flex align-items-center py-2 px-0">
                                                        <span class="d-flex flex-column flex-1">
                                                            <span class="name">Adison Lee</span>
                                                            <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="d-flex align-items-center py-2 px-0">
                                                        <span class="d-flex flex-column flex-1">
                                                            <span class="name">Oliver Kopyuv</span>
                                                            <span class="msg-a fs-sm">Msed quia non numquam eius</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                            aria-labelledby="v-pills-settings-tab">
                                            <h3>Settings</h3>
                                            <div class="alert alert-success">
                                                <strong>
                                                    Settings saved
                                                </strong>
                                                <p class="m-0">
                                                    All your settings changes have been saved!
                                                </p>
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
    </main>
@endsection
@section('pages-script')
    <script>
        $('#js_change_tab_direction input').on('change', function() {
            var newclass = $('input[name=radioNameTabDirection]:checked', '#js_change_tab_direction').val();
            $('#js_change_tab_direction').parent('.panel-tag').next('.nav.nav-tabs').removeClass().addClass(
                newclass);
        });
        $('#js_change_pill_direction input').on('change', function() {
            var newclass = $('input[name=radioNamePillDirection]:checked', '#js_change_pill_direction').val();
            $('#js_change_pill_direction').parent('.panel-tag').next('.nav.nav-pills').removeClass().addClass(
                newclass);
        });
    </script>
@endsection
