@extends('layouts.frontend')
@section('content')
<header class="page header text-contrast bg-primary">
    <div class="container">
        <h1 class="bold display-md-4 text-contrast">{{$blog->title}}</h1>
    </div>
</header>
<section class="section blog single">
    <div class="container">
        <div class="row gap-y">
            <div class="col-lg-8 b-r">
                <div class="blog-post post-content pb-5">
                    <p>{{$blog->desc}}</p>
                    <hr>
                    <img src="/{{$blog->thumbnail}}" alt="Thumbnail Post">
                    <p>{!!$blog->content!!}</p>
                </div>
                <div class="post-author py-5 b-t b-2x">
                    <div class="d-flex align-items-center"><img class="d-flex me-3 rounded-circle shadow" src="/frontend/img/avatar/author.jpg" alt="...">
                        <div class="flex-fill">
                            <h5 class="my-0 bold">{{$blog->author}}</h5>
                        </div>
                    </div>
                </div>
                <div class="post-details py-5 b-t">
                    <ul class="list-unstyled d-flex flex-wrap flex-row align-items-center">
                        <li class="me-4"><i class="fas fa-tag text-secondary"></i></li>
                        @foreach (json_decode($blog->tags) as $tag)
                        <li><a href="#" class="badge rounded-pill badge-outline-secondary me-2">{{$tag}}</a></li>
                        @endforeach
                    </ul>
                    <ul class="list-unstyled d-flex flex-wrap flex-row align-items-center">
                        <li class="me-4"><i class="fas fa-bookmark text-secondary"></i></li>
                        <li><a href="#" class="btn btn-circle btn-sm btn-secondary me-2"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="btn btn-circle btn-sm btn-secondary me-2"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#" class="btn btn-circle btn-sm btn-secondary"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="post-comments b-t p-4">
                    <form action="" method="post" class="cozy">
                        <h3 class="mb-4">Leave a comment</h3>
                        <div class="row">
                            <div class="mb-3 col-12 col-md-6"><input class="form-control" type="text" placeholder="Name"></div>
                            <div class="mb-3 col-12 col-md-6"><input class="form-control" type="text" placeholder="Email"></div>
                        </div>
                        <div class="mb-3"><textarea class="form-control" placeholder="Your comment" rows="4"></textarea></div><button class="btn btn-primary" type="submit">Post your comment</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <h4 class="mb-3 bold">Search</h4>
                <form class="form search-box">
                    <div class="input-group"><input type="email" name="Search[q]" class="form-control rounded-circle-left shadow-none" placeholder="Search form..." required> <button class="btn rounded-circle-right btn-contrast border-input" type="submit" data-loading-text="Searching ..."><i class="fas fa-search"></i></button></div>
                </form>
                <h4 class="mt-5 mb-3 bold">Latest Posts</h4>
                <ul class="list-unstyled">
                    @foreach ($latests as $latest)
                    <li class="d-flex align-items-center"><a href="{{$latest->slug}}" class="d-flex me-3 py-2"><img class="rounded-circle icon-xl shadow" src="/{{$latest->thumbnail??'https://picsum.photos/100/100/?random&gravity=north'}}" alt="..."></a>
                        <div class="flex-fill">
                            <h6 class="semi-bold mt-0 mb-1"><a href="{{$latest->slug}}" class="text-dark">{{$latest->title}}</a></h6><span class="small text-muted"><i class="fas fa-calendar"></i> {{date('F d Y',strtotime($latest->created_at))}}</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <h4 class="mt-4 mb-3 bold">Tags</h4>
                <div class="tags">
                    <ul class="list-unstyled d-flex flex-wrap flex-row">
                        @foreach (json_decode($blog->tags) as $tag)
                        <li><a href="#" class="badge rounded-pill badge-outline-dark me-2">{{$tag}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection