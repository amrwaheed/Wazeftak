<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Join;

class JoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hiring');
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
        if ($request->isMethod('POST')) {
           
            $this->validate($request, [
                'fullname' => 'required|',
                'email' => 'required|',
                'phone' => 'required|max:15',
                'typeproj' => 'required',
                'nameproj' => 'required|',
                'descproj' => 'required|',
                'server' => 'required|',
             

            ]);
            $join = new Join();
         
            $join->fullname = $request->input('fullname');
            $join->email = $request->input('email');
            $join->phone = $request->input('phone');
            $tpye =  implode(',', $request->input('typeproj'));
            $join->typeproject =$tpye ;
            $join->nameproject = $request->input('nameproj');
            $join->description = $request->input('descproj');
            $join->server = $request->input('server');
            $join->save();
            // Return user back and show a flash message
            return redirect()->back()->with(['status' => 'Data created successfully.']);

        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
