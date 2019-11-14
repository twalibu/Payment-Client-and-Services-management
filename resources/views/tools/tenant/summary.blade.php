@extends('masters.tenant.app')

<!-- Page Title -->
@section('title')Executive Summary @stop

<!-- Head Styles -->
@section('styles')
    <!-- Date Range Picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
@stop

<!-- Page Header -->
@section('header')Executive Summary @stop

<!-- Page Description -->
@section('desc')Executive Summary @stop

<!-- Active Link -->
@section('active')Executive Summary @stop

<!-- Page Content -->
@section('content')
    <!-- First Row -->
    <div class="row">
        <div class="col-lg-4 col-xs-12">
        <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $tenant->clients->count() }} {{ str_plural('Client', $tenant->clients->count()) }}</h3>
                    <p>Total clients we manage </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
                <a href="{{ url('clients') }}" class="small-box-footer">Manage Clients <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-4 col-xs-12">
        <!-- small box -->
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>{{ $tenant->loans->count() }} {{ str_plural('Service', $tenant->loans->count()) }}</h3>
                    <p>Total Services we deliver ( Tracking & Fuel )</p>
                </div>
                <a href="{{ url('loans')  }}" class="small-box-footer">Manage Services <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->


        <div class="col-lg-4 col-xs-12">
        <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ $tenant->staff->count() }} {{ str_plural('Staff', $tenant->staff->count()) }}</h3>
                    <p>Total ATMS Staff</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people"></i>
                </div>
                <a href="{{ url('staff') }}" class="small-box-footer">Manage Staff <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->

    <!-- Second Row -->
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                   <strong><h3 class="box-title">Total Payments Per Service Type</h3></strong> 
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!-- @foreach($tenant->loanTypes as $type) -->
                        
                            <!-- {{ $loan_amount = 0 }} -->
                            <!-- {{ $total_paid = 0 }} -->
                            <!-- {{ $total_overwrite = 0 }} -->

                            <!-- @foreach($type->loans as $loan) -->
                                <!-- @if($loan->summary->status == 'Active') --><!-- 
                                    {{ $loan_amount += $loan->summary->principal }} -->
                                    <!-- {{ $total_paid += $loan->amount }} --><!-- 
                                    {{ $total_overwrite += $loan->summary->overwrite }} -->
                                <!-- @endif -->
                            <!-- @endforeach --> 
                       
                        <u><strong><i class="fa fa-square margin-r-5"></i>{{ $type->name }}</strong></u>
                        <p class="text-muted"><b>Total Services:</b> {{ number_format($type->loans->count()) }} {{ str_plural('Service', $type->loans->count()) }} ~ <small><b>Duration: {{ number_format($type->duration) }} {{ str_plural('Month', $type->duration) }} </small></p>
                        <p class="text-muted"><b>Total Paid Amount:</b> Tsh {{ number_format($total_paid, 2) }} /=</p>
                        <hr>
                    <!-- @endforeach  -->  

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->


        <!-- Third row -->
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <!-- Calendar -->
                <div class="box box-solid bg-green-gradient">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Calendar</h3>                    
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div><!-- /.box-body -->                
                </div><!-- /.box -->
        </div><!-- End of right col -->
    </div>
@stop

<!-- Page Scripts -->
@section('scripts')

<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(function () {
            //The Calender
            $('#calendar').datepicker({
                todayHighlight: true
            });
        });
    </script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script>
        $(function () {
            $('#daterange').daterangepicker(
                {
                    ranges: {
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                        'Last Three Month': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    $('#report_start').val(start.format('YYYY-MM-DD'));
                    $('#report_end').val(end.format('YYYY-MM-DD'));
                }
            );
        });
    </script>
@stop