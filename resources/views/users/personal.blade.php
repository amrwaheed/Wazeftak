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
        <form action="{{route('personal.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row ">

                <div class="col-md-3 text-center">

                    <div class="profile-photo">
                        <div class="photo">
                            <img id="myImg" src="{{asset('images/download.jpg')}}" alt="your image" class="img-fluid ">
                           
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-3">

                    <div class="Edit-photo">
                        <div class="title">
                            <h3>Profile Photo</h3>
                            <p>You can upload a .jpg, .png, or .gif photo with max size of 5MB.</p>
                        </div>
                        <div class="form-group">
                            <input type="file" id="input03"  class="filestyle" name="file">
                        </div>
                    </div>
                </div>
            </div>
<br>
            <div class="row information">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Full Name</label><span class="css-dv1j8g">*</span>
                        <input  type="text"  class="form-control" name="fullname" placeholder="Full Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Birth Date</label><span class="css-dv1j8g">* </span>
                        <input type="date" id="date" class="form-control" name="birthday"  placeholder="Your Birth Date">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address</label><span class="css-dv1j8g">*</span>
                        <input  type="text" class="form-control" name="address" placeholder="Your Adress">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>E-mail</label><span class="css-dv1j8g">*</span>
                        <input   type="email" class="form-control" name="email" placeholder="Your Mail">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">

                        <label>Nationality</label><span class="css-dv1j8g">*</span>
                        <select class=" form-control" name="nationality">
                            <option value="">========= Select Nationality ========</option>
                            @foreach($nationalities as $nationality)
                                <option value="{{$nationality->id}}" >{{$nationality->nationality_enNationality}}</option>
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
                                <option value="{{$country->id}}" data-number="{{$country->phonecode}}" >{{$country->nicename}}</option>
                             @endforeach

                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>City</label><span class="css-dv1j8g">*</span>
                        <div class="option ">
                            <input type="text" class="form-control" name="cities">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Religion</label><span class="css-dv1j8g">*</span>
                        <select class=" form-control" name="religion">
                            <option disabled selected hidden>========= Select Religion ==========</option>
                            @foreach($religion as $religions)
                                <option value="{{$religions->id}}"  >{{$religions->religion_name}}</option>
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
                                <input class=" code input-group-text" id="code" name="code" placeholder="Code" readonly>
                                <!--                                            </span>-->
                            </div>
                            <input type="text" class="form-control" name="phone" aria-label="Amount (to the nearest dollar)" placeholder="Phone">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Civil ID Number </label><span class="css-dv1j8g">*</span>
                        <input   type="number" class="form-control" name="civil_id" placeholder="Civil ID Number">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Telephone</label><span class="css-dv1j8g">*</span>
                        <input   type="number" class="form-control" name="telephone" placeholder="TelePhone">
                    </div>
                </div>
                <div class="col-md-6 gender">
                    <label>Gender</label><span class="css-dv1j8g">*</span>
                    <div class="form-group">
                        <input type="radio" name="gender" value="male" id="male">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" value="female" id="famale">
                        <label for="famale">Female</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Marital status</label><span class="css-dv1j8g">*</span>
                    <div class="form-group">
                        <input type="radio" name="marital_stats" value="Single" id="Single">
                        <label for="Single">Single</label>
                        <input type="radio" name="marital_stats" value="Married" id="Marrid">
                        <label for="Marrid">Married</label>
                    </div>
                </div>


                <div class="col-md-12 mt-4">
                    <div class="text-center m-auto">
                        <input type="submit" class="btn btn-info" name="submit">
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
