@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Transaction</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                    <li class="breadcrumb-item active">List Transaction</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    @if(Session::has('success'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        </div>
    </div>
    @endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Latest Transaction</h4>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Invoice ID</th>
                                <th scope="col" style="width: 100px;">Name</th>
                                <th scope="col">Shop</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>
                                    {{$transaction->invoice_id}}
                                </td>
                                <td style="max-width: 270px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{$transaction->buyer}}
                                </td>
                                <td>{{$transaction->seller}}</td>
                                <td>Rp. {{number_format($transaction->total_harga+$transaction->ongkir+$transaction->random_id)}}</td>
                                <td> {{$transaction->status}}</td>
                                <td>
                                    <a href="{{ route('bcn.transaction.detail',$transaction->invoice_id) }}" class="btn btn-outline-success btn-sm">Detail</a>
                                    <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-rounded mb-0 justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <i class="mdi mdi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <i class="mdi mdi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection