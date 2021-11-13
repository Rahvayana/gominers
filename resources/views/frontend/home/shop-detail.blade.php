@extends('layouts.frontend')
@section('content')
<header class="page header text-contrast bg-secondary">
    <div class="container">
        {{-- <h1 class="bold display-md-4 text-contrast">KAKAKAKAK</h1> --}}
    </div>
</header>
<section class="section">
    <div class="container">
        <div class="row gap-y">
            <div class="col-lg-4">
                <img src="/{{$product->image??'/backend/img/pur1.jpg'}}" class="img-responsive mx-auto shadow" alt="">
            </div>
            <div class="col-lg-5">
                <h3 class="bold" style="text-align: justify;">{{$product->title}}</h3>
                <div style="display: flex;">
                    <p>Sold: 8</p>
                    <p style="margin-left: 5px;">&#8226;</p>
                    <p style="margin-left: 5px;"> <i class="fas fa-star" style="color: gold"></i>: 4</p>
                </div>
                <h4 class="bold" style="text-align: justify;">Rp. {{number_format($product->harga)}}</h4>
                <hr>
                <p class="text-black" style="text-align: justify;">{{$product->desc}}</p>
            </div>
            <div class="col-lg-3">
                <div class="card shadow border-0 rounded-lg">
                    <div class="card-body">
                        <div class="d-grid"><a class="btn btn-primary mt-4" href="checkout-customer.html"><i class="fas fa-shopping-cart me-2"></i>Add to Cart</a></div>
                        <div class="d-grid"><a class="btn btn-success mt-4" style="color: white;" href="checkout-customer.html"><i class="fas fa-rocket me-2"></i>Chat with Seller</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="post-comments b-t p-4">
                    <form action="" method="post" class="cozy">
                        <h3 class="mb-4">Ask a Question</h3>
                        <div class="mb-3">
                            <textarea class="form-control" placeholder="Your comment" rows="4"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Ask Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection