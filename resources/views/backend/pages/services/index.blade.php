@extends('backend.layouts.master_v2')
@section('title')
    Service List
@endsection
@section('active_breadcumbs_title')
    Service List
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-box">
                    <h4 class="page-title">Service List</h4>
                    <!-- breadcumbs -->
                @include('backend.layouts.partials.v2.breadcumbs_v2')
                <!-- end of breadcumbs -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            @if (Auth::user()->hasPermissionTo('service.create.form'))
                <div>
                    <p class="float-right">
                        <a class="btn btn-warning waves-effect waves-light text-white fl-r" href="{{ route('service.create') }}" type="button">Create service</a>
                    </p>
                </div>
            @endif
        </div>
        <div class="row">
            <!-- new data table start -->
            <div class="col-sm-12">
                <div>
                    @include('backend.layouts.partials.messages')
                </div>
                <div class="card-box table-responsive">
                    <h4 class="header-title"><b>User List</b></h4>
                    <div class="p20">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="5%">SL</th>
                                <th width="20%">Name</th>
                                <th width="20%">Description</th>
                                <th width="20%">Image</th>
                                    <th width="20%">Action</th>
                            </tr>
                            </thead>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $service->title }}</td>
                                    <td>{!! $service->description !!}</td>
                                    <td><img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" style="max-width: 100px;"></td>
                                    <td>
                                        <a class="btn btn-info text-white" href={{ route('service.edit', $service->id) }}>Edit</a>
                                        <a class="btn btn-danger text-white" href="{{ route('service.destroy', $service->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $service->id }}').submit();">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $service->id }}" action="{{ route('service.destroy', $service->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                    {{-- @endif --}}
                                </tr>
                            @endforeach
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
