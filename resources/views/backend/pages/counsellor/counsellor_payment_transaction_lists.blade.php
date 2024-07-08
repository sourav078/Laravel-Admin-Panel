@extends('backend.layouts.master_v2')
@section('title')
Counsellor Payment Transaction Lists
@endsection
@section('active_breadcumbs_title')
Counsellor Payment Transaction Lists
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
            <div class="balance-info-admin">
                @if($totalBalanceInformation)
                <h4>Total balance</h4>
                    <ul>
                        @foreach($totalBalanceInformation as $row)
                            <li><div class="alert alert-secondary">Currency : <strong>{{ $row['transaction_currency'] }}</strong> Amount : <strong>{{ $row['total_amount'] }}</strong></div></li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <h4 class="header-title"><b>Trsaction List</b></h4>
            <div class="p20">
                <table class="table table-bordered data-table" id="datatable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Transaction Type</th>
                            <th>Payment Particulars</th>
                            <th>Transaction Payment Gateway Type</th>
                            <th>Transaction amount</th>
                            <th>Transaction Currency</th>
                            <th>Created Time</th>
                            <th>Details</th>
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
    var table;
    $(function() {
        $.fn.dataTable.ext.errMode = 'throw';
        table = $('.data-table').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route('admin.counsellor.payment.transaction.list', array('id' => request()->get('id'))) }}",
            order: [], // this is very important. If now use this then default order will not work on renderred
            columns: [{
                    data: 'id'
                    , name: 'id'
                    , title: "ID"
                }
                , {
                    data: 'transaction_type'
                    , name: 'transaction_type'
                    , title: "Transaction Type"
                }
                , {
                    data: 'payment_particulars'
                    , name: 'payment_particulars'
                    , title: "Payment Particulars"
                }
                , {
                    data: 'transaction_payment_gateway_type'
                    , name: 'transaction_payment_gateway_type'
                    , title: "Transaction Payment Gateway Type"
                }, //transaction_amount
                {
                    data: 'transaction_amount'
                    , name: 'transaction_amount'
                    , title: "Transaction Amount"
                },
                {
                    data: 'transaction_currency'
                    , name: 'transaction_currency'
                    , title: "Transaction Currency"
                }
                , {
                    data: 'created'
                    , name: 'created'
                    , title: "Created Time"
                }
                , {
                    data: 'details'
                    , name: 'details'
                    , title: "Details"
                    , orderable: false
                    , searchable: false
                }
            ],
            //responsive: true
        });
    });
</script>
@endsection
