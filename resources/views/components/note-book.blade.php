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
                <h4><a href="{{route('post.show',['slug' => $post->slug])}}" class="post-headline">{{$post->title}}</a></h4>
                <p>{{$post->meta_description}}</p>
            </div>
        </div>
    </div>
</div>
@endforeach