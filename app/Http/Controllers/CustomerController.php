<?php

namespace App\Http\Controllers;

use App\Mail\CustomerForgotPassword;
use App\Mail\CustomerVerification;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Province;
use App\Models\Rajaongkir;
use App\Models\Regencie;
use App\Models\Shop;
use App\Models\Transaction;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomerController extends Controller
{

    public function login()
    {
        return view('frontend.home.login');
    }
    public function handleLogin(Request $request)
    {

        if (Auth::guard('customer')->attempt($request->only(['email', 'password']))) {
            return redirect()->route('home')->with('failed', 'Invalid Credentials');
        }
        return redirect()
            ->back()
            ->with('failed', 'Invalid Credentials');
    }

    public function register()
    {
        return view('frontend.home.register');
    }

    public function handleRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);
        $customer=new Customer();
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->password=Hash::make($request->password);
        $customer->save();
        Mail::to($request->email)->send(new CustomerVerification($request->email));
        Auth::guard('customer')->attempt($request->only(['email', 'password']));
        return redirect()->route("home");
    }

    public function forgot()
    {
        return view('frontend.home.forgot-password');
    }

    public function handleForgot(Request $request)
    {
        $customer=Customer::where('email',$request->email)->first();
        if($customer){
            Mail::to($request->email)->send(new CustomerForgotPassword($request->email));
            return redirect()
            ->back()
            ->with('success', 'Forgot Password Email Sended');
        }else{
            return redirect()
            ->back()
            ->with('failed', 'Email Doesnt Exist');
        }
    }

    public function forgotPassword($email)
    {
        $data['customer']=Customer::where('email',$email)->first();
        return view('change-password',$data);

    }

    public function changePassword(Request $request,$id)
    {
        $request->validate([
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $customer=new Customer();
        $customer=Customer::find($id);
        $customer->password=Hash::make($request->password);
        $customer->save();
        return redirect()->route('frn.customer.login-process')->with('success', 'Password Changed');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();

        return redirect()
            ->route('home');
    }

    public function resend()
    {
        Mail::to(Auth::guard('customer')->user()->email)->send(new CustomerVerification(Auth::guard('customer')->user()->email));
        return redirect()->back()->with('resent','A fresh verification link has been sent to your email address.');
        
        // $this->senEmailVerification($email);
    }

    public function verify($email)
    {
        $customer=new Customer();
        $customer=Customer::where('email',$email)->first();
        $customer->email_verified_at=date('Y-m-d');
        $customer->save();
        return redirect()->back();

    }


    public function detail()
    {
        if (isset(Auth::guard('customer')->user()['id']) != null) {
            $data['provinces']=Province::all();
            $data['regencies']=Regencie::all();
            $data['shop']=Shop::where('user_id',Auth::guard('customer')->id())->first();
            $data['shipments']=Rajaongkir::select('shipments')->first();
            // dd($data);

            return view('frontend.home.dashboard.profile',$data);
        }else{
            return redirect()->route('home')->with('failed', 'Not Login');;
        }
    }

    public function update(Request $request)
    {
        $province=Province::find($request->provinsi);
        $city=Regencie::find($request->kota);
        $customer=new Customer();
        $customer=Customer::find(Auth::guard('customer')->id());
        $customer->alamat=$request->alamat;
        $customer->provinsi=$province->name;
        $customer->kota=$city->name;
        $customer->save();
        return redirect()->back();
    }

    public function upgrade(Request $request)
    {
        $request->validate([
            'nik' => 'required|max:16|min:16',
            'ktp' => 'required',
            'selfie_ktp' => 'required|image',
        ]);
        
        $customer = new Customer();
        $customer=Customer::find(Auth::guard('customer')->id());
        $customer->seller=2;
        $customer->save();

        $ktp = time().'-'.rand() . Auth::guard('customer')->id() . '.' . $request->ktp->extension();
        $request->ktp->move('images/shop/verify/', $ktp);
        
        $selfie_ktp = time().'-'.rand() . Auth::guard('customer')->id(). '.' . $request->selfie_ktp->extension();
        $request->selfie_ktp->move('images/shop/verify/', $selfie_ktp);

        $verify=new VerifyUser();
        $verify->nik=$request->nik;
        $verify->user_id=Auth::guard('customer')->id();
        $verify->ktp='images/shop/verify/' . $ktp;
        $verify->ktp_selfie='images/shop/verify/' . $selfie_ktp;
        $verify->save();

        return redirect()->back()->with('success', 'Tunggu Konfirmasi Admin 1X24 Jam');

    }

    public function kota($id)
    {
        $provinces=Regencie::where('province_id',$id)->get();
        return response()->json($provinces);
    }

    public function otpSend(Request $request)
    {
        $customer=new Customer();
        $customer=Customer::find(Auth::guard('customer')->id());
        $customer->no_hp=$request->number_phone;
        $customer->otp=$this->intCodeRandom(6);
        $customer->save();
        if($customer){
            return response()->json('Berhasil Mengirim OTP');
        }

    }

    public function otpVerif(Request $request)
    {
        $otp=DB::table('customers')->select('otp')->where('id',Auth::guard('customer')->id())->first();
        if($otp->otp==$request->otpnumber){
            $customer=new Customer();
            $customer=Customer::find(Auth::guard('customer')->id());
            $customer->seller=1;
            $customer->save();
            return response()->json('Berhasil Mendaftar Sebagai Merchant',200);
        }else{
            return response()->json('Nomor OTP Salah',200);
        }
    }

    public function intCodeRandom($length)
    {
      $intMin = (10 ** $length) / 10; // 100...
      $intMax = (10 ** $length) - 1;  // 999...

      $codeRandom = mt_rand($intMin, $intMax);

      return $codeRandom;
    }

    public function shop()
    {
        
        if ((Auth::guard('customer')->id()) != null&&Auth::guard('customer')->user()->seller==1) {
            $data['products']=Product::where('user_id',Auth::guard('customer')->id())->get();
            // dd($data);
            return view('frontend.home.dashboard.shop',$data);
        }else{
            return redirect()->route('home')->with('failed', 'Not Login');;
        }
    }

    public function transaction()
    {   
        $data['approveds']=DB::table('transactions')
        ->select('transactions.*','customers.name as buyer','shops.name as seller')
        ->leftJoin('customers','customers.id','transactions.user_id')
        ->leftJoin('shops','shops.id','transactions.shop_id')
        ->where('transactions.shop_id',Auth::guard('customer')->id())
        ->where('transactions.status','APPROVED')
        ->orderBy('transactions.created_at','DESC')->get();
        $data['processeds']=DB::table('transactions')
        ->select('transactions.*','customers.name as buyer','shops.name as seller')
        ->leftJoin('customers','customers.id','transactions.user_id')
        ->leftJoin('shops','shops.id','transactions.shop_id')
        ->where('transactions.shop_id',Auth::guard('customer')->id())
        ->where('transactions.status','PROCESSED')
        ->orderBy('transactions.created_at','DESC')->get();
        $data['completeds']=DB::table('transactions')
        ->select('transactions.*','customers.name as buyer','shops.name as seller')
        ->leftJoin('customers','customers.id','transactions.user_id')
        ->leftJoin('shops','shops.id','transactions.shop_id')
        ->where('transactions.shop_id',Auth::guard('customer')->id())
        ->where('transactions.status','COMPLETED')
        ->orderBy('transactions.created_at','DESC')->get();
        // dd($data);
        return view('frontend.home.dashboard.transactions',$data);
    }

    public function transactionDetail($invoice)
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
        return view('frontend.home.dashboard.detail-transactions',$data);
    }

    public function transactionDetailProcessed($id)
    {
        $transaction=new Transaction();
        $transaction=Transaction::where('invoice_id',$id)->first();
        $transaction->status='PROCESSED';
        $transaction->save();
        return redirect()->route('frn.customer.transactions');
    }

    public function addProduct()
    {
        return view('frontend.home.dashboard.add-product');
    }

    public function saveProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'harga' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'qty' => 'required',
        ]);
        $slug = Str::slug($request->name, '-');
        $imageName1 = time().'-'.rand() . '.' . $request->image->extension();
        $request->image->move('images/products/', $imageName1);

        $product=new Product();
        $product->title=$request->name;
        $product->user_id=Auth::guard('customer')->id();
        $product->image='images/products/' . $imageName1;
        $product->type=$request->type;
        $product->slug=$slug;
        $product->category=$request->category;
        $product->harga=$request->harga;
        $product->desc=$request->desc;
        $product->qty=$request->qty;
        $product->save();
        if ($product) {
            return redirect()->route('frn.customer.shop')->with('success', 'Adding New Product Success');
        } else {
            return redirect()->route('frn.customer.shop')->with('failed', 'Adding New Product Failed');
        }
    }

    public function checkout()
    {
        $data['products']=DB::table('carts')->select('products.*','carts.qty','carts.id as cart_id')
        ->leftJoin('products','products.id','carts.product_id')
        ->where('carts.user_id',Auth::guard('customer')->id())->get();
        dd($data);
        return view('frontend.home.dashboard.cart',$data);
    }
    

    public function deleteCart(Request $request)
    {
        $cart=Cart::find($request->id);
        $cart->delete();
        return response()->json($cart);
    }

    public function processCart(Request $request)
    {
        $carts=Cart::where('user_id',Auth::guard('customer')->id())->get();
        foreach($carts as $key=>$cart){
            $product=DB::table('products')->select('products.*')
            ->where('id',$cart->product_id)->first();
            if($product){
                $data['carts'][]=[
                    'id'=>$product->id,
                    'title'=>$product->title,
                    'harga'=>$product->harga,
                    'image'=>$product->image,
                    'qty'=>$request->qty[$key],
                    'total'=>$request->qty[$key]*$product->harga,
                ];
            }else{
                return redirect()->back()->with('failed','Error Product ID');
            }
        }        
        // dd($data);
        return view('frontend.home.dashboard.checkout',$data);
        
    }

    public function order(Request $request)
    {
        $kode=$this->intCodeRandom(3);
        $invoice="INV-".$this->intCodeRandom(5).$kode;
        $transaction=new Transaction();
        $transaction->invoice_id=$invoice;
        $transaction->user_id=Auth::guard('customer')->id();
        $transaction->product_id=json_encode($request->product_id);
        $transaction->qty=json_encode($request->qty);
        $transaction->random_id=$kode;
        $transaction->kurir=$request->kurir;
        $transaction->provinsi=$request->provinsi;
        $transaction->kota=$request->kota;
        $transaction->kecamatan=$request->kecamatan;
        $transaction->alamat=$request->address;
        $transaction->ongkir=$request->ongkir;
        $transaction->nama=$request->atas_nama;
        $transaction->no_hp=$request->nomor;
        $transaction->promo=$request->promo;
        $transaction->total_harga=$request->total_pembayaran;
        $transaction->save();

        $cart=new Cart();
        $cart=Cart::where('user_id',Auth::guard('customer')->id())->get();
        $cart->each->delete();

        //Kasih pengurangan stok ketika order

        return redirect()->route('frn.customer.confirm-order',$invoice)->with('success','Sukses Melakukan Order');

    }

    public function confirmOrder($invoice)
    {
        $invoice_data=Transaction::where('invoice_id',$invoice)->first();
        $data['invoice']=Transaction::where('invoice_id',$invoice)->first();
        $data['products']=Product::whereIn('id',json_decode($invoice_data->product_id))->get();
        // dd($data);
        return view('frontend.home.dashboard.confirmation-order',$data);
    }

    public function confirmOrderProcess(Request $request,$id)
    {
        $request->validate(['bukti_transfer'=>'required|']);
        $bukti_tf = time().'-'.rand() . '.' . $request->bukti_transfer->extension();
        $request->bukti_transfer->move('images/bukti_tf/', $bukti_tf);
        $transaction=new Transaction();
        $transaction=Transaction::where('invoice_id',$id)->first();
        $transaction->bukti_transfer='images/bukti_tf/' . $bukti_tf;
        $transaction->save();
        return redirect()->route('frn.customer.checkout');
    }

    public function updateShop(Request $request)
    {
        $request->validate([
            'shop_name' => 'required',
            'province' => 'required',
            'origin' => 'required',
        ]);

        $shop=new Shop();
        $shop->user_id=Auth::guard('customer')->id();
        $shop->name=$request->shop_name;
        $shop->shippings=json_encode($request->shipments);
        $shop->province=$request->province;
        $shop->origin=$request->origin;
        $shop->save();

        return redirect()->back();
    }
}
