<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Country;
use App\Models\Supplier;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
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
        $suppliers = DB::table('suppliers')
            -> join('countries', 'suppliers.country_id', '=', 'countries.id')
            -> join('cities', 'suppliers.city_id', '=', 'cities.id')
            -> select('suppliers.*', 'countries.flag as flag', 'cities.name_ar as city_ar' ,
                'cities.name_en as city_en')
            ->get();
        $countries = Country::all();
        return view('cpanel.Supplier.index', compact('countries' , 'suppliers'));

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
            if($request->logo){
                $logo = time() . '.' . $request->logo->getClientOriginalExtension();
                $request->logo->move(('images/Supplier'), $logo);
            } else {
                $logo  =  '' ;
            }

            Supplier::create([
                'name' => $request -> name,
                'company' => $request -> company,
                'logo' => $logo,
                'country_id' => $request -> country_id,
                'city_id' => $request -> city_id,
                'address' => $request -> address ?? "",
                'phone' => $request -> phone ?? "",
                'email' => $request -> email ?? "",
                'mobile' => $request -> mobile  ?? "",
                'vatNumber' => $request -> vatNumber ?? "",
                'registrationNumber' => $request -> registrationNumber ?? "",
                'type' => $request -> type ,
                'user_ins' => Auth::user() -> id,
                'user_upd' => 0
            ]);
            return redirect()->route('suppliers')->with('success', __('main.saved'));

        } else {
            return $this -> update($request);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);
        echo json_encode($supplier);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $supplier = Supplier::find($request -> id);
        if($supplier){
            if($request->logo){
                $logo = time() . '.' . $request->logo->getClientOriginalExtension();
                $request->logo->move(('images/Supplier'), $logo);
            } else {
                $logo  =  $supplier -> logo ;
            }
            $supplier -> update([
                'name' => $request -> name,
                'company' => $request -> company,
                'logo' => $logo,
                'country_id' => $request -> country_id,
                'city_id' => $request -> city_id,
                'address' => $request -> address ?? "",
                'phone' => $request -> phone ?? "",
                'email' => $request -> email ?? "",
                'mobile' => $request -> mobile  ?? "",
                'vatNumber' => $request -> vatNumber ?? "",
                'registrationNumber' => $request -> registrationNumber ?? "",
                'user_upd' => Auth::user() -> id,
            ]);
            return redirect()->route('suppliers')->with('success', __('main.updated'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if($supplier){
            $supplier -> delete();
            return redirect()->route('suppliers')->with('success', __('main.deleted'));
        }
    }

    public function getUserBySupplier($id)
    {
        $user = \App\Models\User::where('supplier_id' , $id)
            -> where('type' , '<' , 2)
            -> get() -> first();
        if($user){
            echo json_encode($user);
            exit();
        }
    }

    public function blockSupplier($id)
    {
        $user = \App\Models\User::where('supplier_id' , $id)
            -> where('type' , '<' , 2)
            -> get() -> first();
        if($user){
            $user -> update([
                'block' => 1
            ]);

            $supplier = Supplier::find($id);
            $supplier -> update([
                'block' => 1
            ]);
        }
        return redirect()->route('suppliers')->with('success', __('main.blocked'));


    }
    public function unblockSupplier($id)
    {
        $user = \App\Models\User::where('supplier_id' , $id)
            -> where('type' , '<' , 2)
            -> get() -> first();
        if($user){
            $user -> update([
                'block' => 0
            ]);

            $supplier = Supplier::find($id);
            $supplier -> update([
                'block' => 0
            ]);
        }
        return redirect()->route('suppliers')->with('success', __('main.unblocked'));


    }
}
