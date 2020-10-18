<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    @include('admin.partials.head')
</head>
<body class="page-login-v2 layout-full page-dark">
    <div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content">
            <div class="page-brand-info">
                <div class="brand">
                    <h2 class="brand-text font-size-40">AzCloud</h2>
                </div>
            </div>
            <div class="page-login-main">
                <div class="brand hidden-md-up">
                    <h3 class="brand-text font-size-40">AzCloud</h3>

                </div>
                <h3 class="font-size-24">Sign In</h3>
                <div style="color: red">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    @endif
                </div>
                <form method="POST" action="{{ route('admin.login')  }}" autocomplete="off">
                    @csrf
                    <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="email" class="form-control empty" id="email" name="email" required>
                        <label class="floating-label" for="email">Email</label>
                    </div>
                    <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="password" class="form-control empty" id="password" name="password" required>
                        <label class="floating-label" for="password">Password</label>
                    </div>
                    <div class="form-group clearfix">
                        <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
                            <input type="checkbox" id="remember" name="checkbox">
                            <label for="remember">Remember me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </form>

                <footer class="page-copyright">
                    <p>© {{ date('Y')  }}. All RIGHT RESERVED.</p>
                </footer>
            </div>
        </div>
    </div>
    @include('admin.partials.scripts')
</body>
</html>

