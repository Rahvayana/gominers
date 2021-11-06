<?php

namespace App\Http\Controllers;

use App\Mail\CustomerForgotPassword;
use App\Mail\CustomerVerification;
use App\Models\Customer;
use App\Models\Province;
use App\Models\Regencie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
            // dd($data);
            return view('frontend.home.profile',$data);
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

    public function kota($id)
    {
        $provinces=Regencie::where('province_id',$id)->get();
        return response()->json($provinces);
    }
}
