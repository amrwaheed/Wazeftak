@extends('layouts.master')

@section('content')
    <div class="col-12 alert alert-success">
        <h1>edit Career level</h1>
    </div>

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
        <form action="/admin/career/{{$carer->id}}" method="post">
            {{csrf_field()}}
            {!! method_field('PUT') !!}
            <div class="form-group text-center">
                <label for="">Update Career level Name</label>
                <input type="text" name="scientificname" class="form-control {{$errors->has('scientificname')? 'border-danger' : ''}}"   value="{{$carer->scientific_name}}" placeholder="Enter Career level name">
            </div>
            <div class="form-group">

                <input type="submit" name="submit" class="form-control btn btn-primary" value="Update">
            </div>

        </form>
    </div>

@endsection
