<?php

namespace App\Http\Controllers;

use App\Models\SupplierProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\SupplierProducts  $supplierProducts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('supplier_products')
            -> join('products' , 'products.id', '=', 'supplier_products.product_id')
            -> join('suppliers' , 'suppliers.id', '=', 'supplier_products.supplier_id')
            -> select('supplier_products.*' , 'products.name_ar' , 'products.name_en' ,
                'products.mainImg' ,'suppliers.name as supplier_name' )
            -> where ('supplier_products.id' , '=' , $id)
            -> get() -> first();

        echo  json_encode($product);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupplierProducts  $supplierProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierProducts $supplierProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupplierProducts  $supplierProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplierProducts $supplierProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupplierProducts  $supplierProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = SupplierProducts::find($id);
        if($product){
            $product -> delete();
            return redirect()->route('add_product_to_supplier')->with('success', __('main.deleted'));

        }
    }
}
