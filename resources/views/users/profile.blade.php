@extends('layouts.master')

<head>
    <title>Profile </title>

</head>
@section('linkcss')
    <link rel="stylesheet" href="{{url('/')}}/css/profile.css">
@endsection
@section('dashboradlink')
    profile
@endsection

@section('profile')
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
        <section class="profile-cv py-5">
            <div class="container py-5">
                <div class="employee">
                    <div class="row mt-3">
                        <div class="col-md-3 col-7 mx-auto mb-5">
                            <div class="image">
                                <img src="{{ url('/') }}/images/{{ $personals->image_name}}" class='img-fluid'>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="caption ml-4">

                                <h4 class="name mb-3">
                                    {{$personals->personal_name}}
                                </h4>

                                <p class='title-work'> {{$employement->position_name}}</p>

                                <p class="country">{{$personals->nicename}} / {{$personals->city_name}} </p>
{{--{{ route('reset.index') }}--}}
                                <a href="{{ route('reset.index') }}" class="change-pass">Change your Password</a>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <div class="icon">
                              @if($online_presences)
                                <a href="{{$online_presences->facebook}}" style="display: {{$online_presences->facebook? '': 'none'}}" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                <a href="{{$online_presences->stack_overview}}" style="display: {{$online_presences->stack_overview? '': 'none'}}" target="_blank"><i class="fa fa-stack-overflow"></i></a>
                                <a href="{{$online_presences->github}}" style="display: {{$online_presences->github? '': 'none'}}" target="_blank"><i class="fa fa-github"></i></a>
                                <a href="{{$online_presences->linkedin}}" style="display: {{$online_presences->linkedin? '': 'none'}}" target="_blank"><i class="fa fa-linkedin-in"></i></a>
                                <a href="{{$online_presences->instgram}}" style="display: {{$online_presences->instgram? '': 'none'}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                  @else

                                  @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="general-info mt-3 pb-5">


                                    <h3 class="mb-4 pb-3 title"><span><i class="icofont-info px-1"></i></span>General info</h3>
                                    <div class="ml-5">
                                        <h5 class="py-2"><b>Birth Date:</b><span>

                                                   {{$newDateB = date("d-m-Y", strtotime($personals->birthday))}}

                                                </span>
                                        </h5>
                                            <h5 class='title-work py-2'><b>experience level:</b> {{ $employement->scientific_name}}   </h5>
                                            <h5 class='title-work'> <b>Expected Salary:</b>
                                                <span>{{ $employement->expected_salary}} </span>
                                                <span> {{ $employement->currency_name}}</span>
                                            </h5>

                                        <h5 class="py-2"><b>Marital Status: </b><span>
                                                {{$personals->martial_status}}

                                        </span></h5>
                                        <h5 class="py-2"><b>Gender: </b><span> {{$personals->gender}}

                                        </span></h5>
                                        <h5 class="py-2"><b>Religion: </b><span> {{$personals->religion_name}}

                                        </span></h5>
                                        <h5 class="py-2"><b>Nationality: </b><span> {{$personals->nationality_enNationality}}

                                        </span>
                                        </h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-info ml-3 mt-3">
                                    <h3 class="mb-4 pb-3 title"><span><i class="icofont-contacts px-2"></i></span>contact info</h3>
                                    <div class="ml-5">
                                        <h6 class="mb-4"><i class="icofont-iphone mr-3"></i>
                                            {{$personals->mobile}}
                                        </h6>
                                        <h6 class="mb-4 email"><i class="icofont-envelope mr-3"></i>
                                            {{$personals->email}}
                                        </h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  Education  -->
                    <div class="experience">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="edu mt-2 pb-5">
                                    <h3 class="pb-3 mb-4 title"><span><i class="icofont-book px-2"></i></span>Education</h3>
                                    <div class="caption ml-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5><b>High School: </b><span class="school-name"> {{$schools->high_school}} </span></h5>
                                                <h6><b>Graduation Year: </b><span> {{$schools->gradatesyear}} </span></h6>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5><b>University:</b>  <span class="uni-name">  {{$universities->university_name}}  </span></h5>
                                                <h6><b>Degree: </b> <span> {{$universities->degree_name}} </span></h6>
                                                <h6><b>Field(s) of Study: </b> <span> {{$universities->fields_study}} </span></h6>
                                                <h6><b>Graduation Year: </b> <span> {{$universities->endyear}} </span></h6>
                                                <h6><b>Grade: </b> <span> {{$universities->grade_name}}</span></h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>




                            <div class="col-md-6 ">
                                <div class="exper mt-2">
                                    <h3 class="pb-3 mb-4 title"><span><i class="icofont-worker px-2"></i></span>Work Experience</h3>
                                    <div class="caption ml-5">
                                        @foreach($experiences as $experience)

                                       {{-- {{

                                             $years = floor(abs(strtotime($experience->date_end) - strtotime($experience->date_start)) / (365*60*60*24)),
                                             $months = floor((abs(strtotime($experience->date_end) - strtotime($experience->date_start)) - $years * 365*60*60*24) / (30*60*60*24)),
                                             $days = floor((abs(strtotime($experience->date_end) - strtotime($experience->date_start)) - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)),
                                             $originalDateF = $experience->date_start,
                                             $newDateF = date("d-m-Y", strtotime($originalDateF)),
                                             $originalDateT = $experience->date_end,
                                             $newDateT = date("d-m-Y", strtotime($originalDateT))
                                        }}--}}

                                        <h5> {{$experience->job_title}} <b> &nbsp; At &nbsp; </b>  {{$experience->company_name }}</h5>
                                        <p>  <i class="icofont-long-arrow-right"></i> {{ date("d-m-Y", strtotime($experience->date_start)) }} / To  <i class="icofont-long-arrow-right"></i> {{ date("d-m-Y", strtotime($experience->date_end)) }} </p>
                                        <p>  {{floor(abs(strtotime($experience->date_end) - strtotime($experience->date_start)) / (365*60*60*24))}} Years
                                             {{floor((abs(strtotime($experience->date_end) - strtotime($experience->date_start)) - floor(abs(strtotime($experience->date_end) - strtotime($experience->date_start)) / (365*60*60*24)) * 365*60*60*24) / (30*60*60*24))}} month
                                            {{floor((abs(strtotime($experience->date_end) - strtotime($experience->date_start)) - floor(abs(strtotime($experience->date_end) - strtotime($experience->date_start)) / (365*60*60*24)) * 365*60*60*24 - floor((abs(strtotime($experience->date_end) - strtotime($experience->date_start)) - floor(abs(strtotime($experience->date_end) - strtotime($experience->date_start)) / (365*60*60*24)) * 365*60*60*24) / (30*60*60*24))*30*60*60*24)/ (60*60*24))}} day </p>
                                        @endforeach


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="lan-cor">
                        <div class="row">

                            <div class="col-md-6 ">
                                <div class="language pb-5">
                                    <h3 class="pb-3 mb-4 title"><span><i class="icofont-globe px-2"></i></span>Languages</h3>
                                    <div class="ml-5">
                                        @foreach($languages_lists as $languages_list)
                                            <span><b> {{$languages_list->language_name}} </b> <i class="icofont-long-arrow-right"></i> -> </span>
                                            <span>  {{$languages_list->language_level_name}} </span>
                                            <br>
                                            @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="skill">
                                    <h3 class="pb-3 mb-4 title"><span><i class="icofont-brain-alt px-2"></i></span>Skills</h3>
                                    <div class="ml-5">
                                        <div class="row">
                                            @foreach($skills as $skill)
                                                <div class="col-md-6 my-1">
                                                    <span><i class="icofont-minus px-1">{{ $skill->skill_name  }}</i></span><span class="skillname"><b></b></span>  <br/>
                                                </div>
                                            @endforeach

                                        <!-- Button trigger modal -->

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="courses-certif">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="courses pb-5">

                                    <h3 class="pb-3 mb-4 title"><span><i class="icofont-badge px-1"></i> </span>Trainings & Courses</h3>
                                    <div class="ml-5">
                                        @foreach($courses as $course)
                                            <p><b> {{$course->course_name}}</b><span> at </span> &nbsp; <b>{{$course->organization_name}}  </b> </p>
                                            <p>{{ date("d-m-Y", strtotime($course->start_date)) }}<span> to </span>{{date("d-m-Y", strtotime($course->end_date))}}</p>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="certificates">

                                    <h3 class="pb-3 mb-4 title"><span><i class="icofont-certificate px-1"></i> </span>Certificates</h3>
                                    <div class="ml-5">
                                        <div class="row">

                                            @foreach($certifations as $certifation)
                                                  <div class="col-md-4 img-col col-sm-6">
                                                    <a href="#ex{{$i=$i+1}}" rel="modal:open">
                                                        <img src="{{url('/')}}/images/certifications/{{$certifation->certification_url}}" class="img-fluid">
                                                    </a>
                                                </div>

                                                <!-- Modal HTML embedded directly into document -->
                                                <div id="ex{{$i}}" class="modal img-modal">
                                                    <img src="{{url('/')}}/images/certifications/{{$certifation->certification_url}}" class="img-fluid">
                                                </div>

                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <!-- jQuery Modal -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

            <style>
                .img-modal{
                    width: auto !important;
                }
            </style>
@endsection
