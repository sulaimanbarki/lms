<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- favicon -->
    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/png">

    <!-- bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- you're welcome 3 -->


    {{-- Google Fronds --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">


    <!-- Add custom css  -->
    <link rel="stylesheet" href="{{ asset('css/frondend/style.css') }}">

    <!-- Title config(app.name) -->
    <title>{{ config('app.name') }}</title>
    {{-- <title>Document</title> --}}


    <style>
        .topimage {
            background-image: url('{{asset('images/top2.png')}}');
            margin-left: -15px;
            /* padding: 3rem; */
            width: 105vw;
            margin-left: -2px;
            overflow: hidden;
            background-repeat: no-repeat;
            background-size: cover;
            height: 80vh !important;
        }
    </style>
</head>
