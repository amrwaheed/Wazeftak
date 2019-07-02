<?php

namespace App\Http\Controllers\User;

use App\ModelsUser\PersonalInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
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
        $country_list    =        DB::table('countries')->get();
        $religion        =        DB::table('religions')->get();
        $nationalities   =        DB::table('nationalities')->get();

        return view('users/personal' , compact('country_list','religion','nationalities'));
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
                'fullname' => 'required|max:25',
                'birthday' => 'required',
                'address' => 'required|max:90',
                'email' => 'required|max:40|unique:personal_informaions',
                'civil_id' => 'required',
                'telephone' => 'required|max:15',
                'phone' => 'required|max:15',
                'gender' => 'required|',
                'marital_stats' => 'required|',
                'cities' => 'required|max:15',
                'nationality' => 'required|',
                'countries' => 'required|',
                'religion' => 'required',
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $personal = new PersonalInformation();
            $personal->personal_name = $request->input('fullname');
            $personal->birthday = $request->input('birthday');
            $personal->address = $request->input('address');
            $personal->email = $request->input('email');
            $personal->civil_id_number = $request->input('civil_id');
            $personal->telephone = $request->input('telephone');
            $code = $request->input('code');
            $phone = $request->input('phone');
            $personal->mobile = $code.$phone;
            $personal->gender = $request->input('gender');
            $personal->martial_status = $request->input('marital_stats');
            $personal->city_name = $request->input('cities');
            $personal->nationality_id = $request->input('nationality');
            $personal->country_id = $request->input('countries');
            $personal->religion_id = $request->input('religion');
            $personal->user_id = \auth()->user()->id;

            // Check if a profile image has been uploaded
            if ($request->has('file')) {
                // Get image file
                $image = $request->file('file');
                // Make a image name based on  current timestamp getClientOriginalExtension
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                // Upload image
                $image->move(public_path('/images'), $imageName);
                // Set user profile image path in database to filePath
                $personal->image_name = $imageName;
            }
            $personal->save();

            // Return user back and show a flash message
            return redirect()->back()->with(['status' => 'Data created successfully.']);


        }
      //  return redirect()->back()->with(['status' => 'Error .']);

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
        $country_list    =        DB::table('countries')->get();
        $religion        =        DB::table('religions')->get();
        $nationalities   =        DB::table('nationalities')->get();

        $personalData = DB::table('personal_informaions')
         ->join('countries','personal_informaions.country_id' , 'countries.id')
          ->join('nationalities','personal_informaions.nationality_id' , 'nationalities.id')
        ->join('religions','personal_informaions.religion_id' , 'religions.id')
        ->join('users','personal_informaions.user_id' , 'users.id')
        ->where('user_id' , $id)
        ->get()->first();


//        $code= substr($personalData->mobile, 0,3);
//        $phone = substr($personalData->mobile, 3 );
       // $personalData= PersonalInformation::find($id);
      // dd($personalData);
        return view('users/edit/personal',compact('personalData' , 'country_list' , 'religion' ,'nationalities'));
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
                'fullname' => 'required|max:25',
                'birthday' => 'required',
                'address' => 'required|max:90',
                'email' => 'required|max:40|',
                'civil_id' => 'required',
                'telephone' => 'required|max:15',
                'phone' => 'required|max:15',
                'gender' => 'required|',
                'marital_stats' => 'required|',
                'cities' => 'required|max:15',
                'nationality' => 'required|',
                'countries' => 'required|',
                'religion' => 'required',
                'file' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $personal = PersonalInformation::find($id);
            $personal->personal_name = $request->input('fullname');
            $personal->birthday = $request->input('birthday');
            $personal->address = $request->input('address');
            $personal->email = $request->input('email');
            $personal->civil_id_number = $request->input('civil_id');
            $personal->telephone = $request->input('telephone');
            $code = $request->input('code');
            $phone = $request->input('phone');
            $personal->mobile = $code.$phone;
            $personal->gender = $request->input('gender');
            $personal->martial_status = $request->input('marital_stats');
            $personal->city_name = $request->input('cities');
            $personal->nationality_id = $request->input('nationality');
            $personal->country_id = $request->input('countries');
            $personal->religion_id = $request->input('religion');


            // Check if a profile image has been uploaded
            if ($request->has('file')) {
                // Get image file
                $image = $request->file('file');
                // Make a image name based on  current timestamp getClientOriginalExtension
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                // Upload image
                $image->move(public_path('/images'), $imageName);
                // Set user profile image path in database to filePath
                $personal->image_name = $imageName;
            }
            $personal->save();

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
