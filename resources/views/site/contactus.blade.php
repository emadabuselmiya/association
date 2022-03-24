<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/style.css')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="{{ asset('site/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/hover.css')}}">
    <link rel="stylesheet" href="{{ asset('site/vendor/aos/aos.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">

    <link rel="apple-touch-icon"
          href="{{ asset('storage/' . App\Models\Websit::latest()->first()->favicon_image ?? 'app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon"
          href="{{ asset('storage/' . App\Models\Websit::latest()->first()->favicon_image ?? 'app-assets/images/ico/apple-icon-120.png') }}">

    <title>{{App\Models\Websit::latest()->first()->websit_title}}</title>

    @toastr_css



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
                            <a href="#" class="d-flex align-items-center ml-4">
                                <span class="icon-envelope ml-2"></span>
                                <span class="d-none d-md-inline-block">info@domain.com</span>
                            </a>
                            <a href="#" class="d-flex align-items-center ml-4">
                                <span class="icon-phone ml-2"></span>
                                <span class="d-none d-md-inline-block" dir="ltr">+96656541112
                    </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 text-left">
                        <div class="mr-auto social-icon">
                            <a href="#" class="p-2 pl-0"><span class="icon-twitter"></span></a>
                            <a href="#" class="p-2 pl-0"><span class="icon-facebook"></span></a>
                            <a href="#" class="p-2 pl-0"><span class="icon-linkedin"></span></a>
                            <a href="#" class="p-2 pl-0"><span class="icon-instagram"></span></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="site-navbar site-navbar-target js-sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-2">
                        <h1 class="my-0 site-logo"><a href="index.html"><img
                                    src="images/Group 24.png" width="200px" alt=""></a></h1>
                    </div>
                    <div class="col-10">
                        <nav class="site-navigation text-right"role="navigation">

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
                                <li><button class="btn btn-outline-more hvr-bounce-to-top"><a
                                            href="{{ route('site.contact-us') }}" class="nav-link"></a>كيف
                                        تدعمنا</button></li>

                            </ul>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div data-aos="fade-down" class="hero_of_about" style="background-image: linear-gradient(90deg, rgb(43
        123 145 / 90%) 0%, rgb(8 204 127 / 66%) 100%),
        url(images/banner-bg5.jpg)">
        <div class="text-center align-bottom hero-items">
            <h1 class="hero_title">تواصل معنا
            </h1>
            <h5 class="hero_sub_title">الرئيسية / تواصل معنا        </h5>



        </div>
    </div>

</section>

<!-- end nav bar -->
<section class="contact_us_form"  dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center pt-5" data-aos="fade-up">
                <h3>تواصل معنا</h3>
                <p>يسعدنا تواصلكم واستفساراتكم معنا</p>
            </div>
            <div class="col-md-8 offset-md-1 text-right mb-5 mt-4" data-aos="fade-down">
                <x-alert/>
                <form action="{{ route('site.contact-us') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">الاسم</label>
                            <input type="text" class="form-control" id="inputEmail4" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">رقم الجوال</label>
                            <input type="text" class="form-control" id="inputPassword4" name="phone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">البريد الالكتروني</label>
                            <input type="text" class="form-control" id="inputEmail4" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">الموضوع</label>
                            <input type="text" class="form-control" id="inputPassword4" name="subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">الرسالة</label>
                        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="7"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </form>
            </div>
            <div class="col-md-3 text-right p-4 mb-5 mt-5 content_of_detail_contact" data-aos="fade-up">
                <h5>البريد الالكتروني</h5>
                <span>{{ App\Models\Websit::latest()->first()->email }}</span>
                <h5>رقم الجوال</h5>
                <span>{{ App\Models\Websit::latest()->first()->phone }}</span>
{{--                <h5>رقم الفاكس</h5>--}}
{{--                <span>{{ App\Models\Websit::latest()->first()->phone }}</span>--}}
                <h5>العنوان</h5>
                <span>{{ App\Models\Websit::latest()->first()->address }}</span>
            </div>

        </div>
    </div>
    <div data-aos="fade-down" style="width: 100%"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/marine-gps/">shipping gps</a></iframe></div>

</section>

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
@jquery
@toastr_js
@toastr_render
<script src="{{ asset('site/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('site/js/popper.min.js')}}"></script>
<script src="{{ asset('site/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('site/js/jquery.sticky.js')}}"></script>
<script src="{{ asset('site/vendor/aos/aos.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>

<script src="{{ asset('site/js/main.js')}}"></script>
</html>
