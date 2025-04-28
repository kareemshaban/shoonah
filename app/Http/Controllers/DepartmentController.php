<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
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
        $departments = Department::all();
        return view('cpanel.Department.index', compact('departments'));
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
            Department::create([
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'prefix' => $request -> prefix  ?? "",
                'user_ins' => Auth::user() -> id,
                'user_upd'  => 0
            ]);
            return redirect()->route('departments')->with('success', __('main.saved'));

        } else {
            return $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        echo json_encode($department);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $department = Department::find($request -> id);
        if($department){
            $department -> update([
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'prefix' => $request -> prefix  ?? "",
                'user_upd' => Auth::user() -> id
            ]);
            return redirect()->route('departments')->with('success', __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        if($department){
            $department = Department::find($id);
            $department -> delete();
            return redirect()->route('departments')->with('success', __('main.deleted'));
        }
    }

    public function getCats($department){
        $cats = Category::where('department_id', $department) -> get();
        echo json_encode($cats);
        exit();
    }
}
