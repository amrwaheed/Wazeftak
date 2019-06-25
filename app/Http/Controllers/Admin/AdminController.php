<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Touches;

class AdminController extends Controller
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

        // dd(url('/').'/img/Purevisionlogo0.png');
        //$touches = DB::table('touches')->with('countryy')->paginate(10);
        $touches = Touches::with('countryy')->paginate(10);
        // foreach ($touches as $touche) {
        //     dd($touche->countryy->nicename);
        // }
        
        $i = 1;
         return view('dashborad' , compact('touches' , 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
        $counrty= DB::table('countries')->get();;
        $reqtouch =  Touches::find($id);
        $types=explode(',',$reqtouch->typeproject);
       
        $phone= $reqtouch->phone;
        $phon= substr($phone ,-10) ;
        $code= substr($phone ,0 ,3) ;
     
        return view( 'edits/reqesttouch' , compact('reqtouch','types','counrty','phon' , 'code') );

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
        if ($request->isMethod('PUT')) {
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
            $touches = Touches::find($id);
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

        }
        return redirect('dashborad')->with(['status' => 'Data Updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $touches =Touches::find($id);

        $touches->delete();
        return redirect('/dashborad');
    }
}
