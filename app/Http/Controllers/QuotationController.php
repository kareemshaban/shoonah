<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\QuotationDetails;
use App\Models\QuotationItem;
use App\Models\QuotationRequest;
use App\Models\Supplier;
use Carbon\Carbon;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Twilio\Http\CurlClient;
use Twilio\Rest\Client as TwilioClient;

class QuotationController extends Controller
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
        if(Auth::user() -> type == 0){
            $quotations = DB::table('quotations')
                -> join('quotation_requests' , 'quotation_requests.id' , '=' , 'quotations.request_id')
                -> join('clients' , 'clients.id' , '=' , 'quotations.client_id')
                -> join('suppliers' , 'suppliers.id' , '=' , 'quotations.supplier_id')
                -> select('quotations.*' , 'clients.name as client' , 'suppliers.name as supplier' ,
                    'quotation_requests.reference_no as request_ref_no')
                -> get();
        } else {
            $quotations = DB::table('quotations')
                -> join('quotation_requests' , 'quotation_requests.id' , '=' , 'quotations.request_id')
                -> join('clients' , 'clients.id' , '=' , 'quotations.client_id')
                -> join('suppliers' , 'suppliers.id' , '=' , 'quotations.supplier_id')
                -> select('quotations.*' , 'clients.name as client' , 'suppliers.name as supplier' ,
                    'quotation_requests.reference_no as request_ref_no')
                -> where('quotations.supplier_id' , '=' , Auth::user() -> supplier_id)
                -> get();
        }



        return view('cpanel.Quotations.index', compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($requste_id)
    {
        $quotations = Quotation::where('supplier_id' , '=' , Auth::user() -> supplier_id)
            -> where('request_id' , '=' , $requste_id) -> get();
        if(count($quotations) == 0){
            $request = DB::table('quotation_requests')
                -> join('clients' , 'clients.id' , '=' , 'quotation_requests.client_id')
                -> leftJoin('suppliers' , 'suppliers.id' , '=' , 'quotation_requests.supplier_id')
                -> select('quotation_requests.*' , 'clients.name as client' , 'suppliers.name as supplier')
                -> where('quotation_requests.id', '=', $requste_id)
                -> first();

            $details = DB::table('quotation_items')
                -> join('products' , 'products.id' , '=' , 'quotation_items.product_id')
                -> select('quotation_items.*' , 'products.name_ar as product_ar' ,
                    'products.name_en as product_en' , 'products.mainImg as mainImg')
                -> where('quotation_items.quotation_id' , '=' , $requste_id) -> get();
           if($request -> state < 2){
               return view('cpanel.Quotations.create', compact('request' , 'details'));

           } else {
               return redirect() -> route('quotationRequests') -> with('warning' ,
                   $request -> state == 2 ?  __('main.can_not_add_qutation_for_cpmpleted') :   __('main.can_not_add_qutation_for_cancled')  );


           }
        } else {
            return redirect() -> route('quotationRequests') -> with('warning' , __('main.can_not_add_more_quotations'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $resquestQ = QuotationRequest::find($request -> request_id);

        if($resquestQ != null){
           $id = Quotation::create([
                'request_id' => $request -> request_id,
                'ref_no' => $request ->ref_no ,
                'supplier_id' => Auth::user() -> supplier_id,
                'client_id' => $resquestQ -> client_id,
                'date' => Carbon::parse($request -> date),
                'total' => $request -> quotation_total,
                'discount' => 0,
                'net' => $request -> quotation_total,
                'notes' => $request -> notes ?? ""
            ]) -> id;

           $this -> createDetails($request , $id) ;
        }

        return redirect() -> route('quotations' ) -> with('success', __('main.saved'));

    }

    public function createDetails(Request $request , $id){
          $items = QuotationItem::where('quotation_id' , $request -> request_id)->get();


        for($i = 0 ; $i < count($items); $i++){

            QuotationDetails::create([
                'quotation_id' => $id,
                'item_id' => $items[$i] -> product_id,
                'quantity' => $items[$i] -> quantity,
                'price' => $request -> price[$i],
                'total' => $request -> total[$i],
                'notes' => $request -> details_notes[$i] ?? "",
            ]);
        }
        $resquestQ = QuotationRequest::find($request -> request_id);
        if($resquestQ != null){
            $resquestQ -> update([
                'state' => '1'
            ]);
        }

        $client = \App\Models\Client::find($resquestQ -> client_id);
        if($client != null){
            if($client -> mobile ){
              $this ->  sendWhatsAppMessage($client -> mobile);
            }
        }
    }

    public function sendWhatsAppMessage($phone)
    {
        $accountSid = env('TWILIO_SID');
        $authToken = env('TWILIO_AUTH_TOKEN');



        $httpClient = new CurlClient([
            CURLOPT_SSL_VERIFYPEER => false, // Disable for development
            CURLOPT_SSL_VERIFYHOST => 0      // Disable for development
            // For production:
            // CURLOPT_SSL_VERIFYPEER => true,
            // CURLOPT_CAINFO => storage_path('certs/cacert.pem')
        ]);


        $twilio = new TwilioClient($accountSid, $authToken);
        $twilio->setHttpClient($httpClient);

        // return $twilio ;

        $message = 'مرحباً عزيزي العميل،

نود إعلامكم بأنه تم تلقي عروض أسعار لطلب التسعير الخاص بكم على منصة شونة. يُرجى الدخول إلى حسابكم على المنصة لمراجعة عروض الأسعار  واتخاذ الإجراءات المناسبة في أقرب وقت.

مع تحيات إدارة شونة.';

        $results = [
            'success' => [],
            'failed'  => []
        ];


            try {
                $msg = $twilio->messages->create(
                    "whatsapp:$phone",
                    [
                        'from' => "whatsapp:" . env('TWILIO_WHATSAPP_NUMBER'),
                        'body' => $message
                    ]
                );

                $results['success'][] = [
                    'phone_number' => $phone,
                    'message_sid' => $msg->sid
                ];
            } catch (\Exception $e) {
                $results['failed'][] = [
                    'phone_number' => $phone,
                    'error' => $e->getMessage()
                ];
            }


        return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quotation = DB::table('quotations')
            -> join('clients' , 'clients.id' , '=' , 'quotations.client_id')
            -> leftJoin('suppliers' , 'suppliers.id' , '=' , 'quotations.supplier_id')
            -> select('quotations.*' , 'clients.name as client' , 'suppliers.name as supplier')
            -> where('quotations.id', '=', $id)
            -> first();

        $details = DB::table('quotation_details')
            -> join('products' , 'products.id' , '=' , 'quotation_details.item_id')
            -> select('quotation_details.*' , 'products.name_ar as product_ar' ,
                'products.name_en as product_en' , 'products.mainImg as mainImg')
            -> where('quotation_details.quotation_id' , '=' , $id) -> get();

        return view('cpanel.Quotations.view', compact('quotation' , 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        //
    }

    public function quotation_ref_number(){
        $uniqueId = uniqid('QP_', true);
        echo (json_encode($uniqueId)) ;
        exit();
    }

    public function quotations_report()
    {
        $clients = \App\Models\Client::all();
        $suppliers = Supplier::all();

        return view('cpanel.Reports.Quotations.search' , compact('clients' , 'suppliers'));
    }

    public function quotations_report_show(Request $request)
    {
        $quotations = DB::table('quotations')
            -> join('quotation_requests' , 'quotation_requests.id' , '=' , 'quotations.request_id')
            -> join('clients' , 'clients.id' , '=' , 'quotations.client_id')
            -> join('suppliers' , 'suppliers.id' , '=' , 'quotations.supplier_id')
            -> select('quotations.*' , 'clients.name as client' , 'suppliers.name as supplier' ,
                'quotation_requests.reference_no as request_ref_no');

        if($request -> client_id != ""){
            $quotations = $quotations -> where('quotations.client_id' , '=' , $request -> client_id);
        }
        if($request -> supplier_id != ""){
            $quotations = $quotations->where(function ($query) use ($request) {
                $query->where('quotations.supplier_id', $request->supplier_id)
                    ->orWhere('quotations.supplier_id', 0);
            });
        }
        if($request -> state != ""){
            $quotations = $quotations -> where('quotations.state' , '=' , $request -> state);
        }


        if ($request->has('isFromDate') && $request->filled('fromDate')) {
            $quotations = $quotations->whereDate('quotations.date', '>=', Carbon::parse($request->fromDate) );
        }

        if ($request->has('isToDate') && $request->filled('toDate')) {
            $quotations = $quotations->whereDate('quotations.date', '<=',Carbon::parse($request->toDate) );
        }

        $data = $quotations -> get();

       // return  $data ;

        return view('cpanel.Reports.Quotations.index' , compact('data'));


    }


    public function quotations_request_report_by_company()
    {
        $brands = Brand::all();
        return view('cpanel.Reports.QuotationsByBrand.search' , compact('brands' ));

    }

    public function quotations_request_report_by_company_show(Request $request)
    {
        $quotations = DB::table('quotations')
            ->join('quotation_requests', 'quotation_requests.id', '=', 'quotations.request_id')
            ->join('clients', 'clients.id', '=', 'quotations.client_id')
            ->join('suppliers', 'suppliers.id', '=', 'quotations.supplier_id')
            ->join('quotation_details', 'quotation_details.quotation_id', '=', 'quotations.id')
            ->join('products', 'products.id', '=', 'quotation_details.item_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->select(
                'quotations.*',
                'clients.name as client',
                'suppliers.name as supplier',
                'quotation_requests.reference_no as request_ref_no',
                'brands.name_ar as brand_ar' ,
                'brands.name_en as brand_en'
            );

        if($request -> brand_id != ""){
            $quotations = $quotations -> where('brands.id' , '=' , $request -> brand_id);
        }

        if($request -> state != ""){
            $quotations = $quotations -> where('quotations.state' , '=' , $request -> state);
        }


        if ($request->has('isFromDate') && $request->filled('fromDate')) {
            $quotations = $quotations->whereDate('quotations.date', '>=', Carbon::parse($request->fromDate) );
        }

        if ($request->has('isToDate') && $request->filled('toDate')) {
            $quotations = $quotations->whereDate('quotations.date', '<=',Carbon::parse($request->toDate) );
        }

        $data = $quotations -> get();

       //  return  $data ;

        return view('cpanel.Reports.QuotationsByBrand.index' , compact('data'));


    }

    public function quotations_request_report_by_product(){

        $products = Product::all();
        return view('cpanel.Reports.QuotationsByItem.search' , compact('products' ));
    }

    public function quotations_request_report_by_product_show(Request $request){
        $quotations = DB::table('quotations')
            ->join('quotation_requests', 'quotation_requests.id', '=', 'quotations.request_id')
            ->join('clients', 'clients.id', '=', 'quotations.client_id')
            ->join('suppliers', 'suppliers.id', '=', 'quotations.supplier_id')
            ->join('quotation_details', 'quotation_details.quotation_id', '=', 'quotations.id')
            ->join('products', 'products.id', '=', 'quotation_details.item_id')
            ->select(
                'quotations.*',
                'clients.name as client',
                'suppliers.name as supplier',
                'quotation_requests.reference_no as request_ref_no',
                'products.name_ar as product_ar' ,
                'products.name_en as product_en'
            );

        if($request -> product_id != ""){
            $quotations = $quotations -> where('products.id' , '=' , $request -> product_id);
        }

        if($request -> state != ""){
            $quotations = $quotations -> where('quotations.state' , '=' , $request -> state);
        }


        if ($request->has('isFromDate') && $request->filled('fromDate')) {
            $quotations = $quotations->whereDate('quotations.date', '>=', Carbon::parse($request->fromDate) );
        }

        if ($request->has('isToDate') && $request->filled('toDate')) {
            $quotations = $quotations->whereDate('quotations.date', '<=',Carbon::parse($request->toDate) );
        }

        $data = $quotations -> get();

        //  return  $data ;

        return view('cpanel.Reports.QuotationsByItem.index' , compact('data'));
    }


}
