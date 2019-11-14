@extends('masters.tenant.app')

<!-- Page Title -->
@section('title')Service @stop

<!-- Head Styles -->
@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@stop

<!-- Page Header -->
@section('header')Service @stop

<!-- Page Description -->
@section('desc')Service Dashboard @stop

<!-- Active Link -->
@section('active')Service @stop

<!-- Page Content -->
@section('content')
<div class="row">
    <div class="col-xs-12">
		<div class="box">
            <div class="box-header">
                <h3 class="box-title">List of All Service</h3>              
                <a href="{{ url('loans/create') }} " class="btn btn-primary btn-sm pull-right">Add New Service</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="xa" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Service ID</th>
                            <th>Client Name</th>
                            <th>Service Details</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>                
                        @foreach ($loans as $loan)
                            <tr>
                                <td>
                                    <a href="{{ route('loans.show', array($loan->id)) }}">ID: {{ $loan->loan_identity }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('clients.show', array($loan->client->id)) }}">{{ $loan->client->first_name }} {{ $loan->client->last_name }}</a><br>
                                    Phone Number: <b>+{{ $loan->client->phone_number }}</b>
                                </td>
                                <td>
                                    Service Type: <b>{{ $loan->type->name }}</b><br>
                                    Service Amount: <b>Tsh {{ number_format($loan->amount, 2) }}</b>
                                </td>
                                <td>
                                    Date Issued: <b>{{ Carbon::parse($loan->date_issued)->toFormattedDateString() }}</b><br>

                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info">Actions</button>
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('loans.show', array($loan->id)) }}">View Details</a></li>
                                            
                                                <li class="divider"></li>
                                                <li><a href="{{ route('loans.edit', array($loan->id)) }}">Edit Details</a></li>
                                            
                                        </ul>
                                    </div>
                                </td>
                            </tr>         
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Service ID</th>
                            <th>Client Name</th>
                            <th>Service Details</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
@stop

<!-- Page Scripts -->
@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#xa').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                "columnDefs": [
                    { "width": 200, targets: 0 }
                ],
                "fixedColumns": true
            });
        });
    </script>
@stop