<?php

namespace App\Http\Controllers\User;

use App\ModelsUser\UniversityInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UniversityController extends Controller
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
        $degrees = DB::table('degrees')->get();
        $grades = DB::table('grades')->get();
        return view('users/education' , compact('degrees' ,'grades'));
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
                'degreelevel' => 'required|',
                'university' => 'required|max:55',
                'Field' => 'required',
                'yeargraduation' => 'required',
                'grade' => 'required',

            ]);
            $universtiy = new UniversityInformation();
            $universtiy->degree_id = $request->input('degreelevel');
            $universtiy->university_name = $request->input('university');
            $universtiy->fields_study = $request->input('Field');
            $universtiy->endyear = $request->input('yeargraduation');
            $universtiy->grade_id = $request->input('grade');
            $universtiy->user_id = auth()->user()->id;
            $universtiy->save();
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
        $degrees = DB::table('degrees')->get();
        $grades = DB::table('grades')->get();
        $universities = DB::table('universities')
            ->join('degrees','universities.degree_id' , 'degrees.id')
            ->join('grades','universities.grade_id' , 'grades.id')
           // ->join('users','universities.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get()->first();
        //dd($universities);
        return view('users/edit/university' ,compact('universities','degrees','grades'));
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
                'degreelevel' => 'required|',
                'university' => 'required|max:55',
                'Field' => 'required',
                'yeargraduation' => 'required',
                'grade' => 'required',

            ]);
            $universtiy =  UniversityInformation::find($id);
            $universtiy->degree_id = $request->input('degreelevel');
            $universtiy->university_name = $request->input('university');
            $universtiy->fields_study = $request->input('Field');
            $universtiy->endyear = $request->input('yeargraduation');
            $universtiy->grade_id = $request->input('grade');

            $universtiy->save();
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
