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
                                <th scope="col">Email</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Status</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Kota</th>
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
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->no_hp}}</td>
                                <td>{{$customer->seller==1?'Seller':'Customer'}}</td>
                                <td> {{ $customer->provinsi}}</td>
                                <td>{{explode(' ',$customer->kota)[1] ??''}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
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