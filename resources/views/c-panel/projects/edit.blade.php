@extends('layout.app')
@section('title')
    {{ __('Edit Projects') }}
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Edit Projects') }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <x-alert />
                        {{-- form for store clients --}}
                        <form method="POST" action="{{ route('projects.update', $project->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                {{-- project title --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">{{ __('Project Title') }}</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ old('title', $project->title) }}" required autofocus>
                                    </div>
                                </div>
                                {{-- end project title --}}

                                {{-- main image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    @if ($project->main_image)
                                        <img src="{{ asset('storage/' . $project->main_image) }}" width="100"
                                            alt="{{ $project->title }}">
                                    @endif
                                    <div class="form-group fallback w-100">
                                        <label for="main_image"
                                            class="form-label">{{ __('Project Main Image') }}</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control"
                                            data-default-file="">
                                    </div>
                                </div>
                                {{-- end main image --}}

                                {{-- Select Client --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <div class="form-group">
                                            <label for="client_id" class="form-label">{{ __('Client Name') }}</label>

                                            <select name="client_id" id="client_id" class="form-control">
                                                @foreach (App\Models\Client::all() as $client)
                                                    <option @if ($client->id == old('client_id', $project->client->id ?? 'NO CLIENT')) selected @endif
                                                        value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- end Select Client --}}

                                {{-- Select Service --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <div class="form-group">
                                            <label for="service_id"
                                                class="form-label">{{ __('Service Name') }}</label>

                                            <select name="service_id" id="service_id" class="form-control">
                                                @foreach (App\Models\Service::all() as $service)
                                                    <option @if ($service->id == old('service_id', $project->service->id)) selected @endif
                                                        value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- end Select Service --}}

                                {{-- Gallary image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">

                                    @foreach ($project->images as $gallery)
                                        <div class="form-check form-check-inline">
                                            Delete <input type="checkbox" name="{{ 'check_' . $gallery->id }}"
                                                class="form-check-input" value="">
                                        </div>
                                        <img src="{{ asset('storage/' . $gallery->image) }}" width="100"
                                            alt="{{ $project->title }}">
                                    @endforeach

                                    <div class="form-group fallback w-100">
                                        <label for="gallery"
                                            class="form-label">{{ __('Other Gallery Image') }}</label>
                                        <input type="file" multiple id="gallery" name="gallery[]" class="form-control"
                                            data-default-file="">
                                    </div>
                                </div>
                                {{-- end gallary image --}}

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="duringdate" class="form-label">{{ __('During Date') }}</label>
                                        <input type="date" name="during_date" id="date-format"
                                            value="{{ old('during_date', $project->during_date) }}"
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    <button type="reset" class="btn btn-light">{{ __('Cencel') }}</button>
                                </div>
                            </div>
                        </form>
                        {{-- end form --}}
                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
@endsection
