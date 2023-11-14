@foreach ($portfolios as $portfolio)
<div class="col-12 col-md-6 col-lg-4">
    <div class="single-catagory-area clearfix mb-100">
        <img src="{{asset('storage/'.$portfolio->image)}}" alt="">
        <!-- Catagory Title -->
        <div class="catagory-title">
            <a href="{{$portfolio->url}}" target="_blank">{{$portfolio->title}}</a>
        </div>
    </div>
</div>
@endforeach