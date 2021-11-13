<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data['products']=DB::table('products')->select('products.*','customers.name')
        ->leftJoin('customers','customers.id','products.user_id')->paginate(2);
        return view('backend.product.index',$data);
    }
}
