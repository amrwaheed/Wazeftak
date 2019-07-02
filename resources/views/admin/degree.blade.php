@extends('layouts.master')

@section('dashboradlink')
    Degree
@endsection

@section('content')
   <div class="col-sm-12 alert alert-success">
       <h1>Degree</h1>
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
                <form action="/admin/degree" method="post">
                    {{csrf_field()}}
                    <div class="form-group text-center " >
                        <label for="">Degree Name</label>
                        <input type="text" name="degree_name" value="{{Request::old('degree_name')}}" class="form-control {{$errors->has('degree_name')? 'border-danger' : ''}}" placeholder="Enter Position name">
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
                        <th scope="col">Degree Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Degrees as $degree)
                        <tr>
                            <td>{{$degree->id}}</td>
                            <td>{{$degree->degree_name}}</td>
                            <td>
                                <a href="/admin/degree/{{$degree->id}}/edit" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="/admin/degree/{{$degree->id}}" method="post">
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
                    {{ $Degrees->links() }}
                </div>
            </div>



        </div>
    </div>


@endsection
