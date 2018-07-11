<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{$settings->site_name}}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/crumina-fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/grid.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/styles.css') }}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/primary-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/magnific-popup.css') }}">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="app/css/rtl.css">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <style>
        .padded-50{
            padding: 40px;
        }
        .text-center{
            text-align: center;
        }
    </style>

</head>


<body class=" ">

<div class="content-wrapper">

    @include('includes.header')

    <div class="header-spacer"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @include('includes.posts.first_post')
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                @include('includes.posts.second_post')
            </div>
            <div class="col-lg-6">
                @include('includes.posts.third_post')
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                    @include('includes.sub_categories.first_category')
                <div class="padded-50"></div>
                    @include('includes.sub_categories.second_category')
            </div>
            </div>
        </div>
    </div>

<!-- Subscribe Form -->

<div class="container-fluid bg-green-color">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="subscribe scrollme">
                    <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                        <h4 class="subscribe-title">Email Newsletters!</h4>
                        <form class="subscribe-form" method="post" action="">
                            <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">
                            <button class="subscr-btn">subscribe
                                <span class="semicircle--right"></span>
                            </button>
                        </form>
                        <div class="sub-title">Sign up for new Seosignt content, updates, surveys & offers.</div>

                    </div>

                    <div class="images-block">
                        <img src="app/img/subscr-gear.png" alt="gear" class="gear">
                        <img src="app/img/subscr1.png" alt="mail" class="mail">
                        <img src="app/img/subscr-mailopen.png" alt="mail" class="mail-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Subscribe Form -->
</div>



@include('includes.footer')