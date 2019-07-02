<?php

namespace App\Http\Controllers\Admin;

use App\ModelsAdmin\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
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

        $allcurrencies = DB::table('currencies')->paginate(4);
        $arr = array('currencies' => $allcurrencies);
        return view('/admin/currency', $arr);
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
                'currency_name' => 'required|max:25|unique:currencies'
            ]);
            $currency = new Currency();
            $currency->currency_name = $request->input('currency_name');
            $currency->save();
        }
        return redirect('/admin/currency');
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
        $currency= Currency::find($id);

        return view('admin/edits/editCurrency', compact('currency'));
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
                'currency_name' => 'required|max:25|'
            ]);
            $currnecy = Currency::find($id);
            $currnecy->currency_name = $request->input('currency_name');
            $currnecy->save();

        }
        return redirect('/admin/currency');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency =Currency::find($id);

        $currency->delete();
        return redirect('/admin/currency');
    }
}
