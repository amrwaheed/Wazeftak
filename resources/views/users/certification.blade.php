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
            <form action="{{route('certification.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <!-- Modal -->

                <div class="row">
                    <h2 class="my-2"> Add Your certification</h2>


                    <div class="alert alert-primary mx-4 col-12" role="alert">
                        Please Upload Photos Only .jpg , .png ...
                    </div>
                    <div class="col-12">
                        <div class="col-md-6">
                            <input type="file" accept="image/*" id="input01" multiple class="filestyle" name="file[]">
                            <div class="achievement py-3"></div>

                        </div>
                    </div>
                    <!--                                -->
                    <div class="form-group col-12">
                        <input type="submit" class="btn btn-info" name="online" value="Insert certification">
                    </div>


                </div>
            </form>
        </div>


    </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>



@endsection
