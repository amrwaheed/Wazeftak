<?php

namespace App\Http\Controllers\User;

use App\ModelsUser\OnlinePersence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OnlinePersenceController extends Controller
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
        return view('users/onlinePersence');

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
            $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
            $this->validate($request, [
                'linkedin'          => 'nullable|regex:'.$regex,
                'facebook'          => 'required|regex:'.$regex,
                'behance'           => 'nullable|regex:'.$regex,
                'instagram'         => 'nullable|regex:'.$regex,
                'gitHub'            => 'nullable|regex:'.$regex,
                'stackoverflow'     => 'nullable|regex:'.$regex,
                'youTube'           => 'nullable|regex:'.$regex,
                'blog'              => 'nullable|regex:'.$regex,
                'website'           => 'nullable|regex:'.$regex,
                'other'             => 'nullable|regex:'.$regex,

            ]);
            $online = new OnlinePersence();
            $online->linkedin = $request->input('linkedin');
            $online->facebook = $request->input('facebook');
            $online->behance = $request->input('behance');
            $online->instgram = $request->input('instagram');
            $online->github = $request->input('gitHub');
            $online->stack_overview = $request->input('stackoverflow');
            $online->youtube = $request->input('youTube');
            $online->blog = $request->input('blog');
            $online->website = $request->input('website');
            $online->others = $request->input('other');
            $online->user_id = auth()->user()->id;
            $online->save();

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
        $online_presences = DB::table('online_presences')
            //->join('users','online_presences.user_id' , 'users.id')
            ->where('user_id',$id)
            ->get()->first();


    //dd($online_presences);
        return view('users/edit/onlinelink' ,compact('online_presences'));

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
            $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
            $this->validate($request, [
                'linkedin'          => 'nullable|regex:'.$regex,
                'facebook'          => 'required|regex:'.$regex,
                'behance'           => 'nullable|regex:'.$regex,
                'instagram'         => 'nullable|regex:'.$regex,
                'gitHub'            => 'nullable|regex:'.$regex,
                'stackoverflow'     => 'nullable|regex:'.$regex,
                'youTube'           => 'nullable|regex:'.$regex,
                'blog'              => 'nullable|regex:'.$regex,
                'website'           => 'nullable|regex:'.$regex,
                'other'             => 'nullable|regex:'.$regex,

            ]);
            $online =  OnlinePersence::find($id);
            $online->linkedin = $request->input('linkedin');
            $online->facebook = $request->input('facebook');
            $online->behance = $request->input('behance');
            $online->instgram = $request->input('instagram');
            $online->github = $request->input('gitHub');
            $online->stack_overview = $request->input('stackoverflow');
            $online->youtube = $request->input('youTube');
            $online->blog = $request->input('blog');
            $online->website = $request->input('website');
            $online->others = $request->input('other');

            $online->save();

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
