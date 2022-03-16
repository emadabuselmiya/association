@extends('layout.app')
@section('title')
    {{ __('Create Blogs') }}
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Create Blogs') }}</h2>
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
                        <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- project title --}}
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">{{ __('Blog Title') }}</label>
                                        <input type="text"  class="form-control" id="title" name="title" value="{{ old('title') }}" required autofocus >
                                    </div>
                                </div>
                                {{-- end project title --}}

                                {{-- project title --}}
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="sub_title" class="form-label">{{ __('Blog Sub Title') }}</label>
                                        <input type="text"  class="form-control" id="sub_title" name="sub_title" value="{{ old('sub_title') }}" >
                                    </div>
                                </div>
                                {{-- end project title --}}

                                {{-- main image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="main_image" class="form-label">{{ __('Blog Main Image') }}</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control" data-default-file="" >
                                    </div>
                                </div>
                                {{-- end main image --}}

                                {{-- project title --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label">{{ __('Blog Description') }}</label>
                                        <textarea name="description" id="summernote" cols="30" rows="10">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                {{-- end project title --}}

                                {{-- Gallary image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="gallery" class="form-label">{{ __('Other Gallery Image') }}</label>
                                        <input type="file" multiple id="gallery" name="gallery[]" class="form-control" data-default-file="" >
                                    </div>
                                </div>
                                {{-- end gallary image --}}

                                {{-- project title --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="tags" class="form-label">{{ __('Blog Tags') }}</label>
                                        <input type="text" value="{{ old('tags') }}" class="form-control" data-role="tagsinput"  name="tags">
                                    </div>
                                </div>
                                {{-- end project title --}}


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

