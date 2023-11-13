<!-- Hero Slides Area -->
<div class="hero-slides owl-carousel">
    <!-- Single Slide -->
    @foreach ($slideImages as $slideImage)
    <div class="single-hero-slide bg-img" style="background-image: url(storage/{{$slideImage->image}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="slide-content text-center">
                        {{-- <div class="post-tag">
                            <a href="#" data-animation="fadeInUp">lifestyle</a>
                        </div> --}}
                        <h2 data-animation="fadeInUp" data-delay="250ms"><a href="#">{{$slideImage->title}}</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @endforeach
</div>