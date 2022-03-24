@jquery
@toastr_js
@toastr_render
<!-- BEGIN: Vendor JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="{{ asset('assets/tagsinput/bootstrap-tagsinput.js') }}"></script>

<script>
    $('#summernote').summernote({
        placeholder: 'Description ...',
        tabsize: 1,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    $('#summernote1').summernote({
        placeholder: 'Description ...',
        tabsize: 1,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    $('#summernote2').summernote({
        placeholder: 'Description ...',
        tabsize: 1,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    $('#summernote3').summernote({
        placeholder: 'Description ...',
        tabsize: 1,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    $('#summernote4').summernote({
        placeholder: 'Description ...',
        tabsize: 1,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>

<script type="text/javascript">
    // Department Change
    $('#menu_id').change(function () {

        // Department id
        var id = $(this).val();
        //alert('hi');
        // Empty the dropdown
        // $('#sub_id').find('option').not(':first').remove();

        // AJAX request
        $.ajax({
            url: '/c-panel/sub-menu/ajax/' + id,
            type: 'get',
            data: "json",
            success: function (data) {
                $('select[name="subMenu_id"]').empty();
                $('select[name="subMenu_id"]').append('<option value="">اختار قائمة فرعية</option>')
                $.each(data, function (key, value) {
                    // console.log(value.name)
                    $('select[name="subMenu_id"]').append('<option value="' + value.id + '">' + value.name + '</option>')
                });

            }
        });
    });
</script>

@yield('js','')


<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
