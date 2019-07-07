<?php

namespace App\Http\Controllers\User;

use App\ModelsUser\Level_LanguageInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LanguagelistController extends Controller
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
        return view('users/skills' ,compact('languages' ,'languages_level'));
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
                'lang_name' => 'required',
                'lang_exper' => 'required',


            ]);
            $lang = new Level_LanguageInformation();
            $lang->language_id = $request->input('lang_name');
            $lang->language_level_id = $request->input('lang_exper');
            $lang->user_id = auth()->user()->id;
            $lang->save();
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
        $languages = DB::table('languages')->get();
        $languages_level = DB::table('language_levels')->get();
        $languages_lists = DB::table('languages_lists')
            ->join('languages','languages_lists.language_id' , 'languages.id')
            ->join('language_levels','languages_lists.language_level_id' , 'language_levels.id')
            // ->join('users','languages_lists.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get()->first();
      //  dd($languages_lists);
        return view('users/edit/editlanguage' ,compact( 'languages_lists','languages','languages_level'));
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
                'lang_name' => 'required',
                'lang_exper' => 'required',


            ]);
            $lang =  Level_LanguageInformation::find($id);
            $lang->language_id = $request->input('lang_name');
            $lang->language_level_id = $request->input('lang_exper');

            $lang->save();
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
