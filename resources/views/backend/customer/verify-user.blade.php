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
                <h4 class="card-title mb-4">Latest Transaction</h4>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">Name</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Email</th>
                                <th scope="col">KTP</th>
                                <th scope="col">Selfie KTP</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    <img src="/assets/images/users/avatar-2.jpg" alt="user" class="avatar-xs rounded-circle" />
                                </td>
                                <td>
                                    <h5 class="font-size-15 mb-0">{{$customer->name}}</h5>
                                </td>
                                <td>
                                    <h5 class="font-size-15 mb-0">{{$customer->nik}}</h5>
                                </td>
                                <td>{{$customer->email}}</td>
                                <td><i class="{{$customer->ktp!=null?'mdi mdi-check-bold':'mdi mdi-close-thick'}}"></i></td>
                                <td><i class="{{$customer->ktp_selfie!=null?'mdi mdi-check-bold':'mdi mdi-close-thick'}}"></i></td>
                                <td>
                                    <a href="{{ route('bcn.customer.verify-detail',$customer->id) }}" class="btn btn-outline-success btn-sm">Check</a>
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