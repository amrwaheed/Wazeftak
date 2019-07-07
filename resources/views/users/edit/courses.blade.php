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
                <form action="/users/course/{{$courses->id}}" method="post">
                {{csrf_field()}}
                {!! method_field('PUT') !!}
                <!-- Modal -->

                    <div class="row">
                        <h2 class="my-2"> Edit courses</h2>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Training/Courses Topic</label><span class="css-dv1j8g">*</span>
                                <input type="text" class="form-control" placeholder="e.g JavaScript, Php" name="training_courses" value="{{$courses->course_name}}" title="edit your Training or Courses">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Organization/Institution Name</label><span class="css-dv1j8g">*</span>
                                <input type="text" class="form-control" placeholder="e.g AUC, Route" name="Organization_Institution" value="{{$courses->organization_name}}" title="edit your Organization">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Start year</label><span class="css-dv1j8g">*</span><br>
                            <input type="date" class="form-control" name="date_start_course"  value="{{$courses->start_date}}">
                        </div>

                        <div class="col-md-6">
                            <label>End year</label><span class="css-dv1j8g">*</span><br>
                            <input type="date" class="form-control" name="date_end_course"  value="{{$courses->end_date}}">
                        </div>
                        <input type="submit" name="courses" class="btn btn-primary my-3" value="Update Course">

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
