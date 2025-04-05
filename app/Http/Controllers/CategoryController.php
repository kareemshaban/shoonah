<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $categories = DB::table('categories') -> join('departments' , 'departments.id' ,
            '=' , 'categories.department_id') -> select('categories.*' ,
            'departments.name_ar as department_name_ar' , 'departments.name_en as department_name_en') -> get();
        return view('cpanel.Category.index', compact('categories' , 'departments'));

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
            Category::create([
                'department_id' => $request -> department_id ,
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'user_ins' => Auth::user() -> id,
                'user_upd'  => 0
            ]);
            return redirect()->route('categories')->with('success', __('main.saved'));

        } else {
            return $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        echo json_encode($category);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category = Category::find($request -> id);
        if($category){
            $category -> update([
                'department_id' => $request -> department_id ,
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'user_upd' => Auth::user() -> id
            ]);
            return redirect()->route('categories')->with('success', __('main.updated'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category){
            $category -> delete();
            return redirect()->route('categories')->with('success', __('main.deleted'));
        }
    }
}
