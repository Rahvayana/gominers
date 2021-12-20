@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Customers</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                    <li class="breadcrumb-item active">List Customers</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Customer Detail Need to Verify</h4>
                <div class="row">
                    @if ($errors->any())
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="text-decoration: none;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
                <form action="{{ route('bcn.transaction.process', $invoice->invoice_id) }}" method="POST">@csrf
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Atas Nama</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text"  value="{{$transaction->nama}}" disabled readonly id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">No HP</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text"  value="{{$transaction->no_hp}}" disabled readonly id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Alamat</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text"  value="{{$transaction->alamat}}" disabled readonly id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Shops</label>
                        <div class="col-md-10">
                            <input class="form-control" type="search" value="{{$transaction->seller}}" disabled readonly id="example-search-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Total Harga</label>
                        <div class="col-md-10">
                            <input class="form-control" type="harga" value="Rp. {{number_format($transaction->total_harga+$transaction->ongkir+$transaction->random_id)}}" disabled readonly id="example-search-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <div class="">
                                    <img src="/{{$invoice->bukti_transfer}}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-10">
                            <select class="form-select" id="status-customer" required name="status_transaction">
                                @if ($transaction->status=='APPROVED')
                                <option value="">Pilih Status</option>
                                <option value="APPROVED" selected>Konfirmasi Pembelian</option>
                                <option value="REJECTED">Pembelian Ditolak</option>
                                @elseif($transaction->status=='REJECTED')
                                <option value="">Pilih Status</option>
                                <option value="APPROVED">Konfirmasi Pembelian</option>
                                <option value="REJECTED" selected>Pembelian Ditolak</option>
                                @else
                                <option value="">Pilih Status</option>
                                <option value="APPROVED">Konfirmasi Pembelian</option>
                                <option value="REJECTED">Pembelian Ditolak</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3 row" id="text_detail">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    
                </form>

            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Products</h4>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col" style="width: 100px;">Title</th>
                                <th scope="col">Shop</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key=> $product)
                            <tr>
                                <td>
                                    <img src="/{{$product->image}}" alt="user" class="avatar-xs rounded-circle" />
                                </td>
                                <td style="max-width: 270px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{$product->title}}
                                </td>
                                <td>{{$product->name}}</td>
                                <td>Rp. {{number_format($product->harga)}}</td>
                                <td> {{json_decode($transaction->qty)[$key]}}</td>
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
@endsection
@section('script')
<script>
// $( document ).ready(function(){
//     $("#text_detail").hide()
//     $("#status-customer").change(function(){
//         var id=$("#status-customer").val()
//         if(id==3){
//             $("#text_detail").show()
//         }else{
//             $("#text_detail").hide()
//         }
//     });
// });
</script>
@endsection