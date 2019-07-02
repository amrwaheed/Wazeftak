<?php

namespace App\Http\Controllers\Admin;

use App\ModelsAdmin\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
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

        $positiones = DB::table('positions')->paginate(4);
        $arr = array('positions' => $positiones);
        return view('admin/position' ,$arr);
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
                'position_name' => 'required|max:25|unique:positions'
            ]);
            $position = new Position();
            $position->position_name = $request->input('position_name');
            $position->save();
        }
        return redirect('admin/position');
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
        $positionData = Position::find($id);

        return view('admin/edits/editPosition',compact('positionData'));
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
                'position_name' => 'required|max:25|'
            ]);
            $psoitions = Position::find($id);
            $psoitions->position_name = $request->input('position_name');
            $psoitions->save();

        }
        return redirect('/admin/position');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $psoitions =Position::find($id);

        $psoitions->delete();
        return redirect('/admin/position');
    }
}
