<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1"><!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
    <title>Gominers - Login</title><!-- themeforest:css -->
    <link rel="stylesheet" href="/frontend/css/fontawesome.css">
    <link rel="stylesheet" href="/frontend/css/aos.css">
    <link rel="stylesheet" href="/frontend/css/cookieconsent.min.css">
    <link rel="stylesheet" href="/frontend/css/magnific-popup.css">
    <link rel="stylesheet" href="/frontend/css/odometer-theme-minimal.css">
    <link rel="stylesheet" href="/frontend/css/prism-okaidia.css">
    <link rel="stylesheet" href="/frontend/css/simplebar.css">
    <link rel="stylesheet" href="/frontend/css/smart_wizard_all.css">
    <link rel="stylesheet" href="/frontend/css/swiper-bundle.css">
    <link rel="stylesheet" href="/frontend/css/dashcore.css">
    <link rel="stylesheet" href="/frontend/css/rtl.css">
    <link rel="stylesheet" href="/frontend/css/demo.css">
    <!-- endinject -->
</head>

<body>
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
    <main>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay overlay-primary alpha-8 image-background cover">
                    <div class="content">
                        <h2 class="display-4 display-md-3 display-lg-2 text-contrast mt-5 mt-md-0">Welcome to <span class="bold d-block">Dashcore</span></h2>
                        <p class="lead text-contrast">Login to your account</p>
                        <hr class="mt-md-6 w-25">
                        <div class="d-flex flex-column">
                            <p class="small bold text-contrast">Or sign in with</p>
                            <nav class="nav mb-4"><a class="btn btn-circle btn-outline-contrast me-2" href="#"><i class="fab fa-facebook-f"></i></a> <a class="btn btn-circle btn-outline-contrast me-2" href="#"><i class="fab fa-twitter"></i></a> <a class="btn btn-circle btn-outline-contrast" href="#"><i class="fab fa-linkedin-in"></i></a></nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4 mx-auto">
                    <div class="login-form mt-5 mt-md-0"><img src="frontend/img/logo.png" class="logo img-responsive mb-4 mb-md-6" alt="">
                        <h1 class="text-darker bold">Login</h1>
                        <p class="text-secondary mt-0 mb-4 mb-md-6">Don't have an account yet? <a href="{{ route('frn.customer.register-view') }}" class="text-primary bold">Create it here</a></p>
                        @if(Session::has('failed'))
                            <div class="alert alert-danger" style="margin-top: -70px;">{{Session::get('failed')}}</div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-primary" style="margin-top: -70px;">{{Session::get('success')}}</div>
                        @endif
                        <form action="{{ route('frn.customer.login-process') }}" method="POST" id="my_form">@csrf
                            <label class="form-label">User name</label>
                            <div class="form-group has-icon">
                                <input type="email" id="login_username"  name="email" class="form-control form-control-rounded" placeholder="Your registered Email" required> 
                                <i class="icon fas fa-user"></i>
                            </div>
                            <label class="form-label">Password</label>
                            <div class="form-group has-icon">
                                <input type="password" id="login_password" name="password" class="form-control form-control-rounded" placeholder="Your password" required>
                                <i class="icon fas fa-lock"></i>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <a href="{{ route('frn.customer.forgot-view') }}" class="text-dark small">Forgot your password?</a>
                                <button type="submit" form="my_form" class="btn btn-primary btn-rounded mt-5">Login
                                    <i class="fas fa-long-arrow-alt-right ms-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- themeforest:js -->
    <script src="/frontend/js/jquery.js"></script>
    <script src="/frontend/js/bootstrap.bundle.js"></script>
    <script src="/frontend/js/card.js"></script>
    <script src="/frontend/js/counterup2.js"></script>
    <script src="/frontend/js/noise.js"></script>
    <script src="/frontend/js/noframework.waypoints.js"></script>
    <script src="/frontend/js/odometer.js"></script>
    <script src="/frontend/js/prism.js"></script>
    <script src="/frontend/js/simplebar.js"></script>
    <script src="/frontend/js/swiper-bundle.js"></script>
    <script src="/frontend/js/jquery.easing.js"></script>
    <script src="/frontend/js/jquery.validate.js"></script>
    <script src="/frontend/js/jquery.smartWizard.js"></script>
    <script src="/frontend/js/feather.js"></script>
    <script src="/frontend/js/aos.js"></script>
    <script src="/frontend/js/typed.js"></script>
    <script src="/frontend/js/jquery.magnific-popup.js"></script>
    <script src="/frontend/js/cookieconsent.js"></script>
    <script src="/frontend/js/jquery.animatebar.js"></script>
    <script src="/frontend/js/common.js"></script>
    <script src="/frontend/js/stripe-bubbles.js"></script>
    <script src="/frontend/js/stripe-menu.js"></script>
    <script src="/frontend/js/credit-card.js"></script>
    <script src="/frontend/js/pricing.js"></script>
    <script src="/frontend/js/shop.js"></script>
    <script src="/frontend/js/svg.js"></script>
    <script src="/frontend/js/site.js"></script>
    <script src="/frontend/js/wizards.js"></script>
    <script src="/frontend/js/cookie-consent-util.js"></script>
    <script src="/frontend/js/cookie-consent-themes.js"></script>
    <script src="/frontend/js/cookie-consent-custom-css.js"></script>
    <script src="/frontend/js/cookie-consent-informational.js"></script>
    <script src="/frontend/js/cookie-consent-opt-out.js"></script>
    <script src="/frontend/js/cookie-consent-opt-in.js"></script>
    <script src="/frontend/js/cookie-consent-location.js"></script>
    <script src="/frontend/js/demo.js"></script>
    <!-- endinject -->
</body>

</html>