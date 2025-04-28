<?php

namespace App\Http\Controllers;

use App\Models\Composition;
use App\Models\CompositionDetails;
use App\Models\Department;
use App\Models\Material;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompositionController extends Controller
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
        $data = DB::table("compositions")
            -> join('categories' , 'categories.id', '=', 'compositions.category_id')
            -> join('departments' , 'departments.id', '=', 'compositions.department_id')
            -> select('compositions.*' ,
                'categories.name_ar as category_ar' , 'categories.name_en as category_en' ,
                'departments.name_ar as department_ar' , 'departments.name_en as department_en')
            ->get();


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
     //   return $request ;
        if($request->file) {
            $pdf = time() . 'pdf' . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(('images/compositions'), $pdf);
        } else {
            $pdf   = "" ;
        }

       $id =  Composition::create([
            'code' => $request -> code ,
            'name_ar' => $request -> name_ar,
            'name_en' => $request -> name_en,
            'department_id' => $request -> department_id,
            'category_id' => $request -> category_id,
            'cost' => $request -> cost,
            'additional_cost' => $request -> additional_cost ?? 0,
            'total_cost' => $request -> total_cost,
            'formula_equation' => $request -> formula_equation ?? "",
            'description_ar' => $request -> description_ar ?? "" ,
            'description_en' => $request -> description_en ?? "" ,
            'notes' => $request -> notes ?? "" ,
            'file' => $pdf,
            'user_ins' => Auth::user() -> id
        ]) -> id;

        $this -> storeDetails($request , $id);

        return redirect()->route('compositions')->with('success', __('main.saved'));
    }

    public function storeDetails(Request $request , $id){
        $details = CompositionDetails::where('composition_id' , '=' , $id) -> get();
        foreach ($details as $detail){
            $detail -> delete();
        }
        for ($i = 0 ; $i < count($request -> material_id ) ; $i++){
            CompositionDetails::create([
                'composition_id' => $id,
                'material_id' => $request -> material_id[$i],
                'quantity' => $request -> quantity[$i],
                'cost' => $request -> materialCost[$i]
            ]);

        }
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
    public function edit($id)
    {
        $item = Composition::find($id);

        $departments = Department::all();

        return view('cpanel.composition.edit', compact('departments' , 'item' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $item = Composition::find($request -> id) ;
        if($item) {
            if($request->file) {
                $pdf = time() . 'pdf' . '.' . $request->file->getClientOriginalExtension();
                $request->file->move(('images/compositions'), $pdf);
            } else {
                if($request -> isFileRemoved == 0){
                    $pdf   =   $item -> file;
                } else {
                    $pdf   =   "" ;
                }

            }
            $item -> update([
                'code' => $request -> code ,
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'department_id' => $request -> department_id,
                'category_id' => $request -> category_id,
                'cost' => $request -> cost,
                'additional_cost' => $request -> additional_cost ?? 0,
                'total_cost' => $request -> total_cost,
                'formula_equation' => $request -> formula_equation ?? "",
                'description_ar' => $request -> description_ar ?? "" ,
                'description_en' => $request -> description_en ?? "" ,
                'notes' => $request -> notes ?? "" ,
                'file' => $pdf,
                'user_upd' => Auth::user() -> id
            ]);

            $this -> storeDetails($request , $request -> id);

            return redirect()->route('compositions')->with('success', __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Composition::find($id);
        if($item) {
            $details = CompositionDetails::where('composition_id' , '=' , $id) -> get();
            foreach ($details as $detail){
                $detail -> delete();
            }
            $item -> delete();
            return redirect()->route('compositions')->with('success', __('main.deleted'));


        }
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

    public function getCompositionsItems($id)
    {
        $details = DB::table('compositionsdetails')
            -> join('materials' , 'materials.id', '=', 'compositionsdetails.material_id')
            -> select('compositionsdetails.*' , 'materials.name_ar as material_name_ar' ,
                'materials.name_en as material_name_en' , 'materials.unit_id' , 'materials.priceOfHundred')
            -> where('compositionsdetails.composition_id' , '=' , $id) -> get();
        echo json_encode($details);
        exit();
    }
}
