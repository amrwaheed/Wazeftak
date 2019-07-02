@extends('layouts.master')
@section('dashboradlink')
    Languages
@endsection
@section('content')

    <div class="col-12 alert alert-success">
        <h1>Languages</h1>
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
                <form action="/admin/language" method="post">
                    {{ csrf_field() }}
                    <div class="form-group text-center {{$errors->has('name')? 'border-danger' : ''}}" >
                        <label for="">Language  Name</label>
                        <input type="text" name="language_name"  value="{{Request::old('language_name')}}" class="form-control {{$errors->has('language_name')? 'border-danger' : ''}}" placeholder="Enter Language name">
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
                        <th scope="col">Language Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($languages as $language)
                        <tr>
                            <td>{{$language->id}}</td>
                            <td>{{$language->language_name}}</td>
                            <td>
                                <a href="/admin/language/{{$language->id}}/edit" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="/admin/language/{{$language->id}}" method="post">
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
                    {{ $languages->links() }}
                </div>
            </div>



        </div>
    </div>


@endsection
