<!-- Nav Start -->
<div class="classynav">
    <ul>
        @foreach ($itemLinks as $itemLink)
            <li>
                <a href="{{url($itemLink->uri)}}">{{$itemLink->title}}</a>
            </li>
        @endforeach
    </ul>
</div>
<!-- Nav End -->