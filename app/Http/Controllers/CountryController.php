<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check.type']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('cpanel.Country.index', compact('countries'));
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

            if($request->flag){
                $flag = time() . '.' . $request->flag->getClientOriginalExtension();
                $request->flag->move(('images/country'), $flag);
            } else {
                $flag = 'default_flag.png' ;
            }


            Country::create([
                'name_ar' => $request -> name_ar ,
                'name_en' => $request -> name_en ,
                'flag' => $flag ,
                'user_ins' => Auth::user() -> id,
                'user_upd' => 0
            ]);
            return redirect()->route('countries')->with('success', __('main.saved'));

        } else {
            return $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);
        echo json_encode($country);
        exit();
    }

    public function getCountryCities($id){
        $cities = City::where('country_id', $id)->get();
        echo json_encode($cities);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $country = Country::find($request -> id);
        if($country){
            if($request->flag){
                $flag = time() . '.' . $request->flag->getClientOriginalExtension();
                $request->flag->move(('images/country'), $flag);
            } else {
                $flag  =  $country -> flag ;
            }

            $country -> update([
                'name_ar' => $request -> name_ar ,
                'name_en' => $request -> name_en ,
                'flag' => $flag ,
                'user_upd' => Auth::user() -> id
            ]);

            return redirect()->route('countries')->with('success', __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        if($country){
            $cities = City::where('country_id', $id)->get();
            if(count($cities) == 0){
                $country -> delete();
                return redirect()->route('countries')->with('success', __('main.deleted'));


            } else {
                return redirect()->route('countries')->with('danger', __('main.can_not_delete'));

            }
        }
    }
}
