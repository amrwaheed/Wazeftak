
<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Wazzaf </title>
    <link rel="shortcut icon" href="../../../public/images/search.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('/')}}/fonts/icofont/icofont.min.css">
    @yield('linkcss')

</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">

    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
           {{--     <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a>--}}
            </div>
        </div>

        <div class="main-menu">

            <div class="menu-inner">
                <nav>

                    <ul class="metismenu" id="menu">
                        <li class="active">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            <ul class="collapse">
                                <li class="@yield('profile')"><a href="{{route('profile.index')}}">Profile Information</a></li>

                            @if(! \App\ModelsUser\PersonalInformation::where('user_id',auth()->user()->id ))
                                    <li class="@yield('personal')"><a href="{{route('personal.index')}}">Personal Information</a></li>
                                @else
                                    <li class="@yield('personal')"><a href="/users/personal/{{auth()->user()->id}}/edit">Personal Information</a></li>
                            @endif
                            @if(! \App\ModelsUser\Employementinformation::where('user_id',auth()->user()->id))
                                    <li class="@yield('employement')"><a href="{{route('employement.index')}}">Employement Information</a></li>
                                @else
                                    <li class="@yield('employement')"><a href="/users/employement/{{auth()->user()->id}}/edit">Employement Information</a></li>
                            @endif
                            @if(! \App\ModelsUser\Experienceinformation::where('user_id',auth()->user()->id))
                                    <li class="@yield('experience')"><a href="{{route('experience.index')}}">Experience Information</a></li>
                                @else
                                    <li class="@yield('experience')"><a href="/users/experience/{{auth()->user()->id}}">Experience Information</a></li>
                            @endif
                            @if(! \App\ModelsUser\EducationInformation::where('user_id',auth()->user()->id))
                                    <li class="@yield('education')"><a href="{{route('education.index')}}">Education Information</a></li>
                                @else
                                    <li class="@yield('education')"><a href="/users/education/{{auth()->user()->id}}">Education Information</a></li>
                            @endif
                            @if(! \App\ModelsUser\SkillInformation::where('user_id',auth()->user()->id))
                                    <li class="@yield('skill')"><a href="{{route('skills.index')}}">Skills Information</a></li>
                                @else
                                    <li class="@yield('skill')"><a href="/users/skills/{{auth()->user()->id}}">Skills Information</a></li>
                            @endif
                            @if(! \App\ModelsUser\OnlinePersence::where('user_id',auth()->user()->id))
                                    <li class="@yield('online_presence')"><a href="{{route('onlinePersence.index')}}">Online Presence</a></li>
                                @else
                                    <li class="@yield('online_presence')"><a href="/users/onlinePersence/{{auth()->user()->id}}/edit">Online Presence</a></li>
                            @endif
                            @if(! \App\ModelsUser\CertifationInformation::where('user_id',auth()->user()->id))
                                    <li class="@yield('certification')"><a href="{{route('certification.index')}}">Certification Presence</a></li>
                                @else
                                    <li class="@yield('certification')"><a href="/users/certification/{{auth()->user()->id}}">Certification Information</a></li>
                            @endif

                            </ul>
                        </li>

                       {{-- <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>UI Features</span></a>
                            <ul class="collapse">
                                <li><a href="accordion.html">Accordion</a></li>
                                <li><a href="alert.html">Alert</a></li>
                                <li><a href="badge.html">Badge</a></li>
                                <li><a href="button.html">Button</a></li>
                                <li><a href="button-group.html">Button Group</a></li>
                                <li><a href="cards.html">Cards</a></li>
                                <li><a href="dropdown.html">Dropdown</a></li>
                                <li><a href="list-group.html">List Group</a></li>
                                <li><a href="media-object.html">Media Object</a></li>
                                <li><a href="modal.html">Modal</a></li>
                                <li><a href="pagination.html">Pagination</a></li>
                                <li><a href="popovers.html">Popover</a></li>
                                <li><a href="progressbar.html">Progressbar</a></li>
                                <li><a href="tab.html">Tab</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="form.html">Form</a></li>
                                <li><a href="grid.html">grid system</a></li>
                            </ul>
                        </li>--}}

                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                <span>Tables</span></a>
                            <ul class="collapse">
                                <li><a href="{{route('users.index')}}">Users table</a></li>
                                <li><a href="{{route('company.index')}}">Company table</a></li>
                                {{--<li><a href="table-layout.html">table layout</a></li>--}}
                                {{--<li><a href="datatable.html">datatable</a></li>--}}
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>Pages</span></a>
                            <ul class="collapse">
                                <li><a href="{{route('position.index')}}">Position Page</a></li>
                                <li><a href="{{route('religion.index')}}">Religion page</a></li>
                                <li><a href="{{route('degree.index')}}">Degree Page</a></li>
                                <li><a href="{{route('grade.index')}}">Grade Page</a></li>
                                <li><a href="{{route('language.index')}}">Languages Page</a></li>
                                <li><a href="{{route('languagelevel.index')}}">Language Level Page</a></li>
                                <li><a href="{{route('currency.index')}}">Currency Page</a></li>
                                <li><a href="{{route('career.index')}}">Career Level</a></li>

                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- sidebar menu area end -->
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->

        <!-- header area end -->
        <!-- page title area start -->
        <div class="page-title-area">

            <div class="row align-items-center">

                <div class="col-sm-6">


                            <!-- nav and search button -->

                                <div class="nav-btn pull-left">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>


                            <!-- profile info & task notification -->
                            {{-- <div class="col-md-6 col-sm-4 clearfix">
                                 <div class="search-box pull-right">
                                     <form action="#">
                                         <input type="text" name="search" placeholder="Search..." required>
                                         <i class="ti-search"></i>
                                     </form>
                                 </div>
                             </div>--}}


                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Dashboard</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="index.html">Home</a></li>
                            <li><span>@yield('dashboradlink')</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">
                        <img class="avatar user-thumb" src="{{asset('assets/images/author/avatar.png')}}" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <a class="nav-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        </div>
                                    </li>
                                    @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-sm-12">
            @yield('content')
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
        </div>
    </footer>
    <!-- footer area end-->
</div>
<!-- page container area end -->
<!-- offset area start -->
<div class="offset-area">
    <div class="offset-close"><i class="ti-close"></i></div>
    <ul class="nav offset-menu-tab">
        <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
        <li><a data-toggle="tab" href="#settings">Settings</a></li>
    </ul>
    <div class="offset-content tab-content">
        <div id="activity" class="tab-pane fade in show active">
            <div class="recent-activity">
                <div class="timeline-task">
                    <div class="icon bg1">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-check"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Added</h4>
                        <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>You missed you Password!</h4>
                        <span class="time"><i class="ti-time"></i>09:20 Am</span>
                    </div>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="fa fa-bomb"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Member waiting for you Attention</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="ti-signal"></i>
                    </div>
                    <div class="tm-title">
                        <h4>You Added Kaji Patha few minutes ago</h4>
                        <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg1">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Ratul Hamba sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Hello sir , where are you, i am egerly waiting for you.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="fa fa-bomb"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="ti-signal"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
            </div>
        </div>
        <div id="settings" class="tab-pane fade">
            <div class="offset-settings">
                <h4>General Settings</h4>
                <div class="settings-list">
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Notifications</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch1" />
                                <label for="switch1">Toggle</label>
                            </div>
                        </div>
                        <p>Keep it 'On' When you want to get all the notification.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show recent activity</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch2" />
                                <label for="switch2">Toggle</label>
                            </div>
                        </div>
                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show your emails</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch3" />
                                <label for="switch3">Toggle</label>
                            </div>
                        </div>
                        <p>Show email so that easily find you.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show Task statistics</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch4" />
                                <label for="switch4">Toggle</label>
                            </div>
                        </div>
                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Notifications</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch5" />
                                <label for="switch5">Toggle</label>
                            </div>
                        </div>
                        <p>Use checkboxes when looking for yes or no answers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offset area end -->
<!-- jquery latest version -->
{{--<script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- bootstrap 4 js -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>

<!-- start chart js -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>--}}
<!-- start zingchart js -->
{{--<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
</script>--}}
<!-- all line chart activation -->
{{--<script src="{{asset('assets/js/line-chart.js')}}"></script>
<!-- all pie chart -->
<script src="{{asset('assets/js/pie-chart.js')}}"></script>--}}
<!-- others plugins -->
@yield('linkjs')
<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>

<script src="{{asset('script/main.js')}}"></script>

</body>

</html>
