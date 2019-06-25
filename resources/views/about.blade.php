@extends('layouts.main')

@section('linkcss')
	<link rel="stylesheet" href="{{ url('/') }}/css/about_en.css">
	@if (LaravelLocalization::getCurrentLocale() === 'ar')
    <link rel="stylesheet" href="{{ url('/') }}/css/about_{{LaravelLocalization::getCurrentLocale()}}.css">
    @endif
@endsection

@section('about')
active
@endsection

@section('content')
   
<div class="footer">
    <div class="container " style="direction:{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr'}} ">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="site-info">
                    <h2 class="text-center">{{ trans('message.honor') }}</h2>
                    <p style="text-align: {{LaravelLocalization::getCurrentLocale() == 'ar' ? 'right' : 'left'}} " >
						{{ trans('message.honor-p') }}
                    </p>
                    
                </div>
            </div>
            
            <div class="col-sm-12 col-lg-6">
                <div class="image"><img src="{{ url('/') }}/img/ground/asdfasfd.jpg" alt=""></div> 
            </div>
                
        </div>
    </div>
</div>
    

	
{{-- <div class="information">
		<div class="container " style="direction:{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr'}} ">
		
		</div>
</div> --}}
	

	<div class="contacts ">
		<div class="contains d-flex flex-column">
			<h2 class="text-center  justify-content-center">{{ trans('message.staytouch') }}</h2>
			<p class="text-center ">  {{ trans('message.staytouch-p') }}  </p>
			<button class="btn btn-success align-self-center justify-content-center" style="width: 300px">
			<a href="contactus.php">{{ trans('message.contact') }}</a>  </button>
		</div>
	</div>


        <!-- End   About    -->
        
        
    
@endsection

@section('linkjs')
	<script src="{{url('/')}}/js/about.js"></script>
@endsection