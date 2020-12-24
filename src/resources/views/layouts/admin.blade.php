<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    @include('admin.partials.head')
    @stack('styles')
</head>
<body class="dashboard">
    <script>
        if (localStorage.getItem("navFolded") !== null)
            document.querySelector("body").classList.add("site-menubar-fold");
    </script>

    @include('admin.partials.left-menubar')

    <div class="page">
        <div class="page-header">
            <div class="page-header-actions">
                @yield('header_actions')
            </div>
        </div>

        <div class="page-content">
            @include('admin.partials.notify')
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="site-footer-legal">Copyright © <a href="https://azcloud.az" target="_blank">AzCloud.az</a></div>
    </footer>

    @include('admin.partials.scripts')
    @stack('scripts')
</body>
</html>
