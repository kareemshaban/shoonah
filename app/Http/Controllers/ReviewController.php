<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = DB::table('reviews') ->
        join('suppliers' , 'suppliers.id' , '=' , 'reviews.supplier_id') ->
        join('clients' , 'clients.id' , '=' , 'reviews.client_id') ->
        select('reviews.*' , 'suppliers.name as supplier' , 'clients.name as client') -> get() ;

        return view('cpanel.Review.index', compact('reviews' ));

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
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = DB::table('reviews') ->
        join('suppliers' , 'suppliers.id' , '=' , 'reviews.supplier_id') ->
        join('clients' , 'clients.id' , '=' ,'reviews.client_id') ->
        select('reviews.*' , 'suppliers.name as supplier' , 'clients.name as client')
            -> where('reviews.id' , '=' , $id) -> get() -> first();
        echo json_encode($review);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        if($review){
            $review -> delete();
            return redirect()->route('reviews')->with('success', __('main.deleted'));

        }
    }
}
