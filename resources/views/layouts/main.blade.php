
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ trans('message.companyname') }} </title>
    <link rel="shortcut icon" href="{{url('/')}}/img/Purevisionlogo0.png">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- fonts --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('/')}}/fonts/icofont/icofont.min.css">
  
   
  @yield('linkcss')
  

  </head>
  <body>
        <section class="loading  position-fixed">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </section>

    <header>
   <!-- start heder    -->
    <nav class="header navbar sticky-top navbar-expand-lg navbar-light " >
        <div class="container">

            <img src="{{ url('/') }}/img/Purevisionlogo0.png" alt="logo">

            <button class="navbar-toggler  alert-secondary" type="button" data-toggle="collapse" data-target="#mainnav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon  "></span>
            </button>

            <div class="collapse navbar-collapse " id="mainnav" style="margin-top: 24px;">
            <ul class="ul navbar-nav  ml-auto" style="direction: {{LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr'}}">
                    <li class="nav-item @yield('home') ">
                    <a class="nav-link" href="{{url('/'. app()->getLocale()) }}">
                            <span class="hvr-underline-from-left"> {{ trans('message.Home') }} </span> <span class="sr-only">(current)</span> </a>

                    </li>

                    <li class="nav-item @yield('about') ">
                         <a class="nav-link" href="{{ url(app()->getLocale().'/about' )}}">
                            <span class="hvr-underline-from-left">{{ trans('message.about') }} </span>
                        </a>
                    </li>

                       

                    <li class="nav-item dropdown @yield('software')">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="hvr-underline-from-left"> {{ trans('message.software') }}  </span>
                        </a>
                        <div class="dropdown-menu  {{LaravelLocalization::getCurrentLocale() == 'ar' ? 'text-right' : 'text-left'}}">
                            <a class="dropdown-item"  href="{{ url(app()->getLocale().'/mobile' )}}">
                               {{ trans('message.moblie') }}
                            </a>
                            <a class="dropdown-item"  href="{{ url(app()->getLocale().'/web' )}}" >
                               {{ trans('message.web') }}
                            </a>
                            <a class="dropdown-item"  href="{{ url(app()->getLocale().'/digital' )}}" >
                                {{ trans('message.digitalnav') }}
                             </a>

                        </div>
                    </li>


                    <li class="nav-item @yield('contact') ">
                        <a class="nav-link"  href="{{ url(app()->getLocale().'/contact-us' )}}">
                            <span class="hvr-underline-from-left">  {{ trans('message.contact') }} </span>
                        </a>
                    </li>
                    {{-- <li class="nav-item  @yield('hiring') ">
                        <a class="nav-link" href="{{ url(app()->getLocale().'/hire' )}}"  >  
                            <span class="hvr-underline-from-left"> {{ trans('message.join') }}</span>
                        </a>
                    </li>              --}}
                  
                    <li class="nav-item  ">
                        <a class="nav-link" target="_blank" href="http://wazeftak.purevisionegypt.com">
                           <span class="hvr-underline-from-left">{{ trans('message.hiring') }} </span>
                       </a>
                   </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="hvr-underline-from-left"> {{ trans('message.Languages') }}  </span>
                        </a>
                        <div class="dropdown-menu text-center">
                            
                            @foreach (LaravelLocalization::getSupportedLocales() as $key => $value )
                                
                                    <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedURL($key)}}">{{$value['native']}}</a>   
                                
                                
                            @endforeach
                        </div>
                    </li>
               


                </ul>
            </div>
        </div>
    </nav>
    <!-- End   header    -->
    <div class="scroll">
        @yield('scroll')   
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////////////    -->

</header>

<div >
    @yield('content')
</div>

<footer class="">
  
    <!-- start    Footer    -->

    <div class="copyright " style="direction:{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr'}} ">
            <div class="container">
                <div class="row list">
                    {{-- <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="text-center">
                            <h4>{{ trans('message.footercol1') }}</h4>
                        </div>
                        <ul class="{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'text-right' : 'text-left'}} " style="direction:{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr'}} ">
                          

                            <li> <a href="{{ url(app()->getLocale().'/mobile' )}}"><i class="{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'fas fa-angle-left' : 'fas fa-angle-right'}}"></i> &nbsp; {{ trans('message.moblie') }} </a>
                            </li>
    
                            <li> <a href="{{ url(app()->getLocale().'/web' )}}"><i class="{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'fas fa-angle-left' : 'fas fa-angle-right'}}"></i> &nbsp; {{ trans('message.web') }}  </a>
                            </li>

                            <li> <a href="{{ url(app()->getLocale().'/contact-us' )}}"><i class="{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'fas fa-angle-left' : 'fas fa-angle-right'}}"></i> &nbsp; {{ trans('message.contact') }}  </a>
                            </li>
                            <li> <a href="{{ url(app()->getLocale().'/hire' )}}"><i class="{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'fas fa-angle-left' : 'fas fa-angle-right'}}"></i> &nbsp; {{ trans('message.hiring') }}  </a>
                            </li>
                        </ul>
                    </div> --}}
    
    
                    {{-- <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="text-center">
                            <h4> &nbsp;{{ trans('message.aboutcompany') }} </h4>
                        </div>
                        <p class="text-justify" style="letter-spacing: 1px;">
                            {{ trans('message.wordsaboutpure') }}
                        </p>
    
                    </div> --}}
   
                    <div class="col-sm-12 col-md-6 col-lg-4 mx-auto">
    
                        <div class="text-center">
                            <h4>{{ trans('message.social') }} </h4>
                        </div>
                        <div class="text-center">
                            <ul class="img px-0">
                                <li>
                                    <a href="https://www.facebook.com/Purevision-274076099895867/" target="_blank"><img src="{{ url('/') }}/img/logo/facebook.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                <a href="https://twitter.com/purevision17" target="_blank"><img src="{{ url('/') }}/img/logo/twitter.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCqwEr80El3CASRFjQKvceSw?view_as=subscriber" target="_blank"><img src="{{ url('/') }}/img/logo/youtube.svg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com/u/0/103056900203929165300" target="_blank"><img src="{{ url('/') }}/img/logo/google-plus.svg" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center">
                          
                        </p>
                            <h3 class="text-center" >
                                <a class="fot" style=""  href="{{ url(app()->getLocale().'/contact-us' )}}">{{ trans('message.contact') }}  </a>
                            </h3>
                         <p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center   ">
                     {{ trans('message.copyright') }}
    
                    </div>
                </div>
    
            </div>
        </div>
    
    
        <!-- End   Footer    -->
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.5.1/jquery.nicescroll.min.js"></script>
    <script src="{{url('/')}}/js/plugin.js"></script>
@yield('linkjs')

</body>
</html>
