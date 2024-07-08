@extends('backend.layouts.master_v2')
@section('title')
Transaction Details
@endsection
@section('active_breadcumbs_title')
Transaction Details
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
                                <tr>
                                    <td>Tranction Id</td>
                                    <td>{{ $transactionDetails->id }}</td>
                                </tr>
                                <tr>
                                    <td>Order Details Id</td>
                                    <td>{{ $transactionDetails->order_details_id }}</td>
                                </tr>
                                <tr>
                                    <td>Trsansaction Type</td>
                                    <td>{{ $transactionDetails->transaction_type }}</td>
                                </tr>
                                <tr>
                                    <td>Payment Particular</td>
                                    <td>{{ $transactionDetails->payment_particulars }}</td>
                                </tr>
                                <tr>
                                    <td>Payment Gateway Type</td>
                                    <td>{{ $transactionDetails->transaction_payment_gateway_type }}</td>
                                </tr>
                                <tr>
                                    <td>Payment Gateway Track ID</td>
                                    <td>{{ $transactionDetails->transaction_payment_gateway_track_id }}</td>
                                </tr>
                                <tr>
                                    <td>Transaction Amount</td>
                                    <td>{{ $transactionDetails->transaction_amount }}</td>
                                </tr>
                                <tr>
                                    <td>Trsaction Currency</td>
                                    <td>{{ $transactionDetails->transaction_currency }}</td>
                                </tr>
                                <tr>
                                    <td>Trsansction By User Full Name</td>
                                    <td>{{ $transactionDetails->transaction_by_user_full_name }}</td>
                                </tr>
                                 <tr>
                                    <td>Trsansction By User Email</td>
                                    <td>{{ $transactionDetails->transaction_by_user_email }}</td>
                                </tr>
                                 <tr>
                                    <td>Trsansction By User Mobile Number</td>
                                    <td>{{ $transactionDetails->transaction_by_user_mobile_number }}</td>
                                </tr>
                                 <tr>
                                    <td>Trsansction To User Full Name</td>
                                    <td>{{ $transactionDetails->transaction_to_user_full_name }}</td>
                                </tr>
                                <tr>
                                    <td>Trsansaction to User Email</td>
                                    <td>{{ $transactionDetails->transaction_to_user_email }}</td>
                                </tr>
                                <tr>
                                    <td>Transaction To User Mobile Number</td>
                                    <td>{{ $transactionDetails->transaction_to_user_mobile_number }}</td>
                                </tr>
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
