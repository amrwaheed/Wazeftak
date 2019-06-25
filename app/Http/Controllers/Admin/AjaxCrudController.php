<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Yajra\DataTables\Contracts\DataTable;
use \Validator;
use Illuminate\Contracts\Validation\Validator as IlluminateValidator;

class AjaxCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
          
            
             return datatables()->of(User::latest()->get()) 
             ->addColumn('action' , function($data){
                 $button = '<button type="button" 
                            name="edit" id="'.$data->id.'" 
                            class="edit btn btn-primary btn-sm" 
                            data-toggle="modal" data-target="#formModal" >Edit </button>';
                $button .='&nbsp;';
                $button .= '<button type="button" 
                name="delete" id="'.$data->id.'" 
                class="delete btn btn-danger btn-sm" 
                data-toggle="modal" data-target="#confirmModal" >Delete </button>';
                return $button;

             })
             
            
             ->removeColumn('password')
             ->make(true);
        }
        return view('ajaxcrud');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax()){
            $data=User::findOrfail($id);
            return response()->json(['data' => $data]);

        }
          
            
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->isMethod('PUT')) {
           
                 $rules = array(
                    'name'      => 'required',
                    'email'      => 'required'
                   );  
                //   $this->validate($request,[
                //         'name'      => 'required',
                //         'email'      => 'required'
                //     ]);
                    $error= Validator::make($request->all() , $rules);
                  if ($error->fails()) {
                    return response()->json(["errors" => $error->errors()->all()]);
                  }
                    $form_data = array(
                        'name'  => $request->name,
                        'email' => $request->email
                    );

                   $users =  User::whereId($request->hidden_id)->update($form_data);
                   if($users){
                        return response()->json(["success" => "Data is Successfully Updated"]);
                   }
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas= User::findOrfail($id);

        $effected=$datas->delete();
     
    }
}
