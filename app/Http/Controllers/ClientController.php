<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('clients')
            -> join('countries', 'clients.country_id', '=', 'countries.id')
            -> join('cities', 'clients.city_id', '=', 'cities.id')
            -> select('clients.*', 'countries.flag as flag', 'cities.name_ar as city_ar' ,
                'cities.name_en as city_en')
            ->get();
        return view('cpanel.Clients.index', compact( 'clients'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function getUserByClient($id)
    {
        $user = \App\Models\User::where('supplier_id' , $id)
            -> where('type' , '=' , 2)
            -> get() -> first();
        if($user){
            echo json_encode($user);
            exit();
        }
    }
    public function blockClient($id)
    {
        $user = \App\Models\User::where('supplier_id' , $id)
            -> where('type' , '=' , 2)
            -> get() -> first();
        if($user){
            $user -> update([
               'block' => 1
            ]);

            $client = Client::find($id);
            $client -> update([
                'block' => 1
            ]);
        }
        return redirect()->route('clients')->with('success', __('main.blocked'));


    }
    public function unblockClient($id)
    {
        $user = \App\Models\User::where('supplier_id' , $id)
            -> where('type' , '=' , 2)
            -> get() -> first();
        if($user){
            $user -> update([
                'block' => 0
            ]);

            $client = Client::find($id);
            $client -> update([
                'block' => 0
            ]);
        }
        return redirect()->route('clients')->with('success', __('main.unblocked'));


    }
}
