@extends('layout.app')
@section('title')
{{ __('Create Menus') }}
@stop


@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('Create Menus') }}</h2>
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
                                        <input type="text"  class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus >
                                    </div>
                                </div>
                                {{-- end project title --}}
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="title" class="form-label">{{ __('Menu Link') }}</label>
                                       <div class="d-block">
                                           <input type="text" style="display: inline-block; width: auto;" class="form-control"  value="" id="link" name="link"  required autofocus >
                                           <label for="title" class="form-label">{{\App\Models\Websit::first()->url ?? ''}}/</label>
                                       </div>
                                    </div>
                                    <h6 class="alert alert-primary p-2">{{ __('Note : add direct link in the page here') }} </h6>

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