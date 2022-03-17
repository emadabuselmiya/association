/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$(function () {
    'use strict';

    var dtUserTable = $('.user-list-table'),
        dtClintTable = $('.client-list-table'),
        dtSpecialtyTable = $('.specialty-list-table'),
        dtServiceTable = $('.service-list-table'),
        dtMenuTable = $('.menu-list-table'),
        dtSubMenuTable = $('.sub-menu-list-table'),
        dtSubserviceTable = $('.subservice-list-table'),
        dtPhotoAlbumTable = $('.photo-album-list-table'),
        dtVedioAlbumTable = $('.vedio-album-list-table'),
        dtProjectTable = $('.project-list-table'),
        dtPageTable = $('.page-list-table'),
        dtStaticPageTable = $('.static-page-list-table'),
        dtBlogTable = $('.blog-list-table'),
        dtTeamTable = $('.team-list-table'),
        dtSliderTable = $('.slider-list-table'),
        dtContactTable = $('.contact-list-table'),
        dtOrderTable = $('.order-list-table'),


        statusJudgement = {
            0: {title: 'مرفوض', class: 'badge-light-danger'},
            1: {title: 'مقبول', class: 'badge-light-success'},
        };


    // Users List datatable
    if (dtUserTable.length) {
        dtUserTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/users'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'name'},
                {data: 'email'},
                {data: 'role'},
                {data: 'phone'},
                {data: 'actions', orderable: false}
            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/users/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }
            ],
            initComplete: function () {
                // Adding role filter once table initialized
                this.api()
                    .columns(2)
                    .every(function () {
                        var column = this;
                        var select = $(
                            '<select id="UserRole" class="form-control text-capitalize mb-md-0 mb-2"><option value=""> اختار الصلاحية </option></select>'
                        )
                            .appendTo('.user_role')
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                console.log(val);
                                column.search(val ? val : '', true, false).draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                            });
                    });

            }

        });
    }

    if (dtClintTable.length) {
        dtClintTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/clients'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'image', orderable: false},
                {data: 'name'},
                {data: 'client_url'},
                {data: 'actions', orderable: false}
            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/clients/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtSpecialtyTable.length) {
        dtSpecialtyTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/specialties'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'image', orderable: false},
                {data: 'title'},
                {data: 'sub_title'},
                {data: 'actions', orderable: false}
            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/specialties/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtServiceTable.length) {
        dtServiceTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/services'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'image', orderable: false},
                {data: 'name'},
                {data: 'description'},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    // Actions
                    targets: 2,
                    width: '300 px',
                }

            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/services/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtSubserviceTable.length) {
        dtSubserviceTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/subservices'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'image', orderable: false},
                {data: 'name'},
                {data: 'parent'},
                {data: 'description'},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    // Actions
                    targets: 2,
                    width: '300 px',
                }

            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/subservices/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtMenuTable.length) {
        dtMenuTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/menus'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'name'},
                {data: 'link'},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    // Actions
                    targets: 2,
                    width: '300 px',
                }

            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/menus/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtSubMenuTable.length) {
        dtSubMenuTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/sub-menus'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'name'},
                {data: 'parent'},
                {data: 'link'},
                {data: 'actions', orderable: false}
            ],


            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/sub-menus/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtPhotoAlbumTable.length) {
        dtPhotoAlbumTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/photo-album'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'image', orderable: false},
                {data: 'name'},
                {data: 'image_number'},
                {data: 'actions', orderable: false}
            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/photo-album/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtVedioAlbumTable.length) {
        dtVedioAlbumTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/vedio-album'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'name'},
                {data: 'link'},
                {data: 'actions', orderable: false}
            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/vedio-album/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtProjectTable.length) {
        dtProjectTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/projects'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'image', orderable: false},
                {data: 'title'},
                {data: 'client_name'},
                {data: 'service_name'},
                {data: 'during_date'},
                {data: 'actions', orderable: false}
            ],

            order: [1, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/projects/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtPageTable.length) {
        dtPageTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/pages'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'main_image', orderable: false},
                {data: 'title'},
                {data: 'sub_title'},
                {data: 'actions', orderable: false}
            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/pages/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtStaticPageTable.length) {
        dtStaticPageTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/pages/static'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'main_image', orderable: false},
                {data: 'title'},
                {data: 'sub_title'},
                {data: 'actions', orderable: false}
            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/pages/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtBlogTable.length) {
        dtBlogTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/blogs'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'main_image', orderable: false},
                {data: 'title'},
                {data: 'sub_title'},
                {data: 'actions', orderable: false}
            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/blogs/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtOrderTable.length) {
        dtOrderTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/orders'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'name',},
                {data: 'service_name'},
                {data: 'status'},
                {data: 'created_at'},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    // Actions
                    targets: 3,
                    width: '300 px',
                }

            ],

            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                }
            ],

        });
    }

    if (dtTeamTable.length) {
        dtTeamTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/teams'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'image', orderable: false},
                {data: 'name'},
                {data: 'position'},
                {data: 'actions', orderable: false}
            ],

            order: [1, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/teams/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtSliderTable.length) {
        dtSliderTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/sliders'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'image', orderable: false},
                {data: 'title'},
                {data: 'sub_title'},
                {data: 'link'},
                {data: 'description'},
                {data: 'actions', orderable: false}
            ],
            columnDefs: [
                {
                    targets: 4,
                    width: '400px',

                }
            ],
            order: [1, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                },
                {
                    text: 'اضافة جديد',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        "type": "button",
                        "onclick": "location.href = '/c-panel/sliders/create'",
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }

                },
            ],

        });
    }

    if (dtContactTable.length) {
        dtContactTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/c-panel/contacts'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'name'},
                {data: 'email'},
                {data: 'message'},
                {data: 'date'},
                {data: 'actions', orderable: false}
            ],

            order: [0, 'desc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'بحث',
                searchPlaceholder: 'بحث..',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'طباعة',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'اكسل',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    },
                }
            ],

        });
    }
});
