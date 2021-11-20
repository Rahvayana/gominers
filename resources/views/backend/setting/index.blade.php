@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Settings</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                    <li class="breadcrumb-item active">API Key</li>
                </ol>
            </div>

        </div>
    </div>
</div>
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Raja Ongkir Settings</h4>
                <form action="{{ route('bcn.setting.save-rajaongkir') }}" method="POST">@csrf
                    <div class="mb-3 row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="api_key_ongkir">API Key</label>
                                <input class="form-control" type="text" id="api_key_ongkir" value="{{$raja_ongkir->api_key??''}}" name="api_key_ongkir" placeholder="RajaOngkir API Key">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="base_url_ongkir">Base URL Raja Ongkir</label>
                                <select class="form-select" id="base_url_ongkir" name="base_url_ongkir">
                                    <option selected>Pilih Tipe</option>
                                    @if ($raja_ongkir)
                                    <option {{$raja_ongkir->base_url=='https://api.rajaongkir.com/starter'?'selected':''}} value="https://api.rajaongkir.com/starter">Starter</option>
                                    <option {{$raja_ongkir->base_url=='https://api.rajaongkir.com/basic'?'selected':''}} value="https://api.rajaongkir.com/basic">Basic</option>
                                    <option {{$raja_ongkir->base_url=='https://pro.rajaongkir.com/api'?'selected':''}} value="https://pro.rajaongkir.com/api">Pro</option>
                                    @else
                                    <option value="https://api.rajaongkir.com/starter">Starter</option>
                                    <option value="https://api.rajaongkir.com/basic">Basic</option>
                                    <option value="https://pro.rajaongkir.com/api">Pro</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="card-title mb-4">Shipments</h4>
                            <div class="row">
                                @foreach ($shipments as $key=>$shipment)
                                <div class="col-lg-3">
                                    <div class="form-check mb-2">
                                        @if ($raja_ongkir)
                                        @php
                                            $shippings=json_decode($raja_ongkir->shipments);
                                        @endphp
                                        @else
                                        @php
                                            $shippings=[];
                                        @endphp
                                        @endif
                                        @if (in_array($shipment,$shippings))
                                        <input class="form-check-input" checked type="checkbox" value="{{$shipment}}" name="shipments[]" id="defaultCheck{{$key}}">
                                        <label class="form-check-label" for="defaultCheck{{$key}}">
                                            {{strtoupper($shipment)}}
                                        </label>
                                        @else
                                        <input class="form-check-input" type="checkbox" value="{{$shipment}}" name="shipments[]" id="defaultCheck{{$key}}">
                                        <label class="form-check-label" for="defaultCheck{{$key}}">
                                            {{strtoupper($shipment)}}
                                        </label>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Mail Settings</h4>
                <form action="" method="POST">@csrf
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">Mail Driver
                                    <sup>*</sup>
                                </label>
                                <input type="text" id="mail_driver" class="form-control" placeholder="Mail Driver" name="mail_driver">
                            </div>
                        </div><!-- ends: .col-md-6 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Mail Port
                                    <sup>*</sup>
                                </label>
                                <input type="text" id="mail_port" class="form-control" placeholder="Mail Port" name="mail_port">
                            </div>
                        </div><!-- ends: .col-md-6 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email1">Mail Username
                                    <sup>*</sup>
                                </label>
                                <input type="text" id="mail_username" class="form-control" placeholder="Mail Username" name="mail_username">
                            </div>
                        </div><!-- ends: .col-md-6 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address1">Mail Password<sup>*</sup></label>
                                <input type="password" id="mail_password" class="form-control" placeholder="Mail Password" name="mail_password">
                            </div>
                        </div><!-- ends: .col-md-6 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address2">Mail Host<sup>*</sup></label>
                                <input type="text" id="mail_host" class="form-control" name="mail_host" placeholder="Mail Host">
                            </div>
                        </div><!-- ends: .col-md-6 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address2">Mail Encryption<sup>*</sup></label>
                                <input type="text" id="mail_encryption" class="form-control" placeholder="Mail Encryption" name="mail_encryption">
                            </div>
                        </div><!-- ends: .col-md-6 -->
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
                <h4 class="card-title mb-4">Midtrans Settings</h4>
                <form action="{{ route('bcn.setting.save-midtrans') }}" method="POST">@csrf
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">Virtual Akun Midtrans
                                    <sup>*</sup>
                                </label>
                                <input type="text" id="virtual_akun" class="form-control" value="{{$midtrans->virtual_akun??''}}" placeholder="Virtual Akun Midtrans" name="virtual_akun">
                            </div>
                        </div><!-- ends: .col-md-6 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">API Key Midtrans
                                    <sup>*</sup>
                                </label>
                                <input type="text" id="api_key_midtrans" class="form-control" value= "{{$midtrans->api_key}}" placeholder="API Key Midtrans" name="api_key_midtrans">
                            </div>
                        </div><!-- ends: .col-md-6 -->
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

@endsection
@section('script')
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
@endsection