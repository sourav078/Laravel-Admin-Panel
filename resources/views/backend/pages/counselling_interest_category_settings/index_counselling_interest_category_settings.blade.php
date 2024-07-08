@extends('backend.layouts.master_v2')
@section('title')
Counsellilg Interest Category Settings List
@endsection
@section('active_breadcumbs_title')
Counsellilg Interest Category Settings Lists
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <h4 class="page-title">Counsellilg Interest Category Settings Lists</h4>
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
                <h4 class="header-title"><b>Counselling Interest Category Settings</b></h4>
                <div class="p20">
                    @include('backend.layouts.partials.messages')
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">SL</th>
                                <th width="5%">Original ID</th>
                                <th width="60%">Settings Name</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-settings-row">
                            @foreach ($counselling_interests_settings_collection as $row)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->list_view_priority }}</td>
                                <td class="active_status_col">
                                    {{-- <input type="hidden" class="hdnSettingsId" data-id="{{ $row->id }}" /> --}}
                                    @if($row->active_status == 1)
                                        <input type="radio" class="radActiveStatus" name="active_status" value="{{ $row->id }}" checked/>
                                    @else
                                        <input type="radio" class="radActiveStatus" name="active_status" value="{{ $row->id }}" />
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="">
                        <button class="btn btn-primary" onclick="javascript:update_interest_settings()">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- new data table end -->
    </div>
</div> <!-- container -->
@endsection
@section('after_domready_script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

    function update_interest_settings() {
        var selectedActiveStatus = $("input[name='active_status']:checked").val();
        if (selectedActiveStatus !== undefined) {
            $.ajax({
                url: "{{ route('admin.counsellor.interest.category.settings') }}",
                dataType: "json",
                data: {
                    'settings_id': selectedActiveStatus
                }
            }).done(function() {
                console.log("END");
            });
        }
    }

</script>
@endsection
