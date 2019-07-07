<?php

namespace App\Http\Controllers\User;

use App\ModelsUser\CourseInformation;
use App\ModelsUser\EducationInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
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
                'training_courses' => 'required|max:50',
                'Organization_Institution' => 'required|max:100',
                'date_start_course' => 'required|',
                'date_end_course' => 'required|',

            ]);
            $coures = new CourseInformation();
            $coures->course_name = $request->input('training_courses');
            $coures->organization_name = $request->input('Organization_Institution');
            $coures->start_date = $request->input('date_start_course');
            $coures->end_date = $request->input('date_end_course');
            $coures->user_id = auth()->user()->id;
            $coures->save();
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
        $courses = DB::table('courses')
            //->join('users','courses.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get()->first();
        //dd($courses);
        return view('users/edit/courses' ,compact('courses','degrees','grades'));
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
                'training_courses' => 'required|max:50',
                'Organization_Institution' => 'required|max:100',
                'date_start_course' => 'required|',
                'date_end_course' => 'required|',

            ]);
            $coures =  CourseInformation::find($id);
            $coures->course_name = $request->input('training_courses');
            $coures->organization_name = $request->input('Organization_Institution');
            $coures->start_date = $request->input('date_start_course');
            $coures->end_date = $request->input('date_end_course');

            $coures->save();
            // Return user back and show a flash message
           return redirect()->back()->with(['status' => 'Data Updated successfully.']);
  ;

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
