<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>GOENERGEE</title>
        <!--Style Sheet-->
        <link rel='stylesheet' href="/mobile-sys/styles/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/mobile-sys/styles/style.css">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-default">
            <a class="navbar-brand logo-display" href="#">
                <img src="/mobile-sys/images/logo.png" class="logoCls" alt="logo">
            </a>

            <div class="col-xs-12 col-sm-12 ">
                <form class="form-inline my-2 my-md-0">
                    <input class="form-control" type="search" placeholder="Search" id="searchForm" aria-label="Search" onkeyup="listServices()">
                </form>
                <div class="services-list-overlay" style=""></div>
            </div>
        </nav>