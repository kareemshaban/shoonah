<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Couchbase\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
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
        $roles = Roles::all();
        return view('cpanel.Roles.index', compact('roles'));
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
             Roles::create([
                 'name_ar' => $request -> name_ar,
                 'name_en' => $request -> name_en,
                 'user_ins' => Auth::user()->id,
             ]);
            return redirect()->route('roles')->with('success', __('main.saved'));
        } else {
            return $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Roles::find($id);
        echo json_encode($role);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $role = Roles::find($request -> id);
        if($role){
            $role -> update([
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'user_upd' => Auth::user()->id,
            ]);
            return redirect()->route('roles')->with('success', __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Roles::find($id);
        if($role){
            $role -> delete();
            return redirect()->route('roles')->with('success', __('main.deleted'));
        }
    }
}
