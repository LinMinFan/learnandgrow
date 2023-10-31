<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>學習與成長</title>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="referrer" content="same-origin">
	<meta name="rating" content="general">
	<meta name="author" content="林旻汎">
    <meta name="description" content="學習與成長">
	<meta name="keywords" content="學習與成長">
    <meta name="robots" content="index,follow">
    <meta name="_token" content="{{csrf_token()}}">
    @stack('meta')
    <link rel="canonical" href="{{url()->current()}}">

    {{-- slide --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    {{-- slide end --}}

    {{-- aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- aos end --}}

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/global.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    @stack('css')

    {{-- Google Analytics --}}

<body>
    <header>
        @include('site.partials.header')
    </header>

    <section>
        @yield('content')
    </section>
    
    <footer>
        @include('site.partials.footer')
    </footer>

    <script defer src="{{asset('js/bootstrap.min.js')}}"></script>
    <script defer src="{{asset('js/popper.min.js') }}"></script>
    <script defer src="{{asset('js/main.js')}}"></script>
    @stack('js')
</body>
</html>
