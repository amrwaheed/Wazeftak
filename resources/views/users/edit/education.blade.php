@extends('layouts.master')

<head>
    <title>Wazzaf  Add information</title>

</head>
@section('dashboradlink')
    education
@endsection
@section('education')
    active
@endsection

@section('content')

    <div class="col-md-6 border-bottom border-right" >
        <div class="exper mt-2">
            <h2 class="pb-3 mb-4 title"><span><i class="icofont-worker px-2"></i></span>Education</h2>
                <div class="caption ml-5">
                    <div class="row">
                        <div class="col-md-9">
                            <h5><b>High School: </b><span class="school-name"> {{$schools->high_school}} </span></h5>
                            <h6><b>Graduation Year: </b><span> {{$schools->gradatesyear}} </span></h6>

                        </div>
                        <div class="col-md-3">
                            <a href="/users/education/{{$schools->id}}/edit" class="btn btn-warning">Edit</a>
                        </div>
                    </div>





            </div>
        </div>
    </div>
    <div class="col-md-6 border-bottom">
        <div class="exper mt-2">
            <h2 class="pb-3 mb-4 title"><span><i class="icofont-worker px-2"></i></span>University</h2>
            <div class="caption ml-5">


                <div class="row">
                    <div class="col-md-9 ">
                        <h5><b>University:</b>  <span class="uni-name">  {{$universities->university_name}}  </span></h5>
                        <h6><b>Degree: </b> <span> {{$universities->degree_name}} </span></h6>
                        <h6><b>Field(s) of Study: </b> <span> {{$universities->fields_study}} </span></h6>
                        <h6><b>Graduation Year: </b> <span> {{$universities->endyear}} </span></h6>
                        <h6><b>Grade: </b> <span> {{$universities->grade_name}}</span></h6>
                    </div>
                    <div class="col-md-3">
                        <a href="/users/educations/{{$universities->id}}/edit" class="btn btn-warning">Edit</a>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="exper mt-2">
            <h3 class="pb-3 mb-4 title"><span><i class="icofont-badge px-1"></i> </span>Trainings & Courses</h3>
            <div class="caption ml-5">


                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-md-9">
                            <p><b> {{$course->course_name}}</b><span> at </span> &nbsp; <b>{{$course->organization_name}}  </b> </p>
                            <p>{{ date("d-m-Y", strtotime($course->start_date)) }}<span> to </span>{{date("d-m-Y", strtotime($course->end_date))}}</p>
                        </div>
                        <div class="col-md-3">
                            <a href="/users/course/{{$course->id}}/edit" class="btn btn-warning">Edit</a>
                        </div>
                        <hr>
                    @endforeach

                </div>




            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

@endsection
