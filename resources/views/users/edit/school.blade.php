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
                <form action="/users/education/{{ $schools->id }}" method="post">
                {{csrf_field()}}
                {!! method_field('PUT') !!}
                <!-- Modal -->

                    <div class="row">
                        <h2 class="my-2"> Edit High School</h2>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>High School</label><span class="css-dv1j8g">*</span>
                                <input type="text" class="form-control" placeholder="" value="{{ $schools->high_school }}" id="schoolname" name="schoolname" title="Edit Your High School">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>End year</label><span class="css-dv1j8g">*</span><br>
                                <select class="years form-control px-4 py-2" required name="yeargraduation"  value="{{$schools->gradatesyear}}"  >
                                    <option disabled selected hidden>Select Graduation Year</option>
                                </select>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary my-3" value="update School">
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
                    $select.append($('<option ></option>').val(i).html(i))
                }
                var code = $select.attr('value');
                $select.val(code);

            });
        });
    </script>


@endsection
