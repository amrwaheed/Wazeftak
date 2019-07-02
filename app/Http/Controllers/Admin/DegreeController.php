<?php

namespace App\Http\Controllers\Admin;

use App\ModelsAdmin\Degree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DegreeController extends Controller
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

        $alldegrees =DB::table('degrees')->paginate(3);
        $arr = array('Degrees' => $alldegrees);
        return view('admin/degree' ,$arr);
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
                'degree_name' => 'required|max:25|unique:degrees'
            ]);
            $degree = new Degree();
            $degree->degree_name = $request->input('degree_name');
            $degree->save();
        }
        return redirect('admin/degree');
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
        $degreeData = Degree::find($id);

        return view('admin/edits/editDegree',compact('degreeData'));
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
                'degree_name' => 'required|max:25|unique:degrees'
            ]);
            $degree = Degree::find($id);
            $degree->degree_name = $request->input('degree_name');
            $degree->save();

        }
        return redirect('/admin/degree');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $degree =Degree::find($id);

        $degree->delete();
        return redirect('/admin/degree');
    }
}
