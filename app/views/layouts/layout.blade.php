<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('meta-title', 'Auction')</title>

    <!-- Bootstrap core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <!-- jquery link-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    </head>

    <body style="padding-top: 50px;">

      @include('layouts/partials/navbar')

    <div class="container">

    @yield('content')

    </div>

    <!-- Placed at the end of the document so the pages load faster. ideally should placed in footer -->
    
    <!-- <script src="../../dist/js/bootstrap.min.js"></script> -->
    <!-- <script src="/js/Main.js"></script> --> 
   
@include('layouts/partials/footer');
