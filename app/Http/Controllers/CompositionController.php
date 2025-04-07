<?php

namespace App\Http\Controllers;

use App\Models\Composition;
use App\Models\Department;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Composition::all();
        return view('cpanel.composition.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('cpanel.composition.create', compact('departments'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function show(Composition $composition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function edit(Composition $composition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Composition $composition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Composition $composition)
    {
        //
    }

    public function getCompositionsCode(){
        $product =  DB::table('compositions')->latest('created_at')->first();
        if($product){
            $id = $product -> id +1 ;
        } else {
            $id = 1;
        }
        $code = 'CP-' .  str_pad($id, 6, '0', STR_PAD_LEFT);
        echo json_encode($code) ;
        exit();
    }

    public function materialAutoComplete($name){
        return Material::query()
            -> where("name_ar" , "LIKE" , "%{$name}%")
            -> orWhere("name_en" , "LIKE" , "%{$name}%")
            -> take(10)
            -> get();
    }
}
