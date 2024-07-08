@extends('backend.layouts.master_v2')
@section('title')
Counsellilng Time Edit
@endsection
@section('active_breadcumbs_title')
Counsellilng Time Edit
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <h4 class="page-title">Counselling Time Edit Form</h4>
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
                <h4 class="header-title"><b>Counselling Time Edit Form</b></h4>
                <div class="p20">
                    <div>
                        @include('backend.layouts.partials.messages')
                        <!-- main form start -->
                        <form action="{{ route('counselling_time_slot.update', $counsellingTimeSlotModel->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form">
                                <div class="form-group">
                                    <label for="txtStartTime">Counselling Time Start Time</label>
                                    <input type="text" name="start_time" id="txtStartTime" class="form-control" placeholder="Start Time" value="{{ $counsellingTimeSlotModel->start_time }}" />
                                </div>
                                <div class="form-group">
                                    <label for="txtEndTime">Counselling Time End Time</label>
                                    <input type="text" name="end_time" id="txtEndTime" class="form-control" placeholder="End Time" value="{{ $counsellingTimeSlotModel->end_time }}" />
                                </div>
                                <div class="form-group">
                                    <div class="btn-group" role="group" aria-label="Time slot enable or disble">

                                        <input type="radio" class="btn-check" name="status" id="btnTimeSlotActive" autocomplete="off" value="1" @if($counsellingTimeSlotModel->status == 1) checked @endif>
                                        <label class="btn btn-outline-primary" for="btnTimeSlotActive">Active</label>

                                        <input type="radio" class="btn-check" name="status" id="btnTimeSlotDeActive" autocomplete="off" value="0" @if($counsellingTimeSlotModel->status == 0) checked @endif>
                                        <label class="btn btn-outline-primary" for="btnTimeSlotDeActive">Deactive</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Edit Time Slot</button>
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
