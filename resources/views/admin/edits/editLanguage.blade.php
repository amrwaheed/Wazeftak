@extends('layouts.master')

@section('content')

    <div class="col-12 alert alert-success">
        <h1>edit Language</h1>
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
        <form action="/admin/language/{{$languageData->id}}" method="post">
            {{csrf_field()}}
            {!! method_field('PUT') !!}
            <div class="form-group text-center">
                <label for="">Update Language Name</label>
                <input type="text" name="language_name" class="form-control {{$errors->has('language_name')? 'border-danger' : ''}}" value="{{$languageData->language_name}}" placeholder="Enter Language name">
            </div>
            <div class="form-group">

                <input type="submit" name="submit" class="form-control btn btn-primary" value="Update">
            </div>

        </form>
    </div>

@endsection
