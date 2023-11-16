@extends('core.layouts.master')

@push('css')

@endpush

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('404 Not Found') }}</div>

                <div class="card-body">
                    {{ __('Sorry, the page you are looking for could not be found.') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection