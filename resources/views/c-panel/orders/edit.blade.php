@extends('layout.app')
@section('title')
    {{ __('View Order') }}
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('View Order') }}</h2>
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
                        <form method="POST" action="{{ route('orders.update',$order->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                {{-- client name --}}
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <h4> {{ __('Client Name') }}</h4>
                                        <label for="name" class="form-label">{{ $order->name }}</label>
                                    </div>
                                </div>
                                {{-- end client name --}}

                                {{-- client URL --}}
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group fallback w-100">
                                        <h4> {{ __('Client Email') }}</h4>
                                        <label for="client_url" class="form-label">{{ $order->email }}</label>
                                    </div>
                                </div>
                                {{-- end client URL --}}

                                {{-- client URL --}}
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group fallback w-100">
                                        <h4> {{ __('Client Phone') }}</h4>
                                        <label for="client_url" class="form-label">{{ $order->phone }}</label>
                                    </div>
                                </div>
                                {{-- end client URL --}}

                                {{-- client URL --}}
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group fallback w-100">
                                        <h4> {{ __('Service') }}</h4>
                                        <label for="client_url" class="form-label">{{ $order->service->name }}</label>
                                    </div>
                                </div>
                                {{-- end client URL --}}

                                {{-- client URL --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <h4> {{ __('Client Message') }}</h4>
                                        <label for="client_url" class="form-label">{{ $order->description }}</label>
                                    </div>
                                </div>
                                {{-- end client URL --}}

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <div class="form-group">
                                            <label for="status" class="form-label">{{ __('Select Status') }}</label>
                                            <select name="status" id="status" class="form-control">
                                                <option @if($order->status == 'new') selected @endif value="new">{{ __('New') }}<option>
                                                <option @if($order->status == 'continued') selected @endif value="continued">{{ __('Continued') }}<option>
                                                <option @if($order->status == 'followed') selected @endif value="followed">{{ __('Followed') }}<option>
                                                <option @if($order->status == 'end') selected @endif value="end">{{ __('End') }}<option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <label for="note" class="form-label">{{ __('Add Notification') }}</label>
                                        <textarea name="note" id="note" class="form-control" rows="4">{{ old('note',$order->note) }}</textarea>
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
