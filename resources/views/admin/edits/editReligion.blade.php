@extends('layouts.master')

@section('content')

<div class="col-12 alert alert-success">
    <h1>Edit Religion</h1>
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
        <form action="/admin/religion/{{$religionData->id}}" method="post">
            {{csrf_field()}}
            {!! method_field('PUT') !!}
            <div class="form-group text-center">
                <label for="">Update Religion Name</label>
                <input type="text" name="religion_name" class="form-control {{$errors->has('religion_name')? 'border-danger' : ''}}" value="{{$religionData->religion_name}}" placeholder="Enter Religion name">
            </div>
            <div class="form-group">

                <input type="submit" name="submit" class="form-control btn btn-primary" value="Update">
            </div>

        </form>
    </div>

@endsection
