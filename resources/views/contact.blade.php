@extends('layouts.main')

@section('linkcss')
    <link rel="stylesheet" href="{{ url('/') }}/css/contactus_en.css">
    @if (LaravelLocalization::getCurrentLocale() === 'ar')
    <link rel="stylesheet" href="{{ url('/') }}/css/contactus_{{LaravelLocalization::getCurrentLocale()}}.css">
    @endif
@endsection

@section('contact')
active
@endsection

@section('content')
    
<div class="footer">
        <div class="container" style="direction:{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr'}} ">
            <div class="row " >
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="site-info">
                            <h1 class="text-center">{{ trans('message.staytouch') }}</h1>
                           
                                @if ($message = Session::get('status'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                    <form action="{{ route('contact-us.store') }}" method="post" class="alert alert-primary  {{LaravelLocalization::getCurrentLocale() == 'ar' ? 'text-sm-right' : 'text-sm-left'}} " >
                            {{ csrf_field() }}
                            <div class="form-group " >
                            <label for="namefield">   {{ trans('message.fullname') }} </label><span class="span">*</span>
                            <input type="text" name="username" class="form-control" id="namefield"  placeholder="Your Name" required>
                        </div>


                                <div class="form-group  ">
                                        <label for="emailfield">   {{ trans('message.email') }} </label><span class="span">*</span>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-envelope"></span>
                                        </div>
                                        <input type="email" name="email" class="form-control" id="emailfield"  placeholder="Your Email" required>
                                        </div>
                                </div>



                                <div class="form-group  ">
                                    <label for="search">   {{ trans('message.country') }} </label><span class="span">*</span>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text fas fa-map-marked-alt"></span>
                                    </div>

                                        <select class="form-control" id="countrysel" name="country">
                                            <option value="">========= Select Country ==========</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}" data-number="{{$country->phonecode}}" >{{$country->nicename}}</option>
                                                @endforeach
                                        
                                        </select>
                                            
                                    </div>
                                </div>

                                

                                <div class="form-group   ">
                                        <label for="Phonefield">   {{ trans('message.phone') }} </label><span class="span">*</span>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-phone"></span>
                                                    
                                                <input id="code" readonly name="codes" class="form-control" style="width: 100px;" placeholder="Code" required>
                                                
                                        </div>
                                        <input type="text" name="Phone" class="form-control" id="Phonefield"  placeholder="Your Phone Number" required>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">{{ trans('message.project') }}</label>
                                    <div class="col-sm-8 pt-2">
            
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="typeproj[]" value="web">
                                            <label class="form-check-label"  for="inlineCheckbox1">&nbsp; {{ trans('message.type-web') }} </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="typeproj[]" value="android">
                                            <label class="form-check-label" for="inlineCheckbox2">&nbsp; {{ trans('message.type-android') }} </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="typeproj[]" value="ios">
                                            <label class="form-check-label" for="inlineCheckbox3">&nbsp; {{ trans('message.type-ios') }} </label>
                                        </div>
            
                                    </div>
                                </div>
            
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">{{ trans('message.project-name') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nameproj" class="form-control">
                                    </div>
                                </div>
            
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">{{ trans('message.project-desc') }}
                                    </label>
            
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="descproj" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">{{ trans('message.server') }}</label>
                                    <div class="col-sm-8 pt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="server" id="inlineRadio1" value="Yes">
                                            <label class="form-check-label" for="inlineRadio1">&nbsp; Yes </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="server" id="inlineRadio2" value="No">
                                            <label class="form-check-label" for="inlineRadio2">&nbsp; No </label>
                                        </div>
            
                                    </div>
                                </div>

                                <div class="form-group  " >
                                                <label for="messagefield">   {{ trans('message.message') }} </label><span class="span ">*</span>
                                                <textarea  name="message" class="form-control" id="messagefield"  placeholder="Your Message" rows="4"></textarea>
                                </div>	

                                <div class="form-group  ">

                                    <input type="submit" name="submit" class="form-control btn btn-success" value="  {{ trans('message.send') }}" >
                                </div>
                                <div class="form-group ">

                                    <input type="reset"  class="form-control btn btn-danger" value="  {{ trans('message.reset') }}" >
                                </div>
                        </form>
    
    
                    </div>
                </div>
     <!-- Google Maps -->
                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                    <div class="helpful-links">
                        <h2 class="mb-4 text-center" style="color: #08526d; font-weight: bold;"> {{ trans('message.location') }}</h2>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 ">
                                <div class="map-responsive">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.709211307423!2d31.25520809619822!3d29.959902625643007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDU3JzM0LjkiTiAzMcKwMTUnMjUuMSJF!5e0!3m2!1sen!2seg!4v1539824914592" width="600" height="891" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </div>
    
        
    <div class="information">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-6 ">
                    <div class="contacts mt-3">
                        <h2> {{ trans('message.contact') }} </h2>
                        <ul class="list-unstyled " style="direction:{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr'}} ">
                            <p>  {{ trans('message.contactwel') }} </p>
                            <li><i class="fa fa-map-marker"></i> &nbsp; {{ trans('message.addresscompany') }} </li>
    
                            <li><i class="fa fa-phone"></i> &nbsp; +20223807075  &nbsp;&nbsp; <br> &nbsp;&nbsp; +201093003177&nbsp; <br> &nbsp; +201020029956</li>
                            <li><i class="fab fa-windows"></i> <a href="http://www.purevisionegypt.com">www.purevisionegypt.com</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
            <!-- End   About    -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

            <script>
                $(document).ready(function() {
            
                    $('#countrysel').on('change',function () {
            
                        if ($(this).val() != ''){
                            var code = $(this).children("option:selected").attr('data-number');
                            $("#code").val('+'+code);
                        }
            
                    });
                });
            </script>
        
@endsection

@section('linkjs')
	<script src="{{url('/')}}/js/contactus.js"></script>
@endsection