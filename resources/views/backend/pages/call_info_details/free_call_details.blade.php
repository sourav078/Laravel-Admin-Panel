@extends('backend.layouts.master_v2')
@section('title')
Free Call Details
@endsection
@section('active_breadcumbs_title')
Free Call Details
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <h4 class="page-title">Free Call Details</h4>
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
                <h4 class="header-title"><b>Free Call Details</b></h4>
                <table class="table table-Light table-custom-report">
                    <tbody>
                        <tr>
                            <td>Id</td>
                            <td>{{ $call_details->id }}</td>
                        </tr>
                        <tr>
                            <td>Book Id</td>
                            <td>{{ $call_details->book_id }}</td>
                        </tr>
                        <tr>
                            <td>Start Time</td>
                            <td>{{ $call_details->start_time }}</td>
                        </tr>
                        <tr>
                            <td>End Time</td>
                            <td>{{ $call_details->end_time }}</td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td>{{ $call_details->duration }}</td>
                        </tr>
                        <tr>
                            <td>Call Type</td>
                            <td>{{ $call_details->call_type }}</td>
                        </tr>
                        <tr>
                            <td>Request Date</td>
                            <td>{{ $call_details->request_date }}</td>
                        </tr>
                        <tr>
                            <td>Free Call Booked By User Id</td>
                            <td>{{ $call_details->booked_user_id }}</td>
                        </tr>
                        <tr>
                            <td>Free Call Booked By User Full Name</td>
                            <td>{{ $call_details->booked_user_full_name }}</td>
                        </tr>
                        <tr>
                            <td>Free Call Booked By User Email</td>
                            <td>{{ $call_details->booked_user_email }}</td>
                        </tr>
                        <tr>
                            <td>Free Call Booked By User Mobile Number</td>
                            <td>{{ $call_details->transaction_by_user_mobile_number }}</td>
                        </tr>
                        <tr>
                            <td>Free Call Counsellor Mobile Number</td>
                            <td>{{ $call_details->transaction_to_user_mobile_number }}</td>
                        </tr>
                        <tr>
                            <td>Free Call Counsellor User Id</td>
                            <td>{{ $call_details->transaction_to_user_id }}</td>
                        </tr>
                        <tr>
                            <td>Free Call Counsellor User Full Name</td>
                            <td>{{ $call_details->transaction_to_user_full_name }}</td>
                        </tr>
                        <tr>
                            <td>Free Call Counsellor User Email</td>
                            <td>{{ $call_details->transaction_to_user_email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- new data table end -->
    </div>
</div> <!-- container -->
@endsection
