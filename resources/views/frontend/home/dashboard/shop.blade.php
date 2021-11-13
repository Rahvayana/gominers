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
                <a href="{{ route('frn.customer.detail') }}" class="nav-item nav-link">
                    <i class="far fa-user me-2"></i>
                    <span class="d-none d-md-inline">Customer</span>
                </a>
                <a href="{{ route('frn.customer.checkout') }}" class="nav-item nav-link">
                    <i class="fas fa-shopping-cart me-2"></i>
                    <span class="d-none d-md-inline">Checkout</span>
                </a>
                <a href="{{ route('frn.customer.shop') }}" class="nav-item nav-link active">
                    <i class="far fa-address-card me-2"></i>
                    <span class="d-none d-md-inline">Shop</span>
                </a>
                <a href="checkout-payment.html" class="nav-item nav-link">
                    <i class="far fa-credit-card me-2"></i>
                    <span class="d-none d-md-inline">Payment</span> 
                </a>
                <a href="checkout-confirmation.html" class="nav-item nav-link">
                    <i class="far fa-check-square me-2"></i> 
                    <span class="d-none d-md-inline">Confirmation</span>
                </a>
            </nav>
        </div><!-- BreadCrumb -->
        <div class="bg-light shadow-sm">
    </section><!-- Customer info -->
    <section class="section">
        <div class="container pt-0 mt-n8">
            <div class="row">
                <div class="col-lg-12 pt-8">
                    <a href="{{ route('frn.customer.shop-add') }}" class="btn btn-primary mt-5">Tambah Barang</a>
                    @foreach ($products as $product)
                    <div class="row border-bottom py-4">
                        <div class="col-lg-8">
                            <div class="media d-block text-center d-sm-flex text-sm-start">
                                <a class="me-sm-4" href="javascript:;">
                                    <img src="/{{$product->image??'/backend/img/pur1.jpg'}}" class="img-responsive mx-auto" style="max-width: 120px" alt="">
                                </a>
                                <div class="media-body"><a class="product-category text-muted font-xs" href="javascript:;">Wireless &amp; Bluetooth</a>
                                    <h6 class="product-title bold"><a href="javascript:;" class="text-darker">{{$product->title}}</a></h6>
                                    {{-- <p class="my-0 text-muted small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> --}}
                                    <div class="text-primary light lead mt-3"><span>Rp. {{number_format($product->harga)}}</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                    @endforeach
                    <div class="d-grid"><button class="btn btn-outline-primary mt-4" type="button"><i class="fas fa-redo me-2"></i>Update cart</button></div>
                </div><!-- Sidebar-->
            </div>
        </div>
    </section>
    
    <div class="position-relative">
        <div class="shape-divider shape-divider-bottom shape-divider-fluid-x text-dark"><svg viewBox="0 0 2880 48" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z"></path>
            </svg></div>
    </div> 
</main><!-- themeforest:js -->
@endsection
@section('script')
<script>
$(document).ready(function(){
   
});
</script>
@endsection