@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Customers</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                    <li class="breadcrumb-item active">List Customers</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add Blog Or Tips</h4>
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
                <form action="{{ route('bcn.post.store-blog') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="mb-3 row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" type="text" id="title" name="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="title">Category</label>
                                <select class="form-select" id="category" name="category">
                                    <option value="">Pilih Category</option>
                                    <option value="tips">Tips</option>
                                    <option value="news">News</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="title">Tags</label>
                                <textarea name="tags" id="tags" class="form-control" placeholder="Enter your post tags here..."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="title">Thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="tags">Short Description</label>
                                <textarea name="desc" id="desc" class="form-control" placeholder="Enter your post Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <p class="label">Post Content</p>
                                <textarea id="elm1" name="content"></textarea>
                            </div>
                        </div><!-- ends: .col-md-12 -->
                        
                    </div>
                    <div class="mb-3 row" id="text_detail">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    
                </form>

            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection
@section('script')
<script src="{{ asset('/assets/ckeditor/ckeditor.js')}}"></script>
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