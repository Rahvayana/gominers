<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['customers']=Customer::paginate(5);
        // dd($data);
        return view('backend.customer.index',$data);
    }

    public function verify_user()
    {
        $data['customers']=DB::table('customers')->select('customers.*','verify_users.*')
        ->leftJoin('verify_users','verify_users.user_id','customers.id')
        ->where('seller',2)->orderBy('verify_users.created_at','DESC')->get();
        // dd($data);
        return view('backend.customer.verify-user',$data);
    }

    public function detail($id)
    {
        dd($id);
    }
    
    public function detailVerify($id)
    {
        $data['customer']=DB::table('customers')->select('customers.*','verify_users.*')
        ->leftJoin('verify_users','verify_users.user_id','customers.id')
        ->where('seller',2)->where('verify_users.id',$id)->first();

        return view('backend.customer.detail-verify-user',$data);
    }

    public function processVerify(Request $request,$id)
    {
        $request->validate([
            'status-customer' => 'required'
        ]);
        $verify_user=new VerifyUser();
        $verify_user=VerifyUser::find($id);
        $verify_user->text_detail=$request->text_detail;
        $verify_user->save();

        $customer=new Customer();
        $customer=Customer::find($verify_user->user_id);
        $customer->seller=1;
        $customer->save();
        return redirect()->route('bcn.customer.verify-user');
    }
}
