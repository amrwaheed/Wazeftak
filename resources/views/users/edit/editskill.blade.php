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
                <form action="/users/skills/{{$skills->id}}" method="post">
                {{csrf_field()}}
                {!! method_field('PUT') !!}
                <!-- Modal -->

                    <div class="row">
                        <h2 class="my-2"> Add Skill</h2>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Skill Name</label><span class="css-dv1j8g">*</span>
                                <input type="text" class="form-control" name="skillname" placeholder="Java , Html , Php" value="{{$skills->skill_name}}" title="edit your Skill">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info" name="skilllls" value="Update Skill">
                    </div>
                </form>
            </div>

        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>



@endsection
