@extends('inc.main')
@section('title', 'Item')
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', [
            'category_1' => 'Page Views',
            'category_2' => 'Forum Layouts',
        ])
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-plus-circle'></i> Forum: <span class='fw-300'>Threads</span>
                <small>
                    Forum threads page
                </small>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="input-group input-group-lg mb-g">
                    <input type="text" class="form-control shadow-inset-2" placeholder="Search Threads">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fal fa-search"></i></span>
                    </div>
                </div>
                <div class="card mb-g border shadow-0">
                    <div class="card-header">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <span class="h6 font-weight-bold text-uppercase">Account information & Security</span>
                            </div>
                            <div class="col d-flex align-items-center">
                                <a href="javascript:void(0);"
                                    class="btn btn-success shadow-0 btn-sm ml-auto flex-shrink-0">New Thread</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header p-0">
                        <div class="row no-gutters row-grid align-items-stretch">
                            <div class="col-12 col-md">
                                <div class="text-uppercase text-muted py-2 px-3">Title</div>
                            </div>
                            <div class="col-sm-6 col-md-2 col-xl-1 hidden-md-down">
                                <div class="text-uppercase text-muted py-2 px-3">Replies</div>
                            </div>
                            <div class="col-sm-6 col-md-3 hidden-md-down">
                                <div class="text-uppercase text-muted py-2 px-3">Last update</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row no-gutters row-grid">
                            <!-- thread -->
                            <div class="col-12">
                                <div class="row no-gutters row-grid align-items-stretch">
                                    <div class="col-md">
                                        <div class="p-3">
                                            <div class="d-flex flex-column">
                                                <a href="javascript:void(0)" class="fs-lg fw-500 d-flex align-items-start">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit <span
                                                        class="badge badge-warning ml-auto">Sticky</span>
                                                </a>
                                                <div class="d-block text-muted fs-sm">
                                                    Started by <a href="javascript:void(0);" class="text-info">c_lantern</a>
                                                    on January 21, 2019 @12:30PM
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <ul class="pagination pagination-xs mb-0 mt-3 align-self-end">
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="paginate_button page-item disabled px-0">…</li>
                                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">25</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">Last page</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 col-xl-1 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <span class="d-block text-muted">72 <i>Replies</i></span>
                                            <span class="d-block text-muted">4314 <i>Views</i></span>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-3 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="d-inline-block align-middle status status-success status-sm mr-2">
                                                    <span class="profile-image-md rounded-circle d-block"
                                                        style="background-image:url('/admin/img/demo/avatars/avatar-admin.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="flex-1 min-width-0">
                                                    <a href="javascript:void(0)" class="d-block text-truncate">
                                                        Nam at justo magna. Aenean facilisis ultricies turpis
                                                    </a>
                                                    <div class="text-muted small text-truncate">
                                                        Today, 12:13 <a href="javascript:void(0)"
                                                            class="text-info">c_lantern</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- thread -end -->
                            <!-- thread -->
                            <div class="col-12">
                                <div class="row no-gutters row-grid align-items-stretch">
                                    <div class="col-md">
                                        <div class="p-3">
                                            <div class="d-flex flex-column">
                                                <a href="javascript:void(0)" class="fs-lg fw-500 d-flex align-items-start">
                                                    Vestibulum molestie, ipsum vitae feugiat lacinia
                                                </a>
                                                <div class="d-block text-muted fs-sm">
                                                    Started by <a href="javascript:void(0);" class="text-info">jamie</a>
                                                    on January 12, 2019 @4:23PM
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 col-xl-1 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <span class="d-block text-muted">15 <i>Replies</i></span>
                                            <span class="d-block text-muted">4314 <i>Views</i></span>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-3 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="d-inline-block align-middle status status-success status-sm mr-2">
                                                    <span class="profile-image-md rounded-circle d-block"
                                                        style="background-image:url('/admin/img/demo/avatars/avatar-m.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="flex-1 min-width-0">
                                                    <a href="javascript:void(0)" class="d-block text-truncate">
                                                        Morbi id enim a ex gravida dignissim nec eu massa
                                                    </a>
                                                    <div class="text-muted small text-truncate">
                                                        Today, 06:01 <a href="javascript:void(0)"
                                                            class="text-info">jamie</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- thread -end -->
                            <!-- thread -->
                            <div class="col-12">
                                <div class="row no-gutters row-grid align-items-stretch">
                                    <div class="col-md">
                                        <div class="p-3">
                                            <div class="d-flex flex-column">
                                                <a href="javascript:void(0)"
                                                    class="fs-lg fw-500 d-flex align-items-start">
                                                    Nam viverra diam magna, eget lobortis orci tincidunt sed <span
                                                        class="badge badge-danger ml-auto"><i class="fal fa-lock"></i>
                                                        <span class="ml-1 hidden-md-down">Locked</span></span>
                                                </a>
                                                <div class="d-block text-muted fs-sm">
                                                    Started by <a href="javascript:void(0);" class="text-info">maggie</a>
                                                    on February 17, 2019 @8:01AM
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 col-xl-1 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <span class="d-block text-muted">764 <i>Replies</i></span>
                                            <span class="d-block text-muted">534 <i>Views</i></span>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-3 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="d-inline-block align-middle status status-danger status-sm mr-2">
                                                    <span class="profile-image-md rounded-circle d-block"
                                                        style="background-image:url('/admin/img/demo/avatars/avatar-g.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="flex-1 min-width-0">
                                                    <a href="javascript:void(0)" class="d-block text-truncate">
                                                        Duis placerat in sapien et placerat. Duis quis feugiat leo.
                                                        Curabitur laoreet ex nec odio interdum
                                                    </a>
                                                    <div class="text-muted small text-truncate">
                                                        Today, 12:25 <a href="javascript:void(0)"
                                                            class="text-info">josekras_alma</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- thread -end -->
                            <!-- thread -->
                            <div class="col-12 disabled">
                                <div class="row no-gutters row-grid align-items-stretch">
                                    <div class="col-md">
                                        <div class="p-3">
                                            <div class="d-flex flex-column">
                                                <a href="javascript:void(0)"
                                                    class="fs-lg fw-500 d-flex align-items-start">
                                                    Proin vehicula nibh a nisl porta laoreet <span
                                                        class="badge badge-secondary ml-auto">Disabled</span>
                                                </a>
                                                <div class="d-block text-muted fs-sm">
                                                    Started by <a href="javascript:void(0);" class="text-info">larry85</a>
                                                    on December 12, 2019 @12:30PM
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 col-xl-1 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <span class="d-block text-muted">87 <i>Replies</i></span>
                                            <span class="d-block text-muted">674 <i>Views</i></span>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-3 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="d-inline-block align-middle status status-success status-sm mr-2">
                                                    <span class="profile-image-md rounded-circle d-block"
                                                        style="background-image:url('/admin/img/demo/avatars/avatar-j.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="flex-1 min-width-0">
                                                    <a href="javascript:void(0)" class="d-block text-truncate">
                                                        Praesent mollis congue bibendum. Etiam ipsum augue, sodales id metus
                                                        a, molestie hendrerit felis.
                                                    </a>
                                                    <div class="text-muted small text-truncate">
                                                        Today, 05:25 <a href="javascript:void(0)"
                                                            class="text-info">lambert</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- thread -end -->
                            <!-- thread -->
                            <div class="col-12">
                                <div class="row no-gutters row-grid align-items-stretch">
                                    <div class="col-md">
                                        <div class="p-3">
                                            <div class="d-flex flex-column">
                                                <a href="javascript:void(0)"
                                                    class="fs-lg fw-500 d-flex align-items-start">
                                                    Nulla auctor hendrerit purus, sit amet lacinia tellus placerat nec.
                                                </a>
                                                <div class="d-block text-muted fs-sm">
                                                    Started by <a href="javascript:void(0);" class="text-info">gi_34</a>
                                                    on January 01, 2019 @2:30PM
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 col-xl-1 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <span class="d-block text-muted">731<i>Replies</i></span>
                                            <span class="d-block text-muted">1246 <i>Views</i></span>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-3 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="d-inline-block align-middle status status-warning status-sm mr-2">
                                                    <span class="profile-image-md rounded-circle d-block"
                                                        style="background-image:url('/admin/img/demo/avatars/avatar-k.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="flex-1 min-width-0">
                                                    <a href="javascript:void(0)" class="d-block text-truncate">
                                                        Proin non felis lobortis, porta arcu a, iaculis arcu. Morbi
                                                        tincidunt non ante et fermentum
                                                    </a>
                                                    <div class="text-muted small text-truncate">
                                                        Today, 05:25 <a href="javascript:void(0)"
                                                            class="text-info">elmo</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- thread -end -->
                            <!-- thread -->
                            <div class="col-12">
                                <div class="row no-gutters row-grid align-items-stretch">
                                    <div class="col-md">
                                        <div class="p-3">
                                            <div class="d-flex flex-column">
                                                <a href="javascript:void(0)"
                                                    class="fs-lg fw-500 d-flex align-items-start">
                                                    Donec tincidunt augue auctor, ullamcorper urna ac
                                                </a>
                                                <div class="d-block text-muted fs-sm">
                                                    Started by <a href="javascript:void(0);" class="text-info">zico03</a>
                                                    on August 25, 2019 @7:45PM
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 col-xl-1 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <span class="d-block text-muted">3943<i>Replies</i></span>
                                            <span class="d-block text-muted">9843 <i>Views</i></span>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-3 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="d-inline-block align-middle status status-success status-sm mr-2">
                                                    <span class="profile-image-md rounded-circle d-block"
                                                        style="background-image:url('/admin/img/demo/avatars/avatar-a.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="flex-1 min-width-0">
                                                    <a href="javascript:void(0)" class="d-block text-truncate">
                                                        Sed felis eros, facilisis eu cursus at, efficitur et felis
                                                    </a>
                                                    <div class="text-muted small text-truncate">
                                                        Today, 05:25 <a href="javascript:void(0)"
                                                            class="text-info">katty60</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- thread -end -->
                            <!-- thread -->
                            <div class="col-12">
                                <div class="row no-gutters row-grid align-items-stretch">
                                    <div class="col-md">
                                        <div class="p-3">
                                            <div class="d-flex flex-column">
                                                <a href="javascript:void(0)"
                                                    class="fs-lg fw-500 d-flex align-items-start">
                                                    Nullam in dictum lacus. Nulla auctor hendrerit purus, sit amet lacinia
                                                    tellus placerat nec
                                                </a>
                                                <div class="d-block text-muted fs-sm">
                                                    Started by <a href="javascript:void(0);"
                                                        class="text-info">c_lantern</a> on January 21, 2019 @12:30PM
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 col-xl-1 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <span class="d-block text-muted">38<i>Replies</i></span>
                                            <span class="d-block text-muted">55 <i>Views</i></span>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-3 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="d-inline-block align-middle status status-danger status-sm mr-2">
                                                    <span class="profile-image-md rounded-circle d-block"
                                                        style="background-image:url('/admin/img/demo/avatars/avatar-h.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="flex-1 min-width-0">
                                                    <a href="javascript:void(0)" class="d-block text-truncate">
                                                        Phasellus quis sem diam. Sed commodo metus in ultrices consequat
                                                    </a>
                                                    <div class="text-muted small text-truncate">
                                                        Today, 05:25 <a href="javascript:void(0)"
                                                            class="text-info">laigma76</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- thread -end -->
                            <!-- thread -->
                            <div class="col-12">
                                <div class="row no-gutters row-grid align-items-stretch">
                                    <div class="col-md">
                                        <div class="p-3">
                                            <div class="d-flex flex-column">
                                                <a href="javascript:void(0)"
                                                    class="fs-lg fw-500 d-flex align-items-start">
                                                    Sit amet lacinia tellus placerat nec. Nunc condimentum
                                                </a>
                                                <div class="d-block text-muted fs-sm">
                                                    Started by <a href="javascript:void(0);"
                                                        class="text-info">lambert89</a> on March 12, 2019 @7:30AM
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 col-xl-1 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <span class="d-block text-muted">24<i>Replies</i></span>
                                            <span class="d-block text-muted">100 <i>Views</i></span>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-3 hidden-md-down">
                                        <div class="p-3 p-md-3">
                                            <div class="d-flex align-items-center">
                                                <div class="d-inline-block align-middle status status-sm mr-2">
                                                    <span class="profile-image-md rounded-circle d-block"
                                                        style="background-image:url('/admin/img/demo/avatars/avatar-i.png'); background-size: cover;"></span>
                                                </div>
                                                <div class="flex-1 min-width-0">
                                                    <a href="javascript:void(0)" class="d-block text-truncate">
                                                        ullamcorper cursus. Proin sodales odio sed aliquet pulvinar. Duis
                                                        ipsum erat, ultricies a dolor non, tempor dictum ante
                                                    </a>
                                                    <div class="text-muted small text-truncate">
                                                        Today, 05:25 <a href="javascript:void(0)"
                                                            class="text-info">laigma76</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- thread -end -->
                        </div>
                    </div>
                </div>
                <ul class="pagination mt-3">
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
            </div>
        </div>
    </main>
@endsection
