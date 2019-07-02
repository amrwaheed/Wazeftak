@extends('layouts.master')

@section('content')

<div class="col-12 alert alert-success">
    <h1>edit Position</h1>
</div>
<br>

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
        <form action="/admin/position/{{$positionData->id}}" method="post">
            {{csrf_field()}}
            {!! method_field('PUT') !!}
            <div class="form-group text-center">
                <label for="">Update Position Name</label>
                <input type="text" name="position_name" class="form-control {{$errors->has('position_name')? 'border-danger' : ''}}" value="{{$positionData->position_name}}" placeholder="Enter Position name">
            </div>
            <div class="form-group">

                <input type="submit" name="submit" class="form-control btn btn-primary" value="Update">
            </div>

        </form>
    </div>

@endsection
