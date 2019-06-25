@extends('layouts.main')

@section('linkcss')
    <link rel="stylesheet" href="{{ url('/') }}/css/join-us_en.css">
    @if (LaravelLocalization::getCurrentLocale() === 'ar')
    <link rel="stylesheet" href="{{ url('/') }}/css/join-us_{{LaravelLocalization::getCurrentLocale()}}.css">
    @endif
@endsection

@section('hiring')
active
@endsection

@section('content')
   <!-- start    table    -->
   <div class="col-12" id="" >
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
    
   <div class="container my-4">
        <div class="row justify-content-center" style="direction:{{LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr'}} ">
            <div class="col-md-8 border p-5 form-body">
            <form action="{{route('hire.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="text-center mt-1 mb-5">
                            <h3>{{ trans('message.welcome') }}</h3>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">{{ trans('message.fullname') }}</label>
                            <div class="col-sm-8">
                                <input type="text" name="fullname" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">{{ trans('message.email') }}</label>
                            <div class="col-sm-8">
                                <input type="text" name="email" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">{{ trans('message.phone') }} </label>
                            <div class="col-sm-8">
                                <input type="text" name="phone" class="form-control" >
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
                                    <label class="form-check-label" for="inlineRadio1">&nbsp; Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="server" id="inlineRadio2" value="No">
                                    <label class="form-check-label" for="inlineRadio2">&nbsp; No</label>
                                </div>
    
                            </div>
                        </div>

                    <div class="m-auto text-center my-5 py-3">
                        <input type="submit" name ="submit" class="btn btn-success py-2 px-5" value=" {{ trans('message.send') }}  ">
                        
                    </div>
                </form>
            </div>

        </div>

    </div>
   


    <!-- End   table   -->
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
 <script>
        $(document).ready(function () {
            $(function(){
                var $select = $(".years");
                var now = new Date();
                var today = now.getFullYear() ;

                for (i=today;i>=1950;i--) {
                    $select.append($('<option></option>').val(i).html(i))
                }

            });
        });
    </script>

@endsection

@section('linkjs')
	<script src="{{url('/')}}/js/contactus.js"></script>
@endsection