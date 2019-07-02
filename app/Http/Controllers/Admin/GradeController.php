<?php

namespace App\Http\Controllers\Admin;

use App\ModelsAdmin\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
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

        $allgrade = DB::table('grades')->paginate(4);
        $arr = array('grades' => $allgrade);
        return view('admin/grade', $arr);
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
                'grade_name' => 'required|max:25|unique:grades'
            ]);
            $grade = new Grade();
            $grade->grade_name = $request->input('grade_name');
            $grade->save();
        }
        return redirect('admin/grade');
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
        $gradeData = Grade::find($id);

        return view('admin/edits/editGrade',compact('gradeData'));
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
                'grade_name' => 'required|max:25'
            ]);
            $grade = Grade::find($id);
            $grade->grade_name = $request->input('grade_name');
            $grade->save();

        }
        return redirect('/admin/grade');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade =Grade::find($id);

        $grade->delete();
        return redirect('/admin/grade');
    }
}
