@extends('backend.layouts.master_v2')
@section('title')
Counsellor Lists
@endsection
@section('active_breadcumbs_title')
Counsellor Lists
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <h4 class="page-title">Counsellor Lists</h4>
                <!-- breadcumbs -->
                @include('backend.layouts.partials.v2.breadcumbs_v2')
                <!-- end of breadcumbs -->
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->
    {{-- <div class="row">
        @if (Auth::user()->hasPermissionTo('counsellor.user.new.account.request'))
        <div>
            <p class="float-right">
                <a class="btn btn-warning waves-effect waves-light text-white fl-r" href="{{ route('users.create') }}" type="button">Create User</a>
    </p>
</div>
@endif
</div> --}}
<div class="row">
    <!-- new data table start -->
    <div class="col-sm-12">
        <div>
            @include('backend.layouts.partials.messages')
        </div>
        <div class="card-box table-responsive">
            <h4 class="header-title"><b>Counsellor List</b></h4>
            <div class="p20">
                <table class="table table-bordered data-table" id="datatable">
                    <thead>
                        <tr>
                            <th>User id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Ratings</th>
                            <th>Created</th>
                            <th>Documents Info</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Details</th>
                            <th>edit</th>
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
        //var table = $('.data-table').DataTable({
        table = $('.data-table').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route('admin.counsellor.account.lists.all') }}",

            order: [], // this is very important. If now use this then default order will not work on renderred

            columns: [{
                    data: 'id'
                    , name: 'id'
                    , title: "ID"
                }
                , {
                    data: 'name'
                    , name: 'name'
                    , title: "Name"
                }
                , {
                    data: 'email'
                    , name: 'email'
                    , title: "Email"
                }
                , {
                    data: 'ratings_value'
                    , name: 'ratings_value'
                    , title: "Ratings"
                    , searchable: false
                }
                , {
                    data: 'created'
                    , name: 'created'
                    , title: "Created Time"
                }
                ,{
                    data: 'documents'
                    , name: 'documents'
                    , title: "Documents View"
                    , orderable: false
                    , searchable: false
                }
                , {
                    data: 'status'
                    , name: 'status'
                    , title: "Status"
                    , orderable: false
                    , searchable: false
                }
                , {
                    data: 'action'
                    , name: 'action'
                    , title: "Action"
                    , orderable: false
                    , searchable: false
                }
                , {
                    data: 'details'
                    , name: 'details'
                    , title: "Details"
                    , orderable: false
                    , searchable: false
                }
                , {
                    data: 'edit'
                    , name: 'edit'
                    , title: "Edit"
                    , orderable: false
                    , searchable: false
                }
            , ],
            responsive: true
        });
    });
    /**
     * Processing the ajax request of grid list of counsellor
     */
    function statusProcessOfCounsellor(e) {
        //let stateChangeVariableData = $('.counsellor-state-drop-down-' + e.getAttribute('data-user-id') + " option:selected").val();
        //console.log(stateChangeVariableData);
        let isConfirm = confirm("Are you sure want to do this action for this user?");
        if (isConfirm === true) {
            console.log(table);

            $.ajax({
                    url: "{{ route('admin.counsellor.account.step.process.ajax') }}"
                    , type: "POST"
                    , data: {
                        id: e.getAttribute('data-user-id')
                        , _token: "{{csrf_token()}}"
                        , status: $('.counsellor-state-drop-down-' + e.getAttribute('data-user-id') + " option:selected").val()
                    }
                    , dataType: "json"
                })
                .done(function(dataObj) {
                    console.log(dataObj);
                    if(dataObj.isSuccess !== undefined && dataObj.isSuccess === true) {
                        alert(dataObj.message);
                        if (dataObj.data.isDeleteTrigger !== undefined && dataObj.data.isDeleteTrigger === true) {
                            // deleting row
                            table.row($('#row-index-by-counsellor-id-' + e.getAttribute('data-user-id'))).remove().draw();
                            //alert(dataObj.message);
                        }
                    }
                });
        }
    }
</script>
@endsection
