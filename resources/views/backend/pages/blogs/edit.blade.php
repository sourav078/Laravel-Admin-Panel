@extends('backend.layouts.master_v2')
@section('title')
    Edit User
@endsection
@section('active_breadcumbs_title')
    Edit User
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Blog Form</h4>
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
                    <h4 class="header-title"><b>Edit Blog : {{ $blog->title }}</b></h4>
                    <div class="p20">
                        <div>
                            @include('backend.layouts.partials.messages')
                            <!-- main form start -->
                            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active p10" id="basic-information-tab">
                                            <div class="form-row">
                                                <div class="form-group col-md-12 col-sm-12  ">
{{--                                                <div class="form-floating mb-3">--}}

                                                <label for="title">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ $blog->title }}" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="summernote" class="form-control " placeholder="Enter Description">{!! $blog->description !!}</textarea>
                                            </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="image">Current Image</label><br>
                                            <img src="{{ asset('storage/'.$blog->image) }}" alt="Current Image" style="max-width: 200px; max-height: 200px;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="new_image">New Image</label>
                                            <input type="file" class="form-control-file" id="new_image" name="image" accept="image/*">
                                            <img src="#" alt="New Image" id="new_image_preview" style="max-width: 200px; max-height: 200px; display: none;">
                                        </div>
                                    </div>

                                            <div class="save-button-form-v1">
                                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Blog</button>
                                            </div>
                                        </div>
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
            $('.select2').select2();

            document.getElementById('new_image').addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('new_image_preview').src = event.target.result;
                        document.getElementById('new_image_preview').style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
