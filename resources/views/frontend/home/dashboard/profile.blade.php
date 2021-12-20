@extends('layouts.frontend')
@section('style')
@endsection
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
                <a href="#" class="nav-item nav-link active">
                    <i class="far fa-user me-2"></i>
                    <span class="d-none d-md-inline">Profile</span>
                </a>
                <a href="{{ route('frn.customer.checkout') }}" class="nav-item nav-link">
                    <i class="fas fa-shopping-cart me-2"></i>
                    <span class="d-none d-md-inline">Checkout</span>
                </a>
                @if (Auth::guard('customer')->user()->seller!=null)
                <a href="{{ route('frn.customer.shop') }}" class="nav-item nav-link">
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
                @endif
            </nav>
        </div><!-- BreadCrumb -->
        <div class="bg-light shadow-sm">
    </section><!-- Customer info -->
    <section class="section">
        <div class="container pt-0 mt-n8">
            <div class="row">
                @if(Session::has('success'))
                <div class="col-lg-12">
                    <div class="alert alert-success" style="margin-top: -70px;">{{Session::get('success')}}</div>
                </div>
                @endif
                <div class="col-lg-12 pt-9">
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
                    @if (Auth::guard('customer')->user()->email_verified_at==null)
                    <div class="col-lg-12 mb-30">
                        <div class="card">
                            <div class="card-header">{{ __('Verify Your Email Address') }}</div>
            
                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif
            
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="font-size: 20px;">{{ __('click here to request another') }}</button>.
                                </form>
                            </div>
                        </div>
                    </div> 
                    @else
                    <div class="row gap-y">
                        <div class="col-md-5 me-md-auto">
                            <h4 class="border-bottom mb-4 pb-3 bold">Profile Customer</h4>
                            <form method="POST" action="{{ route('frn.customer.update') }}">@csrf
                                <div class="form-group">
                                    <label for="email" class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Your Name" value="{{Auth::guard('customer')->user()->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" placeholder="Your Email Address" value="{{Auth::guard('customer')->user()->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">No HP</label>
                                    <input type="text" class="form-control" placeholder="Your Number Phone" value="{{Auth::guard('customer')->user()->no_hp}}">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" rows="2" class="form-control">{{Auth::guard('customer')->user()->alamat}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            @if (Auth::guard('customer')->user()->provinsi==$province->name)
                                                <option value="{{$province->id}}" selected>{{$province->name}}</option>
                                            @else
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kota" class="form-label">Kota</label>
                                    <select name="kota" id="kota" class="form-control">
                                        <option value="">Pilih Kota</option>
                                        @foreach ($regencies as $city)
                                            @if (isset(Auth::guard('customer')->user()->kota)&&Auth::guard('customer')->user()->kota==$city->name)
                                            <option value="{{$province->id}}" selected>{{$city->name}}</option>
                                            @else
                                            <option value="{{$province->id}}">{{$city->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-grid mt-5"><button class="btn btn-primary" type="submit">Update</button></div>
                            </form>
                        </div>
                        <div class="col-md-5">
                            @if (Auth::guard('customer')->user()->seller==null)
                                <h4 class="border-bottom pb-3 bold">Daftar Toko</h4>
                                <p class="small text-muted">Anda bisa mendaftarkan sebagai akun toko dengan menekan tombol dibawah ini.</p>
                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Daftar Akun Merchant</a>
                            @elseif (Auth::guard('customer')->user()->seller==2)
                                <h4 class="border-bottom pb-3 bold">Verifikasi Admin</h4>
                                <p class="small text-muted">Verifikasi dalam tahap pengecekan oleh Admin, mohon tunggu 1X24 Jam.</p>
                            @else
                                <div class="rounded bg-info shadow p-4 ps-6">
                                    <div>
                                        <h3 class="bold text-contrast mt-0">Seller Account</h3>
                                        <p class="text-light mt-0">Congrats You are registered as Seller Account</p>
                                    </div>
                                </div>   
                                <form method="POST" action="{{ route('frn.customer.update-shop') }}">@csrf
                                    <div class="form-group">
                                        <label for="email" class="form-label">Shop Name</label>
                                        <input type="text" class="form-control" placeholder="Shop Name" name="shop_name" value="{{$shop->name??''}}">
                                    </div>
                                    <div class="form-group">
                                        <legend class="bold small text-uppercase text-dark">Shipment Choice</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @if (isset($shop->shippings))
                                                    <div class="form-check-list">
                                                        @php
                                                            $shippings=json_decode($shop->shippings);
                                                        @endphp
                                                        @foreach (json_decode($shipments->shipments) as $key=>$shipment)
                                                        @if (in_array($shipment,$shippings))
                                                        <div class="checkbox checkbox-dark">
                                                            <input type="checkbox" checked name="shipments[]" value="{{$shipment}}" id="exampleCheckColorStyledDark{{$key}}">
                                                            <label for="exampleCheckColorStyledDark{{$key}}">{{strtoupper($shipment)}}</label>
                                                        </div>  
                                                        @else
                                                        <div class="checkbox checkbox-dark">
                                                            <input type="checkbox" name="shipments[]" value="{{$shipment}}" id="exampleCheckColorStyledDark{{$key}}">
                                                            <label for="exampleCheckColorStyledDark{{$key}}">{{strtoupper($shipment)}}</label>
                                                        </div>  
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                    @else
                                                    @foreach (json_decode($shipments->shipments) as $key=>$shipment)
                                                    <div class="checkbox checkbox-dark">
                                                        <input type="checkbox" name="shipments[]" value="{{$shipment}}" id="exampleCheckColorStyledDark{{$key}}">
                                                        <label for="exampleCheckColorStyledDark{{$key}}">{{strtoupper($shipment)}}</label>
                                                    </div>  
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="curr_province" id="curr_province" value="{{$shop->province??''}}">
                                        <input type="hidden" name="curr_origin" id="curr_origin" value="{{$shop->origin??''}}">
                                        <label class="control-label text-darker" for="province">Provinsi</label>
                                        <select class="form-control" id="province" name="province">
                                            <option value=''>Pilih Provinsi</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label text-darker" for="origin">Kota</label>
                                        <select class="form-control"  id="origin" name="origin">
                                            <option value=''>Pilih Kota</option>
                                        </select>
                                    </div>
                                    <div class="d-grid mt-5"><button class="btn btn-primary" type="submit">Update Shop</button></div>
                                </form>
                            @endif
                        </div>
                    </div>
                    @endif
                </div><!-- Sidebar-->
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Data Diri</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="otpStatus"></div>
                <form method="POST" action="{{ route('frn.customer.upgrade') }}" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="email" class="form-label">NIK</label>
                        <input type="number" class="form-control" id="nik_number" name="nik" placeholder="352XXXXXXXXX" value="">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">KTP</label>
                        <input type="file" class="form-control" id="ktp" name="ktp" value="">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Selfie + KTP</label>
                        <input type="file" class="form-control" name="selfie_ktp" id="selfie_ktp" value="">
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Daftar Merchant</button>
                    </div>
                </form>
          </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Nomor HP</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div class="modal-body">
                <div id="otpStatus"></div>
                <form method="POST" action="{{ route('frn.customer.update') }}">
                    <div class="form-group">
                        <label for="email" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="number_phone" placeholder="Your Number 08XXXXXXXXX" value="">
                    </div>
                    <div class="d-grid mt-2"><button type="button" class="btn btn-primary" id="getOtp">Dapatkan OTP</button></div>
                    <div class="form-group">
                        <label for="email" class="form-label">OTP</label>
                        <input type="number" class="form-control" id="otpnumber" placeholder="Six Digits Number OTP" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="button" class="btn btn-primary" id="confirmOTP">Daftar Merchant</button>
            </div>
          </div>
        </div>
    </div> --}}
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
    var curr_province=$("#curr_province").val()
    $.ajax({
        url : "/provinsi",
        method : "GET",
        async : true,
        dataType : 'json',
        success: function(data){
            var province=data.rajaongkir.results
            // console.log(province)
            $("#province").empty()
            $("#province").append("<option value=''>Pilih Provinsi</option>")
            for (let index = 0; index < province.length; index++) {
                if(province[index].province_id==curr_province){
                    $("#province").append("<option selected value='"+province[index].province_id+"'>"+province[index].province+"</option>")
                    cekOrigin(curr_province)
                }else{
                    $("#province").append("<option value='"+province[index].province_id+"'>"+province[index].province+"</option>")
                }
            }
        }
    });
    $('#province').change(function(){
        var id=$(this).val();
        cekOrigin(id)
    });

    function cekOrigin(id){
        var curr_origin=$("#curr_origin").val()
        $.ajax({
            url : "/provinsi/"+id,
            method : "GET",
            async : true,
            dataType : 'json',
            success: function(data){
                var city=data.rajaongkir.results
                // console.log(data)
                $("#origin").empty()
                $("#origin").append("<option value=''>Pilih Kota</option>")
                for (let index = 0; index < city.length; index++) {
                    if(city[index].city_id==curr_origin){
                        $("#origin").append("<option selected value='"+city[index].city_id+"'>"+city[index].type+" "+city[index].city_name+"</option>")
                    }else{
                        $("#origin").append("<option value='"+city[index].city_id+"'>"+city[index].type+" "+city[index].city_name+"</option>")
                    }
                }
            }
        });
    }
    $('#provinsi').change(function(){
        var id=$(this).val();
        $.ajax({
            url : "/kota/"+id,
            method : "GET",
            async : true,
            dataType : 'json',
            success: function(data){
                // console.log(data)
                $("#kota").empty()
                for (let index = 0; index < data.length; index++) {
                    $("#kota").append("<option value='"+data[index].id+"'>"+data[index].name+"</option>")
                }
            }
        });
    });
    $('#getOtp').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var number_phone=$('#number_phone').val()
        if(number_phone==''||number_phone==null){
            $('#otpStatus').append('<p style="color: red">Number Phone Field is Required</p>')
        }else{
            const btn = document.querySelector('#getOtp')
            $("#getOtp").attr("disabled", true);
            setTimeout(() => {
                $("#getOtp").attr("disabled", false);
            }, 60000)
            $.ajax({
                url : "/otp-verification/",
                method : "POST",
                data: {number_phone : number_phone},
                async : true,
                dataType : 'json',
                success: function(data){
                    $('#otpStatus').append('<p style="color: green;">'+data+'</p>')
                    setTimeout(() => {
                        $('#otpStatus').empty()
                    }, 3000)
                },
                error: function(data){
                    setTimeout(() => {
                        $('#otpStatus').empty()
                    }, 3000)
                }
            });
        }
        // alert(number_phone)
    });
    $('#confirmOTP').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var otpnumber=$('#otpnumber').val()
        if(otpnumber==''||otpnumber==null){
            $('#otpStatus').append('<p style="color: red">OTP Field is Required</p>')
        }else{
            const btn = document.querySelector('#getOtp')
            $("#getOtp").attr("disabled", true);
            setTimeout(() => {
                $("#getOtp").attr("disabled", false);
            }, 60000)
            $.ajax({
                url : "/otp-verify/",
                method : "POST",
                data: {otpnumber : otpnumber},
                async : true,
                dataType : 'json',
                success: function(data,xhr){
                    if(data=='Nomor OTP Salah'){
                        $('#otpStatus').append('<p style="color: red;">'+data+'</p>')
                        setTimeout(() => {
                            $('#otpStatus').empty()
                        }, 3000)
                    }else{
                        $('#otpStatus').append('<p style="color: green;">'+data+'</p>')
                        setTimeout(() => {
                            location.reload();
                        }, 3000)
                    }
                },
                error: function(data){
                }
            });
        }
    });
});
</script>
@endsection