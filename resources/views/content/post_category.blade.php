@extends('core.layouts.master')

@push('css')

@endpush

@section('content')

<!-- ##### Blog Wrapper Start ##### -->
<div class="blog-wrapper section-padding-100 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <!-- Single Blog Area  -->
                @foreach ($posts as $post)
                    <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="single-blog-thumbnail">
                                    <img src="{{config('learnandgrow.tag.'.$post->tag)}}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Blog Content -->
                                <div class="single-blog-content">
                                    <div class="line"></div>
                                    @foreach ($post->categories as $category)
                                        <a href="#" class="post-tag">{{$category->title}}</a>
                                    @endforeach
                                    <h4><a href="#" class="post-headline">{{$post->title}}</a></h4>
                                    <p>{{$post->meta_description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Load More -->
            </div>
        </div>
    </div>

</div>
<!-- ##### Blog Wrapper End ##### -->

@endsection