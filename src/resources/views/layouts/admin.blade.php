<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>AzCloud Admin Panel</title>
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/bootstrap-extend.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/site.min.css?v=1.12') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/animsition/animsition.css')  }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/switchery/switchery.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/slidepanel/slidePanel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/flag-icon-css/flag-icon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/fonts/web-icons/web-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/fonts/brand-icons/brand-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/fonts/material-design/material-design.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic" rel="stylesheet">
    <script src="{{ asset('assets/admin/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>Breakpoints();</script>
</head>
<body class="animsition dashboard">

    @yield('content')

    <!-- Core  -->
    <script src="{{ asset('assets/admin/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/popper-js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/animsition/animsition.js')  }}"></script>
    <script src="{{ asset('assets/admin/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/waves/waves.js') }}"></script>

    <script src="{{ asset('assets/admin/vendor/peity/jquery.peity.min.js')  }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('assets/admin/js/Component.js')  }}"></script>
    <script src="{{ asset('assets/admin/js/Plugin.js')  }}"></script>
    <script src="{{ asset('assets/admin/js/Base.js')  }}"></script>
    <script src="{{ asset('assets/admin/js/Config.js')  }}"></script>
    <script src="{{ asset('assets/admin/js/material.js')  }}"></script>
    <script src="{{ asset('assets/admin/js/Section/Menubar.js')  }}"></script>
    <script src="{{ asset('assets/admin/js/Section/GridMenu.js')  }}"></script>
    <script src="{{ asset('assets/admin/js/Section/Sidebar.js')  }}"></script>
    <script src="{{ asset('assets/admin/js/Section/PageAside.js')  }}"></script>
    <script src="{{ asset('assets/admin/js/menu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/config/colors.js')  }}"></script>
    <script>Config.set('assets', '../assets');</script>
    <script src="{{ asset('assets/admin/js/Site.js')  }}"></script>
    <script src="{{ asset('assets/admin/js/peity.js')  }}"></script>

    <script>
        (function(document, window, $){
            'use strict';
            var Site = window.Site;
            $(document).ready(function(){
                Site.run();
            });
        })(document, window, jQuery);
    </script>
</body>
</html>
