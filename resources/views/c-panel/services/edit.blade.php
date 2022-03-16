@extends('layout.app')
@section('title')
    {{ __('Edit Services') }}
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Edit Services') }}</h2>
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
                        <form method="POST" action="{{ route('services.update',$service->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                {{-- service name --}}
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{ __('Service Name') }}</label>
                                        <input type="text"  class="form-control" id="name" name="name" value="{{ old('name',$service->name) }}" required autofocus >
                                    </div>
                                </div>
                                {{-- end service name --}}

                                {{-- service image --}}
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        @if($service->image)
                                            <img src="{{ asset('storage/'.$service->image) }}" width="50" alt="{{ $service->name }}">
                                        @endif
                                        <label for="image" class="form-label">{{ __('Service Image') }}</label>
                                        <input type="file" id="image" name="image" class="form-control" data-default-file="" >
                                    </div>
                                </div>
                                {{-- end service image --}}

                                {{-- service description --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="description" class="form-label">{{ __('Service Description') }}</label>
                                        <textarea name="description" id="description" class="form-control" rows="4">{{ old('description',$service->description) }}</textarea>
                                    </div>
                                </div>
                                {{-- end service description --}}

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    <button type="reset" class="btn btn-light">{{ __('Cencel') }}</button>
                                </div>
                            </div>
                        </form>                        <!-- users edit account form ends -->

                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
@endsection
