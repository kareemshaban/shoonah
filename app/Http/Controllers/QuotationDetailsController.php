<?php

namespace App\Http\Controllers;

use App\Models\QuotationDetails;
use Illuminate\Http\Request;

class QuotationDetailsController extends Controller
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
     * @param  \App\Models\QuotationDetails  $quotationDetails
     * @return \Illuminate\Http\Response
     */
    public function show(QuotationDetails $quotationDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuotationDetails  $quotationDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(QuotationDetails $quotationDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuotationDetails  $quotationDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuotationDetails $quotationDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuotationDetails  $quotationDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotationDetails $quotationDetails)
    {
        //
    }
}
