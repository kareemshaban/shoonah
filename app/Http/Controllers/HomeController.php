<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Roles;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $users = DB::table('users')
             -> leftJoin('roles', 'users.role_id', '=', 'roles.id')
             -> select('users.*', 'roles.name_ar as role_ar' , 'roles.name_en as role_en')
             -> get() ;
        $roles = Roles::all();
         return view('cpanel.Users.index' , compact('users' ,'roles'));
    }
    public function storeUser(Request $request)
    {

        if($request -> id == 0){

            User::create([
                'name' => $request -> name,
                'email' => $request -> email,
                'type' => $request -> type ,
                'supplier_id' => $request -> supplier_id ,
                'password' => Hash::make($request -> password),
                'role_id' => $request -> role_id ?? 0,
                'default_password' => $request -> password,
                'verified' => $request -> supplier_id > 0 ? 0 : 1
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
                    'password' => Hash::make($request -> password),
                    'role_id' => $request -> role_id ?? 0 ,
                    'default_password' => $request -> password,
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
       $user = User::find($id);
       echo json_encode($user);
       exit();
    }
    public function destroyUser($id)
    {
        $user = User::find($id);
        if($user){
            $user -> delete();
            return redirect()->route('users')->with('success', __('main.deleted'));
        }
    }

    public function getUserProfile($id)
    {
        $user = DB::table('users')
            -> leftJoin('roles', 'users.role_id', '=', 'roles.id')
            -> select('users.*', 'roles.name_ar as role_ar' , 'roles.name_en as role_en')
            -> where('users.id', '=', $id)
            -> get() -> first();
        if($user){

            $countries = Country::all();

            $supplier = Supplier::find($user -> supplier_id);

            $auths = DB::table('authentications')
                -> join('roles' , 'authentications.role_id', '=', 'roles.id')
                -> select('authentications.*' ) ->
                where('authentications.role_id' , $user -> role_id) -> get() ;

            return view('cpanel.Users.profile' , compact('user' , 'auths' , 'countries' , 'supplier'));

        }





    }

    public function resetPassword(Request $request)
    {

            $user = User::find($request -> id);
            if($user){
                $user -> update([
                    'password' => Hash::make($request -> new_password),
                ]);
                return redirect()->route('getUserProfile' , $user -> id)->with('success', __('main.updated'));
            }
    }

    public function updatePassword($id)
    {
        $user = User::find($id);

        return view ('cpanel.Users.updatePassword' , compact('user'));

    }

    public function verifyAccount(Request $request)
    {
        $user = User::find($request -> id);
        if($user){
            $user -> update([
                'password' => Hash::make($request -> new_password),
                'default_password' => Hash::make($request -> new_password),
                'verified' => 1
            ]);
            return redirect()->route('index' );

        }
    }

    public function updateSupplier(Request $request)
    {
        $supplier = Supplier::find($request->id);
        if ($supplier) {
            $user = User::where('supplier_id', $supplier->id)->first();

            if ($request->logo) {
                $logo = time() . '.' . $request->logo->getClientOriginalExtension();
                $request->logo->move(('images/Supplier'), $logo);
            } else {
                $logo = $supplier->logo;
            }
            $supplier->update([
                'name' => $request->name,
                'company' => $request->company,
                'logo' => $logo,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'address' => $request->address ?? "",
                'phone' => $request->phone ?? "",
                'email' => $request->email ?? "",
                'mobile' => $request->mobile ?? "",
                'vatNumber' => $request->vatNumber ?? "",
                'registrationNumber' => $request->registrationNumber ?? "",
                'user_upd' => Auth::user()->id,
            ]);
            return redirect()->route('getUserProfile', $user->id)->with('success', __('main.updated'));
        }
    }
}
