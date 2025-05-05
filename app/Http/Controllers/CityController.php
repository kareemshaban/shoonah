<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
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
        $cities = DB::table('cities') ->
        join('countries', 'countries.id', '=', 'cities.country_id')
            -> select('cities.*' , 'countries.name_ar as country_name_ar' , 'countries.name_en as country_name_en')
            -> get();
        return view('cpanel.City.index', compact('countries' , 'cities'));
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
            City::create([
                'country_id' => $request -> country_id,
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'user_ins' => Auth::user()->id ,
                'user_upd' => 0
            ]);
            return redirect()->route('cities')->with('success', __('main.saved'));

        } else {
            return $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        echo json_encode($city);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $city = City::find($request -> id);
        if($city){
            $city -> update([
                'country_id' => $request -> country_id,
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'user_upd' => Auth::user()->id
            ]);
            return redirect()->route('cities')->with('success', __('main.updated'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        if($city){
            $city -> delete();
            return redirect()->route('cities')->with('success', __('main.deleted'));
        }
    }
}
