@extends('layouts.frontend')
@section('content')
<main class="overflow-hidden">
    <section class="checkout-header page header bg-dark section">
        <div class="container bring-to-front pt-5 pb-0">
            <div class="page-title">
                <h1 class="regular text-contrast">Dashboard Profile</h1>
                <button class="btn btn-rounded btn-danger" href="{{ route('frn.customer.logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </button>

                <form id="logout-form" action="{{ route('frn.customer.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                {{-- <button type="button" class="btn btn-rounded btn-danger">Logout</button> --}}
            </div>
            <nav class="nav navbar mt-4">
                <a href="checkout-customer.html" class="nav-item nav-link active">
                    <i class="far fa-user me-2"></i>
                    <span class="d-none d-md-inline">Customer</span>
                </a>
                @if (Auth::guard('customer')->user()->seller!=null)

                <a href="checkout-shipping.html" class="nav-item nav-link">
                    <i class="far fa-address-card me-2"></i>
                    <span class="d-none d-md-inline">Shipping</span>
                </a>
                <a href="checkout-payment.html" class="nav-item nav-link">
                    <i class="far fa-credit-card me-2"></i>
                    <span class="d-none d-md-inline">Payment</span> 
                </a>
                <a href="checkout-confirmation.html" class="nav-item nav-link">
                    <i class="far fa-check-square me-2"></i> 
                    <span class="d-none d-md-inline">Confirmation</span>
                </a>
                @endif
            </nav>
        </div><!-- BreadCrumb -->
        <div class="bg-light shadow-sm">
    </section><!-- Customer info -->
    <section class="section">
        <div class="container pt-0 mt-n8">
            <div class="row">
                <div class="col-lg-12 pt-9">
                    @if (Auth::guard('customer')->user()->email_verified_at==null)
                    <div class="col-lg-12 mb-30">
                        <div class="card">
                            <div class="card-header">{{ __('Verify Your Email Address') }}</div>
            
                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif
            
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="font-size: 20px;">{{ __('click here to request another') }}</button>.
                                </form>
                            </div>
                        </div>
                    </div> 
                    @else
                    <div class="row gap-y">
                        <div class="col-md-5 me-md-auto">
                            <h4 class="border-bottom mb-4 pb-3 bold">Profile Customer</h4>
                            <form method="POST" action="{{ route('frn.customer.update') }}">@csrf
                                <div class="form-group">
                                    <label for="email" class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Your Name" value="{{Auth::guard('customer')->user()->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" placeholder="Your Email Address" value="{{Auth::guard('customer')->user()->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">No HP</label>
                                    <input type="text" class="form-control" placeholder="Your Number Phone" value="{{Auth::guard('customer')->user()->no_hp}}">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" rows="2" class="form-control">{{Auth::guard('customer')->user()->alamat}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            @if (Auth::guard('customer')->user()->provinsi==$province->name)
                                                <option value="{{$province->id}}" selected>{{$province->name}}</option>
                                            @else
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kota" class="form-label">Kota</label>
                                    <select name="kota" id="kota" class="form-control">
                                        <option value="">Pilih Kota</option>
                                        @foreach ($regencies as $city)
                                            @if (isset(Auth::guard('customer')->user()->kota)&&Auth::guard('customer')->user()->kota==$city->name)
                                            <option value="{{$province->id}}" selected>{{$city->name}}</option>
                                            @else
                                            <option value="{{$province->id}}">{{$city->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-grid mt-5"><button class="btn btn-primary" type="submit">Update</button></div>
                            </form>
                        </div>
                        <div class="col-md-5">
                            @if (Auth::guard('customer')->user()->email_verified_at==null)
                                <h4 class="border-bottom pb-3 bold">Daftar Toko</h4>
                                <p class="small text-muted">Anda bisa mendaftarkan sebagai akun toko dengan menekan tombol dibawah ini.</p>
                                <a href="checkout-shipping.html" class="btn btn-primary">Daftar Akun Merchant</a>
                            @else
                                <div class="rounded bg-info shadow p-4 ps-6">
                                    <div>
                                        <h3 class="bold text-contrast mt-0">Seller Account</h3>
                                        <p class="text-light mt-0">Congrats You are registered as Seller Account</p>
                                    </div>
                                </div>   
                            @endif
                        </div>
                    </div>
                    @endif
                </div><!-- Sidebar-->
            </div>
        </div>
    </section>
    <div class="position-relative">
        <div class="shape-divider shape-divider-bottom shape-divider-fluid-x text-dark"><svg viewBox="0 0 2880 48" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z"></path>
            </svg></div>
    </div>
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
                    <h6 class="bold text-contrast mt-5 pb-1">Download the app</h6>
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
                    <div class="col-md-4 text-center"><a class="d-inline-block align-middle me-3" href="#"><img class="img-responsive logo" src="..//logo-light.png" alt=""></a></div>
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
</main><!-- themeforest:js -->
@endsection
@section('script')
<script>
$(document).ready(function(){
    $('#provinsi').change(function(){
        var id=$(this).val();
        $.ajax({
            url : "/kota/"+id,
            method : "GET",
            async : true,
            dataType : 'json',
            success: function(data){
                console.log(data)
                $("#kota").empty()
                for (let index = 0; index < data.length; index++) {
                    $("#kota").append("<option value='"+data[index].id+"'>"+data[index].name+"</option>")
                }
            }
        });
    });
});
</script>
@endsection