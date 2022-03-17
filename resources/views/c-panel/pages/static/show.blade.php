@extends('layout.app')
@section('title')
    {{ __('Page Details') }}
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Page Details') }}</h2>
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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <img class="img-fluid" src="{{ asset('storage/'.$page->main_image) }}" alt="{{ $page->title }}">
                                    <div class="card-body">
                                        <h4 class="mb-0">{{ $page->title }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="card-title">{{ __('Sub Title Page') }}</h2>
                                    </div>
                                    <div class="card-body pb-0">
                                        <p class="mb-5">{{ $page->sub_title }}</p>
                                        <ul class="list-group list-group-flush">
                                            <li class="d-flex px-0 justify-content-between">
                                                <h5>{{ __('Gallery') }}</h5>
                                            </li>
                                            <li class="list-group-item d-flex px-0 justify-content-between">
                                                @foreach ($page->images as $gallery)
                                                    <img src="{{ asset('storage/'.$gallery->image) }}" width="50" alt="{{ $page->title }}">
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4>{{ __('Description') }}</h4>
                                <div class="mb-5">{!! $page->description !!}</div>

                                <h4 class="text-primary">{{ __('Page Tags') }}</h4>
                                <div class="profile-skills pt-2 border-bottom-1 pb-2">
                                    @foreach ($page->tags as $tag)
                                        <a href="javascript:void()" class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">{{ $tag->name }}</a>
                                    @endforeach
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



