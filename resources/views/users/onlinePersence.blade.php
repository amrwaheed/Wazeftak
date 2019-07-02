@extends('layouts.master')

<head>
    <title>Wazzaf  Add information</title>

</head>
@section('dashboradlink')
    online presence
@endsection

@section('online_presence')
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
            <form action="{{route('onlinePersence.store')}}" method="post">
            {{csrf_field()}}

            <!-- Modal -->

                <div class="row">
                    <h2 class="my-2"> Add Your Online Presence</h2>


                        <div class=" form-group col-12">
                            <label for="linkedin" class="col-sm-2 col-form-label">LinkedIn</label>
                            <div class="">
                                <input type="url" class="form-control mb-2 " id="linkedin" name="linkedin">
                            </div>
                        </div>

                    <!---->
                    <div class="form-group col-12">
                        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="">
                            <input type="url" class="form-control mb-2 " id="facebook" name="facebook">
                        </div>
                    </div>
                    <!---->
                    <div class=" form-group col-12">
                        <label for="behance" class="col-sm-2 col-form-label">Behance</label>
                        <div class="">
                            <input type="url" class="form-control mb-2 " id="behance" name="behance">
                        </div>
                    </div>
                    <!---->
                    <div class="form-group col-12">
                        <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="">
                            <input type="url" class="form-control mb-2 " id="instagram" name="instagram">
                        </div>
                    </div>
                    <!---->
                    <div class="form-group col-12">
                        <label for="gitHub" class="col-sm-2 col-form-label">GitHub</label>
                        <div class="">
                            <input type="url" class="form-control mb-2 " id="gitHub" name="gitHub">
                        </div>
                    </div>
                    <!---->
                    <div class="form-group col-12">
                        <label for="stackoverflow" class="col-sm-2 col-form-label">Stack Overflow</label>
                        <div class="">
                            <input type="url" class="form-control mb-2 " id="stackoverflow" name="stackoverflow">
                        </div>
                    </div>

                    <!---->
                    <div class="form-group col-12">
                        <label for="youTube" class="col-sm-2 col-form-label">YouTube</label>
                        <div class="">
                            <input type="url" class="form-control mb-2 " id="youTube" name="youTube">
                        </div>
                    </div>
                    <!---->
                    <div class="form-group col-12">
                        <label for="blog" class="col-sm-2 col-form-label">Blog</label>
                        <div class="">
                                <input type="url" class="form-control mb-2 " id="blog" name="blog">
                        </div>
                    </div>

                    <!---->
                    <div class="form-group col-12">
                        <label for="website" class="col-sm-2 col-form-label">Website</label>
                        <div class="">
                            <input type="url" class="form-control mb-2 " id="website" name="website">
                        </div>
                    </div>

                    <!---->
                    <div class="form-group col-12">
                        <label for="other" class="col-sm-2 col-form-label">Other</label>
                        <div class="">
                            <input type="url" class="form-control mb-2 " id="other" name="other">
                        </div>
                    </div>
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
