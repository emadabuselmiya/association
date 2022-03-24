@extends('layout.app')
@section('title')
    الاحصائيات
@stop
@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <!-- END: Page CSS-->
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">الاحصائيات</h2>

                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">

                <!-- list section start -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <x-alert/>
                        <table class="statistic-list-table table">
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>قيمة الاحصائية</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
                <!-- list section end -->
            </section>
            <!-- users list ends -->
        </div>
        <div class="modal fade" id="modals-create">
            <div class="modal-dialog">
                <form class="add-new-user modal-content pt-0" action="{{route('statistics.store')}}"
                      method="POST">
                    @csrf
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">اضافة الإحصائية</h5>
                    </div>
                    <div class="modal-body flex-grow-1">

                        <div class="form-group">
                            <label for="username">اسم الإحصائية</label>
                            <input type="text" class="form-control"
                                   name="name" id="name" required>
                        </div>

                        <div class="form-group">
                            <label for="username">قيمة الإحصائية</label>
                            <input type="number" class="form-control"
                                   name="count" id="count" required>
                        </div>
                        <div class="form-group">
                            <label for="username">الوصف</label>
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-1 data-submit">حفظ</button>
                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">الغاء
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @foreach ($statistics as $statistic)
        <!-- Modal to add new user starts-->
            <div class="modal fade" id="modals-edit-{{ $statistic->id }}">
                <div class="modal-dialog">
                    <form class="add-new-user modal-content pt-0" action="{{route('statistics.update',$statistic->id)}}"
                          method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">تعديل الإحصائية</h5>
                        </div>
                        <div class="modal-body flex-grow-1">

                            <div class="form-group">
                                <label for="username">اسم الإحصائية</label>
                                <input type="text" class="form-control" value="{{ $statistic->name }}"
                                       name="name" id="name" required>
                            </div>

                            <div class="form-group">
                                <label for="username">قيمة الإحصائية</label>
                                <input type="number" class="form-control" value="{{ $statistic->count }}"
                                       name="count" id="count" required>
                            </div>
                            <div class="form-group">
                                <label for="username">الوصف</label>
                                <textarea name="description" id="description" cols="30" rows="10">{{ $statistic->description }}</textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary mr-1 data-submit">تعديل</button>
                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">الغاء
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="modals-delete-{{ $statistic->id }}">
                <div class="modal-dialog">
                    <form class="add-new-user modal-content pt-0"
                          action="{{route('statistics.destroy',$statistic->id)}}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">حذف </h5>
                        </div>
                        <div class="modal-body flex-grow-1">

                            <h4>هل تريد حذف الإحصائية؟</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger mr-1 data-submit">حذف</button>
                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">الغاء
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal to add new user Ends-->
        @endforeach
    </div>
@endsection

@section('js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>

    <!-- END: Page Vendor JS-->


    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/emad.js') }}"></script>
    {{-- <script src="{{asset('app-assets/js/scripts/tables/table-datatables-basic.js')}}"></script> --}}
    {{-- <script src="{{asset('app-assets/js/datatables.js')}}"></script> --}}
    <!-- END: Page JS-->

@stop
