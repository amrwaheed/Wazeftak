@extends('layouts.master')

@section('content')
    <h1>Welcom Admin page</h1>

    <h1>edit Degree</h1>
    <div class="col-md-6">
        @if(count($errors)>0)
            <div class="alert alert-success">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/admin/degree/{{$degreeData->id}}" method="post">
            {{csrf_field()}}
            {!! method_field('PUT') !!}
            <div class="form-group text-center">
                <label for="">Update Degree Name</label>
                <input type="text" name="degree_name" class="form-control {{$errors->has('degree_name')? 'border-danger' : ''}}" value="{{$degreeData->degree_name}}" placeholder="Enter Degree name">
            </div>
            <div class="form-group">

                <input type="submit" name="submit" class="form-control btn btn-primary" value="Update">
            </div>

        </form>
    </div>

@endsection
