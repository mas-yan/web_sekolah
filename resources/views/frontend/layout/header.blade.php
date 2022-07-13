<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token">

    <title>@yield('title', 'SMK KITA SEMUA')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/')}}vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/')}}css/sb-admin-2.min.css" rel="stylesheet">
    <style>

        .bg-primary{
            background-color: #15477A !important;
        }

        .nav-nav{
            display: inline !important;
        }

        .posisi{
            position: sticky !important;
            position: -webkit-sticky !important;
            top: 0px !important; /* required */
            z-index: 9;
        }
         
        .active{
            background-color: #f7c23e !important;
            border-radius: 10px !important;
        }

        @media (min-width: 992px) { 
            .active{
                background-color: #f7c23e !important;
                border-radius: 10px 10px 0px 0px !important;
            }
        }
    </style>

    @yield('style')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
