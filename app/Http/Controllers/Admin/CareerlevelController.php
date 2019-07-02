<?php

namespace App\Http\Controllers\Admin;

use App\ModelsAdmin\Scientific_Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CareerlevelController extends Controller
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
        $allscientiflevels = DB::table('scientific_levels')->paginate(4);
        $arr = array('scientiflevels' => $allscientiflevels);
        return view('/admin/career', $arr);
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
            //dd ($request->all());
         $this->validate($request ,[
             'scientific_name' => 'required|unique:scientific_levels|max:25|'
         ]);
            $scientiflevel = new Scientific_Level();

            $scientiflevel->scientific_name = $request->input('scientific_name');
            $scientiflevel->save();
        }
        return redirect('/admin/career');
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
        $carer= Scientific_Level::find($id);

        return view('admin/edits/editCareerlevel', compact('carer'));
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
                'scientificname' => 'required|max:25|'
            ]);
            $scientificlevel = Scientific_Level::find($id);
            $scientificlevel->scientific_name = $request->input('scientificname');
            $scientificlevel->save();

        }
        return redirect('/admin/career');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scientificlevel =Scientific_Level::find($id);

        $scientificlevel->delete();
        return redirect('/admin/career');
    }
}
