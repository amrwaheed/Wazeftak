<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Datatables;
use Yajra\DataTables\Facades\DataTables as YajraDataTables;

class UserController extends Controller
{
    public function index()
    {

       return view('users');
    }

    public function delete($id)
    {
        $users=User::find($id);
  
        $users->delete();
        return view('users');
    }


      function getdata()
    {
        //$users = User::select(['id','name','email','created_at','updated_at']);
    
        return YajraDataTables::of(User::all())
        ->addColumn('action', function ($user) {
            return '<a href="'.$user->id.'" class="btn btn-xs btn-primary edit"><i class="glyphicon glyphicon-edit"></i> Edit</a> 
                    <a href="users/'.$user->id.'" class="btn btn-xs btn-danger delete"><i class="glyphicon glyphicon-delete"></i> Delete</a> ';
        })
      
        // ->editColumn('id', 'ID: {{$id}}')
        ->editColumn('created_at', function (User $user){
            return $user->created_at->diffForHumans();
        })
        ->editColumn('updated_at', function (User $user){
            return $user->updated_at->diffForHumans();
        })
      
        ->make(true);
    }

 
}
