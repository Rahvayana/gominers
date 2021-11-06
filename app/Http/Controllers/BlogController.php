<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function blog()
    {
        $data['blogs']=DB::table('posts')->select('posts.*','users.name as author','users.foto')->where('category','tips')
        ->leftJoin('users','users.id','posts.user_id')->orderBy('created_at','DESC')->paginate(5);
        return view('backend.post.blog',$data);
    }

    public function addBlog()
    {
        return view('backend.post.add');
    }

    public function imageUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('images/blog/content/'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/blog/content/' . $fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'thumbnail' => 'required|image',
            'content' => 'required',
            'tags' => 'required',
        ]);
        $tags = explode(",", $request->tags);
        // dd($tags, $request);

        $imageName1 = time().'-'.rand() . '.' . $request->thumbnail->extension();
        $request->thumbnail->move('images/blog/main/', $imageName1);

        $slug = Str::slug($request->title, '-');
        $post=new Post();
        $post->title=$request->title;
        $post->user_id=Auth::user()->id;
        $post->category=$request->category;
        $post->desc=$request->desc;
        $post->slug=$slug;
        $post->thumbnail='images/blog/main/' . $imageName1;
        $post->content=$request->content;
        $post->tags=json_encode($tags);
        $post->save();

        if ($post) {
            return redirect()->route('bcn.post.blog')->with('success', 'Adding New Blog Success');
        } else {
            return redirect()->route('bcn.post.add-blog')->with('failed', 'Adding New Blog Failed');
        }


    }
}
