@extends('backend.layouts.master_v2')
@section('title')
Counsellilg Interest Category Interest
@endsection
@section('active_breadcumbs_title')
Counsellilg Interest Category Interest
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <h4 class="page-title">Create Counsellilg Interest Category</h4>
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
                <h4 class="header-title">Create Counsellilg Interest Category</h4>
                <div class="p20">
                    <div>
                        @include('backend.layouts.partials.messages')
                        <form action="{{ route('counselling_interest_category.store') }}" method="POST" class="p20" enctype="multipart/form-data">
                            @csrf
                            <div class="form">
                                <div class="form-group">
                                    <label for="txtInterestName">Counselling Category Interest Name</label>
                                    <input type="text" name="category_name" id="txtInterestName" class="form-control" placeholder="type Counselling Interest Category Name" />
                                </div>
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Upload Category Image</label>
                                    <input class="form-control" type="file" id="category_image" name="category_image">
                                </div>
                                <div class="form-group">
                                    <label for="checkboxIsFeatured" class="form-label">Is Featured</label>
                                    <input class="form-check-input" id="checkboxIsFeatured" type="checkbox" name="is_featured" value="1"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Interest</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- new data table end -->
    </div>
</div> <!-- container -->
@endsection
