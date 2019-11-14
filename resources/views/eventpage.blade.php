
<!DOCTYPE html>
<html>
<head>
    <title></title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
</head>
<body>

    <div class="container"></br>
        <h1>Task Calender</h1>
   <div class="row">
       <a href="/addeventurl" class="btn btn-success">Add to do task</a>
       <a href="/editeventurl" class="btn btn-primary">Edit to do task</a>
       <a href="/deleteeventurl" class="btn btn-danger">Delete to do task</a>
   </div>
</br>
    <div class="row">
           @if(count($errors) > 0)
           <div class="alert alert-danger">
               <ul>
                   @foreach($errors->all() as $error)
                   <li>{{$error}}</li>
                   @foreach
               </ul>
           </div>
           @endif

           @if(\Session::has('success'))
             <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>   
             </div>
             @endif

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #2e6da4; color: white;">
                    TO DO LIST CALENDER   
                </div>
                <div class="panel-body" >
            {!! $calendar->calendar() !!}
            {!! $calendar->script() !!}
            </div>   
            </div>   
        </div>
    </div>
</div> 
</body>
</html>
