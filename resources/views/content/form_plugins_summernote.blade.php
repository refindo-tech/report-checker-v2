@extends('inc.main')
@section('title', 'Summernote')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/formplugins/summernote/summernote.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'Form Plugins'])
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-credit-card-front'></i> Summernote<sup
                    class='badge badge-primary fw-500'>ADDON</sup>
                <small>
                    A JavaScript library that helps you create WYSIWYG editors online.
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
                        <p>Summernote is a JavaScript library that helps you create WYSIWYG editors online. It lets you
                            paste images from clipboard, save images directly in the content of the field using base64
                            encoding, so you don't need to implement image handling at all. And it is a very lightweight
                            plugin, making it ideal for your project!</p>
                        <p class="m-0">
                            Find in-depth, guidelines, tutorials and more on Summernote's <a
                                href="https://summernote.org/deep-dive/" target="_blank">Official Documentation</a>
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
                            AutoSave <span class="fw-300"><i>Script</i></span>
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
                                This is the default <code>summernote</code> example, with full toolbar buttons. We have also
                                added a custom auto save script for localStorage which uses <code>onChange</code> and
                                <code>onInit</code> hooks to load and save to <code>localStorage</code>
                            </div>
                            <div class="js-summernote" id="saveToLocal"></div>
                            <div class="mt-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="autoSave" checked="checked">
                                    <label class="custom-control-label" for="autoSave">Autosave changes to LocalStorage
                                        <span class="fw-300">(every 3 seconds)</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-2" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Hint <span class="fw-300"><i>for emoji </i></span>
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
                                For Emoji’s you can use <code>https://api.github.com/emojis</code>
                            </div>
                            <div class="js-hint2emoji"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-3" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Hint <span class="fw-300"><i>for Mentions</i></span>
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
                                For Mentions: [jayden, sam, alvin, david]
                            </div>
                            <div class="js-hint2mention"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('pages-script')
    <script src="/admin/js/formplugins/summernote/summernote.js"></script>
    <script>
        var autoSave = $('#autoSave');
        var interval;
        var timer = function() {
            interval = setInterval(function() {
                //start slide...
                if (autoSave.prop('checked'))
                    saveToLocal();

                clearInterval(interval);
            }, 3000);
        };

        //save
        var saveToLocal = function() {
            localStorage.setItem('summernoteData', $('#saveToLocal').summernote("code"));
            console.log("saved");
        }

        //delete
        var removeFromLocal = function() {
            localStorage.removeItem("summernoteData");
            $('#saveToLocal').summernote('reset');
        }

        $(document).ready(function() {
            //init default
            $('.js-summernote').summernote({
                height: 200,
                tabsize: 2,
                placeholder: "Type here...",
                dialogsFade: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    //restore from localStorage
                    onInit: function(e) {
                        $('.js-summernote').summernote("code", localStorage.getItem("summernoteData"));
                    },
                    onChange: function(contents, $editable) {
                        clearInterval(interval);
                        timer();
                    }
                }
            });

            //load emojis
            $.ajax({
                url: 'https://api.github.com/emojis',
                async: false
            }).then(function(data) {
                window.emojis = Object.keys(data);
                window.emojiUrls = data;
            });

            //init emoji example
            $(".js-hint2emoji").summernote({
                height: 100,
                toolbar: false,
                placeholder: 'type starting with : and any alphabet',
                hint: {
                    match: /:([\-+\w]+)$/,
                    search: function(keyword, callback) {
                        callback($.grep(emojis, function(item) {
                            return item.indexOf(keyword) === 0;
                        }));
                    },
                    template: function(item) {
                        var content = emojiUrls[item];
                        return '<img src="' + content + '" width="20" /> :' + item + ':';
                    },
                    content: function(item) {
                        var url = emojiUrls[item];
                        if (url) {
                            return $('<img />').attr('src', url).css('width', 20)[0];
                        }
                        return '';
                    }
                }
            });

            //init mentions example
            $(".js-hint2mention").summernote({
                height: 100,
                toolbar: false,
                placeholder: "type starting with @",
                hint: {
                    mentions: ['jayden', 'sam', 'alvin', 'david'],
                    match: /\B@(\w*)$/,
                    search: function(keyword, callback) {
                        callback($.grep(this.mentions, function(item) {
                            return item.indexOf(keyword) == 0;
                        }));
                    },
                    content: function(item) {
                        return '@' + item;
                    }
                }
            });

        });
    </script>
@endsection
