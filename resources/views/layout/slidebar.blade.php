<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('dashboard') }}">
                    <span class="brand-logo">
                        <img src="{{ asset('storage/' . (App\Models\Websit::latest()->first()->logo)) }}"
                             alt="">
                    </span>
                    <h2 class="brand-text font-small-4">{{ App\Models\Websit::latest()->first()->websit_title ?? ''}}</h2>
                </a>
            </li>

            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

{{--            <li class="nav-label first">{{ __('Main Menu') }}</li>--}}
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i
                        data-feather="home"></i><span class="menu-title text-truncate"
                                                      data-i18n="order">{{ __('Dashboard') }}</span></a>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="users"></i><span class="menu-title text-truncate"
                                                       data-i18n="order">{{ __('Users') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('all-users') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('All Users') }}</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('create-users') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Create Users') }}</span></a>
                    </li>


                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="user"></i><span class="menu-title text-truncate"
                                                      data-i18n="order">{{ __('Clients') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('clients.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('All Clients') }}</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('clients.create') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Create Clients') }}</span></a>
                    </li>


                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="grid"></i><span class="menu-title text-truncate"
                                                      data-i18n="order">{{ __('Specialty') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('specialties.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('All Specialties') }}</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('specialties.create') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Create Specialties') }}</span></a>
                    </li>


                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="layers"></i><span class="menu-title text-truncate"
                                                        data-i18n="order">{{ __('Services') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('services.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('All Services') }}</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('subservices.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('All Sub Services') }}</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('services.create') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Create Services') }}</span></a>
                    </li>


                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="menu"></i><span class="menu-title text-truncate"
                                                      data-i18n="order">{{ __('Menus') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('menus.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Website Menus') }}</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('sub-menus.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Sub-Menus') }}</span></a>
                    </li>


                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="image"></i><span class="menu-title text-truncate"
                                                       data-i18n="order">{{ __('Multi Media') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('photo-album.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Photo Album') }}</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('vedio-album.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Vedio Album') }}</span></a>
                    </li>


                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="list"></i><span class="menu-title text-truncate"
                                                      data-i18n="order">{{ __('Projects') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('projects.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('All Projects') }}</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('projects.create') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Create Project') }}</span></a>
                    </li>


                </ul>
            </li>

            @if ($hosting = App\Models\Service::where('name', 'LIKE', 'Hosting')->first())

                <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                            data-feather="server"></i><span class="menu-title text-truncate"
                                                            data-i18n="order">{{ __('Hosting') }}</span></a>
                    <ul class="menu-content">

                        @foreach ($hosting->subServices as $sub_host)
                            {{-- this element to view all services page --}}
                            <li><a class="d-flex align-items-center" href="{{ route('plans.show', $sub_host->id) }}"><i
                                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                                        data-i18n="List">{{ $sub_host->name }}</span></a>
                            </li>
                        @endforeach
                    </ul>
                </li>

            @endif

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="clipboard"></i><span class="menu-title text-truncate"
                                                           data-i18n="order">{{ __('Pages') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('pages.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('All Pages') }}</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('pages.create') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Create Page') }}</span></a>
                    </li>


                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="layout"></i><span class="menu-title text-truncate"
                                                        data-i18n="order">{{ __('Blogs') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('blogs.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('All Blogs') }}</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('blogs.create') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Create Blogs') }}</span></a>
                    </li>


                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="users"></i><span class="menu-title text-truncate"
                                                       data-i18n="order">{{ __('Team') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('teams.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('All Team Members') }}</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('teams.create') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Create Team Member') }}</span></a>
                    </li>


                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="sliders"></i><span class="menu-title text-truncate"
                                                         data-i18n="order">{{ __('Slider') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('sliders.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('All Sliders') }}</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('sliders.create') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Create Slider') }}</span></a>
                    </li>


                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="align-justify"></i><span class="menu-title text-truncate"
                                                               data-i18n="order">{{ __('Orders') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('orders.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('All Orders') }}</span></a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="headphones"></i><span class="menu-title text-truncate"
                                                            data-i18n="order">{{ __('Contacts') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('contacts.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('All Contacts') }}</span></a>
                    </li>


                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="javascript:void(0);"><i
                        data-feather="settings"></i><span class="menu-title text-truncate"
                                                          data-i18n="order">{{ __('Setting') }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('setting-website-edit') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                                                data-i18n="List">{{ __('Website Setting') }}</span></a>
                    </li>

                </ul>
            </li>


        </ul>
    </div>
</div>
<!-- END: Main Menu-->
