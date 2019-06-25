@extends('layouts.main')

@section('linkcss')
    <link rel="stylesheet" href="{{ url('/') }}/css/mobile-solutions_en.css">
    @if (LaravelLocalization::getCurrentLocale() === 'ar')
    <link rel="stylesheet" href="{{ url('/') }}/css/mobile-solutions_{{LaravelLocalization::getCurrentLocale()}}.css">
    @endif
@endsection

@section('software')
active
@endsection

@section('content')
   
	
<div class="image">
    <div id="imge">
        <img src="{{ url('/') }}/img/ground/marketing-edited.jpg" class="img-fluid" alt="software image">
    </div>
</div>
</div>
<!-- start    web design    -->
<div class="web">
 <div class="container">

     <div class="row "  style="direction:{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr'}} " >
         <div class="col-sm-12 col-lg-8">
             <div class="infor">
                <h4> {{ trans('message.digital-h1') }}</h4>
 
                <p >
                    {{ trans('message.digital-p1') }}
                </p>
                <p>
                    {{ trans('message.digital-p2') }}
                </p>
             </div>
         </div>
         <div class="col-sm-12 col-lg-4">
             <div class="infor">
                <p>
                    <img src="{{ url('/') }}/img/pages/marketingbrdo.png" alt="" class="img-fluid">
                </p>
             </div>
         </div>
     </div>
 </div>
</div>



<!-- End   web design    -->
        
@endsection

@section('linkjs')
	<script src="{{url('/')}}/js/digital.js"></script>
@endsection