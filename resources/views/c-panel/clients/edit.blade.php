@extends('layout.app')

@section('title')
    {{ __('Edit Clients') }}
@stop
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Edit Clients') }}</h2>
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
                        <form method="POST" action="{{ route('clients.update',$client->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                {{-- client name --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">{{ __('Client Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{ old('name',$client->name) }}" required autofocus>
                                    </div>
                                </div>
                                {{-- end client name --}}

                                {{-- client image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        @if($client->image)
                                            <img src="{{ asset('storage/'.$client->image) }}" width="50"
                                                 alt="{{ $client->name }}">
                                        @endif
                                        <label for="image" class="form-label">{{ __('Client Image') }}</label>
                                        <input type="file" id="image" name="image" class="form-control"
                                               data-default-file="">
                                    </div>
                                </div>
                                {{-- end client image --}}

                                {{-- client URL --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="client_url" class="form-label">{{ __('Client URL') }}</label>
                                        <input type="url" id="client_url" name="client_url"
                                               value="{{ old('clientt_url',$client->client_url) }}" class="form-control"
                                               data-default-file="" required>
                                    </div>
                                </div>
                                {{-- end client URL --}}

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
