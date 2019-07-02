@extends('layouts.master')

<head>
    <title>Wazzaf  Add information</title>

</head>
@section('dashboradlink')
    skill
@endsection
@section('skill')
    active
@endsection

@section('content')
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

    <div class="container">
        <div class="row">
            <form action="{{route('skills.store')}}" method="post">
            {{csrf_field()}}

            <!-- Modal -->

                <div class="row">
                    <h2 class="my-2"> Add Skill</h2>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Skill Name</label><span class="css-dv1j8g">*</span>
                            <input type="text" class="form-control" name="skillname" placeholder="Java , Html , Php" title="add your Skill">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info" name="skilllls" value="Insert Skill">
                </div>
            </form>
        </div>

        <div class="row">
            <form action="{{route('languages.store')}}" method="post">
            {{csrf_field()}}

            <!-- Modal -->

                <div class="row">
                    <h2 class="my-2"> Add Languages</h2>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Language</label><span class="css-dv1j8g">*</span>
                                <select class="form-control" name="lang_name">
                                    <option disabled selected hidden>select languages</option>
                                    @foreach($languages as $language)
                                        <option value="{{$language->id}}" >{{$language->language_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Proficiency</label><span class="css-dv1j8g">*</span>
                                <select class="form-control" name="lang_exper">
                                    <option disabled selected hidden>select language level</option>
                                    @foreach($languages_level as $language_level)
                                        <option value="{{$language_level->id}}" >{{$language_level->language_level_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <input type="submit" class="btn btn-info" name="skilllls" value="Insert Languages">
                </div>
            </form>
        </div>

    </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>



@endsection
