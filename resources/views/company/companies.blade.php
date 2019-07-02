@extends('layouts.master')

<head>
    <title>Wazzaf  Add information</title>

</head>
@section('dashboradlink')
    Companies
@endsection

@section('company')
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

            <div class="tables mb-3">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-sm-12  table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl m-auto" >
                            <table class="table table-hover mytable text-center" id="mytable">

                                <thead class="thead-light" >
                                <tr>

                                    <th scope="col">
                                        Name
                                    </th>
                                    <th scope="col">
                                        E-mail
                                    </th>
                                    <th scope="col">
                                        Position
                                    </th>
                                    <th scope="col">
                                      Phone
                                    </th>

                                    <th scope="col">
                                        Image
                                    </th>

                                    <th scope="col">
                                        show
                                    </th>


                                </tr>
                                </thead>
                                @foreach($personals as $personal)
                                <tbody class="text-center">

                                    <th scope="col">
                                        {{$personal->personal_name}}
                                    </th>
                                    <th scope="col">
                                        {{$personal->email}}

                                    </th>
                                    <th scope="col">
                                        {{$personal->position_name}}

                                    </th>
                                    <th scope="col">
                                        {{$personal->mobile}}

                                    </th>

                                    <th scope="col">
                                        <img src="{{url('/')}}/images/{{$personal->image_name}}" class=" img-fluid " style="width: 67px;height: 67px;" >
                                    </th>

                                    <th scope="col">
                                        <a href="/company/company/{{$personal->id}}" class="btn btn-primary" >Show</a>
                                    </th>

                                </tbody>
                                @endforeach
                            </table>

                                <div class=" offset-5">
                                    {{ $personals->links() }}
                                </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>



@endsection

@section('linkjs')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    {{--<script src="{{url('/')}}/js/users.js"></script>--}}
    <script type="text/javascript">
        $(document).ready(function() {
            'use strict';
            {{--$('#mytable').DataTable({--}}
                {{--"processing": true,--}}
                {{--"serverSide": true,--}}
                {{--"ajax": "{{ route('data.getdata') }}",--}}
                {{--"columns": [--}}
                    {{--// {data: 'DT_RowIndex', name: 'DT_RowIndex'},--}}
                    {{--{ "data" : 'name' , 'name' : 'name'},--}}
                    {{--{ "data" : 'email' , 'name' : 'email'},--}}
                    {{--{ "data" : 'position' , 'name' : 'position'},--}}
                    {{--{"data": 'Phone', "name": 'Phone'},--}}
                    {{--{"data": 'Image', "name": 'Image'},--}}
                    {{--{"data": 'action', "name": 'show', "orderable": false, "searchable": false},--}}


                {{--]--}}
            {{--});--}}
        });
    </script>
@endsection