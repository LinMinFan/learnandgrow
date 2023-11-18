@extends('core.layouts.master')

@push('css')

@endpush

@section('content')

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img" style="background-image: url(img/about_me.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content text-center">
                    <h2>about me</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Blog Wrapper Start ##### -->
<div class="blog-wrapper section-padding-100-0 clearfix">
    <div class="container">
        <div class="row align-items-end">
            <!-- Single Blog Area -->
            <div class="col-12 col-lg-4">
                <div class="single-blog-area clearfix mb-100">
                    <!-- Blog Content -->
                    <div class="single-blog-content">
                        <div class="line"></div>
                        <h4><a href="#" class="post-headline">專長與興趣</a></h4>
                        <ul>
                            <li><i class="fa fa-angle-right"></i> Web API 設計與開發</li>
                            <li><i class="fa fa-angle-right"></i> 框架的運用</li>
                            <li><i class="fa fa-angle-right"></i> 資料庫串接與設計</li>
                            <li><i class="fa fa-angle-right"></i> 第三方系統串接合作</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Single Blog Area -->
            <div class="col-12 col-lg-4">
                <div class="single-blog-area clearfix mb-100">
                    <!-- Blog Content -->
                    <div class="single-blog-content">
                        <ul>
                            <li><i class="fa fa-angle-right"></i> 喜歡喜劇及科幻類電影</li>
                            <li><i class="fa fa-angle-right"></i> 喜歡嘗試各國美食</li>
                            <li><i class="fa fa-angle-right"></i> 藍球、棒球運動</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Single Blog Area -->
            <div class="col-12 col-lg-4">
                <div class="single-blog-area clearfix mb-100">
                    <!-- Blog Content -->
                    <div class="single-blog-content">
                        <div>
                            勝利女神不一定眷顧所有的人，但曾經嘗試過，努力過的人，他們的人生總會留下痕跡！
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Blog Wrapper End ##### -->

<!-- ##### Cool Facts Area Start ##### -->
<div class="cool-facts-area section-padding-100-0 bg-img background-overlay" style="background-image: url(img/about_me_A.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="single-blog-area blog-style-2 text-center mb-100">
                    <!-- Blog Content -->
                    <div class="single-blog-content">
                        <div class="line"></div>
                        <h4><a href="#" class="post-headline">技能</a></h4>
                        <p>Html、Css、Javascript、Jquery、Php、Mysql、Linux、git。</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Cool Facts Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cool-facts-area text-center mb-100">
                    <img src="img/php.png" alt="">
                </div>
            </div>
            <!-- Single Cool Facts Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cool-facts-area text-center mb-100">
                    <img src="img/sql.png" alt="">
                </div>
            </div>
            <!-- Single Cool Facts Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cool-facts-area text-center mb-100">
                    <img src="img/linux.png" alt="">
                </div>
            </div>
            <!-- Single Cool Facts Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cool-facts-area text-center mb-100">
                    <img src="img/laravel.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Cool Facts Area End ##### -->

<!-- ##### Instagram Feed Area Start ##### -->
<div class="instagram-feed-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="insta-title">
                    <h5>AI</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram Slides -->
    <div class="instagram-slides owl-carousel">
        <!-- Single Insta Feed -->
        <div class="single-insta-feed">
            <img src="img/ai01.png" alt="">
            <!-- Hover Effects -->
            <div class="hover-effects">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        <!-- Single Insta Feed -->
        <div class="single-insta-feed">
            <img src="img/ai02.png" alt="">
            <!-- Hover Effects -->
            <div class="hover-effects">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        <!-- Single Insta Feed -->
        <div class="single-insta-feed">
            <img src="img/ai03.png" alt="">
            <!-- Hover Effects -->
            <div class="hover-effects">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        <!-- Single Insta Feed -->
        <div class="single-insta-feed">
            <img src="img/ai04.png" alt="">
            <!-- Hover Effects -->
            <div class="hover-effects">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        <!-- Single Insta Feed -->
        <div class="single-insta-feed">
            <img src="img/ai05.png" alt="">
            <!-- Hover Effects -->
            <div class="hover-effects">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        <!-- Single Insta Feed -->
        <div class="single-insta-feed">
            <img src="img/ai06.png" alt="">
            <!-- Hover Effects -->
            <div class="hover-effects">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        <!-- Single Insta Feed -->
        <div class="single-insta-feed">
            <img src="img/ai07.png" alt="">
            <!-- Hover Effects -->
            <div class="hover-effects">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- ##### Instagram Feed Area End ##### -->

@endsection