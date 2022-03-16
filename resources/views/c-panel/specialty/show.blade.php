@extends('layout.app')
@section('title')
    {{ __('Specialty Details') }}
@stop
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Specialty Details') }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-xxl-4 col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <img class="img-fluid" src="{{ asset('storage/'.$specialty->image) }}"
                                                 alt="{{ $specialty->title }}">
                                            <div class="card-body">
                                                <h4 class="mb-0">{{ $specialty->title }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h2 class="card-title">{{ __('Sub Title Specialty') }}</h2>
                                            </div>
                                            <div class="card-body pb-0">
                                                <p class="mb-5">{{ $specialty->sub_title }}</p>
                                                <ul class="list-group list-group-flush">
                                                    <li class="d-flex px-0 justify-content-between">
                                                        <h5>{{ __('Gallery') }}</h5>
                                                    </li>
                                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                                        @foreach ($specialty->images as $gallery)
                                                            <img src="{{ asset('storage/'.$gallery->image) }}"
                                                                 width="50" alt="{{ $specialty->title }}">
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-xxl-8 col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-5">{!! $specialty->description !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>



@endsection
