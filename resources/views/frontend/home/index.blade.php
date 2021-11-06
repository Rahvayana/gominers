@extends('layouts.frontend')
@section('content')
<main class="overflow-hidden">
    <!-- Shop Hero Slider -->
    <section class="section">
        <div class="swiper-container shop-home-slider" data-sw-effect="fade">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="container-fluid pt-6 pb-9 py-md-0" style="background-color: rgb(0, 157, 206);">
                        <div class="row gap-y align-items-center">
                            <div class="col-md-6 col-lg-6 px-0 order-md-2"><img class="img-responsive ms-auto" style="max-height: 620px;" src="/frontend/img/shop/home/blue-headphones.jpg" alt="..."></div>
                            <div class="col-md-6 col-lg-4 ms-lg-auto">
                                <div class="text-center text-lg-start text-lg-nowrap">
                                    <h4 class="text-light font-weight-light mb-0 pb-1">What you were waiting for?</h4>
                                    <h1 class="text-contrast bold display-4">The Headphones Collection</h1>
                                    <p class="lead text-light pb-3">Discover our selection of the best Headphones</p><a class="btn btn-primary" href="javascript:;">Shop Now <i class="fas fa-chevron-right ms-2 me-n1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="container-fluid pt-6 pb-9 py-md-0" style="background-color: rgb(92, 216, 217);">
                        <div class="row gap-y align-items-center">
                            <div class="col-md-6 col-lg-6 px-0 order-md-2"><img class="img-responsive ms-auto" style="max-height: 620px;" src="/frontend/img/shop/home/app-deals.jpg" alt="..."></div>
                            <div class="col-md-6 col-lg-4 ms-lg-auto">
                                <div class="text-center text-lg-start text-lg-nowrap">
                                    <h4 class="text-light font-weight-light mb-0 pb-1">Download the App</h4>
                                    <h1 class="text-contrast bold display-4">Shop on the Go</h1>
                                    <p class="lead text-light pb-3">Get the best of our store at your fingertips</p><a class="btn btn-primary" href="javascript:;">Shop Now <i class="fas fa-chevron-right ms-2 me-n1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="container-fluid pt-6 pb-9 py-md-0" style="background-color: rgb(240, 197, 87);">
                        <div class="row gap-y align-items-center">
                            <div class="col-md-6 col-lg-6 px-0 order-md-2"><img class="img-responsive ms-auto" style="max-height: 620px;" src="/frontend/img/shop/home/happy-girl.jpg" alt="..."></div>
                            <div class="col-md-6 col-lg-4 ms-lg-auto">
                                <div class="text-center text-lg-start text-lg-nowrap">
                                    <h4 class="text-light font-weight-light mb-0 pb-1">Enjoy your world</h4>
                                    <h1 class="text-contrast bold display-4">What&#39;s makes you happy</h1>
                                    <p class="lead text-light pb-3">We have all the products to make your life easier</p><a class="btn btn-primary" href="javascript:;">Shop Now <i class="fas fa-chevron-right ms-2 me-n1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="container-fluid pt-6 pb-9 py-md-0" style="background-color: rgb(226, 162, 113);">
                        <div class="row gap-y align-items-center">
                            <div class="col-md-6 col-lg-6 px-0 order-md-2"><img class="img-responsive ms-auto" style="max-height: 620px;" src="/frontend/img/shop/home/enjoy.jpg" alt="..."></div>
                            <div class="col-md-6 col-lg-4 ms-lg-auto">
                                <div class="text-center text-lg-start text-lg-nowrap">
                                    <h4 class="text-light font-weight-light mb-0 pb-1">Get them all</h4>
                                    <h1 class="text-contrast bold display-4">Best performing products</h1>
                                    <p class="lead text-light pb-3">We have what you&#39;re looking for in all tech industry</p><a class="btn btn-primary" href="javascript:;">Shop Now <i class="fas fa-chevron-right ms-2 me-n1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination highlight-active text-md-right pe-md-6 pb-5 mb-5 mb-md-0"></div><!-- navigation buttons -->
            <div class="swiper-button swiper-button-prev rounded-circle shadow"><i data-feather="arrow-left"></i></div>
            <div class="swiper-button swiper-button-next rounded-circle shadow"><i data-feather="arrow-right"></i></div>
        </div>
    </section><!-- Deals -->
    <section class="section bg-light mt-n6">
        <div class="container bring-to-front pt-0">
            <div class="row gap-y">
                <div class="col-xl-12 col-lg-12">
                    <div class="shadow-box shadow-hover bg-contrast p-3 rounded h-100">
                        <p class="text-darker bold mt-0 d-flex">Weekend News <a href="javascript:;" class="small text-muted ms-auto">View more</a></p>
                        <div class="row no-gutters text-center">
                            @foreach ($headline_news as $news)
                                <div class="col-6 col-sm-3 d-flex flex-column ps-0 pe-2">
                                    <a href="{{$news->url}}" class="shadow-box p-2" target="_blank">
                                        <img src="{{$news->urlToImage}}" class="img-responsive rounded" style="height: 200px; width: 100%;" alt="">
                                        <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: left;">{{$news->title}}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ./Offers -->
    <section class="section bg-light border-bottom">
        <div class="container pt-0">
            <div class="row gap-y">
                <div class="col-md-12">
                    <div class="rounded bg-info shadow image-background off-left-background lift-hover p-4 ps-6 ps-md-9" style="background-image: url(/frontend/img/shop/products/vrglasses.png)">
                        <div class="ps-lg-3">
                            <h3 class="bold text-contrast mt-0">Telegram Group</h3>
                            <p class="text-light mt-0">Join with other miners in our telegram group</p><a href="#!" class="btn btn-contrast">Join Group</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- Trending Products -->
    <section class="trending-now">
        <div class="container">
            <div class="section-heading"><span class="text-primary bold">Discover</span>
                <h3>What's Trending Now</h3>
            </div>
            <div class="row gap-y">
                <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                    <div class="card product-card border-0"><a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;"><i class="far fa-heart"></i> </a><a class="card-img-top d-block overflow-hidden" href="javascript:;"><img src="/frontend/img/shop/products/computerconnection.png" class="img-responsive mx-auto" alt=""></a>
                        <div class="card-body"><a class="product-category text-muted font-xs" href="javascript:;">Wireless &amp; Bluetooth</a>
                            <h3 class="product-title font-sm"><a href="javascript:;" class="text-darker">Bluetooh Mouse</a></h3>
                            <div class="center-flex justify-content-between flex-wrap">
                                <div class="product-price d-flex align-items-end">
                                    <div class="text-primary light lead"><span>$25.</span> <sup>00</sup></div><del class="text-muted light strike-through ms-2"><span>$45.</span> <sup>00</sup></del>
                                </div>
                                <div class="product-rating small text-alternate"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></div>
                            </div>
                        </div>
                        <div class="card-body card-body-hidden d-grid"><button class="btn btn-primary mb-2" type="button"><i data-feather="shopping-cart" class="me-1" width="16"></i>Add to Cart</button>
                            <div class="text-center"><a class="font-ms small text-muted" href="#quick-view" data-bs-toggle="modal"><i data-feather="eye" class="me-1" width="14"></i>Quick view</a></div>
                        </div>
                    </div>
                    <hr class="d-sm-none">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                    <div class="card product-card border-0"><a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;"><i class="far fa-heart"></i> </a><a class="card-img-top d-block overflow-hidden" href="javascript:;"><img src="/frontend/img/shop/products/externalharddrive.png" class="img-responsive mx-auto" alt=""></a>
                        <div class="card-body"><a class="product-category text-muted font-xs" href="javascript:;">Computer &amp; Electronics</a>
                            <h3 class="product-title font-sm"><a href="javascript:;" class="text-darker">External Hard Drive</a></h3>
                            <div class="center-flex justify-content-between flex-wrap">
                                <div class="product-price d-flex align-items-end">
                                    <div class="text-primary light lead"><span>$78.</span> <sup>00</sup></div>
                                </div>
                                <div class="product-rating small text-alternate"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i></div>
                            </div>
                        </div>
                        <div class="card-body card-body-hidden d-grid"><button class="btn btn-primary mb-2" type="button"><i data-feather="shopping-cart" class="me-1" width="16"></i>Add to Cart</button>
                            <div class="text-center"><a class="font-ms small text-muted" href="#quick-view" data-bs-toggle="modal"><i data-feather="eye" class="me-1" width="14"></i>Quick view</a></div>
                        </div>
                    </div>
                    <hr class="d-sm-none">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                    <div class="card product-card border-0"><a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;"><i class="far fa-heart"></i> </a><a class="card-img-top d-block overflow-hidden" href="javascript:;"><img src="/frontend/img/shop/products/modernspeakers.jpg" class="img-responsive mx-auto" alt=""></a>
                        <div class="card-body"><a class="product-category text-muted font-xs" href="javascript:;">Speakers</a>
                            <h3 class="product-title font-sm"><a href="javascript:;" class="text-darker">Modern Speakers</a></h3>
                            <div class="center-flex justify-content-between flex-wrap">
                                <div class="product-price d-flex align-items-end">
                                    <div class="text-primary light lead"><span>$124.</span> <sup>00</sup></div><del class="text-muted light strike-through ms-2"><span>$154.</span> <sup>00</sup></del>
                                </div>
                                <div class="product-rating small text-alternate"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></div>
                            </div>
                        </div>
                        <div class="card-body card-body-hidden d-grid"><button class="btn btn-primary mb-2" type="button"><i data-feather="shopping-cart" class="me-1" width="16"></i>Add to Cart</button>
                            <div class="text-center"><a class="font-ms small text-muted" href="#quick-view" data-bs-toggle="modal"><i data-feather="eye" class="me-1" width="14"></i>Quick view</a></div>
                        </div>
                    </div>
                    <hr class="d-sm-none">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                    <div class="card product-card border-0"><a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;"><i class="far fa-heart"></i> </a><a class="card-img-top d-block overflow-hidden" href="javascript:;"><img src="/frontend/img/shop/products/vrglassesdual.png" class="img-responsive mx-auto" alt=""></a>
                        <div class="card-body"><a class="product-category text-muted font-xs" href="javascript:;">Virtual Reality</a>
                            <h3 class="product-title font-sm"><a href="javascript:;" class="text-darker">Virtual Reality Glasses</a></h3>
                            <div class="center-flex justify-content-between flex-wrap">
                                <div class="product-price d-flex align-items-end">
                                    <div class="text-primary light lead"><span>$145.</span> <sup>00</sup></div>
                                </div>
                                <div class="product-rating small text-alternate"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></div>
                            </div>
                        </div>
                        <div class="card-body card-body-hidden d-grid"><button class="btn btn-primary mb-2" type="button"><i data-feather="shopping-cart" class="me-1" width="16"></i>Add to Cart</button>
                            <div class="text-center"><a class="font-ms small text-muted" href="#quick-view" data-bs-toggle="modal"><i data-feather="eye" class="me-1" width="14"></i>Quick view</a></div>
                        </div>
                    </div>
                    <hr class="d-sm-none">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                    <div class="card product-card border-0"><a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;"><i class="far fa-heart"></i> </a><a class="card-img-top d-block overflow-hidden" href="javascript:;"><img src="/frontend/img/shop/products/dualshock.png" class="img-responsive mx-auto" alt=""></a>
                        <div class="card-body"><a class="product-category text-muted font-xs" href="javascript:;">Gaming &amp; Consoles</a>
                            <h3 class="product-title font-sm"><a href="javascript:;" class="text-darker">Dual Shock Controller</a></h3>
                            <div class="center-flex justify-content-between flex-wrap">
                                <div class="product-price d-flex align-items-end">
                                    <div class="text-primary light lead"><span>$87.</span> <sup>00</sup></div><del class="text-muted light strike-through ms-2"><span>$54.</span> <sup>00</sup></del>
                                </div>
                                <div class="product-rating small text-alternate"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></div>
                            </div>
                        </div>
                        <div class="card-body card-body-hidden d-grid"><button class="btn btn-primary mb-2" type="button"><i data-feather="shopping-cart" class="me-1" width="16"></i>Add to Cart</button>
                            <div class="text-center"><a class="font-ms small text-muted" href="#quick-view" data-bs-toggle="modal"><i data-feather="eye" class="me-1" width="14"></i>Quick view</a></div>
                        </div>
                    </div>
                    <hr class="d-sm-none">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                    <div class="card product-card border-0"><a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;"><i class="far fa-heart"></i> </a><a class="card-img-top d-block overflow-hidden" href="javascript:;"><img src="/frontend/img/shop/products/wiredmouse.png" class="img-responsive mx-auto" alt=""></a>
                        <div class="card-body"><a class="product-category text-muted font-xs" href="javascript:;">Computer &amp; Electronics</a>
                            <h3 class="product-title font-sm"><a href="javascript:;" class="text-darker">Wired Classic Mouse</a></h3>
                            <div class="center-flex justify-content-between flex-wrap">
                                <div class="product-price d-flex align-items-end">
                                    <div class="text-primary light lead"><span>$12.</span> <sup>00</sup></div>
                                </div>
                                <div class="product-rating small text-alternate"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i></div>
                            </div>
                        </div>
                        <div class="card-body card-body-hidden d-grid"><button class="btn btn-primary mb-2" type="button"><i data-feather="shopping-cart" class="me-1" width="16"></i>Add to Cart</button>
                            <div class="text-center"><a class="font-ms small text-muted" href="#quick-view" data-bs-toggle="modal"><i data-feather="eye" class="me-1" width="14"></i>Quick view</a></div>
                        </div>
                    </div>
                    <hr class="d-sm-none">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                    <div class="card product-card border-0"><a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;"><i class="far fa-heart"></i> </a><a class="card-img-top d-block overflow-hidden" href="javascript:;"><img src="/frontend/img/shop/products/audioclassicmic.png" class="img-responsive mx-auto" alt=""></a>
                        <div class="card-body"><a class="product-category text-muted font-xs" href="javascript:;">Professional Audio</a>
                            <h3 class="product-title font-sm"><a href="javascript:;" class="text-darker">Classic Microphone</a></h3>
                            <div class="center-flex justify-content-between flex-wrap">
                                <div class="product-price d-flex align-items-end">
                                    <div class="text-primary light lead"><span>$25.</span> <sup>00</sup></div><del class="text-muted light strike-through ms-2"><span>$54.</span> <sup>00</sup></del>
                                </div>
                                <div class="product-rating small text-alternate"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="far fa-star"></i></div>
                            </div>
                        </div>
                        <div class="card-body card-body-hidden d-grid"><button class="btn btn-primary mb-2" type="button"><i data-feather="shopping-cart" class="me-1" width="16"></i>Add to Cart</button>
                            <div class="text-center"><a class="font-ms small text-muted" href="#quick-view" data-bs-toggle="modal"><i data-feather="eye" class="me-1" width="14"></i>Quick view</a></div>
                        </div>
                    </div>
                    <hr class="d-sm-none">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                    <div class="card product-card border-0"><a class="btn btn-light btn-circle btn-sm absolute top right" href="javascript:;"><i class="far fa-heart"></i> </a><a class="card-img-top d-block overflow-hidden" href="javascript:;"><img src="/frontend/img/shop/products/wireless-headphones.png" class="img-responsive mx-auto" alt=""></a>
                        <div class="card-body"><a class="product-category text-muted font-xs" href="javascript:;">Wireless &amp; Bluetooth</a>
                            <h3 class="product-title font-sm"><a href="javascript:;" class="text-darker">Wireless Headphones</a></h3>
                            <div class="center-flex justify-content-between flex-wrap">
                                <div class="product-price d-flex align-items-end">
                                    <div class="text-primary light lead"><span>$45.</span> <sup>00</sup></div>
                                </div>
                                <div class="product-rating small text-alternate"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></div>
                            </div>
                        </div>
                        <div class="card-body card-body-hidden d-grid"><button class="btn btn-primary mb-2" type="button"><i data-feather="shopping-cart" class="me-1" width="16"></i>Add to Cart</button>
                            <div class="text-center"><a class="font-ms small text-muted" href="#quick-view" data-bs-toggle="modal"><i data-feather="eye" class="me-1" width="14"></i>Quick view</a></div>
                        </div>
                    </div>
                    <hr class="d-sm-none">
                </div>
            </div>
            <div class="text-center mt-5"><a class="btn btn-outline-primary" href="javascript:;">More products <i class="fas fa-chevron-right ms-1"></i></a></div>
        </div>
    </section><!-- CTA Promo -->
    
    <section class="section">
        <div class="container bring-to-front bg-light">
            <div class="section-heading"><span class="text-primary bold">Discover</span>
                <h3>Watch Our Education Videos</h3>
            </div>
            <div class="row gap-y">
                <div class="col-lg-4 promo-column">
                    <div class="rounded promo-block zoom-background">
                        <div class="absolute top right bottom left image-background cover overlay overlay-dark alpha-1 w-100 h-100" style="background-image: url(/frontend/img/shop/products/wearable.jpg)"></div>
                        <div class="content position-relative p-4">
                            <h4 class="text-contrast mt-0">Wearable</h4>
                            <p class="text-light mt-0">Smart electronic devices for your day to day life.</p><a href="javascript:;" class="btn btn-contrast">Shop Wearable</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 promo-column">
                    <div class="rounded promo-block zoom-background">
                        <div class="absolute top right bottom left image-background cover overlay overlay-light alpha-3 w-100 h-100" style="background-image: url(/frontend/img/shop/products/wifi.jpg)"></div>
                        <div class="content position-relative p-4">
                            <h4 class="text-darker mt-0">Wifi</h4>
                            <p class="text-dark mt-0">Exclusive high quality wifi technology to extend your network.</p><a href="javascript:;" class="btn btn-contrast">Shop Wifi</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 promo-column">
                    <div class="rounded promo-block zoom-background">
                        <div class="absolute top right bottom left image-background cover overlay overlay-dark alpha-1 w-100 h-100" style="background-image: url(/frontend/img/shop/products/wearable.jpg)"></div>
                        <div class="content position-relative p-4">
                            <h4 class="text-contrast mt-0">Wearable</h4>
                            <p class="text-light mt-0">Smart electronic devices for your day to day life.</p><a href="javascript:;" class="btn btn-contrast">Shop Wearable</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- Banners -->
    <section class="section">
        <div class="container">
            <div class="section-heading"><span class="text-primary bold">Discover</span>
                <h3>A Few Tips From Us</h3>
            </div>
            <div class="row gap-y">
                @foreach ($blogs as $blog)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-blog shadow-box shadow-hover border-0"><a href="{{ route('blog.detail', $blog->slug) }}"><img class="card-img-top img-responsive" src="https://picsum.photos/350/200/?random&gravity=north" alt=""></a>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="author d-flex align-items-center"><img class="author-picture rounded-circle icon-md shadow-box" src="{{$blog->foto??'/frontend/img/avatar/user.png'}}" alt="...">
                                    <p class="small bold my-0">{{$blog->author}}</p>
                                </div>
                                {{-- <nav class="nav"><a href="javascript:;" class="d-flex align-items-center text-secondary me-3 blog-action blog-favorite"><i class="fas fa-heart text-danger me-2"></i> <span class="small">347</span> </a><a href="javascript:;" class="d-flex align-items-center text-secondary blog-action blog-bookmark"><i class="far fa-bookmark me-2"></i> <span class="small">73</span></a></nav> --}}
                            </div>
                            <hr>
                            <p class="card-title regular"><a href="{{ route('blog.detail', $blog->slug) }}">{{$blog->title}}</a></p>
                            <p class="card-text text-secondary" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; text-align: left;">{{$blog->desc}}</p>
                            <p class="bold small text-secondary my-0"><small>{{date('F d Y',strtotime($blog->created_at))}}</small></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-5"><a class="btn btn-outline-primary" href="javascript:;">More Tips <i class="fas fa-chevron-right ms-1"></i></a></div>
        </div>
    </section><!-- ./Footer - Four Columns -->
    <section class="brands">
        <div class="container">
            <div class="section-heading"><span class="text-primary bold">Brands</span>
                <h3>We work with</h3>
            </div>
            <div class="row gap-y">
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm shadow-hover lift-hover">
                        <div class="card-body py-4"><a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="/frontend/img/shop/brands/1.svg" alt=""></a></div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm shadow-hover lift-hover">
                        <div class="card-body py-4"><a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="/frontend/img/shop/brands/2.svg" alt=""></a></div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm shadow-hover lift-hover">
                        <div class="card-body py-4"><a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="/frontend/img/shop/brands/3.svg" alt=""></a></div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm shadow-hover lift-hover">
                        <div class="card-body py-4"><a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="/frontend/img/shop/brands/4.svg" alt=""></a></div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm shadow-hover lift-hover">
                        <div class="card-body py-4"><a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="/frontend/img/shop/brands/5.svg" alt=""></a></div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm shadow-hover lift-hover">
                        <div class="card-body py-4"><a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="/frontend/img/shop/brands/6.svg" alt=""></a></div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm shadow-hover lift-hover">
                        <div class="card-body py-4"><a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="/frontend/img/shop/brands/7.svg" alt=""></a></div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm shadow-hover lift-hover">
                        <div class="card-body py-4"><a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="/frontend/img/shop/brands/8.svg" alt=""></a></div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm shadow-hover lift-hover">
                        <div class="card-body py-4"><a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="/frontend/img/shop/brands/9.svg" alt=""></a></div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm shadow-hover lift-hover">
                        <div class="card-body py-4"><a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="/frontend/img/shop/brands/10.svg" alt=""></a></div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm shadow-hover lift-hover">
                        <div class="card-body py-4"><a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="/frontend/img/shop/brands/11.svg" alt=""></a></div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card border-0 shadow-sm shadow-hover lift-hover">
                        <div class="card-body py-4"><a href="#"><img class="d-block mx-auto" style="max-height: 64px;" src="/frontend/img/shop/brands/12.svg" alt=""></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="position-relative">
        <div class="shape-divider shape-divider-bottom shape-divider-fluid-x text-dark"><svg viewBox="0 0 2880 48" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z"></path>
            </svg></div>
    </div>
</main>
@endsection