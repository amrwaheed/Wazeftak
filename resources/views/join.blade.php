@extends('layouts.admin')

@section('join')
active 
@endsection

@section('dashboradlink')
    Join
@endsection

@section('content')
<!-- start    table    -->

<div class="tables mb-3">
    <div class="container">
        <div class="row ">
            <div class="col-sm-12  table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl m-auto">
                <table class="table table-hover ">
                    
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">
                                Name
                            </th>
                            <th scope="col">
                               E-mail
                            </th>
                          
                            <th scope="col">
                                phone
                            </th>
                            <th scope="col">
                                    Type project
                            </th>
                            <th scope="col">
                                    Name project
                            </th>
                            <th scope="col">
                                    Description project
                            </th>
                            <th scope="col">
                             Have a server
                            </th>
                            <th scope="col">
                                 Delete
                            </th>
                        </tr>
                    </thead>
                    <tr>

                        @foreach ($joins as $join)
                                <td>{{ $i++}}</td>
                                <td>{{$join->fullname}} </td>
                                <td>{{$join->email}} </td>
                                <td>{{$join->phone}} </td>
                                <td>{{$join->typeproject}} </td>
                                <td>{{$join->nameproject}} </td>
                                <td>{{$join->description}} </td>
                                <td>{{$join->server}} </td>
                              
                                <td>
                                    <form action="/join/{{$join->id}}" method="post">
                                        {{csrf_field()}}
                                        {!! method_field('DELETE') !!}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    
                                </td>

                        @endforeach
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>


<!-- End   table   -->
@endsection