@extends('inc.main')
@section('title', 'Popovers')
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'UI Components'])
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-window'></i> Popovers
                <small>
                    Documentation and examples for adding Bootstrap popovers, like those found in iOS, to any element on
                    your site.
                </small>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Basic <span class="fw-300"><i>Popover</i></span>
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
                                Minimalistic popover with no content - just title
                            </div>
                            <button type="button" class="btn btn-secondary" data-toggle="popover"
                                title="Popover title">Click to toggle popover</button>
                        </div>
                    </div>
                </div>
                <div id="panel-4" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Popover <span class="fw-300"><i>Content</i></span>
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
                                <p>Default content value if <code>data-content={string|element|function}</code> attribute
                                    isn't present.</p>
                                <p>If a function is given, it will be called with its <code>this</code> reference set to the
                                    element that the popover is attached to.</p>
                            </div>
                            <button type="button" class="btn btn-secondary btn-lg" data-toggle="popover"
                                title="Popover title"
                                data-content="And here's some amazing content. It's very engaging. Right?">Popover with
                                content</button>
                        </div>
                    </div>
                </div>
                <div id="panel-2" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Popover <span class="fw-300"><i>Animation</i></span>
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
                                Disable the CSS fade transition to the popover using attribute
                                <code>data-animation="false"</code>
                            </div>
                            <button type="button" class="btn btn-secondary" data-toggle="popover" data-placement="top"
                                data-animation="false" title="Popover title"
                                data-content="And here's some amazing content. It's very engaging. Right?">Not
                                Animated</button>
                        </div>
                    </div>
                </div>
                <div id="panel-9" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Popover <span class="fw-300"><i>Title</i></span>
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
                                <p>Default title value if <code>title</code> attribute isn't present.</p>
                                <p>If a function is given, it will be called with its <code>this</code> reference set to the
                                    element that the popover is attached to.</p>
                            </div>
                            <button type="button" class="btn btn-secondary" data-toggle="popover" title=""
                                data-original-title="Original Title"
                                data-content="And here's some amazing content. It's very engaging. Right?">Display popover
                                with original title</button>
                        </div>
                    </div>
                </div>
                <div id="panel-3" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Popover <span class="fw-300"><i>Container</i></span>
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
                                Appends the popover to a specific element. Example: <code>container: 'body'</code>. This
                                option is particularly useful in that it allows you to position the popover in the flow of
                                the document near the triggering element -&nbsp;which will prevent the popover from floating
                                away from the triggering element during a window resize
                            </div>
                            <div class="d-flex align-items-end">
                                <button type="button" class="btn btn-secondary" data-toggle="popover"
                                    data-container="#test-container" title="Popover title"
                                    data-content="And here's some amazing content. It's very engaging. Right?">Display
                                    popover</button>
                                <a href="javascript:void(0);" class="btn btn-success btn-xs ml-auto" data-action="toggle"
                                    data-class="d-none" data-target="#test-container">
                                    hide container
                                </a>
                            </div>
                            <div id="test-container" class="p-3 rounded bg-warning-100 mt-3">
                                The popover is nested inside this container but displayed on the element above. Once this
                                container is hidden the popover will not be visible. Try hiding this container by pressing
                                the "hide" button above
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-6" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Popover <span class="fw-300"><i>HTML content</i></span>
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
                                <p>Insert HTML into the popover. If false, jQuery's <code>text</code> method will be used to
                                    insert content into the DOM. Use text if you're worried about XSS attacks. </p>
                                <p>
                                    Some elements may not be displaced properly or may not appear at all. This is because of
                                    bootstrap Sanitizer. If this is happening you may need to add these elements to the
                                    "whitelist". You can read more about it on bootstrap's <a
                                        href="https://getbootstrap.com/docs/4.3/getting-started/javascript/#sanitizer"
                                        target="_blank"> official documentation</a>.
                                </p>
                            </div>
                            <div class="demo">
                                <button type="button" class="btn btn-outline-danger" data-toggle="popover"
                                    data-placement="top"
                                    title="<h4 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>File permissions</h4>"
                                    data-html="true"
                                    data-content='
							<div class="mb-2">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="checkmeout0">
									<label class="custom-control-label" for="checkmeout0">Read</label>
								</div>
							</div>
							<div class="mb-2">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="checkmeout1">
									<label class="custom-control-label" for="checkmeout1">Write</label>
								</div>
							</div>
							<div class="mb-2">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="checkmeout2">
										<label class="custom-control-label" for="checkmeout2">Execute</label>
									</div>
								</div>
							<hr>
							<div class="d-flex">
								<a href="javascript:void(0);" class="btn btn-primary text-white ml-auto">Save</a>
								<a href="javascript:void(0);" class="btn btn-success ml-2 text-white">Reset</a></div>'>Popover
                                    Forms</button>
                                <button type="button" class="btn btn-outline-danger" data-toggle="popover"
                                    data-placement="top"
                                    title="<h4 class='fw-500 width-sm'><i class='fal fa-chart-pie mr-2'></i>File access</h4>"
                                    data-html="true"
                                    data-content='
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#tab_direction-1" role="tab">Home</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#tab_direction-2" role="tab">Profile</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#tab_direction-3" role="tab">Time</a>
												</li>
											</ul><div class="tab-content pt-3">
												<div class="tab-pane show active" id="tab_direction-1" role="tabpanel">
													Raw denim you probably havent heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater
													eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.
												</div>
												<div class="tab-pane" id="tab_direction-2" role="tabpanel">
													Food truck fixie locavore, accusamus mcsweeneys marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
													enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic.
												</div>
												<div class="tab-pane" id="tab_direction-3" role="tabpanel">
													Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeneys organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
													hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.
												</div>
											</div>'>Popover
                                    Tabs</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-5" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Delayed <span class="fw-300"><i>Popover</i></span>
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
                                <p>Delay showing and hiding the popover (ms) - does not apply to manual trigger type</p>
                                <p>If a number is supplied, delay is applied to both hide/show</p>
                                <p>Object structure is: <code>delay: { "show": 500, "hide": 100 }</code></p>
                            </div>
                            <button type="button" class="btn btn-secondary btn-lg" data-toggle="popover"
                                data-placement="auto" title="I was 1/2 sec late!"
                                data-delay='{ "show": 500, "hide": 500 }'
                                data-content="And here's some amazing content. It's very engaging. Right?">Delayed
                                toggle</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-7" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Popover <span class="fw-300"><i>Placement</i></span>
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
                                <p>How to position the popover - auto | top | bottom | left | right.<br>When
                                    <code>auto</code> is specified, it will dynamically reorient the popover.
                                </p>
                                <p>When a function is used to determine the placement, it is called with the popover DOM
                                    node as its first argument and the triggering element DOM node as its second. The
                                    <code>this</code> context is set to the popover instance.
                                </p>
                            </div>
                            <div class="demo">
                                <button type="button" class="btn btn-secondary" data-container="body"
                                    data-toggle="popover" data-placement="auto"
                                    data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                    Auto
                                </button>
                                <button type="button" class="btn btn-secondary" data-container="body"
                                    data-toggle="popover" data-placement="top"
                                    data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                    Top
                                </button>
                                <button type="button" class="btn btn-secondary" data-container="body"
                                    data-toggle="popover" data-placement="right"
                                    data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                    Right
                                </button>
                                <button type="button" class="btn btn-secondary" data-container="body"
                                    data-toggle="popover" data-placement="bottom"
                                    data-content="Vivamus
						sagittis lacus vel augue laoreet rutrum faucibus.">
                                    Down
                                </button>
                                <button type="button" class="btn btn-secondary" data-container="body"
                                    data-toggle="popover" data-placement="left"
                                    data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                    Left
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-8" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Popover <span class="fw-300"><i>Selector</i></span>
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
                                <p>If a selector is provided, popover objects will be delegated to the specified targets. In
                                    practice, this is used to enable dynamic HTML content to have popovers added. </p>
                                <p>The <code>selector</code> option essentially allows you to run tooltips and popovers
                                    using jQuery's <code>on</code> function, which means that you can allow dynamically
                                    added HTML with the correct selectors to trigger popups as if they were present in the
                                    originally loaded DOM. Without the selector option, only elements present in the initial
                                    DOM will trigger tooltips; any that are dynamically added will not.</p>
                            </div>
                            <p>Toggle the checkbox below and click the 'add new popover' button to observe the behavioral
                                differences between using the selector option, and not using it.</p>
                            <hr>
                            <div class="checkbox">
                                <label id="use-selector-label" class="d-flex align-items-center mb-3">
                                    <input id="use-selector" type="checkbox">
                                    <span class="ml-2"
                                        data-title="you must refresh this page to change the selector option once you've started the demo">Use
                                        selector option</span>
                                </label>
                            </div>
                            <pre id="with-selector-code">
$('body').popover({
  selector: '.has-popover'
});
</pre>
                            <pre id="without-selector-code">
$('.has-popover').popover();
</pre>
                            <button class="btn btn-primary" id="add-button">Add new popover</button>
                            <div class="js-buttons" style="display:none">
                                <hr>
                                <button class="btn btn-block btn-success has-popover" data-title="Static"
                                    data-content="This button was specified in the initial HTML document"
                                    data-placement="top">Working popover</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-11" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Popover <span class="fw-300"><i>Triggers</i></span>
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
                                How popover is triggered - click | hover | focus | manual. You may pass multiple triggers;
                                separate them with a space. <code>manual</code> cannot be combined with any other trigger.
                            </div>
                            <div class="demo">
                                <button type="button" class="btn btn-outline-success btn-lg" data-toggle="popover"
                                    data-trigger="hover" data-placement="top" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Display on hover">Hover</button>
                                <button type="button" class="btn btn-outline-warning btn-lg" data-toggle="popover"
                                    data-trigger="click" data-placement="top" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Display on click">Click</button>
                                <button type="button" class="btn btn-outline-info btn-lg" data-toggle="popover"
                                    data-trigger="focus" data-placement="top" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Display on focus">Focus</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-10" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Popover <span class="fw-300"><i>Template</i></span>
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
                                <p>Base HTML to use when creating the popover. The popover's <code>title</code> will be
                                    injected into the <code>.popover-header</code>. The popover's <code>content</code> will
                                    be injected into the <code>.popover-body</code>, and <code>.arrow</code> will become the
                                    popover's arrow.The outermost wrapper element should have the <code>.popover</code>
                                    class.</p>
                            </div>
                            <div class="demo">
                                <button type="button" class="btn btn-primary" data-toggle="popover"
                                    data-trigger="focus" data-placement="top" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Popover title"
                                    data-template='<div class="popover bg-primary-500 border-primary" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent"></h3><div class="popover-body text-white"></div></div>'>Primary</button>
                                <button type="button" class="btn btn-secondary" data-toggle="popover"
                                    data-trigger="focus" data-placement="top" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Popover title"
                                    data-template='<div class="popover bg-secondary border-secondary" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent text-white"></h3><div class="popover-body text-white"></div></div>'>Secondary</button>
                                <button type="button" class="btn btn-success" data-toggle="popover"
                                    data-trigger="focus" data-placement="top" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Popover title"
                                    data-template='<div class="popover bg-success-500 border-success" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent"></h3><div class="popover-body text-white"></div></div>'>Success</button>
                                <button type="button" class="btn btn-info" data-toggle="popover" data-trigger="focus"
                                    data-placement="top" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Popover title"
                                    data-template='<div class="popover bg-info-500 border-info" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent"></h3><div class="popover-body text-white"></div></div>'>info</button>
                                <button type="button" class="btn btn-warning" data-toggle="popover"
                                    data-trigger="focus" data-placement="top" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Popover title"
                                    data-template='<div class="popover bg-warning-500 border-warning" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent"></h3><div class="popover-body"></div></div>'>Warning</button>
                                <button type="button" class="btn btn-danger" data-toggle="popover" data-trigger="focus"
                                    data-placement="top" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Popover title"
                                    data-template='<div class="popover bg-danger-500 border-danger" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent"></h3><div class="popover-body text-white"></div></div>'>Danger</button>
                                <button type="button" class="btn btn-dark" data-toggle="popover" data-trigger="focus"
                                    data-placement="top" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Popover title"
                                    data-template='<div class="popover bg-fusion-500 border-dark" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent"></h3><div class="popover-body text-white"></div></div>'>Dark</button>
                                <button type="button" class="btn btn-light" data-toggle="popover" data-trigger="focus"
                                    data-placement="top" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Popover title"
                                    data-template='<div class="popover bg-light border-light" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent"></h3><div class="popover-body"></div></div>'>Light</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-12" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Offset <span class="fw-300"><i>Popover</i></span>
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
                                Offset of the popover relative to its target. For more information refer to Popper.js's <a
                                    href="https://popper.js.org/popper-documentation.html#modifiers..offset.offset"
                                    target="_blank">offset docs</a>
                            </div>
                            <div class="demo">
                                <button type="button" class="btn btn-secondary" data-toggle="popover"
                                    data-offset="0,30" data-trigger="focus" data-placement="top" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Offset {x:0, y:30}">Offset Top</button>
                                <button type="button" class="btn btn-secondary" data-toggle="popover"
                                    data-offset="-10,20" data-trigger="focus" data-placement="auto" title=""
                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                    data-original-title="Offset {x:-10, y:20}">Offset Auto</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-13" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Popover <span class="fw-300"><i>Boundary</i></span>
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
                                Overflow constraint boundary of the popover. Accepts the values of <code>'viewport'</code>,
                                <code>'window'</code>, <code>'scrollParent'</code>, or an HTMLElement reference (JavaScript
                                only). For more information refer to Popper.js's <a
                                    href="https://popper.js.org/popper-documentation.html#modifiers..preventOverflow.boundariesElement"
                                    target="_blank">preventOverflow docs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('pages-script')
    <script type="text/javascript">
        function usingSelectorOption() {
            return $('#use-selector').is(':checked');
        }

        function updateCodeView() {
            $('#with-selector-code').toggle(usingSelectorOption());
            $('#without-selector-code').toggle(!usingSelectorOption());
        }

        $(function() {
            // Update code view when checkbox is toggled
            updateCodeView();
            $('#use-selector').click(function() {
                updateCodeView();
            });


            var startedDemo = false;
            $('#add-button').click(function() {
                // One-time initialization
                if (!startedDemo) {
                    if (usingSelectorOption()) {
                        $('body').popover({
                            selector: '.has-popover'
                        });
                    } else {
                        $('.has-popover').popover();
                    }

                    startedDemo = true;
                }

                // Disable selector checkbox, put a tooltip on it, and show the buttons panel
                $('#use-selector').attr('disabled', 'disabled');
                $('#use-selector-label span').tooltip();
                $('.js-buttons').show();

                // Add a new button that triggers (or doesn't) a popover, with the appropriate message
                var button = null;
                if (usingSelectorOption()) {
                    button = $(
                        '<button class="btn btn-block btn-success has-popover" data-title="Dynamic" data-content="This button was added dynamically by JavaScript" data-placement="top">Working dynamically added button</button>'
                    );
                } else {
                    button = $(
                        '<button class="btn btn-block btn-default has-popover" data-title="Dynamic" data-content="This button was added dynamically by JavaScript" data-placement="top">Non-working dynamically added button</button>'
                    );
                }

                button.appendTo('.js-buttons');
            });
        });
    </script>
@endsection
