<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Post;
use App\Models\Product;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth',['except' => ['index']]);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://newsapi.org/v2/everything?language=en&q=Bitcoin&from='.date('Y-m-d',strtotime("-3 days")).'&sortBy=publishedAt&apiKey=5b37d2dcec574fb087f548015eb4da59',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data['news']=array();
        $data['headline_news']=array();
        $i=0;
        foreach(json_decode($response)->articles as $key=>$news){
            if(count($data['headline_news'])<4&&$news->urlToImage){
                $data['headline_news'][$i]=$news;
                $i++;
            }
        }

        $data['blogs']=DB::table('posts')->select('posts.*','users.name as author','users.foto')
        ->leftJoin('users','users.id','posts.user_id')->orderBy('created_at','DESC')->get();
        $data['products']=Product::orderBy('created_at','DESC')->get();
        $data['videos']=Video::all();
        // dd($data);

        return view('frontend.home.index',$data);
    }

    public function detailBlog($slug)
    {
        $data['blog']=DB::table('posts')->select('posts.*','users.name as author','users.foto')
        ->leftJoin('users','users.id','posts.user_id')->where('slug',$slug)->first();
        $data['latests']=DB::table('posts')->select('posts.*','users.name as author','users.foto')->where('category','tips')
        ->leftJoin('users','users.id','posts.user_id')->where('slug','!=',$slug)->take(4)->get();
        // dd($data);
        return view('frontend.home.blog-detail',$data);
    }

    public function detailProduct($slug)
    {
        $data['product']=Product::where('slug',$slug)->first();
        return view('frontend.home.shop-detail',$data);

    }

    public function addCart(Request $request)
    {
        $product=Product::where('slug',$request->slug)->first();
        $qty=Cart::where('product_id',$product->id)->where('user_id',Auth::guard('customer')->id())->first();
        $cart=new Cart();
        if($qty){
            $cart=Cart::find($qty->id);
        }
        $cart->user_id=Auth::guard('customer')->id();
        $cart->product_id=$product->id;
        if ($qty) {
            $jml=$qty->qty+1;
        } else {
            $jml=1;
        }

        $cart->qty=$jml;
        $cart->save();

        return response()->json($product);
    }
}
