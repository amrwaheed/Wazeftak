<?php

namespace App\Http\Controllers\User;

use App\ModelsUser\EducationInformation;
use App\ModelsUser\UniversityInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
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
                'schoolname' => 'required|max:50',
                'yeargraduation' => 'required',

            ]);
            $school = new EducationInformation();
            $school->high_school = $request->input('schoolname');
            $school->gradatesyear = $request->input('yeargraduation');
            $school->user_id = auth()->user()->id;
            $school->save();
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
        $schools = DB::table('schools')
            ->join('users','schools.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get()->first();
        $universities = DB::table('universities')
            ->join('degrees','universities.degree_id' , 'degrees.id')
            ->join('grades','universities.grade_id' , 'grades.id')
            ->join('users','universities.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get()->first();

        $courses = DB::table('courses')

            ->join('users','courses.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get();

        return view('users/edit/education' ,compact('schools' , 'universities','courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schools = DB::table('schools')
            ->join('users','schools.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get()->first();

       // dd($schools);
        return view('users/edit/school' ,compact('schools'));
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
                'schoolname' => 'required|max:50',
                'yeargraduation' => 'required',

            ]);
            $school =  EducationInformation::find($id);
            $school->high_school = $request->input('schoolname');
            $school->gradatesyear = $request->input('yeargraduation');

            $school->save();
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
