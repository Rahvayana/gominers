<?php

namespace App\Mail;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class NotifyTransactionStatus extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $invoice=$this->invoice;
        $invoice_data=Transaction::where('invoice_id',$invoice)->first();
        $data['transaction']=DB::table('transactions')
        ->select('transactions.*','customers.name as buyer','shops.name as seller')
        ->leftJoin('customers','customers.id','transactions.user_id')
        ->leftJoin('shops','shops.id','transactions.shop_id')
        ->where('transactions.invoice_id',$invoice)->first();
        $data['invoice']=Transaction::where('invoice_id',$invoice)->first();
        $data['products']=Product::whereIn('id',json_decode($invoice_data->product_id))->get();
        return $this->from('no-reply-admin@gominers.com')->view('notify-transaction',$data);
    }
}
