<?php

namespace App\Http\Controllers;

use App\Models\QuotationRequest;
use App\Models\Supplier;
use Carbon\Carbon;
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
           -> leftJoin('suppliers' , 'suppliers.id' , '=' , 'quotation_requests.supplier_id')
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
    public function show($id)
    {
        $request = DB::table('quotation_requests')
            -> join('clients' , 'clients.id' , '=' , 'quotation_requests.client_id')
            -> leftJoin('suppliers' , 'suppliers.id' , '=' , 'quotation_requests.supplier_id')
            -> select('quotation_requests.*' , 'clients.name as client' , 'suppliers.name as supplier')
            -> where('quotation_requests.id', '=', $id)
            -> first();

        $details = DB::table('quotation_items')
            -> join('products' , 'products.id' , '=' , 'quotation_items.product_id')
            -> select('quotation_items.*' , 'products.name_ar as product_ar' ,
                'products.name_en as product_en' , 'products.mainImg as mainImg')
            -> where('quotation_items.quotation_id' , '=' , $id) -> get();

        return view('cpanel.Requests.view', compact('request' , 'details'));
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

    public function quotations_request_report()
    {
        $clients = \App\Models\Client::all();
        $suppliers = Supplier::all();

        return view('cpanel.Reports.Requests.search' , compact('clients' , 'suppliers'));
    }

    public function quotations_request_report_show(Request $request)
    {
        $requests = DB::table('quotation_requests')
            -> join('clients' , 'clients.id' , '=' , 'quotation_requests.client_id')
            -> leftJoin('suppliers' , 'suppliers.id' , '=' , 'quotation_requests.supplier_id')
            -> select('quotation_requests.*' , 'clients.name as client' , 'suppliers.name as supplier');

        if($request -> client_id != ""){
            $requests = $requests -> where('quotation_requests.client_id' , '=' , $request -> client_id);
        }
        if($request -> supplier_id != ""){
            $requests = $requests->where(function ($query) use ($request) {
                $query->where('quotation_requests.supplier_id', $request->supplier_id)
                    ->orWhere('quotation_requests.supplier_id', 0);
            });
        }
        if($request -> state != ""){
            $requests = $requests -> where('quotation_requests.state' , '=' , $request -> state);
        }


        if ($request->has('isFromDate') && $request->filled('fromDate')) {
            $requests = $requests->whereDate('date', '>=', Carbon::parse($request->fromDate) );
        }

        if ($request->has('isToDate') && $request->filled('toDate')) {
            $requests = $requests->whereDate('date', '<=',Carbon::parse($request->toDate) );
        }

        $data = $requests -> get();

        return view('cpanel.Reports.Requests.index' , compact('data'));


    }
}
