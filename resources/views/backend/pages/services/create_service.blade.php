@extends('backend.layouts.master_v2')
@section('title')
    Create Service
@endsection
@section('active_breadcumbs_title')
    Create Service
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-box">
                    <h4 class="page-title">Create Service Form</h4>
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
                    <h4 class="header-title"><b>Create Service</b></h4>
                    <div class="p20">
                        <div>
                            @include('backend.layouts.partials.messages')
                            <form action="{{ route('service.store') }}" method="POST" class="p20" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="form">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="title" id="txtTitle" class="form-control" placeholder="Enter Title" value="{{old('title')}}"/>
                                        <label for="txtTitle">Enter Title</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea name="description" id="summernote" class="form-control" >{{ old('description') }}</textarea>                                        <label for="txtDescription">Enter Description</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="image">Choose Image:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Service</button>
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
@section('on_demand_footer_script_if_exist')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
@section('after_domready_script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });

    </script>
@endsection
