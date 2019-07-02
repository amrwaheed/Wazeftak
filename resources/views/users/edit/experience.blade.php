@extends('layouts.master')

<head>
    <title>Wazzaf  Add information</title>

</head>
@section('dashboradlink')
    experience
@endsection

@section('experience')
    active
@endsection
@section('content')

    <div class="col-md-6 ">
        <div class="exper mt-2">
            <h2 class="pb-3 mb-4 title"><span><i class="icofont-worker px-2"></i></span>Work Experience</h2>
            <div class="caption ml-5">
                @foreach( $experiences as $experience )

                    <h5> {{$experience->job_title}} <b> &nbsp; At &nbsp; </b>  {{$experience->company_name }}</h5>
                    <p>  <i class="icofont-long-arrow-right"></i> {{ date("d-m-Y", strtotime($experience->date_start)) }} / To  <i class="icofont-long-arrow-right"></i> {{ date("d-m-Y", strtotime($experience->date_end)) }} </p>
                    <p>  {{floor(abs(strtotime($experience->date_end) - strtotime($experience->date_start)) / (365*60*60*24))}} Years
                        {{floor((abs(strtotime($experience->date_end) - strtotime($experience->date_start)) - floor(abs(strtotime($experience->date_end) - strtotime($experience->date_start)) / (365*60*60*24)) * 365*60*60*24) / (30*60*60*24))}} month
                        {{floor((abs(strtotime($experience->date_end) - strtotime($experience->date_start)) - floor(abs(strtotime($experience->date_end) - strtotime($experience->date_start)) / (365*60*60*24)) * 365*60*60*24 - floor((abs(strtotime($experience->date_end) - strtotime($experience->date_start)) - floor(abs(strtotime($experience->date_end) - strtotime($experience->date_start)) / (365*60*60*24)) * 365*60*60*24) / (30*60*60*24))*30*60*60*24)/ (60*60*24))}} day </p>
                    <div>
                        <a href="/users/experience/{{$experience->id}}/edit" class=" btn btn-warning">Edit</a>
                    </div>
                    <hr>
                @endforeach


            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

@endsection
