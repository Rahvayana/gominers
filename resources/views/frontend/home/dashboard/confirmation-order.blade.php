@extends('layouts.frontend')
@section('content')
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
                <span class="d-none d-md-inline">Profile</span>
            </a>
            <a href="{{ route('frn.customer.checkout') }}" class="nav-item nav-link">
                <i class="fas fa-shopping-cart me-2" style="color: white;"></i>
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
            <a href="{{ route('frn.customer.transactions') }}" class="nav-item nav-link">
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
            @if(Session::has('success'))
            <div class="col-lg-7 me-auto pt-9">
                <div class="alert alert-success" style="margin-top: -70px;">{{Session::get('success')}}</div>
            </div>
            @endif
            <div class="col-lg-7 me-auto pt-9">
                <h4 class="bold mb-5">Confirm your Order</h4>
                @foreach ($products as $key=>$product)
                <div class="border-bottom py-4">
                    <div class="d-block text-center d-sm-flex text-sm-start">
                        <a class="me-sm-4" href="javascript:;">
                            <img src="/frontend/img/shop/products/computerconnection.png" class="img-responsive mx-auto" style="max-width: 120px" alt=""></a>
                        <div class="flex-fill">
                            <a class="product-category text-muted font-xs" href="javascript:;">Wireless &amp; Bluetooth</a>
                            <h6 class="product-title bold"><a href="javascript:;" class="text-darker">{{$product->title}}</a></h6>
                            <div class="d-flex align-items-center"><span class="bold me-3">{{json_decode($invoice->qty)[$key]}} X</span>
                                <div class="text-dark light"><span>Rp. {{number_format($product->harga)}}</span></div>
                                <div class="text-primary bold lead ms-auto">
                                    <div class="text-primary light lead"><span>Rp. {{number_format(json_decode($invoice->qty)[$key]*$product->harga)}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <aside class="col-lg-4 pt-4 pt-lg-0">
                <div class="card shadow border-0 rounded-lg mb-4">
                    <div class="card-body">
                        <h6 class="mb-4 text-uppercase">Order summary</h6>
                        <ul class="list-unstyled font-sm pb-2 border-bottom">
                            <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span> <span class="text-end">Rp. {{number_format($invoice->total_harga)}}</span></li>
                            <li class="d-flex justify-content-between align-items-center"><span class="me-2">Ongkir:</span> <span class="text-end">Rp. {{number_format($invoice->ongkir)}}</span></li>
                            <li class="d-flex justify-content-between align-items-center"><span class="me-2">Kode:</span> <span class="text-end">{{$invoice->random_id}}</span></li>
                            <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span> <span class="text-end">{{$invoice->promo??'-'}}</span></li>
                        </ul>
                        <h4 class="d-flex align-items-center mt-2 mb-4 text-success bold"><span class="me-auto h6 mb-0 bold">Total Amount</span> <span>Rp. {{number_format($invoice->total_harga+$invoice->onkir+$invoice->random_id)}}</span></h4>
                    </div>
                    {{-- <div class="card-body">
                        <h6 class="mb-4 text-uppercase">Shipping Method</h6>
                        <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                            <p class="mb-0">Free Shipping</p>
                            <div class="ms-sm-auto"><span class="font-sm text-primary">$0.00</span></div>
                        </div>
                        <p class="small text-muted my-0">1 month - Tuesday, Dec 3rd 2019</p>
                    </div> --}}
                    <div class="card-body">
                        <h6 class="mb-4 text-uppercase">Alamat Pengiriman</h6>
                        <address>{{$invoice->alamat}}</address>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-4 text-uppercase">Cara Pembayaran</h6>
                        <p class="me-2">Transfer Sejumlah <span class="text-muted ms-2"><b>Rp. {{number_format($invoice->total_harga+$invoice->onkir+$invoice->random_id)}}</b> </span> ke Rekening BCA A.N <b>PT Gominers Indonesia</b> No Rek <b>3399887123</b></p>
                    </div>
                </div>
                <form action="{{ route('frn.customer.confirm-order-process',$invoice->invoice_id) }}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="file" class="form-control mb-3" name="bukti_transfer" id="bukti_transfer" required>
                    <div class="d-grid"><button class="btn btn-primary">Place Order</button></div>
                </form>
                <p class="text-muted small">Kesalahan Transfer Bukan Merupakan Kesalahan PT Gominers Indonesia</p>
            </aside>
        </div>
    </div>
</section>
@endsection