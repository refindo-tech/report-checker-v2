@extends('inc.main')
@section('title', 'Community Support')
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        <!-- Page heading removed for composed layout -->
        <div class="alert alert-info m-0 p-0 border-left-0 border-right-0 rounded-0 px-5 py-2">
            <div class="container">
                <div class="px-3 d-flex pr-5">
                    <strong>SmartAdmin Support Forum is a public support forum hosted on <a
                            href="https://support.gotbootstrap.com"
                            target="_blank">https://support.gotbootstrap.com</a></strong>
                    <div class="ml-auto">
                        <a href="javascript:void(0);" class="btn btn-danger btn-xs btn-icon rounded-circle"
                            data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-grow-1 p-0 iframe-wrapper">
            <iframe src="https://support.gotbootstrap.com/" id="iframe" class="w-100 border-0"
                allowtransparency="true"></iframe>
        </div>
    </main>
@endsection
@section('pages-script')
    <script type="text/javascript">
        // push settings with "false" save to local
        initApp.pushSettings("layout-composed nav-function-fixed", false);


        //
        /*
        $('#iframe').load( function() {
            $('#iframe').contents().find("head")
              .append($("<style type='text/css'>  .Header-title{display:none;}  </style>"));
        	});*/

        /*$('#iframe').on("load", function() {
            var iframe = $(window.top.document).find("#iframe");
            iframe.height(iframe[0].ownerDocument.body.scrollHeight+'px' );
        });*/


        /*var framefenster = document.getElementsByTagName("iframe");
         var auto_resize_timer = window.setInterval("autoresize_frames()", 1000);
         function autoresize_frames() {
           for (var i = 0; i < framefenster.length; ++i) {
               if(framefenster[i].contentWindow.document.body){
                 var framefenster_size = framefenster[i].contentWindow.document.body.offsetHeight;
                 if(document.all && !window.opera) {
                   framefenster_size = framefenster[i].contentWindow.document.body.scrollHeight;
                 }
                 framefenster[i].style.height = framefenster_size + 'px';
               }
           }
         }*/
    </script>
@endsection
