<?php

namespace App\Http\Controllers\User;

use App\ModelsUser\CertifationInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertifationController extends Controller
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
        return view('users/certification');
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
                'file' => 'required',
                'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]);

            if($request->hasfile('file'))
            {

                foreach($request->file('file') as $image)
                {

                    $photo_name = time().rand(1,1000000) .'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/certifications/');
                    $image->move($destinationPath,$photo_name);
                    $certification= new CertifationInformation();
                    $certification->certification_url = $photo_name;
                    $certification->user_id = auth()->user()->id;

                    $certification->save();

                }
            }


            // Return user back and show a flash message
            return redirect()->back()->with(['status' => 'Great! Images has been successfully uploaded.']);

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
