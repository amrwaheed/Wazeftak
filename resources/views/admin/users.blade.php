@extends('layouts.master')
@section('dashboradlink')
    users
@endsection
@section('content')
    <br>
    <h1>Welcom Admin page</h1>

    <h1>Users</h1>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <table class="table  table-hover table-striped table-bordered table-responsive-lg table-responsive-md table-responsive-sm  table-responsive-xl" >
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">isAdmin</th>
                        <th scope="col">user Name</th>
                        <th scope="col">email</th>
                        <th scope="col">created at</th>
                        <th scope="col">updated at</th>

                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->isAdmin}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>
                                <a href="/admin/users/{{$user->id}}/edit" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="/admin/users/{{$user->id}}" method="post">
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
                    {{ $users->links() }}
                </div>

            </div>

        </div>
    </div>


@endsection
