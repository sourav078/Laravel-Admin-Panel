@extends('backend.layouts.master_v2')
@section('title')
Edit Counsellor Type User
@endsection
@section('active_breadcumbs_title')
Edit Counsellor Type User
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Cousellor User Form</h4>
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
                <h4 class="header-title"><b>Edit User : {{ $userData->name }}</b></h4>
                <div class="p20">
                    <div>
                        @include('backend.layouts.partials.messages')
                        <!-- main form start -->
                        <form action="{{ route('admin.counsellor.account.user.update', $userData->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" data-bs-toggle="tab" id="basic_information_tab" href="#basic-information-tab">Basic Information</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active p10" id="basic-information-tab">
                                        <div class="form-row">
                                            <div class="form-group col-md-6 col-sm-12">
                                                <label for="name">Full name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter User Full Name" value="{{ $userData->full_name }}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <label for="email">User Email</label>
                                            <input type="text" readonly class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ $userData->email }}">
                                        </div>
                                        <div class="form-row">
                                            <label for="email">Ratings</label>
                                            <div class="ratings-counsellor"></div>
                                            <input id="ratings_counsellor_input" type="hidden" name="ratings_value" value="{{ $userData->ratings_value }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="save-button-form-v1">
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save User</button>
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
@section('on_demand_footer_script_if_exist')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript" src="{{ asset('backend/assets/js/role-functions-list.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/assets/js/onload-scripts.js') }}"></script>
@endsection
@section('after_domready_script')
<script>
    $(document).ready(function() {
        // ratings extension used from this bellow site
        // http://auxiliary.github.io/rater/
        var options = {
            max_value: 5
            , step_size: 0.5
            , initial_value: @if($userData->ratings_value && $userData->ratings_value > 0) {{$userData->ratings_value  }} @else 1 @endif
            , ajax_method: 'POST'
            , update_input_field_name: $("#ratings_counsellor_input")
        , }
        $(".ratings-counsellor").rate(options);
    });
</script>
@endsection
