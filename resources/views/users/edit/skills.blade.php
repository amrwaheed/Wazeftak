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
            <div class="row ">
                <div class="col-md-6 py-2 border-right">
                    <div class="skill">
                        <h3 class="pb-3 mb-4 title"><span><i class="icofont-brain-alt px-2"></i></span>Skills</h3><hr>
                        <div class="ml-5">

                                @foreach($skills as $skill)
                                <div class="row">
                                    <div class="col-md-9 my-1">

                                        <span><i class="icofont-minus px-1">{{ $skill->skill_name  }}</i></span><span class="skillname"><b></b></span>  <br/>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <a href="/users/skills/{{$skill->id}}/edit" class="btn btn-warning">Edit</a>
                                    </div>
                                </div>
                                 @endforeach

                            <!-- Button trigger modal -->


                        </div>
                    </div>
                </div>
                <div class="col-md-6 py-2">
                    <div class="language pb-5">
                        <h3 class="pb-3 mb-4 title"><span><i class="icofont-globe px-2"></i></span>Languages</h3><hr>
                        <div class="ml-5">
                            @foreach($languages_lists as $languages_list)
                                <div class="row">
                                    <div class="col-md-9">
                                        <span><b> {{$languages_list->language_name}} </b> <i class="icofont-long-arrow-right"></i> -> </span>
                                        <span>  {{$languages_list->language_level_name}} </span>
                                        <br>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <a href="/users/languages/{{$languages_list->id}}/edit" class="btn btn-warning">Edit</a>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>



@endsection
