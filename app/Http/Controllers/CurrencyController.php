<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::all();
        return view('cpanel.Currency.index', compact('currencies'));
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
        if($request -> id == 0){
            Currency::create([
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'symbol' => $request -> symbol,
                'isDefault' => $request -> isDefault,
                'user_ins' => Auth::user()->id,
            ]);
            return redirect()->route('currencies')->with('success', __('main.saved'));
        } else {
            return  $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currency = Currency::find($id);
        echo json_encode($currency);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $currency = Currency::find($request -> id);
        if($currency){
            $currency -> update([
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'symbol' => $request -> symbol,
                'isDefault' => $request -> isDefault,
                'user_upd' => Auth::user()->id,
            ]);
            return redirect()->route('currencies')->with('success', __('main.updated'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = Currency::find($id);
        if($currency){
            $currency -> delete();
            return redirect()->route('currencies')->with('success', __('main.deleted'));

        }
    }
}
