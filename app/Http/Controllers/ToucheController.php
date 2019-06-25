<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Touches;

class ToucheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = DB::table('countries')->get();
        return view('contact' , compact('countries'));
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
                'username' => 'required|',
                'email' => 'required|',
                'Phone' => 'required|max:15',
                'country' => 'required',
                'typeproj' => 'required',
                'nameproj' => 'required|',
                'descproj' => 'required|',
                'server' => 'required|',
                'message' => 'required|',
                
             

            ]);
            $touches = new Touches();
         
            $touches->fullname = $request->input('username');
            $touches->email = $request->input('email');
            $touches->phone = $request->input('codes').$request->input('Phone');
            $touches->country = $request->input('country');
            $tpye =  implode(',', $request->input('typeproj'));
            $touches->typeproject =$tpye ;
            $touches->nameproject = $request->input('nameproj');
            $touches->description = $request->input('descproj');
            $touches->server = $request->input('server');
            $touches->message = $request->input('message');
            $touches->save();
            // Return user back and show a flash message
            return redirect()->back()->with(['status' => 'Data Sent successfully.']);

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
    //    $reqtouch =  Touches::find($id);
    //     return view('edits/reqesttouch',compact('reqtouch'));

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
