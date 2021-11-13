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
            <a href="checkout-confirmation.html" class="nav-item nav-link">
                <i class="far fa-check-square me-2"></i> 
                <span class="d-none d-md-inline">Confirmation</span>
            </a>
        </nav>
    </div><!-- BreadCrumb -->
    <div class="bg-light shadow-sm">
</section><!-- Customer info -->
<section class="section">
    <div class="container pt-0 mt-n8">
        <form class="form" action="{{ route('product.order') }}" method="POST" id="order-form">@csrf
            <div class="row">
                <div class="col-lg-8 pt-8">
                    @php
                        $total=0;
                    @endphp
                    @foreach ($carts as $key=> $cart)
                    @php
                        $total+=$cart['total'];
                    @endphp
                    <div class="row border-bottom py-4">
                        <div class="col-lg-8">
                            <div class="media d-block text-center d-sm-flex text-sm-start">
                                <a class="me-sm-4" href="javascript:;">
                                    <img src="/{{$cart['image']??'/backend/img/pur1.jpg'}}" class="img-responsive mx-auto" style="max-width: 120px" alt="">
                                </a>
                                <div class="media-body"><a class="product-category text-muted font-xs" href="javascript:;">Wireless &amp; Bluetooth</a>
                                    <h6 class="product-title bold"><a href="javascript:;" class="text-darker" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; text-align: left;">{{$cart['title']}}</a></h6>
                                    {{-- <p class="my-0 text-muted small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> --}}
                                    <div class="text-primary light lead mt-3"><span>Rp. {{number_format($cart['harga'])}}</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input type="hidden" name="product_id[]" id="product_id" value="{{$cart['id']}}">
                            <input readonly class="form-control" name="qty[]" id="qty" disabled value="{{$cart['qty']}}">
                        </div>
                    </div>
                    @endforeach
                </div><!-- Sidebar-->
                <div class="col-lg-4 pt-8">
                    <div class="card border-0 rounded-lg">
                        <div class="card-body">
                            <div class="accordion accordion-clean accordion-collapsed" id="cart-options">
                                <!-- Shipping Options -->
                                    <div class="card">
                                        <div class="card-header"><a href="#" class="card-title btn bold" data-bs-toggle="collapse" data-bs-target="#clp-shipping"><i class="fas fa-angle-down angle"></i>Shipping Options</a></div>
                                        <div id="clp-shipping" class="collapse show" data-bs-parent="#cart-options">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="control-label text-darker" for="desa">Kurir</label>
                                                    <select class="form-control" id="kurir" name="kurir">
                                                        <option value=''>Pilih Kurir</option>
                                                        <option value="jne">JNE</option>
                                                        <option value="pos">POS</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label text-darker" for="province">Provinsi</label>
                                                    <select class="form-control" id="provinsi" name="provinsi">
                                                        <option value=''>Pilih Provinsi</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label text-darker" for="kota">Kota</label>
                                                    <select class="form-control"  id="kota" name="kota">
                                                        <option value=''>Pilih Kota</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label text-darker" for="kecamatan">Kecamatan</label>
                                                    <select class="form-control" id="kecamatan" name="kecamatan">
                                                        <option value="3">Lamongan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="services">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#" class="card-title btn bold" data-bs-toggle="collapse" data-bs-target="#data-penerima"><i class="fas fa-angle-down angle"></i>Data Penerima</a>
                                        </div>
                                        <div id="data-penerima" class="collapse" data-bs-parent="#cart-options">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="control-label text-darker" for="atas_nama">Nama Penerima</label>
                                                    <input type="text" name="atas_nama" id="atas_nama" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label text-darker" for="nomor">NO(Yang Bisa Dihubungi)</label>
                                                    <input type="text" name="nomor" id="nomor" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header"><a href="#" class="card-title btn bold" data-bs-toggle="collapse" data-bs-target="#clp-promo"><i class="fas fa-angle-down angle"></i>Apply Promo Code</a></div>
                                        <div id="clp-promo" class="collapse" data-bs-parent="#cart-options">
                                            <div class="card-body">
                                                <div class="mb-3"><input class="form-control" type="text" placeholder="Promo Code"></div>
                                                <div class="d-grid"><button class="btn btn-outline-primary" type="submit">Apply Promo Code</button></div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- TOTAL -->
                            <h6 class="text-darker mt-2">Shipping to</h6>
                            <textarea name="address" id="address" cols="30" rows="3" class="form-control" placeholder="Describe Your Address Ex: Near School, Near Office etc"></textarea>
                            <div class="d-flex flex-wrap">
                                <p class="bold text-darker text-uppercase">Total</p>
                                <input type="hidden" value="{{$total}}" name="total_pembayaran" id="total_pembayaran">
                                <input type="hidden" name="ongkir_service" id="ongkir_service">
                                <input type="hidden" name="ongkir" id="harga_ongkir">
                                <p class="h5 bold price ms-sm-auto" id="text_total">Rp. {{number_format($total)??'0'}}</p>
                            </div><!-- Proceed -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary mt-4" form="order-form">
                                    <i class="fas fa-credit-card me-2"></i>Proceed to Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <meta name="csrf-token" content="{{ csrf_token() }}" />
            </div>
        </form>
    </div>
</section>
</main>
@endsection

@section('script')
    <script>
        $.ajax({
            url : "/provinsi",
            method : "GET",
            async : true,
            dataType : 'json',
            success: function(data){
                var province=data.rajaongkir.results
                // console.log(province)
                $("#provinsi").empty()
                $("#provinsi").append("<option value=''>Pilih Provinsi</option>")
                for (let index = 0; index < province.length; index++) {
                    $("#provinsi").append("<option value='"+province[index].province_id+"'>"+province[index].province+"</option>")
                }
            }
        });

        $('#kurir').change(function(){
            cekTarif()
        });
        $('#provinsi').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "/provinsi/"+id,
                method : "GET",
                async : true,
                dataType : 'json',
                success: function(data){
                    var city=data.rajaongkir.results
                    // console.log(data)
                    $("#kota").empty()
                    $("#kota").append("<option value=''>Pilih Kota</option>")
                    for (let index = 0; index < city.length; index++) {
                        $("#kota").append("<option value='"+city[index].city_id+"'>"+city[index].city_name+"</option>")
                    }
                }
            });
        });
        $('#kota').change(function(){
           cekTarif()
        });

        function cekTarif(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var province_id=$("#provinsi").val()
            var kota_id=$("#kota").val();
            var kurir=$("#kurir").val()
            if(kota_id==null||kota_id==''||province_id==null||province_id==''||kurir==null||kurir==''){
                console.log('Pilih Kota, Provinsi dan Kurir')
            }else{
                $.ajax({
                    url : "/cost/",
                    method : "POST",
                    data:{
                        tujuan:kota_id,
                        kurir:kurir,
                    },
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var services=data.rajaongkir.results[0].costs
                        // var city=data.rajaongkir.results
                        // console.log(services)
                        $("#services").empty()
                        for (let index = 0; index < services.length; index++) {
                            $("#services").append('\
                            <div class="mb-3 shadow-sm p-3">\
                                <div class="d-flex flex-column flex-sm-row align-items-sm-center">\
                                    <div>\
                                        <div class="radio radio-primary">\
                                        <input class="form-control" type="radio"  id="shipping'+index+'" value="'+(services[index].cost[0].value)+'" name="shipping-options">\
                                        <label class="control-label text-darker" onclick="ongkir('+(services[index].cost[0].value)+',\'' + services[index].service + '\')" id="ongkir" for="shipping'+index+'">'+services[index].service+': '+services[index].description+'</label>\
                                        </div>\
                                        <p class="small text-muted my-0">Estimasi '+services[index].cost[0].etd+' Hari</p>\
                                    </div>\
                                    <div class="ms-sm-auto"><span class="font-sm text-primary">Rp. '+(services[index].cost[0].value).toLocaleString()+'</span></div>\
                                </div>\
                            </div>\
                            ')
                        }
                    }
                });
            }
        }
       function ongkir(ongkir,service){
            var total= +$("#total_pembayaran").val()+ +ongkir
            $("#text_total").empty()
            $("#harga_ongkir").val(ongkir)
            $("#ongkir_service").val(service)
            $("#text_total").append("Rp. "+total.toLocaleString())
       }
    </script>
@endsection