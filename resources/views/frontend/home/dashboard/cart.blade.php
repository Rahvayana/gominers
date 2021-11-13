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
                <i class="fas fa-shopping-cart me-2"></i>
                <span class="d-none d-md-inline">Customer</span>
            </a>
            <a href="{{ route('frn.customer.checkout') }}" class="nav-item nav-link">
                <i class="far fa-shopping-cart me-2" style="color: white;"></i>
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
                <form action="{{ route('frn.customer.process-cart') }}" method="POST">@csrf
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
                        <div class="col-lg-2">
                            <input type="hidden" name="product_id[]" id="product_id" value="{{$product->id}}">
                            <input type="number" class="form-control" name="qty[]" id="qty" value="{{$product->qty}}">
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-danger" onclick="deleteCart({{$product->cart_id}})">X</button>
                        </div>
                    </div>
                    @endforeach
                    <div class="d-grid">
                        <button class="btn btn-primary mt-4" type="submit">Checkout</button>
                    </div>
                </form>
            </div><!-- Sidebar-->
            <meta name="csrf-token" content="{{ csrf_token() }}" />
        </div>
    </div>
</section>
</main>
@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteCart(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); 
            $.ajax({
                url : "/user/delete-cart",
                method : "POST",
                data: {id : id},
                async : true,
                dataType : 'json',
                success: function(data,xhr){
                    Swal.fire({
                        icon: 'success',
                        title: 'Remove From Cart',
                        text: 'Success From Your Cart ',
                    });
                    location.reload();
                },
                error: function(data){
                }
            });
        }
    </script>
@endsection