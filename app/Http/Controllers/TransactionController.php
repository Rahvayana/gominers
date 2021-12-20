<?php

namespace App\Http\Controllers;

use App\Mail\NotifyTransactionStatus;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function index()
    {
        $data['transactions']=DB::table('transactions')
        ->select('transactions.*','customers.name as buyer','shops.name as seller')
        ->leftJoin('customers','customers.id','transactions.user_id')
        ->leftJoin('shops','shops.id','transactions.shop_id')
        ->orderBy('transactions.created_at','DESC')->get();
        // dd($data);
        return view('backend.transaction.index',$data);
    }

    public function detail($invoice)
    {
        $invoice_data=Transaction::where('invoice_id',$invoice)->first();
        $data['transaction']=DB::table('transactions')
        ->select('transactions.*','customers.name as buyer','shops.name as seller')
        ->leftJoin('customers','customers.id','transactions.user_id')
        ->leftJoin('shops','shops.id','transactions.shop_id')
        ->where('transactions.invoice_id',$invoice)->first();
        $data['invoice']=Transaction::where('invoice_id',$invoice)->first();
        $data['products']=Product::whereIn('id',json_decode($invoice_data->product_id))->get();
        // dd($data);
        return view('backend.transaction.detail',$data);
        
    }

    public function processTransaction($id,Request $request)
    {
        $user=DB::table('transactions')
        ->select('transactions.*','customers.name as buyer','customers.email as email','shops.name as seller')
        ->leftJoin('customers','customers.id','transactions.user_id')
        ->leftJoin('shops','shops.id','transactions.shop_id')
        ->where('transactions.invoice_id',$id)->first();
        $transaction=new Transaction();
        $transaction=Transaction::where('invoice_id',$id)->first();
        $transaction->status=$request->status_transaction;
        $transaction->save();
        if($request->status_transaction=='APPROVED'){
            Mail::to($user->email)->send(new NotifyTransactionStatus($id));
        }else{
            //send email gagal order ke pembeli dan 
        }

        return redirect()->route('bcn.transaction.index')->with('success','Success Update Transaction Status');
    }
}
