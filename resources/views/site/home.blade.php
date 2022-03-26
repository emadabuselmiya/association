<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{asset('site/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/hover.css')}}">
    <link rel="stylesheet" href="{{asset('site/vendor/aos/aos.min.css')}}">
    <link rel="apple-touch-icon"
          href="{{ asset('storage/' . App\Models\Websit::latest()->first()->favicon_image ?? 'app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon"
          href="{{ asset('storage/' . App\Models\Websit::latest()->first()->favicon_image ?? 'app-assets/images/ico/apple-icon-120.png') }}">

    <title>{{App\Models\Websit::latest()->first()->websit_title}}</title>


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
    </div>
    <!-- .site-mobile-menu -->


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
                        <h1 class="my-0 site-logo">
                            <a href="{{ route('site.home') }}">
                                <img src="{{ asset('storage/' . App\Models\Websit::latest()->first()->logo) }}"
                                     width="200px" alt="{{App\Models\Websit::latest()->first()->websit_title}}">
                            </a>
                        </h1>
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

                            </ul>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero" style="background-image: linear-gradient(90deg, rgb(43
        123 145 / 90%) 0%, rgb(8 204 127 / 66%) 100%),
        url({{ asset('storage/' .  $slider->image) }})">
        <div class="text-center align-bottom hero-items">
            <h1 class="hero_title">{{ $slider->title }}</h1>
            <h5 class="hero_sub_title">{{ $slider->sub_title }}</h5>
            <p class="hero_pargraph">{{ $slider->description }}</p>
            <a href="{{ route('site.contact-us') }}" class="btn btn-primary btn-of-share-us" >شاركنا
                الاجر</a>


        </div>
    </div>

</section>

<!-- end nav bar -->
<!-- start section of service -->
<section class="service" data-aos="fade-up" data-aos-anchor-placement="center-center" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center pt-5 p-5">خدمات الجمعية</h2>
            </div>
            @foreach($services as $service)
                <div class="col">
                    <div class="card p-3 mb-5 bg-body rounded" style="width: 100%;">
                        <div class="card-body text-center">
                            <div class="rounded-circle">
                                <img class="rounded-circle " src="{{ asset('storage/' . $service->image) }}" alt="">

                            </div>
                            <h5 class="card-title pt-3">{{ $service->name }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="about" data-aos="fade-up" data-aos-anchor-placement="top-center" dir="rtl">

                <div class="row">
                    <div class="col-md-8">
                        <h3 class="text-right pb-2">تعرف علي الجمعية</h3>
                        <p class="text-right">{{ strip_tags($about->description) }}</p>
                    </div>
                    <div class="col-md-4 pt-3">
                        <div class="row">
                            @foreach($statistics as $statistic)
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col">
                                        <img src="{{ asset('site/images/family.png') }}" alt="">
                                        <span class="family-number">+{{ $statistic->count }}</span>
                                    </div>
                                    <div class="col">
                                        <h5 class="text-right family-title">{{ $statistic->name }}</h5>
                                        <p class="text-right family-paragraph">{{ $statistic->description }}</p>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>

</section>
<!-- end section of service -->
<!-- start section about -->

<!-- end secton about -->
<!-- start section of News -->
<section class="news mt-5" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center pt-5 p-5">اخبار الجمعية</h2>
            </div>
            @foreach($news as $item)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card" style="width: 100%;">
                        <div class="image-of-news"><img src="{{ asset('storage/' . $item->main_image) }}"
                                                        class="card-img-top hvr-grow"
                                                        alt="..."></div>

                        <span class="date-of-card">{{ $item->created_at->translatedFormat('d F Y') }}</span>
                        <div class="card-body">
                            <a href="{{ route('site.news.show', $item->id) }}">
                                <h3 class="card-text card-paragraph text-center">{{ $item->title }}</h3>
                                <p class="card-text text-center text-muted">{{ strip_tags($item->description) }}</p>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach
            <div class="col-md-12 text-center">
                <a href="{{ route('site.news') }}" class="btn btn-outline-more hvr-bounce-to-top">المزيد</a>

            </div>
        </div>

    </div>
</section>
<!-- end section of News -->
<!-- start section project -->
<section class="project_of_Gameya pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center pt-5 p-5">مشاريع الجمعية</h2>
            </div>
            @foreach($projects as $project)
                <div class="img-of-project col-lg-4 col-md-12 text-center" data-aos="flip-left"
                     data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    <a href=""><img class="hvr-grow" src="{{ asset('storage/' . $project->main_image) }}" alt=""></a>

                </div>
            @endforeach
            <div class="col-md-12 text-center">
                <a href="{{ route('site.projects') }}" class="btn btn-outline-more hvr-bounce-to-top">المزيد</a>
            </div>
        </div>
    </div>
</section>
<!-- end section project -->
<!-- start partners   -->
<section class="partners" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center pt-5 p-5">شركاء النجاح</h2>
            </div>
            @foreach($teams as $team)
                <div class="col-md-3">
                    <div class="card bg-white rounded mb-5" style="width: 100%;">
                        <div class="card-body">
                            <img width="100%" src="{{ asset('storage/' . $team->image) }}" alt="">
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- end partners -->
<!-- start magazine -->
<section class="magazine mt-5" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h5>هل تريد المساهمة في هذا الاجر والعمل الخيري</h5>
                <h3 class="mt-3">ساهم معنا وكن سببا في نجاح ودعم الاعمال الخيرية</h3>
            </div>
            <div class="col-md-12 text-center mt-5">
                <button type="button" class="btn btn-outline-more ">ساهم معنا الان</button>
            </div>
        </div>
    </div>
</section>
<!-- end magazine -->
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
