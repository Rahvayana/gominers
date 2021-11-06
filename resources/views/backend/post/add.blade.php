@extends('layouts.backend')
@section('content')
<div class="dashboard_contents section--padding">
    <div class="container">
        <div class="row">
            @if ($errors->any())
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="text-decoration: none;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <form action="{{ route('bcn.post.store-blog') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="upload_modules">
                        <div class="modules__title">
                            <h4>Input Your Posts</h4>
                        </div><!-- ends: .module_title -->
                        <div class="modules__content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_name">Title</label>
                                        <input type="text" id="product_name" name="title" class="text_field" placeholder="Enter your title">
                                    </div>
                                </div><!-- ends: .col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Select Category</label>
                                        <div class="select-wrap select-wrap2">
                                            <select name="category" id="category" class="text_field">
                                                <option value="tips">Tips</option>
                                                <option value="news">News</option>
                                            </select>
                                            <span class="lnr icon-arrow-down"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="m-bottom-15">
                                        <label for="tags">Title Tags
                                            <span>(Separated By Comma)</span>
                                        </label>
                                        <textarea name="tags" id="tags" class="text_field" placeholder="Enter your post tags here..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Select Thumbnail</label>
                                        <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                                    </div><!-- ends: .form-group -->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tags">Short Description</label>
                                        <textarea name="desc" id="desc" class="text_field" placeholder="Enter your post Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="m-bottom-20 no-margin">
                                        <p class="label">Post Content</p>
                                        <textarea class="ckeditor form-control" name="content"></textarea>
                                    </div>
                                </div><!-- ends: .col-md-12 -->
                            </div>
                        </div><!-- ends: .modules__content -->
                    </div><!-- ends: .upload_modules -->
                    <div class="btns m-top-40">
                        <button type="submit" class="btn btn-lg btn-primary m-right-15">Save Post</button>
                        <button class="btn btn-lg btn-danger">Cancel</button>
                    </div>
                </form>
            </div><!-- ends: .col-md-8 -->
        </div><!-- ends: .row -->
    </div><!-- ends: .container -->
</div><!-- ends: .dashboard_menu_area -->
@endsection
@section('script')
<script src="{{ asset('/backend/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{route('cms.blog.image.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection