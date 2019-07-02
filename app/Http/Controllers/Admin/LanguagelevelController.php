<?php

namespace App\Http\Controllers\Admin;

use App\ModelsAdmin\Language_Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LanguagelevelController extends Controller
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

        $alllanguages = DB::table('language_levels')->paginate(4);
        $arr = array('languagelevels' => $alllanguages);
        return view('admin/languagelevel', $arr);
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
                'language_level_name' => 'required|max:25|unique:language_levels'
            ]);
            $languagelevel = new Language_Level();
            $languagelevel->language_level_name = $request->input('language_level_name');
            $languagelevel->save();
        }
        return redirect('admin/languagelevel');
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
        $languageData = Language_Level::find($id);
        return view('admin/edits/editLanguagelevel',compact('languageData'));
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
                'language_level_name' => 'required|max:25'
            ]);
            $languagelevel = Language_Level::find($id);
            $languagelevel->language_level_name = $request->input('language_level_name');
            $languagelevel->save();

        }
        return redirect('/admin/languagelevel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $languagelevel =Language_Level::find($id);
        $languagelevel->delete();
        return redirect('/admin/languagelevel');
    }
}
