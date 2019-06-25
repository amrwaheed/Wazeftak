@extends('layouts.main')

@section('linkcss')
    <link rel="stylesheet" href="{{ url('/') }}/css/web_en.css">
    @if (LaravelLocalization::getCurrentLocale() === 'ar')
    <link rel="stylesheet" href="{{ url('/') }}/css/web_{{LaravelLocalization::getCurrentLocale()}}.css">
    @endif
@endsection

@section('software')
active
@endsection

@section('content')
   
<div class="image">
        <div id="imge">
            <img src="{{ url('/') }}/img/ground/webSlider4-v2.jpg" class="img-fluid" alt="software image">
        </div>
    </div>
</div>
<!-- start    web design    -->
 <div class="web">
     <div class="container">
         
         <div class="row " style="direction:{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr'}} ">

             <div class="col-sm-12 col-lg-12 ">
                 <div class="infor">
                     <h4>   {{ trans('message.web-h') }} </h4>
                     <p class="p1">
                        {{ trans('message.web-smp1') }}
                     </p>
                 </div>
                 <p>
                    {{ trans('message.web-p2') }}
                 </p>
                 
                 <div class="infor">
                 <h4> </h4>
                 <p class="">
                       
                 </p>
                 </div>
                 
                 <div class="infor">
                     <h4> {{ trans('message.web-h2') }} </h4>
                     
                 </div>
                 <p class="">
                    {{ trans('message.web-p3') }}                   
                  </p>
                     <p><a href=""><img src="{{ url('/') }}/img/Web_Design_develop.png" alt="" class="img-fluid"></a></p>
                     
                     <div class="infor">
                     <h4> {{ trans('message.web-environment') }}  </h4>
                     <ul>
                         <li> {{ trans('message.web-l1') }} </li>
                         <li> {{ trans('message.web-l2') }} </li>
                         <li> {{ trans('message.web-l3') }} </li>
                         <li> {{ trans('message.web-l4') }} </li>
                         
                     </ul>
                 </div>
             </div>
         </div>
         
     </div>
     
 </div>
 


 <!-- End   web design    -->
        
@endsection

@section('linkjs')
	<script src="{{url('/')}}/js/web.js"></script>
@endsection