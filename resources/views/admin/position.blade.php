@extends('layouts.master')

@section('dashboradlink')
    Position
@endsection
@section('content')

    <div class="col-sm-12 alert alert-success">
        <h1>Position Work</h1>
    </div>


    <div class="container" style="min-height: 100%">
        <div class="row">
            <div class="col-md-6">
                @if(count($errors)>0)
                    <div class="alert alert-danger " >
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/admin/position" method="post">
                    {{csrf_field()}}
                    <div class="form-group text-center " >
                        <label for="">Position Name</label>
                        <input type="text" name="position_name"  value="{{Request::old('position_name')}}" class="form-control {{$errors->has('position_name')? 'border-danger' : ''}}" placeholder="Enter Position name">
                    </div>
                    <div class="form-group">

                        <input type="submit" name="submit" class="form-control btn btn-primary" value="Insert">
                    </div>

                </form>
            </div>



            <div class="col-md-6">
                <table class="table  table-hover table-striped table-bordered table-responsive-lg">
                    <thead class="table-secondary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Position Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($positions as $position)
                        <tr>
                            <td>{{$position->id}}</td>
                            <td>{{$position->position_name}}</td>
                            <td>
                                <a href="/admin/position/{{$position->id}}/edit" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="/admin/position/{{$position->id}}" method="post">
                                    {{csrf_field()}}
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    <br>

                    </tbody>
                </table>
                <div class="">
                    {{ $positions->links() }}
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>



        </div>
    </div>


@endsection
