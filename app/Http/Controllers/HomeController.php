<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function employee()
    {
        return view('welcome');
    }

    public function users()
    {

    }
    public function storeUser(Request $request)
    {
        if($request -> id == 0){

            User::create([
                'name' => $request -> name,
                'email' => $request -> email,
                'type' => $request -> type ,
                'supplier_id' => $request -> supplier_id ,
                'password' => Hash::make($request -> password)
            ]);
            if($request -> supplier_id > 0){
                $supplier = Supplier::find($request -> supplier_id);
                if($supplier){
                    $supplier -> update([
                       'hasAccount' => 1
                    ]);
                }
                return redirect()->route('suppliers')->with('success', __('main.saved'));
            } else {
                return redirect()->route('users')->with('success', __('main.saved'));
            }
        } else {
            $user = User::find($request -> id);
            if($user){
                $user -> update([
                    'name' => $request -> name,
                    'email' => $request -> email,
                    'type' => $request -> type ,
                    'supplier_id' => $request -> supplier_id ,
                    'password' => Hash::make($request -> password)
                ]);

                if($request -> supplier_id > 0){
                    return redirect()->route('suppliers')->with('success', __('main.updated'));
                } else {
                    return redirect()->route('users')->with('success', __('main.updated'));
                }
            }
        }

    }

    public function showUser($id)
    {

    }
    public function destroyUser($id)
    {

    }

}
