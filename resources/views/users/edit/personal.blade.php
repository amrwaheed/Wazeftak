@extends('layouts.master')

<head>
    <title>Wazzaf  Add information</title>

</head>
@section('dashboradlink')
    personal
@endsection

@section('personal')
    active
@endsection
@section('content')
    <div class="col-12" id="" role="" aria-labelledby="" style="padding: 1%;">
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
        <form action="/users/personal/{{$personalData->user_id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {!! method_field('PUT') !!}
            <div class="row ">

                <div class="col-md-3 text-center">

                    <div class="profile-photo">
                        <div class="photo">

                            @if($personalData->image_name)
                            <img id="myImg" src="{{url('/')}}/images/{{$personalData->image_name}}" alt="your image" class="img-fluid ">
                                @else
                                <img id="myImg" src="{{asset('images/download.jpg')}}" alt="your image" class="img-fluid ">
                            @endif

                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-3">

                    <div class="Edit-photo">
                        <div class="title">
                            <h3>Profile Photo</h3>
                            <p>You can upload a .jpg, .png, or .gif photo with max size of 2MB.</p>
                        </div>
                        <div class="form-group">
                            <input type="file" id="input03"   class="filestyle" name="file">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row information">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Full Name</label><span class="css-dv1j8g">*</span>
                        <input  type="text"  class="form-control" name="fullname" value="{{$personalData->personal_name}}" placeholder="Full Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Birth Date</label><span class="css-dv1j8g">* </span>
                        <input type="date"  class="form-control" name="birthday" value="{{$personalData->birthday}}"  placeholder="Your Birth Date">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address</label><span class="css-dv1j8g">*</span>
                        <input  type="text" class="form-control" name="address" value="{{$personalData->address}}" placeholder="Your Adress">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>E-mail</label><span class="css-dv1j8g">*</span>
                        <input   type="email" class="form-control" value="{{$personalData->email}}" name="email" placeholder="Your Mail">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">

                        <label>Nationality</label><span class="css-dv1j8g">*</span>
                        <select class=" form-control" name="nationality">
                            <option value="">========= Select Nationality ========</option>
                            @foreach($nationalities as $nationality)
                                @if( $nationality->id == $personalData->nationality_id )
                                    <option value="{{$personalData->nationality_id}}" selected >{{$personalData->nationality_enNationality}}</option>
                                @else
                                    <option value="{{$personalData->nationality_id}}"  >{{$nationality->nationality_enNationality}}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Country</label>
                        <select class="form-control country" id="countrysel" name="countries" >
                            <option value="">========= Select Country ==========</option>
                            @foreach($country_list as $country)
                                @if( $country->id == $personalData->country_id )
                                <option value="{{$personalData->country_id}}" data-number="{{$personalData->phonecode}}" selected>{{$personalData->nicename}}</option>
                                @else
                                    <option value="{{$country->id}}" data-number="{{$country->phonecode}}" >{{$country->nicename}}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>City</label><span class="css-dv1j8g">*</span>
                        <div class="option ">
                            <input type="text" class="form-control" name="cities" value="{{$personalData->city_name}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Religion</label><span class="css-dv1j8g">*</span>
                        <select class=" form-control" name="religion">
                            <option disabled selected hidden>========= Select Religion ==========</option>
                            @foreach($religion as $religions)
                                @if( $religions->id == $personalData->religion_id )
                                    <option value="{{$personalData->id}}" selected >{{$personalData->religion_name}}</option>
                                    @else
                                    <option value="{{$religions->id}}"  >{{$religions->religion_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone</label><span class="css-dv1j8g">*</span>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">

                                <span class="input-group-text fa fa-phone"></span>
                                <!--                                            <span class="input-group-text">-->
                                <input class=" code input-group-text" id="code" name="code" value="{{substr($personalData->mobile, 0,3)}}"  placeholder="Code" readonly >
                                <!--                                            </span>-->
                            </div>
                            <input type="text" class="form-control" name="phone" aria-label="Amount (to the nearest dollar)" value="{{substr($personalData->mobile, 3 )}}" placeholder="Phone">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Civil ID Number </label><span class="css-dv1j8g">*</span>
                        <input   type="number" class="form-control" name="civil_id" placeholder="Civil ID Number" value="{{$personalData->civil_id_number}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Telephone</label><span class="css-dv1j8g">*</span>
                        <input   type="number" class="form-control" name="telephone" placeholder="TelePhone" value="{{$personalData->telephone}}" >
                    </div>
                </div>
                <div class="col-md-6 gender">
                    <label>Gender</label><span class="css-dv1j8g">*</span>
                    <div class="form-group">
                        <input type="radio" name="gender" {{ $personalData->gender == 'male' ? 'checked' : ''}} value="male" id="male">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" {{ $personalData->gender == 'female' ? 'checked' : ''}} value="female" id="famale">
                        <label for="famale">Female</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Marital status</label><span class="css-dv1j8g">*</span>
                    <div class="form-group">
                        <input type="radio" name="marital_stats" {{ $personalData->martial_status == 'Single' ? 'checked' : ''}} value="Single" id="Single">
                        <label for="Single">Single</label>
                        <input type="radio" name="marital_stats" {{ $personalData->martial_status == 'Married' ? 'checked' : ''}} value="Married" id="Marrid">
                        <label for="Marrid">Married</label>
                    </div>
                </div>


                <div class="col-md-12 mt-4">
                    <div class="text-center m-auto">
                        <input type="submit" class="btn btn-info" name="submit" value="Update">
                    </div>
                </div>
            </div>
        </form>
    </div>

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
