@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'ATMS | ATMS Projection!',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

        <p>
            Hello,
        </p>

        <p>
            A Client is interested in get a service from your organisation (<b>{{ $tenant }}</b>). Below is the information of the service inquired.
        </p>

        <p>
            <b><u>Armotisation Details:-</u></b><br>
            <b>Full Name: </b>{{ $full_name }}<br>
            <b>Phone Number: </b>+{{ $phone_number }}<br>
            <b>service Type: </b>{{ $loan_type }}<br>
            <b>service Amount: </b>Tsh {{ $amount }}/-<br>
            <b>Total Interest: </b>Tsh {{ $total_interest }}/-<br>
            <b>Total Repayment: </b>Tsh {{ $total_repayment }}/-<br>
            <b>Total Principal: </b>Tsh {{ $total_principal }}/-<br>
            <b>Monthly Payment: </b>Tsh {{ $monthly }}/-<br>
            <b>Service Insurance: </b>Tsh {{ $insurance }}/-
        </p>

        <p>
            Thank you for using Service Platform. If you need any help please send as an sms to our Tech Support Number: <b>{{ $tech_support }}</b> and we will call you right back.
        </p>

        @include('beautymail::templates.sunny.contentEnd')

        @include('beautymail::templates.sunny.contentStart')

        <p>
            Thank you.<br> <b>ATMS Team!</b>
        </p>

    @include('beautymail::templates.sunny.contentEnd')

@stop