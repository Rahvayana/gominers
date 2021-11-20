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
                <form action="{{ route('bcn.customer.verify-process', $customer->id) }}" method="POST">@csrf
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text"  value="{{$customer->name}}" disabled readonly id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">NIK</label>
                        <div class="col-md-10">
                            <input class="form-control" type="search" value="{{$customer->nik}}" disabled readonly id="example-search-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="card-body">
                                <div class="">
                                    <img src="/{{$customer->ktp}}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <div class="">
                                    <img src="/{{$customer->ktp_selfie}}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-10">
                            <select class="form-select" id="status-customer" name="status-customer">
                                <option value="">Pilih Status</option>
                                <option value="1">Verifikasi Seller</option>
                                <option value="3">Verifikasi Ditolak</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row" id="text_detail">
                        <label class="col-md-2 col-form-label">Detail Penolakan</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="text_detail" rows="3"></textarea>
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
    <!-- end col -->
</div>
@endsection
@section('script')
<script>
$( document ).ready(function(){
    $("#text_detail").hide()
    $("#status-customer").change(function(){
        var id=$("#status-customer").val()
        if(id==3){
            $("#text_detail").show()
        }else{
            $("#text_detail").hide()
        }
    });
});
</script>
@endsection