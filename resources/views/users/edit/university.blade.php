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
                <form action="/users/educations/{{$universities->id}}" method="post">
                {{csrf_field()}}
                {!! method_field('PUT') !!}
                <!-- Modal -->

                    <div class="row">
                        <h2 class="my-2"> Edit University</h2>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Degree Level</label><span class="css-dv1j8g">*</span>
                                <select class="form-control" id="degree" name="degreelevel">
                                    <option disabled selected hidden>Select Degree Level</option>
                                    @foreach($degrees as $degree)
                                        <option value="{{$degree->id}}" {{$universities->degree_id == $degree->id ? 'selected':'' }} >{{$degree->degree_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>University/Institution</label><span class="css-dv1j8g">*</span>
                                <input type="text" class="form-control" placeholder="e.g Ain Shams" id="universityName" name="university" value="{{$universities->university_name}}" title="Edit your University">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Field(s) of Study</label><span class="css-dv1j8g">*</span>
                                <input type="text" class="form-control" id="fieldName" placeholder="e.g finance political science,...." name="Field" value="{{$universities->fields_study}}" title="edit your Field">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>End year</label><span class="css-dv1j8g">*</span><br>
                                <select class="years form-control px-4 py-2" required name="yeargraduation"  value="{{$universities->endyear}}" >
                                    <option disabled selected hidden>Select Graduation Year</option>
                                </select>
                            </div>


                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Your Grade</label><span class="css-dv1j8g">*</span>
                                <select class="form-control" name="grade">
                                    <option disabled selected hidden>Select Grade</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}" {{$universities->grade_id == $grade->id ? 'selected':'' }} >{{$grade->grade_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" name="education" class="btn btn-primary my-3" value="Update University">
                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(function(){
                var $select = $(".years");
                var now = new Date();
                var today = now.getFullYear() ;

                for (i=today;i>=1950;i--) {
                    $select.append($('<option></option>').val(i).html(i))
                }
                var code = $select.attr('value');
                $select.val(code);
            });
        });
    </script>


@endsection
