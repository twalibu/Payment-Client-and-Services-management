@extends('masters.tenant.app')

<!-- Page Title -->
@section('title')Dashboard @stop

<!-- Head Styles -->
@section('styles')
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@stop

<!-- Page Header -->
@section('header')Dashboard @stop

<!-- Page Description -->
@section('desc')Service Dashboard @stop

<!-- Active Link -->
@section('active')Dashboard @stop

<!-- Page Content -->
@section('content')
    <!-- Small boxes Section -->
    <div class="row">
        <div class="col-lg-6 col-xs-12">
        <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ $tenant->loans->count() }} Total number of </br> Servives.</h3>
                    <p>Total number service we delivered (Tracking & Fuels) to clients.</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cube"></i>
                </div>
                <a href="{{ url('/loans') }}" class="small-box-footer">Manage Services. <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-6 col-xs-12">    
        <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $tenant->clients->count() }} Clients</h3>
                    <p>Total number clients we have.</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{ url('clients')  }}" class="small-box-footer">Manage Clients <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->
    
    <!-- Second row -->
    <div class="row">
        <div class="col-lg-6 col-xs-12">
           <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Summary Per Service Type</h3>
                </div><!-- /.box-header -->
                <div class="box-body"><!-- 
                    @foreach($tenant->loanTypes as $type)
                        
                            {{ $loan_amount = 0 }}
                            {{ $total_paid = 0 }}
                            {{ $total_overwrite = 0 }}

                            @foreach($type->loans as $loan)
                                @if($loan->summary->status == 'Active')
                                    {{ $total_paid += $loan->amount }}
                                    {{ $total_overwrite += $loan->summary->overwrite }}
                                @endif
                            @endforeach  
 -->                       
                        <u><strong><i class="fa fa-square margin-r-5"></i>{{ $type->name }}</strong></u>
                        <p class="text-muted"><b>Total Services:</b> {{ number_format($type->loans->count()) }} {{ str_plural('Service', $type->loans->count()) }} ~ <small><b>Duration: {{ number_format($type->duration) }} {{ str_plural('Month', $type->duration) }} </small></p>
                        <p class="text-muted"><b>Total Paid Amount:</b> Tsh {{ number_format($total_paid, 2) }}/-</p>
                        <hr>
                    <!-- @endforeach   --> 
                </div><!-- /.box-body -->
            </div><!-- /.box -->   
        </div><!-- end of left col -->

        <div class="col-lg-6 col-xs-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <p><strong>Whoops!</strong> There were some problems with your input.</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- General Report -->     
        </div>
    </div>

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
    <!-- datepicker -->
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(function () {
            //The Calender
            $('#calendar').datepicker({
                todayHighlight: true
            });
        });
    </script>
@stop