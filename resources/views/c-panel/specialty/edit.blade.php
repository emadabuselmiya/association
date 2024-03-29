@extends('layout.app')

@section('title')
    {{ __('Edit Specialty') }}
@stop

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Edit Specialty') }}</h2>
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
                        <form method="POST" action="{{ route('specialties.update',$specialty->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                {{-- project title --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">{{ __('Specialty Title') }}</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               value="{{ old('title',$specialty->title) }}" required autofocus>
                                    </div>
                                </div>
                                {{-- end project title --}}

                                {{-- project title --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="sub_title"
                                               class="form-label">{{ __('Specialty Sub Title') }}</label>
                                        <input type="text" class="form-control" id="sub_title" name="sub_title"
                                               value="{{ old('sub_title',$specialty->sub_title) }}">
                                    </div>
                                </div>
                                {{-- end project title --}}

                                {{-- main image --}}
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    @if($specialty->image)
                                        <img src="{{ asset('storage/'.$specialty->image) }}" width="100"
                                             alt="{{ $specialty->title }}">
                                    @endif
                                    <div class="form-group fallback w-100">
                                        <label for="image" class="form-label">{{ __('Specialty Main Image') }}</label>
                                        <input type="file" id="image" name="image" class="form-control"
                                               data-default-file="">
                                    </div>
                                </div>
                                {{-- end main image --}}

                                {{-- Gallary image --}}
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    @foreach ($specialty->images as $gallery)
                                        <div class="form-check form-check-inline">
                                            Delete <input type="checkbox" name="{{ "check_".$gallery->id }}"
                                                          class="form-check-input" value="">
                                        </div>
                                        <img src="{{ asset('storage/'.$gallery->image) }}" width="100"
                                             alt="{{ $specialty->title }}">
                                    @endforeach
                                    <div class="form-group fallback w-100">
                                        <label for="gallery" class="form-label">{{ __('Other Gallery Image') }}</label>
                                        <input type="file" multiple id="gallery" name="gallery[]" class="form-control"
                                               data-default-file="">
                                    </div>
                                </div>
                                {{-- end gallary image --}}

                                {{-- project title --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label">{{ __('Description') }}</label>
                                        <textarea name="description" id="description" class="form-control" rows="4">{{ old('description',$specialty->description) }}</textarea>

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
