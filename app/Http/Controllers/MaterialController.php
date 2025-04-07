<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
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
        $materials = Material::all();
        return view('cpanel.Material.index', compact('materials'));
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
        if($request->id == 0){
            Material::create([
                'name_ar' => $request -> name_ar,
                'name_en' => $request-> name_en,
                'description_ar' => $request -> description_ar ?? "",
                'description_en' => $request -> description_en ?? "",
                'unit_id' => $request -> unit_id, // 0 ml 1 gm
                'priceOfHundred' => $request -> priceOfHundred,
                'user_ins' => Auth::user() -> id
            ]);
            return redirect()->route('materials')->with('success', __('main.saved'));

        } else {
            return  $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material = Material::find($id);
        echo json_encode($material);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $material = Material::find($request -> id);
        if($material){
            $material -> update([
                'name_ar' => $request -> name_ar,
                'name_en' => $request-> name_en,
                'description_ar' => $request -> description_ar ?? "",
                'description_en' => $request -> description_en ?? "",
                'unit_id' => $request -> unit_id, // 0 ml 1 gm
                'priceOfHundred' => $request -> priceOfHundred,
                'user_upd' => Auth::user() -> id
            ]);
            return redirect()->route('materials')->with('success', __('main.updated'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);
        if($material){
            $material -> delete();
            return redirect()->route('materials')->with('success', __('main.deleted'));
        }
    }
}
