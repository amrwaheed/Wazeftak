@extends('layouts.master')
@section('dashboradlink')
    religion
@endsection
@section('content')

    <div class="col-12 alert alert-success">
        <h1>Religion</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/admin/religion" method="post">
                    {{csrf_field()}}
                    <div class="form-group text-center">
                        <label for="">Religion Name</label>
                        <input type="text" name="religion_name"  value="{{Request::old('religion_name')}}" class="form-control {{$errors->has('religion_name')? 'border-danger' : ''}}" placeholder="Enter Religion name">
                    </div>
                    <div class="form-group">

                        <input type="submit" name="submit" class="form-control btn btn-primary" value="Insert">
                    </div>

                </form>
            </div>



            <div class="col-md-6">
                <table class="table  table-hover table-striped table-bordered table-responsive-lg">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Religion Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($religions as $religion)
                        <tr>
                            <td>{{$religion->id}}</td>
                            <td>{{$religion->religion_name}}</td>
                            <td>
                                <a href="/admin/religion/{{$religion->id}}/edit" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="/admin/religion/{{$religion->id}}" method="post">
                                    {{csrf_field()}}
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="">
                    {{ $religions->links() }}
                </div>
            </div>

        </div>
    </div>


@endsection
