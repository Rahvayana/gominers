<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1"><!-- Place ../favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="../apple-touch-icon.png">
    <link rel="icon" href="../favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
    <title>Gominers - Miner Website</title><!-- themeforest:css -->
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
    @yield('style')
</head>

<body>
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
    <!-- ./Making stripe menu navigation -->
    <nav class="st-nav navbar main-nav navigation fixed-top" id="main-nav">
        <div class="container">
            <ul class="st-nav-menu nav navbar-nav">
                <li class="st-nav-section nav-item"><a href="#main" class="navbar-brand"><img src="/frontend/img/logo-gominers.png" alt="Dashcore" class="logo logo-sticky d-inline-block d-md-none"> <img src="/frontend/img/logo-gominers.png" alt="Dashcore" class="logo d-none d-md-inline-block"></a></li>
                <li class="st-nav-section st-nav-primary nav-item"><a class="st-root-link nav-link" href="{{ route('home') }}">Home</a> <a class="st-root-link item-products st-has-dropdown nav-link" data-dropdown="blocks">Blocks</a> <a class="st-root-link item-products st-has-dropdown nav-link" data-dropdown="pages">Pages</a> <a class="st-root-link item-company st-has-dropdown nav-link" data-dropdown="components">UI Components</a> <a class="st-root-link item-blog st-has-dropdown nav-link" data-dropdown="blog">Blog</a> <a class="st-root-link item-shop st-has-dropdown nav-link" href="../shop/" data-dropdown="shop">Shop</a></li>
                @if (Auth::guard('customer')->user())
                <li class="st-nav-section st-nav-secondary nav-item">
                    <a href="{{ route('frn.customer.detail') }}" class="btn btn-rounded btn-solid px-3" ><i class="fas fa-user d-none d-md-inline me-md-0 me-lg-2"></i> <span class="d-md-none d-lg-inline">{{Auth::guard('customer')->user()->name}}</span></a> 
                </li>
                @else
                <li class="st-nav-section st-nav-secondary nav-item">
                    <a class="btn btn-rounded btn-outline me-3 px-3" href="{{ route('frn.customer.login-view') }}" ><i class="fas fa-sign-in-alt d-none d-md-inline me-md-0 me-lg-2"></i> <span class="d-md-none d-lg-inline">Login</span> </a>
                    <a class="btn btn-rounded btn-solid px-3" href="{{ route('frn.customer.register-view') }}" ><i class="fas fa-user-plus d-none d-md-inline me-md-0 me-lg-2"></i> <span class="d-md-none d-lg-inline">Signup</span></a>
                </li>
                <!-- Mobile Navigation -->
                @endif
                <li class="st-nav-section st-nav-mobile nav-item"><button class="st-root-link navbar-toggler" type="button"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                    <div class="st-popup">
                        <div class="st-popup-container"><a class="st-popup-close-button">Close</a>
                            <div class="st-dropdown-content-group">
                                <h4 class="text-uppercase regular">Pages</h4><a class="regular text-primary" href="../about.html"><i class="far fa-building me-2"></i> About </a><a class="regular text-success" href="../contact.html"><i class="far fa-envelope me-2"></i> Contact </a><a class="regular text-warning" href="../pricing.html"><i class="fas fa-hand-holding-usd me-2"></i> Pricing </a><a class="regular text-info" href="../faqs.html"><i class="far fa-question-circle me-2"></i> FAQs</a>
                            </div>
                            <div class="st-dropdown-content-group border-top bw-2">
                                <h4 class="text-uppercase regular">Components</h4>
                                <div class="row">
                                    <div class="col me-4"><a target="_blank" href="../components/alert.html">Alerts</a> <a target="_blank" href="../components/badge.html">Badges</a> <a target="_blank" href="../components/button.html">Buttons</a> <a target="_blank" href="../components/color.html">Colors</a> <a target="_blank" href="../components/accordion.html">Accordion</a> <a target="_blank" href="../components/cookie-law.html">Cookielaw</a></div>
                                    <div class="col me-4"><a target="_blank" href="../components/overlay.html">Overlay</a> <a target="_blank" href="../components/progress.html">Progress</a> <a target="_blank" href="../components/lightbox.html">Lightbox</a> <a target="_blank" href="../components/tab.html">Tabs</a> <a target="_blank" href="../components/tables.html">Tables</a> <a target="_blank" href="../components/typography.html">Typography</a></div>
                                </div>
                            </div>
                            @if (Auth::guard('customer')->user())
                                <div class="st-dropdown-content-group bg-light b-t"><a href="../login.html">{{Auth::guard('customer')->user()->name}}<i class="fas fa-arrow-right"></i></a></div>
                            @else
                                <div class="st-dropdown-content-group bg-light b-t"><a href="../login.html">Sign in <i class="fas fa-arrow-right"></i></a></div>
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="st-dropdown-root">
            <div class="st-dropdown-bg">
                <div class="st-alt-bg"></div>
            </div>
            <div class="st-dropdown-arrow"></div>
            <div class="st-dropdown-container">
                <div class="st-dropdown-section" data-dropdown="customer">
                    <div class="st-dropdown-content">
                            <a class="dropdown-item" href="{{ route('frn.customer.logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('frn.customer.logout') }}" method="GET" class="d-none">
                                @csrf
                            </form>
                    </div>
                </div>
                <div class="st-dropdown-section" data-dropdown="blocks">
                    <div class="st-dropdown-content">
                        <div class="st-dropdown-content-group">
                            <div class="row">
                                <div class="col me-4"><a class="dropdown-item" target="_blank" href="../blocks/call-to-action.html">Call to actions</a> <a class="dropdown-item" target="_blank" href="../blocks/contact.html">Contact</a> <a class="dropdown-item" target="_blank" href="../blocks/counter.html">Counters</a> <a class="dropdown-item" target="_blank" href="../blocks/faqs.html">FAQs</a></div>
                                <div class="col me-4"><a class="dropdown-item" target="_blank" href="../blocks/footer.html">Footers</a> <a class="dropdown-item" target="_blank" href="../blocks/form.html">Forms</a> <a class="dropdown-item" target="_blank" href="../blocks/navbar.html">Navbar</a> <a class="dropdown-item" target="_blank" href="../blocks/navigation.html">Navigation</a></div>
                                <div class="col"><a class="dropdown-item" target="_blank" href="../blocks/pricing.html">Pricing</a> <a class="dropdown-item" target="_blank" href="../blocks/slider.html">Sliders</a> <a class="dropdown-item" target="_blank" href="../blocks/team.html">Team</a> <a class="dropdown-item" target="_blank" href="../blocks/testimonial.html">Testimonials</a></div>
                            </div>
                        </div>
                        <div class="st-dropdown-content-group">
                            <h3 class="link-title"><i class="fas fa-long-arrow-alt-right icon"></i> Coming soon</h3>
                            <div class="ms-5"><span class="dropdown-item text-secondary">Dividers </span><span class="dropdown-item text-secondary">Gallery </span><span class="dropdown-item text-secondary">Screenshots</span></div>
                        </div>
                    </div>
                </div>
                <div class="st-dropdown-section" data-dropdown="pages">
                    <div class="st-dropdown-content">
                        <div class="st-dropdown-content-group">
                            <div class="mb-4">
                                <h3 class="text-darker light text-nowrap"><span class="bold regular">Useful pages</span> you'll need</h3>
                                <p class="text-secondary mt-0">Get a complete design stack</p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <ul class="me-4">
                                        <li>
                                            <h4 class="text-uppercase regular">Error</h4>
                                        </li>
                                        <li><a target="_blank" href="../403.html">403 Error</a></li>
                                        <li><a target="_blank" href="../404.html">404 Error</a></li>
                                        <li><a target="_blank" href="../500.html">500 Error</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="me-4">
                                        <li>
                                            <h4 class="text-uppercase regular">User</h4>
                                        </li>
                                        <li><a target="_blank" href="../login.html">Login</a></li>
                                        <li><a target="_blank" href="../register.html">Register</a></li>
                                        <li><a target="_blank" href="../forgot.html">Forgot</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul>
                                        <li>
                                            <h4 class="text-uppercase regular">Extra</h4>
                                        </li>
                                        <li><a target="_blank" href="../pricing.html">Pricing</a></li>
                                        <li><a target="_blank" href="../terms.html">Terms</a></li>
                                        <li><a target="_blank" href="../faqs.html">FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="st-dropdown-content-group"><a class="dropdown-item bold" href="../about.html"><i class="far fa-building icon"></i> About </a><a class="dropdown-item bold" href="../contact.html"><i class="far fa-envelope icon"></i> Contact </a><a class="dropdown-item bold" href="../pricing.html"><i class="fas fa-hand-holding-usd icon"></i> Pricing</a></div>
                    </div>
                </div>
                <div class="st-dropdown-section" data-dropdown="components">
                    <div class="st-dropdown-content">
                        <div class="st-dropdown-content-group"><a class="dropdown-item" target="_blank" href="../components/color.html">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-dark text-contrast icon-md center-flex rounded-circle me-2"><i class="fas fa-palette"></i></div>
                                    <div class="flex-fill">
                                        <h3 class="link-title m-0">Colors</h3>
                                        <p class="m-0 text-secondary">Get to know DashCore color options</p>
                                    </div>
                                </div>
                            </a><a class="dropdown-item" target="_blank" href="../components/form-controls.html">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-secondary text-contrast icon-md center-flex rounded-circle me-2"><i class="fab fa-wpforms"></i></div>
                                    <div class="flex-fill">
                                        <h3 class="link-title m-0">Forms</h3>
                                        <p class="m-0 text-secondary">All forms elements</p>
                                    </div>
                                </div>
                            </a><a class="dropdown-item" target="_blank" href="../components/accordion.html">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success text-contrast icon-md center-flex rounded-circle me-2"><i class="fas fa-bars"></i></div>
                                    <div class="flex-fill">
                                        <h3 class="link-title m-0">Accordion</h3>
                                        <p class="m-0 text-secondary">Useful accordion elements</p>
                                    </div>
                                </div>
                            </a><a class="dropdown-item" target="_blank" href="../components/cookie-law.html">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-info text-contrast icon-md center-flex rounded-circle me-2"><i class="fas fa-cookie-bite"></i></div>
                                    <div class="flex-fill">
                                        <h3 class="link-title m-0">CookieLaw</h3>
                                        <p class="m-0 text-secondary">Comply with the hideous EU Cookie Law</p>
                                    </div>
                                </div>
                            </a>
                            <h4 class="text-uppercase regular">Huge components list</h4>
                            <div class="row">
                                <div class="col me-4"><a class="dropdown-item" target="_blank" href="../components/alert.html">Alerts</a> <a class="dropdown-item" target="_blank" href="../components/badge.html">Badges</a> <a class="dropdown-item" target="_blank" href="../components/button.html">Buttons</a></div>
                                <div class="col me-4"><a class="dropdown-item" target="_blank" href="../components/overlay.html">Overlay</a> <a class="dropdown-item" target="_blank" href="../components/progress.html">Progress</a> <a class="dropdown-item" target="_blank" href="../components/lightbox.html">Lightbox</a></div>
                                <div class="col me-4"><a class="dropdown-item" target="_blank" href="../components/tab.html">Tabs</a> <a class="dropdown-item" target="_blank" href="../components/tables.html">Tables</a> <a class="dropdown-item" target="_blank" href="../components/typography.html">Typography</a></div>
                            </div>
                        </div>
                        <div class="st-dropdown-content-group"><a class="dropdown-item" target="_blank" href="../components/wizard.html">Wizard </a><span class="dropdown-item d-flex align-items-center text-muted">Timeline <i class="fas fa-ban ms-auto"></i> </span><span class="dropdown-item d-flex align-items-center text-muted">Process <i class="fas fa-ban ms-auto"></i></span></div>
                    </div>
                </div>
                <div class="st-dropdown-section" data-dropdown="blog">
                    <div class="st-dropdown-content">
                        <div class="st-dropdown-content-group">
                            <div class="row">
                                <div class="col me-4">
                                    <h4 class="regular text-uppercase">Full width</h4><a class="dropdown-item" target="_blank" href="../blog/blog-post.html">Single post</a> <a class="dropdown-item" target="_blank" href="../blog/blog-grid.html">Posts Grid</a>
                                </div>
                                <div class="col me-4">
                                    <h4 class="regular text-uppercase">Sidebar left</h4><a class="dropdown-item" target="_blank" href="../blog/blog-post-sidebar-left.html">Single post</a> <a class="dropdown-item" target="_blank" href="../blog/blog-grid-sidebar-left.html">Posts Grid</a>
                                </div>
                                <div class="col me-4">
                                    <h4 class="regular text-uppercase">Sidebar right</h4><a class="dropdown-item" target="_blank" href="../blog/blog-post-sidebar-right.html">Single post</a> <a class="dropdown-item" target="_blank" href="../blog/blog-grid-sidebar-right.html">Posts Grid</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="st-dropdown-section" data-dropdown="shop">
                    <div class="st-dropdown-content">
                        <div class="st-dropdown-content-group"><a class="dropdown-item mb-4" target="_blank" href="../shop/">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success text-contrast icon-md center-flex rounded-circle me-2"><i class="fas fa-shopping-basket"></i></div>
                                    <div class="flex-fill">
                                        <h3 class="link-title m-0">Home</h3>
                                        <p class="m-0 text-secondary">Online store home with an outstanding UX</p>
                                    </div>
                                </div>
                            </a><a class="dropdown-item" target="_blank" href="../shop/cart.html">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info text-contrast icon-md center-flex rounded-circle me-2"><i class="fas fa-shopping-cart"></i></div>
                                    <div class="flex-fill">
                                        <h3 class="link-title m-0">Cart</h3>
                                        <p class="m-0 text-secondary">Online store shopping cart</p>
                                    </div>
                                </div>
                            </a></div>
                        <div class="st-dropdown-content-group">
                            <h3 class="link-title"><i class="fas fa-money-check-alt icon"></i> Checkout</h3>
                            <div class="ms-5"><a class="dropdown-item text-secondary" target="_blank" href="../shop/checkout-customer.html">Customer <i class="fas fa-angle-right ms-2"></i> </a><a class="dropdown-item text-secondary" target="_blank" href="../shop/checkout-shipping.html">Shipping Information <i class="fas fa-angle-right ms-2"></i> </a><a class="dropdown-item text-secondary" target="_blank" href="../shop/checkout-payment.html">Payment Methods <i class="fas fa-angle-right ms-2"></i> </a><a class="dropdown-item text-secondary" target="_blank" href="../shop/checkout-confirmation.html">Order Review <i class="fas fa-angle-right ms-2"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="overflow-hidden">
    @yield('content')
    <footer class="site-footer section bg-dark">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <h6 class="bold text-contrast">All Products</h6>
                    <nav class="nav flex-column"><a class="nav-item py-1" href="#">Headphones</a> <a class="nav-item py-1" href="#">Portable Speakers</a> <a class="nav-item py-1" href="#">Audio Accessories</a> <a class="nav-item py-1" href="#">Earbuds</a> <a class="nav-item py-1" href="#">Speakers</a> <a class="nav-item py-1" href="#">Subwoofers</a> <a class="nav-item py-1" href="#">Sound Bars</a> <a class="nav-item py-1" href="#">Amplifiers</a> <a class="nav-item py-1" href="#">Bluetooth</a> <a class="nav-item py-1" href="#">LED TV's</a> <a class="nav-item py-1" href="#">Blue-Ray</a> <a class="nav-item py-1" href="#">DVD Players</a> <a class="nav-item py-1" href="#">Watches</a></nav>
                </div>
                <div class="col-md-4">
                    <h6 class="bold text-contrast">Categories</h6>
                    <nav class="nav flex-column"><a class="nav-item py-1" href="#">Wireless & Bluetooth</a> <a class="nav-item py-1" href="#">Computer & Electronics</a> <a class="nav-item py-1" href="#">Speakers</a> <a class="nav-item py-1" href="#">Virtual Reality</a> <a class="nav-item py-1" href="#">Gaming & Consoles</a> <a class="nav-item py-1" href="#">TVs</a></nav>
                    <h6 class="bold text-contrast mt-4">Information</h6>
                    <nav class="nav flex-column"><a class="nav-item py-1" href="#">About company</a> <a class="nav-item py-1" href="#">Brands</a> <a class="nav-item py-1" href="#">Meet the Team</a> <a class="nav-item py-1" href="#">Contact Info</a> <a class="nav-item py-1" href="#">FAQs</a></nav>
                </div>
                <div class="col-md-4">
                    <h6 class="bold widget-title text-contrast pb-1">Our Newsletter</h6>
                    <form action="srv/register.php" class="form" data-response-message-animation="slide-in-left">
                        <div class="input-group"><input type="email" name="Subscribe[email]" class="form-control rounded-circle-left" placeholder="Enter your email" required> <button class="btn rounded-circle-right btn-darker" type="submit">Register</button></div>
                    </form>
                    <div class="response-message"><i class="fas fa-envelope font-lg"></i>
                        <p class="font-md m-0">Check your email</p>
                        <p class="response">We sent you an email with a link to get started. You’ll be in your account in no time.</p>
                    </div>
                    <h6 class="bold text-contrast mt-5 pb-1">Coming Soon</h6>
                    <nav class="nav flex-column flex-md-row justify-content-center justify-content-md-start align-items-center"><a href="#" class="nav-link py-3 btn btn-download btn-darker text-light me-0 me-md-4 mb-4 mb-md-0"><img src="/frontend/img/svg/apple.svg" class="icon icon-md" alt="...">
                            <p class="ms-2"><span class="small light">Get it on the</span> <span class="d-block bold text-contrast">App Store</span></p>
                        </a><a href="#" class="nav-link py-3 btn btn-download btn-darker text-light"><img src="/frontend/img/svg/google-play.svg" class="icon icon-md" alt="...">
                            <p class="ms-2"><span class="small light">Download on</span> <span class="d-block bold text-contrast">Google Play</span></p>
                        </a></nav>
                </div>
            </div>
        </div>
        <div class="bg-darker">
            <div class="container pt-5 pb-2">
                <div class="row">
                    <div class="col-md-2">
                        <div class="bg-dark p-3 icon-xl rounded-circle center-flex mx-auto"><img src="/frontend/img/shop/icons/fic/072-sale.svg" class="inline-it img-responsive fill-alternate" alt=""></div>
                        <h6 class="mt-3 mb-0 text-center text-light bold">Deals &amp; Promotions</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="bg-dark p-3 icon-xl rounded-circle center-flex mx-auto"><img src="/frontend/img/shop/icons/fic/026-delivery-truck-2.svg" class="inline-it img-responsive fill-alternate" alt=""></div>
                        <h6 class="mt-3 mb-0 text-center text-light bold">Free Shipping</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="bg-dark p-3 icon-xl rounded-circle center-flex mx-auto"><img src="/frontend/img/shop/icons/fic/060-package-1.svg" class="inline-it img-responsive fill-alternate" alt=""></div>
                        <h6 class="mt-3 mb-0 text-center text-light bold">Easy Return</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="bg-dark p-3 icon-xl rounded-circle center-flex mx-auto"><img src="/frontend/img/shop/icons/fic/056-box.svg" class="inline-it img-responsive fill-alternate" alt=""></div>
                        <h6 class="mt-3 mb-0 text-center text-light bold">Order Tracking</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="bg-dark p-3 icon-xl rounded-circle center-flex mx-auto"><img src="/frontend/img/shop/icons/fic/076-security.svg" class="inline-it img-responsive fill-alternate" alt=""></div>
                        <h6 class="mt-3 mb-0 text-center text-light bold">Secure Checkout</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="bg-dark p-3 icon-xl rounded-circle center-flex mx-auto"><img src="/frontend/img/shop/icons/fic/020-chat.svg" class="inline-it img-responsive fill-alternate" alt=""></div>
                        <h6 class="mt-3 mb-0 text-center text-light bold">Customer Support</h6>
                    </div>
                </div>
                <hr class="border-dark my-5">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <nav class="nav flex-wrap"><a class="nav-item py-1 me-3" href="#">Support</a> <a class="nav-item py-1 me-3" href="#">Privacy</a> <a class="nav-item py-1 me-3" href="#">Terms of use</a> <a class="nav-item py-1" href="#">Return Policy</a></nav>
                    </div>
                    <div class="col-md-4 text-center"><a class="d-inline-block align-middle me-3" href="#"><img class="img-responsive logo" src="/frontend/img/logo-light.png" alt=""></a></div>
                    <div class="col-md-4 d-flex">
                        <nav class="nav ms-md-auto"><a class="btn btn-sm btn-dark me-2" href="#"><i class="fab fa-twitter"></i></a> <a class="btn btn-sm btn-dark me-2" href="#"><i class="fab fa-facebook"></i></a> <a class="btn btn-sm btn-dark me-2" href="#"><i class="fab fa-instagram"></i></a> <a class="btn btn-sm btn-dark me-2" href="#"><i class="fab fa-pinterest"></i></a> <a class="btn btn-sm btn-dark" href="#"><i class="fab fa-youtube"></i></a></nav>
                    </div>
                </div>
                <div class="row align-items-center mt-4">
                    <div class="col-md-6">
                        <p class="mt-4 small mb-md-0 text-center text-md-start">© 2021 <a href="5studios.net" target="_blank">5studios.net</a>. All Rights Reserved</p>
                    </div>
                    <div class="col-md-6"><img class="img-responsive ms-md-auto" style="max-width: 136px" src="/frontend/img/shop/payment-methods.png" alt="Payment methods"></div>
                </div>
            </div>
        </div>
    </footer>
    </main>
    <!-- themeforest:js -->
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
    @yield('script')
    <!-- endinject -->
</body>

</html>