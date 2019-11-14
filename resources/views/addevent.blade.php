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
    

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2"></br></br>
				<div class="panel-body">
					<h1>Add to do task </h1>
					<form method="POST" action="{{ action('EventController@store') }}">
						{{csrf_field()}}
						<label for="">Enter Task</label>
						<input type="text" class="form-control" name="title" placeholder="Enter name"/></br></br>
						<label for="color"> Enter color </label>
						<input type="color" class="form-control" name="color" placeholder="Enter color"/></br></br>
						<label for="Enter Start data task"></label>
						<input type="date" class="form-control" name="color" placeholder="Enter Start Date"/></br></br>
						<label for="Enter End data task"></label>
						<input type="date" class="form-control" name="color" placeholder="Enter end Date"/></br></br>

						<input type="submit" name="submit" class="btn btn-primary" value= "Add Event data">
					</form>
				</div>
			</div>
		</div>
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