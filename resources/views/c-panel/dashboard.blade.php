@extends('layout.app')

@section('title')
    {{ __('Dashboard') }}
@stop

@section('content')

    <div class="row">
        <div class="col-xl-4 col-xxl-4 col-sm-6">
            <div class="widget-stat card bg-success overflow-hidden">
                <div class="card-header" style="padding: 1.25rem 1.25rem;">
                    <h3 class="card-title text-white">{{ __('Totel Projects') }}</h3>
                    <h5 class="text-white mb-0">{{ $project->count() }}</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 col-sm-6">
            <div class="widget-stat card bg-primary overflow-hidden">
                <div class="card-header" style="padding: 1.25rem 1.25rem;">
                    <h3 class="card-title text-white">{{ __('Totel Posts') }}</h3>
                    <h5 class="text-white mb-0">{{ $blog->count() }}</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 col-sm-6">
            <div class="widget-stat card bg-danger overflow-hidden">
                <div class="card-header" style="padding: 1.25rem 1.25rem;">
                    <h3 class="card-title text-white">{{ __('Totel Orders') }}</h3>
                    <h5 class="text-white mb-0">{{ $order->count() }}</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 col-sm-6">
            <div class="widget-stat card bg-info overflow-hidden">
                <div class="card-header" style="padding: 1.25rem 1.25rem;">
                    <h3 class="card-title text-white">{{ __('Totel Contact') }}</h3>
                    <h5 class="text-white mb-0">{{ $contact->count() }}</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 col-sm-6">
            <div class="widget-stat card bg-secondary  overflow-hidden">
                <div class="card-header" style="padding: 1.25rem 1.25rem;">
                    <h3 class="card-title text-white">{{ __('Totel Clients') }}</h3>
                    <h5 class="text-white mb-0">{{ $client->count() }}</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-xxl-12 col-lg-6 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Latest Contacts') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header-border table-hover verticle-middle">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>الموضوع</th>
                                <th>{{ __('Message') }}</th>
                                <th>{{ __('Date') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th><a href="{{ route('contacts.show',$contact->id) }}">{{ $contact->name }}</a></th>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>{{ Carbon\Carbon::parse($contact->created_at)->format('y-m-d') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
