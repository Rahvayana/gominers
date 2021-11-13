@extends('layouts.backend')
@section('breadcrumb')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-contents">
                    <h2 class="page-title">Posts</h2>
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="{{ route('bcn.post.blog') }}">Posts</a>
                            </li>
                            <li class="active">
                                <a href="#">Blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- end .col-md-12 -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</section><!-- ends: .breadcrumb-area -->
@endsection
@section('content')
<div class="dashboard_contents p-top-100 p-bottom-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="filter-bar clearfix filter-bar2">
                    <div class="dashboard__title" style="padding: 30px;">
                        <h3>{{($products->total())}} Posts</h3>
                    </div>
                    <div class="filter__items">
                        <div class="filter__option filter--search" style="padding: 30px;">
                            <form action="#">
                                <input type="text" placeholder="Search users">
                                <button type="submit"><span class="icon-magnifier"></span></button>
                            </form>
                        </div>
                        <div class="filter__option filter--select" style="padding: 30px;">
                            <div class="select-wrap">
                                <select name="price">
                                    <option>All Categories</option>
                                    <option>Seller</option>
                                    <option>User</option>
                                    <option>Email Not Verified</option>
                                </select>
                                <span class="lnr icon-arrow-down"></span>
                            </div>
                        </div>
                    </div><!-- ends: .pull-right -->
                </div><!-- ends: .filter-bar -->
            </div><!-- end .col-lg-3 -->
        </div>
        <div class="row mb-2" style="margin-top: -22px">
            {{-- <div class="col-lg-12 col-sm-12">
                <a class="btn btn-primary" href="{{ route('bcn.post.add-blog') }}">Add Post</a>
            </div> --}}
        </div>
        <div class="product_archive">
            <div class="title_area">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <h5>Blog Details</h5>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h5 class="add_info">Additional Info</h5>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <h5>Harga</h5>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <h5>Action</h5>
                    </div>
                </div>
            </div><!-- ends: .title_area -->
            <div class="row">
                @foreach ($products as $product)
                <div class="single_product clearfix col-md-12">
                    <div class="row">
                        <div class="col-lg-5 col-sm-12">
                            <div class="product__description">
                                <img src="/{{$product->image??'/backend/img/pur1.jpg'}}" alt="Thumbnail" style="max-width: 100px; max-height: 80px;">
                                <div class="short_desc">
                                    <h5>
                                        <a href="">{{$product->title??''}}</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- ends: .product__description -->
                        </div>
                        <!-- ends: .col-md-5 -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="product__additional_info">
                                <ul>
                                    <li>
                                        <p>
                                            <span>Shop: {{$product->name??''}}</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <!-- ends: .product__additional_info -->
                        </div>
                        <!-- ends: .col-md-3 -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="product__price_download">
                                <div class="item_price v_middle">
                                    <span>Rp. {{number_format($product->harga)}}</span>
                                </div>
                                <div class="item_action v_middle">
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </div><!-- ends: .item_action -->
                            </div><!-- ends: .product__price_download -->
                        </div><!-- ends: .col-md-4 -->
                    </div>
                </div>
                @endforeach
                <!-- ends: .single_product -->
                <!-- Start Pagination -->
                <div class="col-md-12">
                    <!-- Start Pagination -->
                    <nav class="pagination-default ">
                        {{-- {{ $blogs->links('backend.customer.pagination') }} --}}
                    </nav><!-- Ends: .pagination-default -->
                </div>
            </div><!-- ends: .row -->
        </div><!-- ends: .product_archive2 -->
    </div><!-- ends: .container -->
</div><!-- ends: .dashboard_menu_area -->

<!-- Modal Rating -->
<div class="modal fade rating_modal" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="rating_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="rating_modal">Rating this Item</h3>
                <h4>Product Enquiry Extension</h4>
                <p>by
                    <a href="author.html">AazzTech</a>
                </p>
            </div>
            <!-- end /.modal-header -->
            <div class="modal-body">
                <form action="#">
                    <ul>
                        <li>
                            <p>Your Rating</p>
                            <div class="right_content btn btn--round btn--white btn--md">
                                <select name="rating" class="give_rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <p>Rating Causes</p>
                            <div class="right_content">
                                <div class="select-wrap">
                                    <select name="review_reason" id="rev">
                                        <option value="design">Design Quality</option>
                                        <option value="customization">Customization</option>
                                        <option value="support">Support</option>
                                        <option value="performance">Performance</option>
                                        <option value="documentation">Well Documented</option>
                                    </select>
                                    <span class="icon-arrow-down"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="rating_field">
                        <label for="rating_field">Comments</label>
                        <textarea name="rating_field" id="rating_field" class="text_field" placeholder="Please enter your rating reason to help the author"></textarea>
                        <p class="notice">Your review will be ​publicly visible​ and the author may reply to your
                            comments. </p>
                    </div>
                    <div class="button-group m-n1">
                        <button type="submit" class="btn btn-md btn-primary m-1">Submit Rating</button>
                        <button class="btn modal_close m-1" data-dismiss="modal">Close</button>
                    </div>
                </form>
                <!-- end /.form -->
            </div>
            <!-- end /.modal-body -->
        </div>
    </div>
@endsection
@section('script')
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
@endsection