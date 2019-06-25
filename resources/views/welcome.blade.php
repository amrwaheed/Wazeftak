@extends('layouts.main')

@section('linkcss')
<link rel="stylesheet" href="{{ url('/') }}/css/style_en.css">

@if (LaravelLocalization::getCurrentLocale() === 'ar')
    <link rel="stylesheet" href="{{ url('/') }}/css/style_{{LaravelLocalization::getCurrentLocale()}}.css">
@endif

@endsection

@section('scroll')
    <i class="icofont-hand-drawn-up icofont-2x"></i>
@endsection

@section('home')
active
@endsection

@section('content')
    <!-- start   Slider    -->
    
    <div class="slider">
            <div id="main-slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner  justify-content-center align-items-center">
                    <div class="carousel-item carousel-one active">
                        <div class="carousel-caption">
                            <h3 class="animated bounceInDown"> {{ trans('message.companyname') }} </h3>
                            <p class="animated bounceInUp">
                               {{ trans('message.slider-p1') }}
                            </p>
                        </div>
                    </div>
    
                    <div class="carousel-item carousel-two">
                        <div class="carousel-caption ">
                            <h3 class="animated bounceInDown">{{ trans('message.companyname') }}</h3>
                            <p class="animated bounceInUp">
                                {{ trans('message.slider-p2') }}
                            </p>
                        </div>
                    </div>
    
                    <div class="carousel-item carousel-three">
                        <div class="carousel-caption ">
                            <h3 class="animated bounceInDown">{{ trans('message.companyname') }}</h3>
                            <p class="animated bounceInUp">
                                    {{ trans('message.slider-p3') }}
                            </p>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                    <li data-target="#main-slider" data-slide-to="1"></li>
                    <li data-target="#main-slider" data-slide-to="2"></li>
                </ol>
    
                <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                    <span class="fas fa-arrow-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#main-slider" role="button" data-slide="next">
                    <span class="fas fa-arrow-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
    
            </div>
        </div>
    
    
    
        <!-- End   Slider    -->

         <!-- Start div  Who Are We -->
    <div class="who " style="direction: {{LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr'}}">
            <div class="container-fluid mt-3 mb-3">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="img text-center">
                            <img src="{{ url('/') }}/img/abt2.png" class="img-fluid" style="border-radius: 10px;">
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6  ">
                        <div class="content pr-2">
                            <h2 class="text-center">  {{ trans('message.who') }} </h2>
                               
                            <p>
                                    {{ trans('message.who-p') }}   
                            </p>
    
                            <div class="text-center">
                                <a href="{{ url(app()->getLocale().'/about' )}}" class="btn btn-info ">
                                        {{ trans('message.readmore') }}   
                                </a>
                            </div>
    
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
        <!-- End div  Who Are We -->
         <!--  Start BUSINESS SOLUTIONS     -->
    <div class  ="business-container container-fluid ">
            <div class="business shadow  bg-white rounded">
                <div class="contanier">
                    <div class="mt-3">
                        <h2 class="text-center"> {{ trans('message.business') }} </h2>
                        <p class="text-center">
                                {{ trans('message.business-p') }}
                        </p>
    
                    </div>
                    <div class="row">
    
                        <div class="col-sm-6 ">
                            <a href="{{ url(app()->getLocale().'/web' )}}" target="_self">
                                <img class="lightbox-false" alt="software" title="software" width="64" height="64" src="{{ url('/') }}/img/pages/Web_Design_develop.png">
                            </a>
                            <h2 id="fancy-title-44" class="mk-fancy-title  mk-animate-element fade-in  simple-style   color-single mk-in-viewport">
                                <span>
                                    <p>{{ trans('message.web') }}</p>
                                </span>
                            </h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ url(app()->getLocale().'/mobile' )}}" target="_self" class="mk-image-link">
                                <img class="lightbox-false" alt="mobile-solutions" title="mobile-solutions" width="64" height="64" src="{{ url('/') }}/img/pages/mobile-development-glyph-07-512.png">
                            </a>
                            <h2 id="fancy-title-47" class="mk-fancy-title  mk-animate-element fade-in  simple-style   color-single mk-in-viewport">
                                <span>
                                    <p>{{ trans('message.moblie') }}</p>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--   End BUSINESS SOLUTIONS    -->
        {{-- start Be Client --}}
        {{-- <div class="container " style="direction: {{LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr'}}">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center ">
                            Blog
                    </h2>    
                </div>  
               
            </div>
        </div>        --}}
        {{-- End Be Client --}}
    
    
@endsection

@section('linkjs')
    {{-- <script src="{{url('/')}}/js/plugin.js"></script> --}}
@endsection