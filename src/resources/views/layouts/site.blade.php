<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>AZCLOUD | @yield('meta_title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">
    @include('site.partials.meta-tags')
    @include('site.partials.favicon')
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/site/css/cookieconsent.min.css') }}" />
    @stack('styles')

    @include('site.partials.metrics')
</head>
<body>
    @include('site.partials.header')
    @include('site.partials.side-menu')
    @include('site.partials.search-block')

    <main class="content">
        @if (!Route::is('site.search'))
            <div class="wave-texture top-left"></div>
        @endif
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
    <script type="text/javascript" src="{{ asset('assets/site/js/calculator.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/site/js/custom.js') }}"></script>
    @stack('scripts')

    <!-- cookie content -->
    <script src="{{ asset('assets/site/js/cookieconsent.min.js') }}" data-cfasync="false"></script>
    <script>
        function get_cookie(name){
            return document.cookie.split(';').some(c => {
                return c.trim().startsWith(name + '=');
            });
        }

        function delete_cookie( name, path, domain ) {
                console.log(document.cookie)
            if( get_cookie( name ) ) {
                
            }
            document.cookie = name + "=" +
                ((path) ? ";path="+path:"")+
                ((domain)?";domain="+domain:"") +
                ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
        }

    window.addEventListener('load', function(){
      window.cookieconsent.initialise({
       revokeBtn: "<div class='cc-revoke'></div>",
       type: "opt-in",
       theme: "classic",
       palette: {
           popup: {
               background: "#080a70",
               text: "#fff"
            },
           button: {
               background: "#fff",
               text: "#080a70"
            }
        },
       content: {
           message: "@lang('main.cookieMessage')",
           link: "@lang('main.cookieLinkText')",
           allow: "@lang('main.cookieAllowCookiesText')",
           deny: "@lang('main.cookieDeclineText')",
           href: "@lang('main.cookieLink')"
        },
        onInitialise: function(status) {
          if(status == cookieconsent.status.allow) cookieAllowedAction();
        },
        onStatusChange: function(status) {
          if (this.hasConsented()) cookieAllowedAction();
        }
      })
    });

    function asd(){

    }
    
    function cookieAllowedAction() {
    
        if($(".follow-list__item_linkedin").length > 0){
            var linkedinScrt = document.createElement('script');
    
            linkedinScrt.setAttribute('src', 'https://platform.linkedin.com/in.js');
            linkedinScrt.setAttribute('type', 'text/javascript');
            linkedinScrt.innerText = "lang: en_US"
    
            $(".follow-list__item_linkedin .follow-link").remove()
            $(".follow-list__item_linkedin").append(linkedinScrt)
        }
    
        if($(".follow-list__item_twitter").length > 0){
            var linkedinScrt = document.createElement('script');

            linkedinScrt.setAttribute('src', 'https://platform.twitter.com/widgets.js');
            linkedinScrt.setAttribute('type', 'text/javascript');
            linkedinScrt.setAttribute('charset', 'utf-8');

            $(".follow-list__item_twitter .follow-link").remove()
            $(".twitter-follow-button").css("display", "block")
            $(".follow-list__item_twitter").append(linkedinScrt)
        }
    
        if($(".follow-list__item_youtube").length > 0){
            var linkedinScrt = document.createElement('script');
    
            linkedinScrt.setAttribute('src', 'https://apis.google.com/js/platform.js');
            linkedinScrt.setAttribute('type', 'text/javascript');
    
            $(".follow-list__item_youtube .follow-link").remove()
            $(".follow-list__item_youtube").append(linkedinScrt)
        }
    }
    </script>
    <!-- cookie content -->
</body>
</html>