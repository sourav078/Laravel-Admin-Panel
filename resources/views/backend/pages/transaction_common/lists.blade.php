@extends('backend.layouts.master_v2')
@section('title')
Transaction Lists
@endsection
@section('active_breadcumbs_title')
Transaction Lists
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
                            <th>Order Details ID</th>
                            <th>Transaction Type</th>
                            <th>Payment Particulars</th>
                            <th>Transaction Payment Gateway Type</th>
                            <th>Transaction Payment Gateway Track ID</th>
                            <th>Transaction Amount</th>
                            <th>Transaction Currency</th>
                            <th>Created Date</th>
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
        ajax: "{{ route('admin.transaction.lists') }}",
        order: [], // this is very important. If now use this then default order will not work on renderred
        columns: [
            {data: 'id', name: 'id'},
            {data: 'order_details_id', name: 'order_details_id'},
            {data: 'transaction_type', name: 'transaction_type'},
            {data: 'payment_particulars', name: 'payment_particulars'},
            {data: 'transaction_payment_gateway_type', name: 'transaction_payment_gateway_type', title: 'Payment Gateway Type'},
            {data: 'transaction_payment_gateway_track_id', name: 'transaction_payment_gateway_track_id', title: 'Payment Gateway Track ID', orderable: false},
            {data: 'transaction_amount', name: 'transaction_amount'},
            {data: 'transaction_currency', name: 'transaction_currency'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
</script>
@endsection
