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

<body class="menubar-hoverable header-fixed menubar-pin">

<!-- BEGIN HEADER-->
<header id="header" >
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                @if(Auth::user())
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                @endif
                <li class="header-nav-brand" >
                    <div class="brand-holder">
                        <a href="/">
                            <span class="text-lg text-bold text-primary">PORTAL</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            @if (\Illuminate\Support\Facades\Auth::guest())
                <ul class="header-nav header-nav-options">
                    <li><a href="{{ url('/login') }}"><button type="submit" class="btn btn-block btn-raised btn-primary">Đăng nhập</button></a></li>
                    <li><a href="{{ url('/register') }}"><button type="submit" class="btn btn-block btn-raised btn-warning">Đăng ký</button></a></li>
                </ul>
            @else
                <ul class="header-nav header-nav-options">
                    <li>
                        <form class="navbar-search" role="search" method="get" action="/search">
                            <div class="form-group">
                                <input type="text" class="form-control" name="query" placeholder="Tìm kiếm bạn bè, doanh nghiệp, ...">
                            </div>
                            <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                        </form>
                        <!-- Search form -->
                    </li>
                </ul>
                <ul class="header-nav header-nav-options">
                    <li class="dropdown hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                            <i class="fa fa-bell"></i><sup class="badge style-danger">4</sup>
                        </a>
                        <ul class="dropdown-menu animation-expand">
                            <li class="dropdown-header">Today's messages</li>
                            <li>
                                <a class="alert alert-callout alert-warning" href="javascript:void(0);">
                                    <img class="pull-right img-circle dropdown-avatar" src="../../assets/img/avatar2.jpg?1404026449" alt="" />
                                    <strong>Alex Anistor</strong><br/>
                                    <small>Testing functionality...</small>
                                </a>
                            </li>
                            <li>
                                <a class="alert alert-callout alert-info" href="javascript:void(0);">
                                    <img class="pull-right img-circle dropdown-avatar" src="../../assets/img/avatar3.jpg?1404026799" alt="" />
                                    <strong>Alicia Adell</strong><br/>
                                    <small>Reviewing last changes...</small>
                                </a>
                            </li>
                            <li class="dropdown-header">Options</li>
                            <li><a href="../../html/pages/login.html">View all messages <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                            <li><a href="../../html/pages/login.html">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                    <li class="dropdown hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                            <i class="fa fa-area-chart"></i>
                        </a>
                        <ul class="dropdown-menu animation-expand">
                            <li class="dropdown-header">Server load</li>
                            <li class="dropdown-progress">
                                <a href="javascript:void(0);">
                                    <div class="dropdown-label">
                                        <span class="text-light">Server load <strong>Today</strong></span>
                                        <strong class="pull-right">93%</strong>
                                    </div>
                                    <div class="progress"><div class="progress-bar progress-bar-danger" style="width: 93%"></div></div>
                                </a>
                            </li><!--end .dropdown-progress -->
                            <li class="dropdown-progress">
                                <a href="javascript:void(0);">
                                    <div class="dropdown-label">
                                        <span class="text-light">Server load <strong>Yesterday</strong></span>
                                        <strong class="pull-right">30%</strong>
                                    </div>
                                    <div class="progress"><div class="progress-bar progress-bar-success" style="width: 30%"></div></div>
                                </a>
                            </li><!--end .dropdown-progress -->
                            <li class="dropdown-progress">
                                <a href="javascript:void(0);">
                                    <div class="dropdown-label">
                                        <span class="text-light">Server load <strong>Lastweek</strong></span>
                                        <strong class="pull-right">74%</strong>
                                    </div>
                                    <div class="progress"><div class="progress-bar progress-bar-warning" style="width: 74%"></div></div>
                                </a>
                            </li><!--end .dropdown-progress -->
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                </ul><!--end .header-nav-options -->
                <ul class="header-nav header-nav-profile">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                            @if(Auth::user()['avatar']=="" || Auth::user()['avatar']==null)
                                <img src="{{asset('img/avatar1.jpg')}}" alt="" />
                            @else
                                <img src="{{asset('upload/avatar/'.Auth::user()['avatar'])}}" alt="" />
                            @endif
                            <span class="profile-info">
                                {{Auth::user()->name}}
                                <small>
                                    @if(Auth::user()['role_id']==1)
                                        Quản trị viên
                                    @elseif(Auth::user()['role_id']==2)
                                        Sinh viên
                                    @else
                                        Doanh nghiệp
                                    @endif
                                </small>
                            </span>
                        </a>
                        <ul class="dropdown-menu animation-dock">
                            <li><a href="{{ url('/setting') }}"><i class="fa fa-btn fa-cog"></i> Cài đặt</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-fw fa-power-off text-danger"></i> Đăng xuất</a></li>
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                </ul><!--end .header-nav-profile -->
            @endif
        </div><!--end #header-navbar-collapse -->
    </div>
</header>
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas"></div>
    <!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->


    <!-- BEGIN CONTENT-->
    <div id="content">

        <!-- BEGIN LIST SAMPLES -->
        <section>
            <div class="section-body contain-lg">
                @yield('content')
            </div><!--end .section-body -->
        </section>
    </div><!--end #content-->
    <!-- END CONTENT -->

    <!-- BEGIN MENUBAR-->
    @if(Auth::user())
    <div id="menubar" class="menubar-inverse">
        <div class="menubar-fixed-panel">
            <div>
                <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="expanded">
                <a href="/">
                    <span class="text-lg text-bold text-primary ">PORTAL</span>
                </a>
            </div>
        </div>
        <div class="menubar-scroll-panel">

            <!-- BEGIN MAIN MENU -->
            <ul id="main-menu" class="gui-controls">

                <!-- BEGIN GROUP -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="fa fa-group"></i></div>
                        <span class="title">Nhóm</span>
                    </a>
                    <ul>
                        <li><a href="/group"><span class="title">Nhóm của bạn</span></a></li>
                        <li><a href="/group/create"><span class="title">Tạo nhóm mới</span></a></li>
                        <li><a href="#"><span class="title">Khám phá</span></a></li>
                    </ul>
                </li><!--end /menu-li -->
                <!-- END GROUP -->

                <!-- BEGIN ENTERPRISE -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="md md-work"></i></div>
                        <span class="title">Công ty</span>
                    </a>
                    <ul>
                        <li><a href="/enterprise"><span class="title">Doanh nghiệp đã thích</span></a></li>
                        <li><a href="#"><span class="title">Khám phá</span></a></li>
                    </ul>
                </li><!--end /menu-li -->
                <!-- END GROUP -->

                <!-- BEGIN LEVELS -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="fa fa-folder-open fa-fw"></i></div>
                        <span class="title">Menu levels demo</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="#"><span class="title">Item 1</span></a></li>
                        <li><a href="#"><span class="title">Item 1</span></a></li>
                        <li class="gui-folder">
                            <a href="javascript:void(0);">
                                <span class="title">Open level 2</span>
                            </a>
                            <!--start submenu -->
                            <ul>
                                <li><a href="#"><span class="title">Item 2</span></a></li>
                                <li class="gui-folder">
                                    <a href="javascript:void(0);">
                                        <span class="title">Open level 3</span>
                                    </a>
                                    <!--start submenu -->
                                    <ul>
                                        <li><a href="#"><span class="title">Item 3</span></a></li>
                                        <li><a href="#"><span class="title">Item 3</span></a></li>
                                        <li class="gui-folder">
                                            <a href="javascript:void(0);">
                                                <span class="title">Open level 4</span>
                                            </a>
                                            <!--start submenu -->
                                            <ul>
                                                <li><a href="#"><span class="title">Item 4</span></a></li>
                                                <li class="gui-folder">
                                                    <a href="javascript:void(0);">
                                                        <span class="title">Open level 5</span>
                                                    </a>
                                                    <!--start submenu -->
                                                    <ul>
                                                        <li><a href="#"><span class="title">Item 5</span></a></li>
                                                        <li><a href="#"><span class="title">Item 5</span></a></li>
                                                    </ul><!--end /submenu -->
                                                </li><!--end /submenu-li -->
                                            </ul><!--end /submenu -->
                                        </li><!--end /submenu-li -->
                                    </ul><!--end /submenu -->
                                </li><!--end /submenu-li -->
                            </ul><!--end /submenu -->
                        </li><!--end /submenu-li -->
                    </ul><!--end /submenu -->
                </li><!--end /menu-li -->
                <!-- END LEVELS -->

            </ul><!--end .main-menu -->
            <!-- END MAIN MENU -->

            <div class="menubar-foot-panel">
                <small class="no-linebreak hidden-folded">
                    <span class="opacity-75">Copyright &copy; 2016</span> <strong>PORTAL</strong>
                </small>
            </div>
        </div><!--end .menubar-scroll-panel-->
    </div><!--end #menubar-->
    @endif
    <!-- END MENUBAR -->

</div><!--end #base-->
<!-- END BASE -->

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
