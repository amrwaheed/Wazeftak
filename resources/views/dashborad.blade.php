@extends('layouts.admin')

@section('dashborad')
active 
@endsection

@section('dashboradlink')
    Dashborad
@endsection

@section('content')
<!-- start    table    -->
@if ($message = Session::get('status'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
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
                                 Country
                            </th>
                            <th scope="col">
                                phone
                            </th>
                            <th scope="col">
                              message
                            </th>
                            <th scope="col">
                                    show
                            </th>
                            <th scope="col">
                                 Delete
                            </th>
                        </tr>
                    </thead>
                    <tr>

                        @foreach ($touches as $touch)
                            <td>{{ $i++}}</td>
                            <td>{{$touch->fullname}} </td>
                            <td>{{$touch->email}} </td>
                            <td>{{$touch->countryy->nicename}} </td>
                            <td>{{$touch->phone}} </td>
                            <td>{{$touch->message}} </td>
                            <td><a href="dashborad/{{$touch->id}}/edit" class="btn btn-success">{{ trans('message.show') }}</a></td>
                            <td>
                                <form action="/dashborad/{{$touch->id}}" method="post">
                                    {{csrf_field()}}
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" class="btn btn-danger">{{ trans('message.delete') }}</button>
                                </form>
                                 
                            </td>

                        @endforeach
                    </tr>


                </table>
                {{$touches->render()}}
            </div>
        </div>
    </div>
</div>


<!-- End   table   -->
@endsection