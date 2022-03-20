@extends('layout.app')
@section('title')
    {{ __('Create Menu') }}
@stop


@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Create Menu') }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <x-alert/>
                        <!-- users edit account form start -->
                        <form method="POST" action="{{ route('menus.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- project title --}}
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="title" class="form-label">{{ __('Menu name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{ old('name') }}" onchange="convertToSlug();" required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="title" class="form-label">{{ __('Main Menu') }}</label>
                                        <select name="parent_id" id="parent_id" class="form-control"
                                                onchange="convertToSlug();">
                                            <option value="0"></option>
                                            @foreach ($menus as $menu)
                                                <option @if ($menu->id == old('menu_id')) selected @endif
                                                value="{{ $menu->id }}">{{ $menu->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
{{--                                <div class="col-lg-6 col-md-6 col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="title" class="form-label">{{ __('Slug') }}</label>--}}
                                        <input type="hidden" class="form-control" id="slug" name="slug"
                                               value="{{ old('slug') }}" required autofocus>
{{--                                    </div>--}}
{{--                                </div>--}}
                                {{-- end project title --}}
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="title" class="form-label">{{ __('Menu Link') }}</label>
                                        <div class="d-block">
                                            <input type="url" class="form-control" id="link" name="link"
                                                   value="{{old('link')}}"
                                                   required>
                                        </div>
                                    </div>
                                    <a href="{{ route('setting-website-edit') }}">
                                        <h6 class="alert alert-primary p-2">{{ __('Note : add direct link in the page here') }} </h6>
                                    </a>
                                </div>


                                {{-- project title --}}


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    <button type="reset" class="btn btn-light">{{ __('Cencel') }}</button>
                                </div>
                            </div>
                        </form>
                        <!-- users edit account form ends -->

                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
@endsection
@section('js')
    <script>
        $(window).on("load", function () {
            var url = "{{ App\Models\Websit::first()->url }}";
            console.log(url);
            if (url == "") {
                alert('يرجى إدخال رابط الموقع')
            }
        });

        function convertToSlug() {
            var Text = document.getElementById("name").value;

            var t = Text.toString().toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^\w\u0621-\u064A0-9-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '').replace(/-+$/, '');

            if (url != "") {
                var url = "{{ App\Models\Websit::first()->url }}" + "/st/" + t;

                document.getElementById("link").value = url;
                document.getElementById("slug").value = t;
            }

        }
    </script>
@stop
