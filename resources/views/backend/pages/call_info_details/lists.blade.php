@extends('backend.layouts.master_v2')
@section('title')
Call Lists
@endsection
@section('active_breadcumbs_title')
Call Lists
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <h4 class="page-title">Transaction Lists</h4>
                <!-- breadcumbs -->
                @include('backend.layouts.partials.v2.breadcumbs_v2')
                <!-- end of breadcumbs -->
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<div class="row">
    <!-- new data table start -->
    <div class="col-sm-12">
        <div>
            @include('backend.layouts.partials.messages')
        </div>
        <div class="card-box table-responsive">
            <h4 class="header-title"><b>Transaction Lists</b></h4>
            <div class="p20">
                <table class="table table-bordered data-table" id="datatable">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Book ID</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Duration</th>
                            <th>Call Type</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- new data table end -->
</div>
</div> <!-- container -->
@endsection
@section('after_domready_script')
<script type="text/javascript">
$(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.call.info.list') }}",
        order: [], // this is very important. If now use this then default order will not work on renderred
        columns: [
            {data: 'id', name: 'id'},
            {data: 'book_id', name: 'book_id'},
            {data: 'start_time', name: 'start_time'},
            {data: 'end_time', name: 'end_time'},
            {data: 'duration', name: 'duration'},
            {data: 'call_type', name: 'call_type'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
</script>
@endsection
