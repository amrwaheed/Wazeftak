<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
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
        $users = DB::table('users')->get();
            $personals = DB::table('personal_informaions')
            ->join('countries','personal_informaions.country_id' , 'countries.id')
            ->join('nationalities','personal_informaions.nationality_id' , 'nationalities.id')
            ->join('religions','personal_informaions.religion_id' , 'religions.id')
            ->join('users','personal_informaions.user_id' , 'users.id')
            ->where('user_id',auth()->user()->id)
            ->get()->first();

        $i=0;
        $employement = DB::table('employementinformations')
            ->join('positions','employementinformations.position_id' , 'positions.id')
            ->join('currencies','employementinformations.currancy_id' , 'currencies.id')
            ->join('scientific_levels','employementinformations.scientific_id' , 'scientific_levels.id')
            ->join('users','employementinformations.user_id' , 'users.id')
            ->where('user_id',auth()->user()->id)
            ->get()->first();




        $universities = DB::table('universities')
            ->join('degrees','universities.degree_id' , 'degrees.id')
            ->join('grades','universities.grade_id' , 'grades.id')
            ->join('users','universities.user_id' , 'users.id')
            ->where('user_id',auth()->user()->id)
            ->get()->first();



        $skills = DB::table('skills')
            ->join('users','skills.user_id' , 'users.id')
            ->where('user_id',auth()->user()->id)
            ->get();


        $schools = DB::table('schools')
            ->join('users','schools.user_id' , 'users.id')
            ->where('user_id',auth()->user()->id)
            ->get()->first();


        $online_presences = DB::table('online_presences')
            ->join('users','online_presences.user_id' , 'users.id')
            ->where('user_id',auth()->user()->id)
            ->get()->first();



        $languages_lists = DB::table('languages_lists')
            ->join('languages','languages_lists.language_id' , 'languages.id')
            ->join('language_levels','languages_lists.language_level_id' , 'language_levels.id')
            ->join('users','languages_lists.user_id' , 'users.id')
            ->where('user_id',auth()->user()->id)
            ->get();


        $experiences = DB::table('experiences')
            ->join('users','experiences.user_id' , 'users.id')
            ->where('user_id',auth()->user()->id)
            ->orderBy('date_end' ,'desc')
            ->get();

      //  dd($experiences);
        $courses = DB::table('courses')

            ->join('users','courses.user_id' , 'users.id')
            ->where('user_id',auth()->user()->id)
            ->get();


        $certifations = DB::table('certifations')

            ->join('users','certifations.user_id' , 'users.id')
            ->where('user_id',auth()->user()->id)
            ->get();

        // ----------------

        /*$date1 = $experiences->date_start;
        $date2 = $experiences->date_end;
        $diff = abs(strtotime($date2) - strtotime($date1));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $originalDateF = $date1;
        $newDateF = date("d-m-Y", strtotime($originalDateF));
        $originalDateT = $date2;
        $newDateT = date("d-m-Y", strtotime($originalDateT));*/
        //-----------


        return view('users/profile' ,compact('personals' , 'employement' ,'universities' , 'skills' ,
            'schools' ,'online_presences','languages_lists', 'experiences' ,'courses' , 'certifations','users','i' ));

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
