@extends('backend.layouts.master_v2')
@section('title')
Counsellilg Interest Category Lists
@endsection
@section('active_breadcumbs_title')
Counsellilg Interest Category Lists
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <h4 class="page-title">Counsellilg Interest Category Lists</h4>
                <!-- breadcumbs -->
                @include('backend.layouts.partials.v2.breadcumbs_v2')
                <!-- end of breadcumbs -->
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        @if (Auth::user()->hasPermissionTo('counselling.interest.category.create.form.view'))
        <div>
            <p class="float-right">
                <a class="btn btn-warning waves-effect waves-light text-white fl-r" href="{{ route('counselling_interest_category.create') }}" type="button">Create Counsellilg Interest Category</a>
            </p>
        </div>
        @endif
    </div>
    <div class="row">
        <!-- new data table start -->
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="header-title"><b>Counselling Interest Category List</b></h4>
                <div class="p20">
                    @include('backend.layouts.partials.messages')
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">SL</th>
                                <th width="5%">Original ID</th>
                                <th width="60%">Interest Name</th>
                                <th width="60%">Is Featurd</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($counselling_interests_collection as $row)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->category_name }}</td>
                                <td>@if($row->is_featured == 1) Yes @else No @endif</td>
                                <td>
                                    <a class="btn btn-info text-white" href={{ route('counselling_interest_category.edit', $row->id) }}>Edit</a>
                                    <a class="btn btn-danger text-white" href="{{ route('counselling_interest_category.destroy', $row->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $row->id }}').submit();">Delete</a>
                                    <form id="delete-form-{{ $row->id }}" action="{{ route('counselling_interest_category.destroy', $row->id) }}" method="POST" style="display: none;">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
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
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

</script>
@endsection
