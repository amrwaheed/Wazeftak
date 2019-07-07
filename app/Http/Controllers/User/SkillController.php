<?php

namespace App\Http\Controllers\User;

use App\ModelsUser\CourseInformation;
use App\ModelsUser\SkillInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
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
        $languages = DB::table('languages')->get();
        $languages_level = DB::table('language_levels')->get();
        return view('users/skills',compact('languages' ,'languages_level'));
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
                'skillname' => 'required|max:50',


            ]);
            $skills = new SkillInformation();
            $skills->skill_name = $request->input('skillname');
            $skills->user_id = auth()->user()->id;
            $skills->save();
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

        $skills = DB::table('skills')
            //->join('users','skills.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get();
        $languages_lists = DB::table('languages_lists')
            ->join('languages','languages_lists.language_id' , 'languages.id')
            ->join('language_levels','languages_lists.language_level_id' , 'language_levels.id')
           // ->join('users','languages_lists.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get();
    //dd($skills);
        return view('users/edit/skills' ,compact('skills' , 'languages_lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skills = DB::table('skills')
            //->join('users','skills.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get()->first();
//dd($skills);
        return view('users/edit/editskill' ,compact('skills'));

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
                'skillname' => 'required|max:50',


            ]);
            $skills =  SkillInformation::find($id);
            $skills->skill_name = $request->input('skillname');

            $skills->save();
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
