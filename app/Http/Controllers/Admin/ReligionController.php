<?php

namespace App\Http\Controllers\Admin;

use App\ModelsAdmin\Religion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReligionController extends Controller
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

        $religions=DB::table('religions')->paginate(3);
        return view('admin/religion' ,compact('religions'));
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
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'religion_name' => 'required|max:25|unique:religions'
            ]);
            $reliigion = new Religion();
            $reliigion->religion_name = $request->input('religion_name');
            $reliigion->save();
        }
        return redirect('admin/religion');

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
        $religionData = Religion::find($id);

        return view('admin/edits/editReligion',compact('religionData'));
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
                'religion_name' => 'required|max:25|unique:religions'
            ]);
            $religion = Religion::find($id);
            $religion->religion_name = $request->input('religion_name');
            $religion->save();

        }
        return redirect('/admin/religion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $religion =Religion::find($id);

        $religion->delete();
        return redirect('/admin/religion');
    }
}
