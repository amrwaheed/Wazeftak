<?php

namespace App\Http\Controllers\User;

use App\ModelsUser\Employementinformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmployementController extends Controller
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
        $positions = DB::table('positions')->get();
        $currencies = DB::table('currencies')->get();
        $scientics = DB::table('scientific_levels')->get();
        return view('users/employement', compact('positions' , 'currencies' , 'scientics') );
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
                'position' => 'required|',
                'career_level' => 'required|',
                'salaryexpected' => 'required|integer|',
                'currancy' => 'required|',
                'smoke' => 'required|',
                'license' => 'required|',
                'fiveyears' => 'max:100|',

            ]);
            $employement = new Employementinformation();
            $employement->expected_salary = $request->input('salaryexpected');
            $employement->smoke = $request->input('smoke');
            $employement->license_drive = $request->input('license');
            $employement->youafterfive = $request->input('fiveyears');
            $employement->position_id = $request->input('position');
            $employement->scientific_id = $request->input('career_level');
            $employement->currancy_id = $request->input('currancy');
            $employement->user_id = auth()->user()->id ;
            $employement->save();
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

        $positions = DB::table('positions')->get();
        $currencies = DB::table('currencies')->get();
        $scientics = DB::table('scientific_levels')->get();
        $employement = DB::table('employementinformations')
            ->join('positions','employementinformations.position_id' , 'positions.id')
            ->join('currencies','employementinformations.currancy_id' , 'currencies.id')
            ->join('scientific_levels','employementinformations.scientific_id' , 'scientific_levels.id')
            ->join('users','employementinformations.user_id' , 'users.id')
            ->where('user_id', $id)
            ->get()->first();

        //dd($employement);
        return view('users/edit/employment',compact('employement' , 'positions' , 'currencies' , 'scientics'));
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
                'position' => 'required|',
                'career_level' => 'required|',
                'salaryexpected' => 'required|integer|',
                'currancy' => 'required|',
                'smoke' => 'required|',
                'license' => 'required|',
                'fiveyears' => 'max:100|',

            ]);
            $employement =  Employementinformation::find($id);
            $employement->expected_salary = $request->input('salaryexpected');
            $employement->smoke = $request->input('smoke');
            $employement->license_drive = $request->input('license');
            $employement->youafterfive = $request->input('fiveyears');
            $employement->position_id = $request->input('position');
            $employement->scientific_id = $request->input('career_level');
            $employement->currancy_id = $request->input('currancy');
            $employement->save();
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
