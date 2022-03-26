<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="{{asset('site/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/hover.css')}}">
    <link rel="stylesheet" href="{{asset('site/vendor/aos/aos.min.css')}}">
    <link rel="apple-touch-icon"
          href="{{ asset('storage/' . App\Models\Websit::latest()->first()->favicon_image ?? 'app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon"
          href="{{ asset('storage/' . App\Models\Websit::latest()->first()->favicon_image ?? 'app-assets/images/ico/apple-icon-120.png') }}">

    <title>{{App\Models\Websit::latest()->first()->websit_title}}</title>

    <style>
        .pagination {
            float: right;
            margin-top: 10px;
        }
    </style>


</head>
<body>
<!--start nav bar  -->
<section class="nav " dir="rtl">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap">
        <div class="site-navbar-top">
            <div class="container py-3">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="d-flex mr-mr-2">
                            <a href="javascript:void(0);" class="d-flex align-items-center ml-4">
                                <span class="icon-envelope ml-2"></span>
                                <span
                                    class="d-none d-md-inline-block">{{App\Models\Websit::latest()->first()->email}}</span>
                            </a>
                            <a href="javascript:void(0);" class="d-flex align-items-center ml-4">
                                <span class="icon-phone ml-2"></span>
                                <span class="d-none d-md-inline-block"
                                      dir="ltr">{{App\Models\Websit::latest()->first()->phone }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 text-left">
                        <div class="mr-auto social-icon">
                            <a href="{{ App\Models\Websit::latest()->first()->twitter ?? 'javascript:void(0);' }}"
                               class="p-2 pl-0"><span
                                    class="icon-twitter"></span></a>
                            <a href="{{ App\Models\Websit::latest()->first()->facebook ?? 'javascript:void(0);' }}"
                               class="p-2 pl-0"><span
                                    class="icon-facebook"></span></a>
                            <a href="{{ App\Models\Websit::latest()->first()->linkedin ?? 'javascript:void(0);' }}"
                               class="p-2 pl-0"><span
                                    class="icon-linkedin"></span></a>
                            <a href="{{ App\Models\Websit::latest()->first()->instagram ?? 'javascript:void(0);' }}"
                               class="p-2 pl-0"><span
                                    class="icon-instagram"></span></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="site-navbar site-navbar-target js-sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-2">
                        <a href="{{ route('site.home') }}">
                            <img src="{{ asset('storage/' . App\Models\Websit::latest()->first()->logo) }}"
                                 width="200px" alt="{{App\Models\Websit::latest()->first()->websit_title}}">
                        </a>
                    </div>
                    <div class="col-10">
                        <nav class="site-navigation text-right" role="navigation">

                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3
                      float-left"><a href="#" class="site-menu-toggle
                        js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
                            <ul class="site-menu text-left t main-menu js-clone-nav d-none
                      d-lg-block">
{{--                                <li>--}}
{{--                                    <a href="{{ route('site.home') }}" class="nav-link">الرئيسية </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="/#home-section" class="nav-link">عن الجمعية </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('site.projects') }}" class="nav-link">مشاريع الجمعية</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('site.news') }}" class="nav-link">أخبار الجمعية</a>--}}
{{--                                </li>--}}
                                @foreach($menus as $menu)
                                    <li @if(count($menu->child) != 0) class="has-children" @endif>

                                        <a href="@if(count($menu->child) == 0) {{ $menu->link }} @else javascript:void(0); @endif"
                                           class="nav-link">{{ $menu->name }}</a>

                                        @if(count($menu->child) != 0)
                                            <ul class="dropdown arrow-top">
                                                @foreach($menu->child as $child)
                                                    <li>
                                                        <a href="{{ $child->link }}"
                                                           class="nav-link">{{ $child->name }}</a></li>

                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                                <li>
                                <li>
                                    <button class="btn btn-outline-more hvr-bounce-to-top"><a
                                            href="{{ route('site.contact-us') }}" class="nav-link"></a>كيف تدعمنا
                                    </button>
                                </li>
                                </li>

                            </ul>

                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="hero_of_about" style="background-image: linear-gradient(90deg, rgb(43
        123 145 / 90%) 0%, rgb(8 204 127 / 66%) 100%),
        url(/site/images/banner-bg5.jpg)">
        <div class="text-center align-bottom hero-items">
            <h1 class="hero_title">مشاريع الجمعية </h1>
            <h5 class="hero_sub_title">الرئيسية / مشاريع الجمعية </h5>


        </div>
    </div>

</section>

<!-- end nav bar -->
<!-- search_box start -->
<section class="search_side" dir="rtl">
    <div class="s130 row">

        <div class="col-md-9 search_box">
            <form method="get" action="{{ route('site.projects') }}">
                <div class="inner-form">
                    <div class="input-field first-wrap">
                        <div class="svg-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" viewBox="0 0 24 24">
                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16
                      9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5
                      16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49
                      19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14
                      7.01 14 9.5 11.99 14 9.5 14z"></path>
                            </svg>
                        </div>
                        <input id="search_project" name="search" type="text" value="{{ $search }}"
                               placeholder="اكتب كلمات من عنوان الخبر للبحث"/>
                    </div>
                    <div class="input-field second-wrap">
                        <button class="btn-search" type="submit">بحث</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
</section>
<!-- search_box end -->
<!-- start section project -->
<section class="project_of_Gameya project_bg pt-5">
    <div class="container">
        <div class="row">

            @forelse ($projects as $project)
                <div class="img-of-project col-lg-4 col-md-12 text-center" data-aos="flip-left"
                     data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    <a href="javascript:void(0);"><img class="hvr-grow"
                                                       src="{{ asset('storage/' . $project->main_image) }}" alt=""></a>

                </div>

            @empty
                <div class="text-center">
                    <label for="">لا يوجد</label>
                </div>

            @endforelse


            <div class="col-md-12 text-center" dir="rtl">
                <nav class="text-center">
                    {!! $projects->links() !!}

                </nav>
                {{--                <nav class="text-center" aria-label="...">--}}
                {{--                    <ul class="pagination pagination-lg pagination justify-content-center">--}}
                {{--                        <li class="page-item active" aria-current="page">--}}
                {{--                            <span class="page-link">1</span>--}}
                {{--                        </li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#">5</a></li>--}}
                {{--                    </ul>--}}
                {{--                </nav>--}}
            </div>

        </div>
    </div>
</section>
<!-- end section project -->

<!-- FOOTER START -->
<footer class="footer" dir="rtl">
    <div class="container">
        <div class="row pt-5 pb-2">
            <div class="col-md-4 footer-logo">
                <img src="{{ asset('storage/' . App\Models\Websit::latest()->first()->logo) }}"
                     width="278px" height="131px" alt="{{App\Models\Websit::latest()->first()->websit_title}}">
            </div>
            <div class="col-md-4">
                <h4 class="text-right title_of_category_footer">القائمة الرئيسية</h4>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="text-right list_of_footer">
                            @foreach($menus as $menu)
                                <li><i class="fa-solid fa-angle-left"></i> <a
                                        href="{{ $menu->link }}">{{ $menu->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <h4 class="text-right title_of_category_footer">بيانات التواصل</h4>
                <div>
                    <ul class="text-right">
                        <li><img src="{{ asset('site/images/icons8-android-64.png') }}"
                                 alt=""> {{ App\Models\Websit::latest()->first()->phone }}</li>
                        <li><img src="{{ asset('site/images/icons8-email-64-(1).png') }}"
                                 alt="">{{ App\Models\Websit::latest()->first()->email }}</li>
                        <li><img src="{{ asset('site/images/icons8-map-64.png') }}"
                                 alt="">{{ App\Models\Websit::latest()->first()->address }}</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>
<!-- END OF FOOTER -->
<!-- start copy right -->
<section class="copy_right">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h6>جميع الحقوق محفوظة للجمعية الخيرية بمركز الحبيل</h6>
            </div>
        </div>
    </div>
</section>
<!-- end copy right -->
</body>
<script src="{{asset('site/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('site/js/popper.min.js')}}"></script>
<script src="{{asset('site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site/js/jquery.sticky.js')}}"></script>
<script src="{{asset('site/vendor/aos/aos.min.js')}}"></script>
<script src="{{asset('site/js/main.js')}}"></script>
</html>
