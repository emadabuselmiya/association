<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
                                                                                                   data-feather="menu"></i></a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">


{{--            <li class="nav-item dropdown dropdown-language">--}}
{{--                <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown"--}}
{{--                   aria-haspopup="true" aria-expanded="false">--}}
{{--                    <i class="ficon" data-feather="globe"></i>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">--}}
{{--                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"--}}
{{--                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                            {{ $properties['native'] }}--}}
{{--                        </a>--}}
{{--                    @endforeach--}}

{{--                </div>--}}
{{--            </li>--}}

            <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);"
                                                                         data-toggle="dropdown"><i class="ficon"
                                                                                                   data-feather="bell"></i><span
                        class="badge badge-pill badge-danger badge-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                            <div class="badge badge-pill badge-light-primary">6 New</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list"><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar"><img
                                            src="../../../app-assets/images/portrait/small/avatar-s-15.jpg"
                                            alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Congratulation Sam
                                                🎉</span>winner!</p><small class="notification-text"> Won the monthly
                                        best seller badge.</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar"><img
                                            src="../../../app-assets/images/portrait/small/avatar-s-3.jpg"
                                            alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">New
                                                message</span>&nbsp;received</p><small class="notification-text"> You
                                        have 10 unread messages</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content">MD</div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Revised Order
                                                👋</span>&nbsp;checkout</p><small class="notification-text"> MD Inc.
                                        order updated</small>
                                </div>
                            </div>
                        </a>

                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block"
                                                        href="javascript:void(0)">Read all notifications</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                                                           id="dropdown-user" href="javascript:void(0);"
                                                           data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">{{ Auth::user()->name ?? '' }}</span>
                        <span class="user-status">{{ Auth::user()->role ?? '' }}</span>
                    </div>
                    <span class="avatar"><img
                            class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg"
                            alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    {{--                    <a--}}
                    {{--                        class="dropdown-item" href="{{route('admins.profile.index')}}"><i class="mr-50" data-feather="user"></i>--}}
                    {{--                        الملف الشخصي</a>--}}

                    <a class="dropdown-item" href="#" onclick="document.getElementById('logout').submit()">
                        <i class="mr-50" data-feather="power"></i> تسجيل الخروج</a>

                    <form action="{{ route('logout') }}" method="post" class="d-none" id="logout">
                        @csrf
                        <button type="submit"></button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- END: Header-->
