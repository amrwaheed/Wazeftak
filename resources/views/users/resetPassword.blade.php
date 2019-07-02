@extends('layouts.master')

<head>
    <title>Wazzaf  Add information</title>

</head>
@section('dashboradlink')
    reset password
@endsection

@section('reset')
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
                <form action="/users/reset/{{Auth()->user()->id}}" method="post">
                {{csrf_field()}}
                {!! method_field('PUT') !!}
                <!-- Modal -->

                    <div class="row">
                        <div class="col-sm-12">
                             <h2 class="my-2"> Update Your Password</h2>
                        </div>
                    </div>
                    <div class="row">

                        <div class=" form-group col-12">
                            <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="">
                                <input type="password" class="form-control mb-2 " id="oldpassword" name="oldpassword">
                            </div>
                        </div>

                        <!---->
                        <div class="form-group col-12">
                            <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                            <div class="">
                                    <input type="password" class="form-control mb-2 " id="newpassword" name="newpassword">
                            </div>
                        </div>
                        <!---->
                        <div class=" form-group col-12">
                            <label for="confirmpassword" class="col-sm-3 col-form-label">Confirm Passwords</label>
                            <div class="">
                                <input type="password" class="form-control mb-2 " id="confirmpassword" name="confirmpassword">
                            </div>
                        </div>
                        {{--<input type="hidden" value="{{Auth()->user()->id}}">--}}
                        <!--                                -->
                        <div class="form-group col-12">
                            <input type="submit" class="btn btn-info" name="online" value="Insert online">
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>



@endsection
