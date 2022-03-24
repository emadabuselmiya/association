@extends('layout.app')
@section('title')
    {{ __('Edit Page') }}
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Edit Page') }}</h2>
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
                        <form method="POST" action="{{ route('static.update',$page->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                {{-- project title --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">{{ __('Page Title') }}</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               value="{{ old('title',$page->title) }}" required autofocus>
                                    </div>
                                </div>

                                {{-- main image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    @if($page->main_image)
                                        <img src="{{ asset('storage/'.$page->main_image) }}" width="100"
                                             alt="{{ $page->title }}">
                                    @endif
                                    <div class="form-group fallback w-100">
                                        <label for="main_image" class="form-label">{{ __('Page Main Image') }}</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control"
                                               data-default-file="">
                                    </div>
                                </div>
                                {{-- end main image --}}



                                {{-- project title --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label">{{ __('Description') }}</label>
                                        <textarea name="description" id="summernote" cols="30"
                                                  rows="10">{{ old('description',$page->description) }}</textarea>
                                    </div>
                                </div>
                                {{-- end project title --}}

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label">الرؤية</label>
                                        <textarea name="vision" id="summernote2" cols="30"
                                                  rows="10">{{ old('vision',$page->vision) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label">الرسالة</label>
                                        <textarea name="message" id="summernote3" cols="30"
                                                  rows="10">{{ old('message',$page->message) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label">الأهداف</label>
                                        <textarea name="objectives" id="summernote4" cols="30"
                                                  rows="10">{{ old('objectives',$page->objectives) }}</textarea>
                                    </div>
                                </div>


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

