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
                    <i class="far fa-cart me-2"></i>
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
    <section class="section form-basic">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- Basic form inputs -->
                    <div class="card card-clean mb-4 shadow-box">
                        <div class="card-header bg-contrast">
                            <h5 class="bold">Tambah Data Product</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('frn.customer.shop-save') }}" enctype="multipart/form-data" method="POST" class="cozy"> @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmailBase" class="form-label mb-0">Image</label>
                                    <input type="file" class="form-control" name="image" id="exampleInputEmailBase">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmailBase" class="form-label mb-0">Titile</label>
                                    <input type="text" class="form-control" id="exampleInputEmailBase" name="name"  placeholder="Enter Product Title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmailBase" class="form-label mb-0">Price</label>
                                    <input type="number" class="form-control" id="exampleInputEmailBase" name="harga"  placeholder="Enter Price">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmailBase" class="form-label mb-0">Description</label>
                                    <textarea class="form-control" name="desc" id="exampleFormControlTextareaBase" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmailBase" class="form-label mb-0">Quantity</label>
                                    <input type="number" class="form-control" id="exampleInputEmailBase" name="qty"  placeholder="Enter Quantity">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Save Product</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- Rounded inputs -->
                </div>
                <div class="col-md-2"></div>
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