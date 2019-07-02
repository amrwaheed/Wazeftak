<?php

namespace App\Http\Controllers\User;

use App\ModelsUser\Experienceinformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExperienceController extends Controller
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

        return view('users/experience' );
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
                'companyname' => 'required|max:50',
                'jobtitle' => 'required',
                'datestart' => 'required|',
                'dateend' => 'required|',
                'leaving' => 'required',

            ]);
            $experience = new Experienceinformation();
            $experience->company_name = $request->input('companyname');
            $experience->job_title = $request->input('jobtitle');
            $experience->date_start = $request->input('datestart');
            $experience->date_end = $request->input('dateend');
            $experience->salary = $request->input('salary');
            $experience->reasonforleaving = $request->input('leaving');
            $experience->user_id = auth()->user()->id;

            $experience->save();
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
        $experiences = DB::table('experiences')
            ->join('users','experiences.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get();

     //dd($experiences);
        return view('users/edit/experience' ,compact('experiences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experiences = DB::table('experiences')
            ->join('users','experiences.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get()->first();
        //dd($experiences);
        return view('users/edit/editexperience' ,compact('experiences'));
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
                'companyname' => 'required|max:50',
                'jobtitle' => 'required',
                'datestart' => 'required|',
                'dateend' => 'required|',
                'leaving' => 'required',

            ]);
            $experience =  Experienceinformation::find($id);
            $experience->company_name = $request->input('companyname');
            $experience->job_title = $request->input('jobtitle');
            $experience->date_start = $request->input('datestart');
            $experience->date_end = $request->input('dateend');
            $experience->salary = $request->input('salary');
            $experience->reasonforleaving = $request->input('leaving');

            $experience->save();
            // Return user back and show a flash message
            return redirect()->back()->with(['status' => 'Data Updated successfully.']);

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
        //
    }
}
