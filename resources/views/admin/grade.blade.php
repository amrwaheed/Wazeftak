@extends('layouts.master')

@section('dashboradlink')
    Grade
@endsection

@section('content')

    <div class="col-12 alert alert-success">
        <h1>Grade</h1>
    </div>
    <div class="container">
        <div class="row">
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
                <form action="/admin/grade" method="post">
                    {{csrf_field()}}
                    <div class="form-group text-center " >
                        <label for="">Grade Name</label>
                        <input type="text" name="grade_name" value="{{Request::old('grade_name')}}" class="form-control {{$errors->has('grade_name')? 'border-danger' : ''}}" placeholder="Enter Grade name">
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
                        <th scope="col">Grade Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($grades as $grade)
                        <tr>
                            <td>{{$grade->id}}</td>
                            <td>{{$grade->grade_name}}</td>
                            <td>
                                <a href="/admin/grade/{{$grade->id}}/edit" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="/admin/grade/{{$grade->id}}" method="post">
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
                    {{ $grades->links() }}
                </div>
            </div>



        </div>
    </div>


@endsection
