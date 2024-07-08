@extends('backend.layouts.master_v2')
@section('title')
Counsellor Transaction Details
@endsection
@section('active_breadcumbs_title')
Counsellor Transaction Details
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <h4 class="page-title">Transaction Details</h4>
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
            <div>
                <!-- body -->
                <div class="card-box">
                    <div class="p20">
                        <table class="table table-Light table-custom-report">
                            <tbody>
                                @if($transactionDetails['payment_particulars'] == 'withdraw')
                                     <tr>
                                        <td>Tranction Id</td>
                                        <td>{{ $transactionDetails['data']->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Order Details Id</td>
                                        <td>{{ $transactionDetails['data']->order_details_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Trsansaction Type</td>
                                        <td>{{ $transactionDetails['data']->transaction_type }}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Particular</td>
                                        <td>{{ $transactionDetails['data']->payment_particulars }}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Gateway Type</td>
                                        <td>{{ $transactionDetails['data']->transaction_payment_gateway_type }}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Gateway Track ID</td>
                                        <td>{{ $transactionDetails['data']->transaction_payment_gateway_track_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Transaction Amount</td>
                                        <td>{{ $transactionDetails['data']->transaction_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td>Trsaction Currency</td>
                                        <td>{{ $transactionDetails['data']->transaction_currency }}</td>
                                    </tr>
                                    <tr>
                                        <td>Trsansction By User ID</td>
                                        <td>{{ $transactionDetails['data']->transaction_by_user_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Trsansaction</td>
                                        <td>{{ $transactionDetails['data']->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Transaction By User Full Name</td>
                                        <td>{{ $transactionDetails['data']->transaction_by_user_full_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Transaction By User Email</td>
                                        <td>{{ $transactionDetails['data']->transaction_by_user_email }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>Tranction Id</td>
                                        <td>{{ $transactionDetails['data']->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Order Details Id</td>
                                        <td>{{ $transactionDetails['data']->order_details_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Trsansaction Type</td>
                                        <td>{{ $transactionDetails['data']->transaction_type }}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Particular</td>
                                        <td>{{ $transactionDetails['data']->payment_particulars }}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Gateway Type</td>
                                        <td>{{ $transactionDetails['data']->transaction_payment_gateway_type }}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Gateway Track ID</td>
                                        <td>{{ $transactionDetails['data']->transaction_payment_gateway_track_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Transaction Amount</td>
                                        <td>{{ $transactionDetails['data']->transaction_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td>Trsaction Currency</td>
                                        <td>{{ $transactionDetails['data']->transaction_currency }}</td>
                                    </tr>
                                    <tr>
                                        <td>Trsansction By User ID</td>
                                        <td>{{ $transactionDetails['data']->transaction_by_user_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Call Type</td>
                                        <td>{{ $transactionDetails['data']->call_type == null ? 'Paid' : 'Free' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Counselling</td>
                                        <td>{{ $transactionDetails['data']->date_of_counselling }}</td>
                                    </tr>
                                    <tr>
                                        <td>Start Time</td>
                                        <td>{{ $transactionDetails['data']->start_time }}</td>
                                    </tr>
                                    <tr>
                                        <td>End Time</td>
                                        <td>{{ $transactionDetails['data']->end_time }}</td>
                                    </tr>
                                    <tr>
                                        <td>Booked By User Full Name</td>
                                        <td>{{ $transactionDetails['data']->booked_user_full_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Booked By User Email</td>
                                        <td>{{ $transactionDetails['data']->booked_user_email }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end body -->
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
            , ajax: "{{ route('admin.counsellor.payment.transaction.list', array('id' => request()->get('id'))) }}"
            , order: [], // this is very important. If now use this then default order will not work on renderred
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
                }
                , {
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
