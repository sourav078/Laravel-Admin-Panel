@extends('backend.layouts.master_v2')
@section('title')
Counsellilg Interest Category Edit
@endsection
@section('active_breadcumbs_title')
Counsellilg Interest Category Edit
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <h4 class="page-title">Counselling Interest Category Edit Form</h4>
                <!-- breadcumbs -->
                @include('backend.layouts.partials.v2.breadcumbs_v2')
                <!-- end of breadcumbs -->
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <!-- new data table start -->
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title"><b>Counselling Interest Category Edit</b></h4>
                <div class="p20">
                    <div>
                        @include('backend.layouts.partials.messages')
                        <!-- main form start -->
                        <form action="{{ route('counselling_interest_category.update', $counselling_interest_category->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form">
                                <div class="form-group">
                                    <label for="txtInterestName">Counselling Interest Category Name</label>
                                    <input type="text" name="category_name" id="txtCategoryName" class="form-control" placeholder="type interest name" value="{{ $counselling_interest_category->category_name }}" />
                                </div>
                                @if(file_exists(public_path('/storage/images/category_image/'.$counselling_interest_category->category_image)))
                                <div class="form-group">
                                    <label class="form-label">Existing Category Image</label>
                                    <img src="{{ asset('/storage/images/category_image/'.$counselling_interest_category->category_image) }}" alt="" title="" width="100px" />
                                </div>
                                <div class="form-group">
                                    <label for="category_image" class="form-label">Upload New Category Image (Existing file will be replaced)</label>
                                    <input class="form-control" type="file" id="category_image" name="category_image">
                                </div>
                                @else
                                <div class="form-group">
                                    <label for="category_image" class="form-label">Upload Category Image</label>
                                    <input class="form-control" type="file" id="category_image" name="category_image">
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="checkboxIsFeatured" class="form-label">Is Featured</label>
                                    <input class="form-check-input" id="checkboxIsFeatured" type="checkbox" name="is_featured" value="1" @if($counselling_interest_category->is_featured && $counselling_interest_category->is_featured == 1)
                                    checked
                                    @endif
                                    />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Edit Interest</button>
                                </div>
                            </div>
                        </form>
                        <!-- main form end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- new data table end -->
    </div>
</div> <!-- container -->
@endsection
