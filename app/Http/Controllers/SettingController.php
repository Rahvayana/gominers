<?php

namespace App\Http\Controllers;

use App\Models\Midtran;
use App\Models\Rajaongkir;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data['shipments']=['jne', 'pos', 'tiki', 'rpx', 'pandu', 'wahana', 'sicepat', 'jnt', 'pahala', 'sap', 'jet', 'indah', 'dse', 'slis', 'first', 'ncs', 'star', 'ninja', 'lion', 'idl', 'rex', 'ide', 'sentral', 'anteraja'];
        $data['raja_ongkir']=Rajaongkir::first();
        $data['midtrans']=Midtran::first();
        // dd($data);
        return view('backend.setting.index',$data);
    }

    public function saveRajaongkir(Request $request)
    {
        $request->validate([
            'api_key_ongkir'=>'required',
            'base_url_ongkir'=>'required',
        ]);
        $ongkir_id=Rajaongkir::first();
        $ongkir=new Rajaongkir();
        if($ongkir_id){
            $ongkir=Rajaongkir::find($ongkir_id->id);
        }
        $ongkir->api_key=$request->api_key_ongkir;
        $ongkir->base_url=$request->base_url_ongkir;
        $ongkir->shipments=json_encode($request->shipments);
        $ongkir->save();
        return redirect()->route('bcn.setting.index');

    }

    public function saveMidtrans(Request $request)
    {
        $request->validate([
            'virtual_akun'=>'required',
            'api_key_midtrans'=>'required',
        ]);
        $midtran_id=Midtran::first();
        $midtrans=new Midtran();
        if($midtran_id){
            $midtrans=Midtran::find($midtran_id->id);
        }
        $midtrans->virtual_akun=$request->virtual_akun;
        $midtrans->api_key=$request->api_key_midtrans;
        $midtrans->save();
        return redirect()->route('bcn.setting.index');
    }
}
