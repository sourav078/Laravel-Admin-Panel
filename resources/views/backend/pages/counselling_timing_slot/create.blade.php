@extends('backend.layouts.master_v2')
@section('title')
Counselling Time Create
@endsection
@section('active_breadcumbs_title')
Counselling Time Create
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <h4 class="page-title">Counselling Time Create</h4>
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
                <h4 class="header-title">Counselling Time Create</h4>
                <div class="p20">
                    <div>
                        @include('backend.layouts.partials.messages')
                        <form action="{{ route('counselling_time_slot.store') }}" method="POST" class="p20" enctype="multipart/form-data">
                            @csrf
                            <div class="form">
                                <div class="form-group">
                                    <label for="txtStartTime">Counselling Start Time</label>
                                    <input type="text" name="start_time" id="txtStartTime" class="form-control" placeholder="Start Time" />
                                    <span>Format is : HOURS:Minitues (means this is 24hours time format)</span>
                                </div>
                                <div class="form-group">
                                    <label for="txtEndTime">Counselling End Time</label>
                                    <input type="text" name="end_time" id="txtEndTime" class="form-control" placeholder="End Time" />
                                    <span>Format is : HOURS:Minitues (means this is 24hours time format)</span>
                                </div>
                                <div class="form-group">
                                    <div class="btn-group" role="group" aria-label="Time slot enable or disble">
                                        <input type="radio" class="btn-check" name="status" id="btnTimeSlotActive" autocomplete="off" value="1" checked>
                                        <label class="btn btn-outline-primary" for="btnTimeSlotActive">Active</label>

                                        <input type="radio" class="btn-check" name="status" id="btnTimeSlotDeActive" autocomplete="off" value="0">
                                        <label class="btn btn-outline-primary" for="btnTimeSlotDeActive">Deactive</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Slot</button>
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
