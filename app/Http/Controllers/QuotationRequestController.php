<?php

namespace App\Http\Controllers;

use App\Models\QuotationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationRequestController extends Controller
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
       $quotationRequests = DB::table('quotation_requests')
           -> join('clients' , 'clients.id' , '=' , 'quotation_requests.client_id')
           -> join('suppliers' , 'suppliers.id' , '=' , 'quotation_requests.supplier_id')
           -> select('quotation_requests.*' , 'clients.name as client' , 'suppliers.name as supplier')
           -> get();
       return view('cpanel.Requests.index', compact('quotationRequests'));
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
     * @param  \App\Models\QuotationRequest  $quotationRequest
     * @return \Illuminate\Http\Response
     */
    public function show(QuotationRequest $quotationRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuotationRequest  $quotationRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(QuotationRequest $quotationRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuotationRequest  $quotationRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuotationRequest $quotationRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuotationRequest  $quotationRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotationRequest $quotationRequest)
    {
        //
    }
}
