<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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
