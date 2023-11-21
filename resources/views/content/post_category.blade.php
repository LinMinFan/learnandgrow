@extends('core.layouts.master')

@push('css')
    <link href="{{asset('css/post-category.css')}}" rel="stylesheet">
@endpush

@section('content')

<hr>

<div class="container mt-2">

    <div class="row">
        <div class="col-3">
            <select class="selectpicker form-control" id="categorySelect" data-url="{{route('post.index',['slug' => $content->slug])}}">
                <option value="0">全部</option>
                @foreach ($children as $children_category)
                    <option value="{{$children_category->slug}}" {{($children_category->slug == $sub)?"selected":""}}>{{$children_category->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        @if ($posts)
            @foreach ($posts as $post)
            <div class="col-md-3 col-sm-6">
                <div class="card card-block text-center p-3">
                    <img class="mx-auto mt-2" src="{{asset(config('learnandgrow.tag.'.$post->tag))}}" alt="">
                    <h5 class="card-title mt-3 mb-3 text-left">{{$post->title}}</h5>
                    <p class="card-text text-left">{{mb_substr($post->meta_description, 0, 50, 'UTF-8')}}...</p> 
                    <a href="{{route('post.show',['slug' => $post->slug])}}" class="btn original-btn">閱讀</a>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>

@endsection

@push('js')
    <script src="{{asset('js/post-category.js')}}"></script>
@endpush