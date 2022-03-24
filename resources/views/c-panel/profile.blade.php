@extends('layout.app')

@section('title')
    الحساب الشخصي
@stop

@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/css-rtl/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/css-rtl/plugins/forms/pickers/form-pickadate.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/css-rtl/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/plugins/forms/form-validation.css') }}">
    <!-- END: Page CSS-->

@stop
@section('content')
    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">اعدادت الحساب </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column nav-left">
                            <!-- general -->
                            <li class="nav-item">
                                <a class="nav-link active" id="account-pill-general" data-toggle="pill"
                                   href="#account-vertical-general" aria-expanded="true">
                                    <i data-feather="user" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">البيانات الشخصية</span>
                                </a>
                            </li>
                            <!-- change password -->
                            <li class="nav-item">
                                <a class="nav-link" id="account-pill-password" data-toggle="pill"
                                   href="#account-vertical-password" aria-expanded="false">
                                    <i data-feather="lock" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">تغيير كلمة المرور</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--/ left menu section -->

                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- general tab -->
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                         aria-labelledby="account-pill-general" aria-expanded="true">

                                        <!-- form -->
                                        <form class="validate-form mt-2"
                                              action="{{ route('profile.updatePersonal') }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">

                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">الاسم</label>
                                                        <input type="text"
                                                               class="form-control @error('name') is-invalid @enderror"
                                                               id="full_name" name="full_name" placeholder="Name"
                                                               value="{{ old('name', Auth::user()->name) }}" />
                                                    </div>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-username">اسم المستخدم</label>
                                                        <label class="form-control" for="account-username">{{Auth::user()->user_name}}</label>
                                                    </div>
                                                    @error('user_name')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-e-mail">الابريد الالكتروني</label>
                                                        <input type="email"
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               id="account-e-mail" name="email" placeholder="Email"
                                                               value="{{ old('email', Auth::user()->email) }}" />
                                                    </div>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-company">رقم الهاتف</label>
                                                        <input type="text"
                                                               class="form-control @error('phone') is-invalid @enderror"
                                                               id="account-company" name="phone" placeholder="Phone"
                                                               value="{{ old('phone', Auth::user()->phone) }}" />
                                                    </div>
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <button data-toggle="modal" type="button"
                                                            data-target="#checkPasswordModal"
                                                            class="btn btn-primary mt-2 mr-1">حفظ
                                                        التغيير</button>
                                                    <button type="reset"
                                                            class="btn btn-outline-secondary mt-2">الغاء</button>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="checkPasswordModal" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">ادخل كلمة
                                                                المرور لتعديل
                                                                على البيانات</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class=" col-lg-12 col-sm-12">
                                                                    <label for="Name" class="mr-sm-2">كلمة
                                                                        المرور</label>
                                                                    <div class="input-group form-password-toggle mb-2">
                                                                        <input type="password" class="form-control"
                                                                               id="basic-default-password"
                                                                               placeholder="Your Password" name="password"
                                                                               aria-describedby="basic-default-password" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text cursor-pointer"><i
                                                                                    data-feather="eye"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">الأغلاق
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">حفظ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ general tab -->

                                    <!-- change password -->
                                    <div class="tab-pane fade" id="account-vertical-password" role="tabpanel"
                                         aria-labelledby="account-pill-password" aria-expanded="false">
                                        <!-- form -->
                                        <form class="validate-form" action="{{ route('profile.updatePassword') }}"
                                              method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-old-password">كلمة المرور الحالية</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password"
                                                                   class="form-control @error('current_password') is-invalid @enderror"
                                                                   id="account-old-password" name="current_password"
                                                                   placeholder="Old Password" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer">
                                                                    <i data-feather="eye"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @error('current_password')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-new-password">كلمة المرور الجديدة</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" id="account-new-password" name="password"
                                                                   class="form-control @error('password') is-invalid @enderror"
                                                                   placeholder="New Password" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer">
                                                                    <i data-feather="eye"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-retype-new-password">تكرار كلمة المرور
                                                            الجديدة</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password"
                                                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                   id="account-retype-new-password"
                                                                   name="password_confirmation" placeholder="New Password" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer"><i
                                                                        data-feather="eye"></i></div>
                                                            </div>
                                                        </div>
                                                        @error('password_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mt-1">حفظ التغيير</button>
                                                    <button type="reset"
                                                            class="btn btn-outline-secondary mt-1">الغاء</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ change password -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ right content section -->
                </div>
            </section>
            <!-- / account setting page -->

        </div>
    </div>
    <!-- END: Content-->

@endsection

@section('js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->


@stop
