@extends('layouts.master')

@section('content')
    <h1>Welcom Admin page</h1>

    <h1>edit Grade</h1>
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
        <form action="/admin/grade/{{$gradeData->id}}" method="post">
            {{csrf_field()}}
            {!! method_field('PUT') !!}
            <div class="form-group text-center">
                <label for="">Update Grade Name</label>
                <input type="text" name="grade_name" class="form-control {{$errors->has('grade_name')? 'border-danger' : ''}}"  value="{{$gradeData->grade_name}}" placeholder="Enter Grade name">
            </div>
            <div class="form-group">

                <input type="submit" name="submit" class="form-control btn btn-primary" value="Update">
            </div>

        </form>
    </div>

@endsection
