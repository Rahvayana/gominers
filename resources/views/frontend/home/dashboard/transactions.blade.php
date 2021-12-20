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
                <a href="{{ route('frn.customer.shop') }}" class="nav-item nav-link">
                    <i class="far fa-address-card me-2"></i>
                    <span class="d-none d-md-inline">Shop</span>
                </a>
                <a href="checkout-payment.html" class="nav-item nav-link">
                    <i class="far fa-credit-card me-2"></i>
                    <span class="d-none d-md-inline">Payment</span> 
                </a>
                <a href="{{ route('frn.customer.transactions') }}" class="nav-item nav-link active">
                    <i class="far fa-check-square me-2"></i> 
                    <span class="d-none d-md-inline">Transactions</span>
                </a>
            </nav>
        </div><!-- BreadCrumb -->
        <div class="bg-light shadow-sm">
    </section><!-- Customer info -->
    <section class="section block bg-contrast">
        <div class="container py-4">
            <div class="section-heading text-center">
                <h2 class="bold">Transactions</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <nav class="nav nav-tabs nav-outlined nav-rounded mb-4" id="tab-outlined">
                        <a class="nav-item nav-link active" id="home-outlined-tab" data-bs-toggle="tab" href="#home-outlined">Approved</a>
                        <a class="nav-item nav-link" id="profile-outlined-tab" data-bs-toggle="tab" href="#profile-outlined">Processed</a>
                        <a class="nav-item nav-link" id="contact-outlined-tab" data-bs-toggle="tab" href="#contact-outlined">Completed</a>
                    </nav>
                    <div class="tab-content" id="tab-default-content-outlined">
                        <div class="tab-pane fade show active" id="home-outlined">
                            <div class="col-md-12 col-lg-12 mx-auto">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Invoice Id</th>
                                            <th scope="col">Buyer</th>
                                            <th scope="col">No HP</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($approveds as $approved)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$approved->invoice_id}}</td>
                                            <td>{{$approved->buyer}}</td>
                                            <td>{{($approved->no_hp)}}</td>
                                            <td>Rp. {{number_format($approved->total_harga)}}</td>
                                            <td>{{$approved->status}}</td>
                                            <td>
                                                <a href="{{ route('frn.customer.transactions-detail',$approved->invoice_id) }}" class="badge rounded-pill badge-outline-primary">Detail</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td><h3>Transaksi Kosong</h3></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-outlined">
                            <div class="col-md-12 col-lg-12 mx-auto">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Invoice Id</th>
                                            <th scope="col">Buyer</th>
                                            <th scope="col">No HP</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($processeds as $processed)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$processed->invoice_id}}</td>
                                            <td>{{$processed->buyer}}</td>
                                            <td>{{($processed->no_hp)}}</td>
                                            <td>Rp. {{number_format($processed->total_harga)}}</td>
                                            <td>{{$processed->status}}</td>
                                            <td>
                                                <a href="{{ route('frn.customer.transactions-detail',$processed->invoice_id) }}" class="badge rounded-pill badge-outline-primary">Tambah Resi</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td><h3>Transaksi Kosong</h3></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-outlined">
                            <div class="col-md-12 col-lg-12 mx-auto">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Invoice Id</th>
                                            <th scope="col">Buyer</th>
                                            <th scope="col">No HP</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($completeds as $completed)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$completed->invoice_id}}</td>
                                            <td>{{$completed->buyer}}</td>
                                            <td>{{($completed->no_hp)}}</td>
                                            <td>Rp. {{number_format($completed->total_harga)}}</td>
                                            <td>{{$completed->status}}</td>
                                            <td>
                                                <a href="{{ route('frn.customer.transactions-detail',$completed->invoice_id) }}" class="badge rounded-pill badge-outline-primary">Detail</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td><h3>Transaksi Kosong</h3></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
</main><!-- themeforest:js -->
@endsection
@section('script')
<script>
$(document).ready(function(){
   
});
</script>
@endsection