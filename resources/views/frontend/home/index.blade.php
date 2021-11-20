@extends('layouts.frontend')
@section('content')

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
                    <p class="text-darker bold mt-0 d-flex">Miners Update <a href="javascript:;" class="small text-muted ms-auto">View more</a></p>
                    <div class="row no-gutters text-center">
                        @foreach ($headline_news as $news)
                            <div class="col-6 col-sm-3 d-flex flex-column ps-0 pe-2">
                                <a href="{{$news->url}}" class="shadow-box p-2" target="_blank">
                                    <img src="{{$news->urlToImage}}" class="img-responsive rounded" style="height: auto; width: 100%;" alt="">
                                    <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: left;">
                                        {{$news->title}}
                                        <p style="text-align: left; color: black;">{{$news->source->name}}</p>
                                    </p>
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
            @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 shadow-hover">
                <div class="card product-card border-0">
                    <a class="card-img-top d-block overflow-hidden" href="{{ route('product.detail',$product->slug) }}">
                        <img src="/{{$product->image??'/backend/img/pur1.jpg'}}" class="img-responsive mx-auto" alt="">
                    </a>
                    <div class="card-body"><a class="product-category text-muted font-xs" href="{{ route('product.detail',$product->slug) }}">Wireless &amp; Bluetooth</a>
                        <h3 class="product-title font-sm"><a href="{{ route('product.detail',$product->slug) }}" class="text-darker" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: left;">{{$product->title}}</a></h3>
                        <div class="center-flex justify-content-between flex-wrap">
                            <div class="product-price d-flex align-items-end">
                                <div class="text-primary light lead"><span>Rp. {{number_format($product->harga)}}</span></div>
                            </div>
                            <div class="product-rating small text-alternate"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></div>
                        </div>
                    </div>
                    @if (Auth::guard('customer')->id()==$product->user_id)
                    <div class="card-body card-body-hidden d-grid">
                        <button class="btn btn-primary mb-2" type="button" onclick="selfItem()">
                            <i data-feather="shopping-cart" class="me-1" width="16"></i>This is Your Item
                        </button>
                    </div>
                    @elseif ((Auth::guard('customer')->id()==null))
                    <div class="card-body card-body-hidden d-grid">
                        <button class="btn btn-primary mb-2" type="button" onclick="loginFirst()">
                            <i data-feather="shopping-cart" class="me-1" width="16"></i>Add to Cart
                        </button>
                    </div>
                    @else
                    <div class="card-body card-body-hidden d-grid">
                        <button class="btn btn-primary mb-2" type="button" onclick="addtoCart('{{$product->slug}}')">
                            <i data-feather="shopping-cart" class="me-1" width="16"></i>Add to Cart
                        </button>
                    </div>
                    @endif
                </div>
                <hr class="d-sm-none">
            </div>
            @endforeach
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
            @foreach ($videos as $video)
            <div class="col-lg-4">
                <iframe width="396" height="260" src="{{$video->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            @endforeach
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
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card card-blog shadow-box shadow-hover border-0"><a href="{{ route('blog.detail', $blog->slug) }}"><img class="card-img-top img-responsive" src="{{$blog->thumbnail}}" style="max-width: 300px; max-height: 200px; min-height: 150px;" alt=""></a>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="author d-flex align-items-center"><img class="author-picture rounded-circle icon-md shadow-box" src="{{$blog->foto??'/frontend/img/avatar/user.png'}}" alt="...">
                                <p class="small bold my-0">{{$blog->author}}</p>
                            </div>
                            {{-- <nav class="nav"><a href="javascript:;" class="d-flex align-items-center text-secondary me-3 blog-action blog-favorite"><i class="fas fa-heart text-danger me-2"></i> <span class="small">347</span> </a><a href="javascript:;" class="d-flex align-items-center text-secondary blog-action blog-bookmark"><i class="far fa-bookmark me-2"></i> <span class="small">73</span></a></nav> --}}
                        </div>
                        <hr>
                        <p class="card-title regular"><a href="{{ route('blog.detail', $blog->slug) }}" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-align: left;">{{$blog->title}}</a></p>
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
<div class="position-relative">
    <div class="shape-divider shape-divider-bottom shape-divider-fluid-x text-dark"><svg viewBox="0 0 2880 48" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z"></path>
        </svg></div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function selfItem(){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You Can\'t Add Your Own Item!',
        });
    }

    function loginFirst(){
        Swal.fire({
            icon: 'error',
            title: 'Login First',
            text: 'You Can\'t Add to Cart Without Login!',
        });
    }

    function addtoCart(slug){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        $.ajax({
            url : "/add-product-cart",
            method : "POST",
            data: {slug : slug},
            async : true,
            dataType : 'json',
            success: function(data,xhr){
                Swal.fire({
                    icon: 'success',
                    title: 'Add to Cart',
                    text: 'Success Add to Your Cart ',
                });
            },
            error: function(data){
            }
        });
    }
</script>
@endsection