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

</head>

<body class="menubar-hoverable header-fixed">

<section class="section-account">
    <div class="card contain-sm style-transparent">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <br/>
                    <span class="text-lg text-bold text-primary">MATERIAL ADMIN</span>
                    <br/><br/>
                    <form class="form floating-label" action="../../html/dashboards/dashboard.html" accept-charset="utf-8" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <label for="password">Password</label>
                            <p class="help-block"><a href="#">Forgotten?</a></p>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <div class="checkbox checkbox-inline checkbox-styled">
                                    <label>
                                        <input type="checkbox"> <span>Remember me</span>
                                    </label>
                                </div>
                            </div><!--end .col -->
                            <div class="col-xs-6 text-right">
                                <button class="btn btn-primary btn-raised" type="submit">Login</button>
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </form>
                </div><!--end .col -->
                <div class="col-sm-5 col-sm-offset-1 text-center">
                    <br><br>
                    <h3 class="text-light">
                        No account yet?
                    </h3>
                    <a class="btn btn-block btn-raised btn-primary" href="#">Sign up here</a>
                    <br><br>
                    <h3 class="text-light">
                        or
                    </h3>
                    <p>
                        <a href="#" class="btn btn-block btn-raised btn-info"><i class="fa fa-facebook pull-left"></i>Login with Facebook</a>
                    </p>
                    <p>
                        <a href="#" class="btn btn-block btn-raised btn-info"><i class="fa fa-twitter pull-left"></i>Login with Twitter</a>
                    </p>
                </div><!--end .col -->
            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
</section>

<!-- BEGIN JAVASCRIPT -->
<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
{{--<script src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>--}}
<script src="{{asset('js/spin.js/spin.min.js')}}"></script>
{{--<script src="{{asset('js/autosize/jquery.autosize.min.js')}}"></script>--}}
<script src="{{asset('js/nanoscroller/jquery.nanoscroller.min.js')}}"></script>
<script src="{{asset('js/source/App.js')}}"></script>
<script src="{{asset('js/source/AppNavigation.js')}}"></script>
<script src="{{asset('js/source/AppOffcanvas.js')}}"></script>
<script src="{{asset('js/source/AppCard.js')}}"></script>
<script src="{{asset('js/source/AppForm.js')}}"></script>
<script src="{{asset('js/source/AppNavSearch.js')}}"></script>
<script src="{{asset('js/source/AppVendor.js')}}"></script>
<!--<script src="../../assets/js/core/demo/Demo.js"></script>-->
<!--<script src="../../assets/js/core/demo/DemoLayouts.js"></script>-->
<!-- END JAVASCRIPT -->

</body>
</html>
