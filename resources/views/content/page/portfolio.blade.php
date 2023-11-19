@extends('core.layouts.master')

@push('css')

@endpush

@section('content')

<!-- ##### Blog Wrapper Start ##### -->
<div class="blog-wrapper section-padding-100 clearfix">
    <div class="container">
        <div class="row align-items-end">
            <!-- Single Blog Area -->
            @foreach ($portfolios as $portfolio)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-catagory-area clearfix mb-100">
                    <img src="{{asset('storage/'.$portfolio->image)}}" alt="">
                    <!-- Catagory Title -->
                    <div class="catagory-title">
                        <a class="display-3" href="{{$portfolio->url}}" target="_blank">{{$portfolio->title}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
<!-- ##### Blog Wrapper End ##### -->


@endsection