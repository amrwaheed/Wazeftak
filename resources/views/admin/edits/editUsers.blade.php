@extends('layouts.master')

@section('content')

<div class="col-sm-12">
    <h2>Edit Users</h2>
</div>
<br>
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
        <form action="/admin/users/{{$userData->id}}" method="post" >
            {{csrf_field()}}
            {!! method_field('PUT') !!}
            <div class="form-group text-center">
                <label for=""> isAdmin </label>
                <input type="text" name="isAdmin" class="form-control {{$errors->has('isAdmin')? 'border-danger' : ''}}" value="{{$userData->isAdmin}}" placeholder="Enter user role">
            </div><div class="form-group text-center">
                <label for="">Update user Name</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')? 'border-danger' : ''}}" value="{{$userData->name}}" placeholder="Enter user name">
            </div>
            <div class="form-group text-center">
                <label for="">Update Email</label>
                <input type="text" name="email" class="form-control {{$errors->has('email')? 'border-danger' : ''}}" value="{{$userData->email}}" placeholder="Enter email">
            </div>

            <div class="form-group">

                <input type="submit" name="submit" class="form-control btn btn-primary" value="Update">
            </div>

        </form>
    </div>

@endsection
