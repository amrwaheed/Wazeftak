@extends('layouts.master')

<head>
    <title>Wazzaf  Add information</title>

</head>

@section('dashboradlink')
    certification
@endsection
@section('certification')
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
                <div class="col-md-12 py-5">
                    <div class="certificates">

                        <h3 class="pb-3 mb-4 title border-bottom"><span><i class="icofont-certificate px-1"></i> </span>Certificates</h3>
                        <div class="col-md-12 py-4">
                            You Can Add Certification : <a href="{{route('certification.index')}}">Certification Presence</a>
                        </div>

                        <div class="ml-5">

                            <div class="row">

                                @foreach($certifations as $certifation)
                                    <div class="col-md-4 img-col col-sm-6">
                                        <a href="#ex{{$i=$i+1}}" rel="modal:open">
                                            <img src="{{url('/')}}/images/certifications/{{$certifation->certification_url}}" class="img-fluid">
                                        </a>
                                        <div class="py-2 col-sm-6 text-center">
                                            <a href="/users/certification/{{$certifation->id}}/edit" class="btn btn-warning">Edit</a>

                                        </div>
                                        <div class="py-2 col-sm-6 text-center">
                                            <form action="/users/certification/{{$certifation->id}}" method="post">
                                                {{csrf_field()}}
                                                {!! method_field('DELETE') !!}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                        </div>
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
