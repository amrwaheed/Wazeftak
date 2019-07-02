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
        <form action="/users/experience/{{$experiences->id}}" method="post">
            {{csrf_field()}}
            {!! method_field('PUT') !!}

            <div class="row">
                <!-- Modal -->
                <div class="modal-body">
                    <div class="col-md-12 my-3">
                        <label>Company Name</label><span class="css-dv1j8g">*</span>
                        <input class="form-control" name="companyname" value="{{$experiences->company_name}}" placeholder="Company Name">
                    </div>
                    <div class="col-md-12 my-3">
                        <label>Job Title</label> <span class="css-dv1j8g">*</span>
                        <input class="form-control" name="jobtitle" placeholder="Job Title" value="{{$experiences->job_title}}" >
                    </div>
                    <div class="col-md-12 my-3">
                        <label>Date started </label> <span class="css-dv1j8g">*</span>
                        <input type="date" class="form-control" name="datestart" value="{{$experiences->date_start}}" >
                    </div>
                    <div class="col-md-12 my-3">
                        <div class="form-group" id="date-end">
                            <label>Date ended </label> <span class="css-dv1j8g">*</span>
                            <input type="date" class="form-control" name="dateend" value="{{$experiences->date_end}}" >
                        </div>

                    </div>
                    <div class="col-md-12 my-3">
                        <label>Salary </label> <span class="css-dv1j8g"></span>
                        <input type="number" class="form-control" name="salary" placeholder="Salary" value="{{$experiences->salary}}" >
                    </div>
                    <div class="col-md-12 my-3">

                    </div>
                    <div class="col-md-12 my-3">
                        <label>Reason for leaving </label>
                        <textarea name="leaving" class="form-control" id="" cols="10" rows="5" placeholder="Reason for leaving" maxlength="500">{{$experiences->reasonforleaving}} </textarea><span class="text-danger">Max length is 500 characters </span>

                    </div>
                    <div class="col-md-12 my-3">

                        <input type="submit" name="submitaddexperience" id="" class="btn btn-info mr-3 px-3" value="Update">

                    </div>
                </div>
            </div>
        </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


@endsection
