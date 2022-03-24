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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">

    <title>جمعية الجيل</title>


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
                                    <button class="btn btn-outline-more hvr-bounce-to-top"><a
                                            href="{{ route('site.contact-us') }}" class="nav-link"></a>كيف
                                        تدعمنا
                                    </button>
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
        <div data-aos="fade-up" class="text-center align-bottom hero-items">
            <h1 class="hero_title">الاخبار والفعاليات
            </h1>
            <h5 class="hero_sub_title">الرئيسية / عن الجمعية </h5>


        </div>
    </div>

</section>

<!-- end nav bar -->
<!-- section of post_details -->
<section class="post_details mt-5 pt-5" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="img_of_post" data-aos="fade-up">
                    <img src="{{ asset('storage/' . $new->main_image) }}" class="img-fluid" alt="">
                </div>
                <div class="date_of_post text-right pt-3" data-aos="fade-down">
                    <span>التاريخ : {{ $new->created_at->translatedFormat('d F Y') }}</span>
                </div>
                <div class="title_of_post text-right pt-4 pb-5" data-aos="fade-up">
                    <h4>{{ $new->title }}</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="read_more_option p-4 mb-5" data-aos="fade-down">


                    <div class="row pt-3 pb-3">
                        <div class="col-lg-12">
                            <h5 class="text-right">اقرا أيضا </h5>
                        </div>
                    </div>
                    @foreach($news as $item)
                        <div class="row pb-3">
                            <div class="col col_of_img_read_more">
                                <div class="img_read_more">
                                    <img src="{{ asset('storage/' . $item->main_image) }}" height="90px" width="100%"
                                         class="" alt="">
                                </div>
                            </div>
                            <div class="col col_of_desc_of_read_more text-right">
                                <p class="desc_read_more">
                                    <a href="{{ route('site.news.show', $item->id) }}">{{ $item->title }}
                                    </a>
                                </p>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    @endforeach

                </div>
                <div class="share_post_with_other mb-5 text-right" data-aos="fade-up">
                    <div class="row">
                        <div class="col-lg-12 pb-2">
                            <h3 class="title_of_share">مشاركة الخبر</h3>
                        </div>
                        <div class="col-lg-2 col ">
                            <a href="#" class=""><span class="icon-twitter"></span></a>

                        </div>
                        <div class="col-lg-2 col">
                            <a href="#" class=""><span class="icon-instagram"></span></a>
                        </div>
                        <div class="col-lg-2 col">
                            <a href="#" class=""><span class="icon-linkedin"></span></a>

                        </div>
                        <div class="col-lg-2 col">
                            <a href="#" class=""><span class="icon-facebook"></span></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-right">
                <p class="desc_of_the_post" data-aos="fade-down">{{ strip_tags($new->description) }}
                </p>
            </div>
            <div class="col-lg-12 text-right keyword_of_paragraph" data-aos="fade-up">
                <span>الكلمات الدلالية:</span>
                <ul class="keywords">
                    @foreach($new->tags as $tag)
                        <li>{{$tag->name}}</li>

                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-lg-6 text-right">
                <ul class="row next_post">
                    <li class="col-auto next_post_arrow"><a href=""><i class="fa-solid fa-angle-right"></i> الخبر التالي</a>
                    </li>

                    <li class="col-auto"><img src="/site/images/Mask Group 2.png" alt=""></li>
                    <li class="col title_of_next_post">
                        <h5><a href=""> عنوان الخبر يكتب هنا نص لعنوان الخبر نص تجريبي للعنوان الخاص بالخبر هنا</a></h5>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 text-right">
                <ul class="row next_post">

                    <li class="col-auto"><img src="/site/images/Mask Group 2.png" alt=""></li>
                    <li class="col title_of_next_post">

                        <h5><a href=""> عنوان الخبر يكتب هنا نص لعنوان الخبر نص تجريبي للعنوان الخاص بالخبر هنا</a></h5>
                    </li>
                    <li class="col-auto next_post_arrow"><a href="">الخبر السابق <i class="fa-solid fa-angle-left"></i>
                        </a></li>

                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end section of post_details -->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>

<script src="{{asset('site/js/main.js')}}"></script>
</html>
