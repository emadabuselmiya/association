<section class="nav" dir="rtl">

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
                                <span class="d-none d-md-inline-block">{{ App\Models\Websit::latest()->first()->email  }}</span>
                            </a>
                            <a href="#" class="d-flex align-items-center ml-4">
                                <span class="icon-phone ml-2"></span>
                                <span class="d-none d-md-inline-block" dir="ltr">{{ App\Models\Websit::latest()->first()->email  }}
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
                        <h1 class="my-0 site-logo"><a href="{{ route('site.home') }}"><img
                                    src="{{ asset('storage/' . App\Models\Websit::latest()->first()->logo) }}" width="200px" alt=""></a></h1>
                    </div>
                    <div class="col-10">
                        <nav class="site-navigation text-right" role="navigation">

                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3
                      float-left"><a href="#" class="site-menu-toggle
                        js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
                            <ul class="site-menu text-left t main-menu js-clone-nav d-none
                      d-lg-block">
                                <li class="active"><a href="#home-section"
                                                      class="nav-link">عن الجمعية </a></li>
                                <li><a href="#classes-section" class="nav-link">الحوكمة</a></li>
                                <li class="has-children">
                                    <a href="#" class="nav-link">لبرامج والمشاريع </a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="#" class="nav-link">المتجر الالكتروني</a></li>
                                        <li><a href="#" class="nav-link">المركز الإعلامي</a></li>
                                        <li><a href="#" class="nav-link">لتواصل</a></li>
                                        <li class="has-children">
                                            <a href="#">More Links</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Menu One</a></li>
                                                <li><a href="#">Menu Two</a></li>
                                                <li><a href="#">Menu Three</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#about-section" class="nav-link">المتجر
                                        الالكتروني</a></li>
                                <li><a href="#events-section" class="nav-link">المركز
                                        الإعلامي</a></li>
                                <li><a href="#gallery-section" class="nav-link">التواصل</a></li>
                                <li>
                                    <button class="btn btn-outline-more hvr-bounce-to-top"><a
                                            href="#gallery-section" class="nav-link"></a>كيف
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
</section>



