<!-- Nav Start -->
<div class="classynav">
    <ul>
        @foreach ($itemLinks as $itemLink)
            <li>
                <a href="{{$itemLink->uri}}">{{$itemLink->title}}</a>
            </li>
        @endforeach
    </ul>
</div>
<!-- Nav End -->