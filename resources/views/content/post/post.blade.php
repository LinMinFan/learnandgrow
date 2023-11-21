@extends('core.layouts.master')

@push('css')
    
@endpush

@section('content')

<hr>
<!-- ##### Single Blog Area Start ##### -->
<div class="single-blog-wrapper section-padding-0-100">

    <!-- Single Blog Area  -->
    <div class="single-blog-area blog-style-2 mb-50">
        <div class="single-blog-thumbnail">
            <img src="{{$content->image}}" alt="">
            <div class="post-tag-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="post-date">
                                <a href="#">{{Carbon\Carbon::parse($content->published_at)->month}} <span>{{Carbon\Carbon::parse($content->published_at)->format('F')}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- ##### Post Content Area ##### -->
            <div class="col-12">
                <!-- Single Blog Area  -->
                <div class="single-blog-area blog-style-2 mb-50">
                    <!-- Blog Content -->
                    <div class="single-blog-content">
                        <div class="line"></div>
                        {!!$content->content!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Single Blog Area End ##### -->


@endsection

@push('js')
    
@endpush