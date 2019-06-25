@extends('layouts.admin')

@section('dashborad')
active 
@endsection

@section('dashboradlink')
    Dashborad
@endsection

@section('content')
{{-- {{ route('dashborad.update') }} --}}
@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@if ($message = Session::get('status'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<form action="/dashborad/{{$reqtouch->id}}" method="post" class="alert alert-success  {{LaravelLocalization::getCurrentLocale() == 'ar' ? 'text-sm-right' : 'text-sm-left'}} " >
      <div class="col-12">

    
    {{ csrf_field() }}
    {!! method_field('PUT') !!}
        <div class="form-group col-sm-8" >
            <label for="namefield">   {{ trans('message.fullname') }} </label><span class="span">*</span>
        <input type="text" name="username" class="form-control" id="namefield"  placeholder="Your Name" value="{{$reqtouch->fullname}}">
        </div>


            <div class="form-group  ">
                    <label for="emailfield">   {{ trans('message.email') }} </label><span class="span">*</span>
                    <div class="input-group mb-3 col-sm-8">
                        <div class="input-group-prepend">
                            <span class="input-group-text fa fa-envelope"></span>
                    </div>
                    <input type="email" name="email" class="form-control" id="emailfield"  placeholder="Your Email" value="{{$reqtouch->email}}">
                    </div>
            </div>



            <div class="form-group">
                <label for="search">   {{ trans('message.country') }} </label><span class="span">*</span>
                <div class="input-group mb-3 col-sm-8">
                    <div class="input-group-prepend">
                        <span class="input-group-text fas fa-map-marked-alt"></span>
                </div>

                    <select class="form-control" id="countrysel" name="country">
                        <option value="">========= Select Country ==========</option>
                           @foreach ($counrty as $counrtry )
                               @if ($reqtouch->country == $counrtry->id)
                               <option value="{{$counrtry->id}}" data-number="{{$counrtry->phonecode}}" selected>{{$counrtry->nicename}}</option>
                        
                               @else
                               <option value="{{$counrtry->id}}" data-number="{{$counrtry->phonecode}}" >{{$counrtry->nicename}}</option>

                               @endif
                           @endforeach
                    
                    </select>
                        
                </div>
            </div>

            

            <div class="form-group  ">
                    <label for="Phonefield">   {{ trans('message.phone') }} </label><span class="span">*</span>
                    <div class="input-group mb-3 col-sm-8">
                        <div class="input-group-prepend">
                            <span class="input-group-text fa fa-phone"></span>
                                
                        <input id="code" readonly name="codes" class="form-control" style="width: 100px;" placeholder="Code" value="{{$code}}"  >
                            
                    </div>
                    <input type="text" name="Phone" class="form-control" id="Phonefield"  placeholder="Your Phone Number" value="{{$phon}}" >
                    </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">{{ trans('message.project') }}</label>
                <div class=" pt-2">
                      
                    <div class="form-check form-check-inline">
                    
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="typeproj[]" value="web" {{in_array("web",$types) ? 'checked' : ''}} >
                        <label class="form-check-label"  for="inlineCheckbox1">&nbsp; {{ trans('message.type-web') }} </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="typeproj[]" value="android"  {{in_array("android",$types) ? 'checked' : ''}} >
                        <label class="form-check-label" for="inlineCheckbox2">&nbsp; {{ trans('message.type-android') }} </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="typeproj[]" value="ios" {{in_array("ios",$types) ? 'checked' : ''}} >
                        <label class="form-check-label" for="inlineCheckbox3">&nbsp; {{ trans('message.type-ios') }} </label>
                    </div>

                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">{{ trans('message.project-name') }}</label>
                <div class="col-sm-8">
                    <input type="text" name="nameproj" class="form-control" value="{{$reqtouch->nameproject}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">{{ trans('message.project-desc') }}
                </label>

                <div class="col-sm-8">
                    <textarea class="form-control" name="descproj" id="exampleFormControlTextarea1" rows="3">{{$reqtouch->description}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">{{ trans('message.server') }}</label>
                <div class="col-sm-8 pt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="server" id="inlineRadio1" value="Yes" {{ $reqtouch->server == 'Yes' ? 'checked' : ''}} >
                        <label class="form-check-label" for="inlineRadio1">&nbsp; Yes </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="server" id="inlineRadio2" value="No" {{ $reqtouch->server == 'No' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineRadio2">&nbsp; No </label>
                    </div>

                </div>
            </div>

            <div class="form-group  " >
                            <label for="messagefield">   {{ trans('message.message') }} </label><span class="span ">*</span>
                            <textarea  name="message" class="form-control" id="messagefield"  placeholder="Your Message" rows="4">{{$reqtouch->message}}</textarea>
            </div>	

            <div class="form-group col-sm-3  mx-auto">

                <input type="submit" name="submit" class="form-control btn btn-success" value="  {{ trans('message.update') }}" >
            </div>
            <div class="form-group col-sm-3 mx-auto">

                <input type="reset"  class="form-control btn btn-danger" value="  {{ trans('message.reset') }}" >
            </div>
        </div>
    </form>
    
@endsection