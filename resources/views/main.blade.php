<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo.png') }}" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/myStyle.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>สอบครูผูัช่วยออนไลน์</title>
</head>
<body>
    <div id="app">
        <menu-component></menu-component>
        @yield('content')
    </div>
    <div id="footer" class="container footer text-center">
        <share-component></share-component>
        <p style="font-size: 12px; color:gray">Copyright © 2019 CHONLATEE SINSART</p>
    </div>
    <script src="js/app.js"></script>
</body>
</html>