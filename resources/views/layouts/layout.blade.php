<!DOCTYPE html>
<html lang="en">
<head>
    <title>Material Admin - Layouts</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{asset('css/font-awesome.min.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{asset('css/font.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{asset('css/materialadmin.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{asset('css/material-design-iconic-font.min.css')}}" rel='stylesheet' type='text/css'>
    <!-- END STYLESHEETS -->

    {{--<![endif]-->--}}
</head>

<body class="menubar-hoverable header-fixed">

<section class="section-account">
    <div class="spacer"></div>
    @yield('content')
</section>

<!-- BEGIN JAVASCRIPT -->
<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('js/spin.js/spin.min.js')}}"></script>
<script src="{{asset('js/autosize/jquery.autosize.min.js')}}"></script>
<script src="{{asset('js/nanoscroller/jquery.nanoscroller.min.js')}}"></script>
<script src="{{asset('js/source/App.js')}}"></script>
<script src="{{asset('js/source/AppNavigation.js')}}"></script>
<script src="{{asset('js/source/AppOffcanvas.js')}}"></script>
<script src="{{asset('js/source/AppCard.js')}}"></script>
<script src="{{asset('js/source/AppForm.js')}}"></script>
<script src="{{asset('js/source/AppNavSearch.js')}}"></script>
<script src="{{asset('js/source/AppVendor.js')}}"></script>
<!-- END JAVASCRIPT -->

</body>
</html>
