@extends('backend.layouts.master_v2')
@section('title')
View Counsellor Documents On Unverified
@endsection
@section('active_breadcumbs_title')
View Counsellor Documents On Unverified
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <h4 class="page-title">View Cousellor Documents</h4>
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
                <h4 class="header-title"><b>View Counsellor Documents : {{ $counsellorUserData->full_name }}</b></h4>
                <div class="p20">
                    <div>
                        @include('backend.layouts.partials.messages')
                        <!-- main form start -->
                        <div class="documents-wrapper">
                            <!-- documents subbmitted -->
                            <div class="documents-submitted">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="front-part">
                                            <!-- id card front image  -->
                                            @if($counsellorUserData->UsersPersonalIdentityDetailsModel && isset($counsellorUserData->UsersPersonalIdentityDetailsModel->front_side_image) && file_exists('storage/images/personal_identity/front/'.$counsellorUserData->UsersPersonalIdentityDetailsModel->front_side_image))
                                                <h4>Front Part Of Documents</h4>
                                                <a href="{{ asset('storage/images/personal_identity/front/'.$counsellorUserData->UsersPersonalIdentityDetailsModel->front_side_image) }}" target="_blank">
                                                    <img src="{{ asset('storage/images/personal_identity/front/'.$counsellorUserData->UsersPersonalIdentityDetailsModel->front_side_image) }}" alt="" title="Front side of documents" width="200" />
                                                </a>
                                            @else
                                            <div class="alert alert-danger" role="alert">
                                                Not found any front part of documents
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="back-part">
                                            <!-- id card front image  -->
                                            @if($counsellorUserData->UsersPersonalIdentityDetailsModel && isset($counsellorUserData->UsersPersonalIdentityDetailsModel->back_side_image) && file_exists('storage/images/personal_identity/back/'.$counsellorUserData->UsersPersonalIdentityDetailsModel->back_side_image))
                                            <h4>Back Part Of Documents</h4>
                                            <a href="{{ asset('storage/images/personal_identity/back/'.$counsellorUserData->UsersPersonalIdentityDetailsModel->back_side_image) }}" target="_blank">
                                                <img src="{{ asset('storage/images/personal_identity/back/'.$counsellorUserData->UsersPersonalIdentityDetailsModel->back_side_image) }}" alt="" title="Back side of documents" width="200" />
                                            </a>
                                            @else
                                            <div class="alert alert-danger" role="alert">
                                                Not found any back part of documents
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- main form end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- new data table end -->
        </div>
        <!-- image details model -->
        
        <!-- image details model end -->
    </div> <!-- container -->
    @endsection
    @section('on_demand_footer_script_if_exist')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend/assets/js/role-functions-list.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/assets/js/onload-scripts.js') }}"></script>
    @endsection
