<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>AZCLOUD rəsmi veb-səhifəsi</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="description" content="2020 AZCLOUD. Müəllif hüquqları qorunur">
    {{-- Fonts --}}
    <link rel="preload" as="font" href="{{ asset('assets/site/fonts/Montserrat-Regular.woff')  }}" type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href="{{ asset('assets/site/fonts/Montserrat-Regular.woff2') }}" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" as="font" href="{{ asset('assets/site/fonts/Montserrat-Medium.woff') }}" type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href="{{ asset('assets/site/fonts/Montserrat-Medium.woff2') }}" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" as="font" href="{{ asset('assets/site/fonts/Montserrat-SemiBold.woff') }}" type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href="{{ asset('assets/site/fonts/Montserrat-SemiBold.woff2') }}" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" as="font" href="{{ asset('assets/site/fonts/Montserrat-Bold.woff') }}" type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href="{{ asset('assets/site/fonts/Montserrat-Bold.woff2') }}" type="font/woff2" crossorigin="anonymous">
    {{-- Styles   --}}
    <link href="{{ asset('assets/site/css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @include('site.partials.header')
    @include('site.partials.side-menu')
    @include('site.partials.search-block')

    <main class="content">
        <div class="wave-texture top-left"></div>
        @yield('content')
    </main>

    @include('site.partials.footer')

    {{-- Scripts   --}}
    <script type="text/javascript" src="{{ asset('assets/site/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/site/js/swiper.min.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('assets/site/js/sticky.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/site/js/yall.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/site/js/nice-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/site/js/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/site/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/site/js/blog.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/site/js/service.js') }}"></script>
    <script>
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    </script>
    @stack('scripts')
</body>
</html>