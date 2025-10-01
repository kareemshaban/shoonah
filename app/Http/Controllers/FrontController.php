<?php

namespace App\Http\Controllers;


use App\Models\Ads;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Client;
use App\Models\Country;
use App\Models\Department;
use App\Models\News;
use App\Models\Newsletter;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\QuotationRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Twilio\Http\CurlClient;
use Twilio\Rest\Client as TwilioClient;

class FrontController extends Controller
{
    public function index(){

        $departments = Department::with('categories')->get();

        $brands = Brand::all();
       // return $departments;

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('departments', 'products.department_id', '=', 'departments.id')
            ->select('products.*', 'categories.name_ar as category_ar' , 'categories.name_en as category_en' ,
            'departments.name_ar as department_ar' , 'departments.name_en as department_en' ,
                'brands.name_ar as brand_ar' , 'brands.name_en as brand_en')
            ->inRandomOrder()
            ->limit(16)
            ->get();

        $ads = Ads::all()->filter(function ($ad) {
            return $ad->created_at->addDays($ad->duration)->isAfter(now());
        });

       // return $ads ;
        $recentSearches = session('recent_searches', []);

        return view('welcome' , compact('departments' ,
            'products' , 'ads' , 'brands' , 'recentSearches') );
    }

    public function profile()
    {
        if(Auth::check()){
            $user = Auth::user();
            $client = Client::where('hasAccount' , '=' , $user -> id) -> get() -> first();

            $countries = Country::all();
            $categories = Category::all();

            if(  $client){
                $quotationRequests = DB::table('quotation_requests')
                    ->join('clients', 'clients.id', '=', 'quotation_requests.client_id')
                    ->leftJoin('quotations', 'quotations.request_id', '=', 'quotation_requests.id')
                    ->select(
                        'quotation_requests.*',
                        'clients.name as client',
                        DB::raw('COUNT(quotations.id) as quotations_count')
                    )
                    ->where('clients.id', $client->id)
                    ->groupBy('quotation_requests.id', 'clients.name') // Include all non-aggregated columns in groupBy
                    ->get();

               // return  $quotationRequests ;

                return view('front.profile' , compact('client' , 'user' , 'countries' , 'categories' , 'quotationRequests'));

            }

        } else {
            return redirect() -> route('login');
        }
    }

    public function terms(){

        return view('front.terms');
    }
    public function faqs()
    {
        $categories = Category::all();
        return view('front.help' , compact('categories'));
    }

    public function about()
    {
        $categories = Category::all();
        return view('front.about' , compact('categories'));
    }

    public function contact(){
        $categories = Category::all();
        return view('front.contact' , compact('categories'));
    }

    public function top_products()
    {

        $categories = Category::all();

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('departments', 'products.department_id', '=', 'departments.id')
            ->select('products.*', 'categories.name_ar as category_ar' , 'categories.name_en as category_en' ,
                'departments.name_ar as department_ar' , 'departments.name_en as department_en' ,
                'brands.name_ar as brand_ar' , 'brands.name_en as brand_en')
            ->inRandomOrder()
            ->where('products.isTop' , '=' , 1)
            ->get();

        return view('front.topProducts' , compact('products' , 'categories'));
    }


    public function products()
    {

        $categories = Category::all();

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('departments', 'products.department_id', '=', 'departments.id')
            ->select('products.*', 'categories.name_ar as category_ar' , 'categories.name_en as category_en' ,
                'departments.name_ar as department_ar' , 'departments.name_en as department_en' ,
                'brands.name_ar as brand_ar' , 'brands.name_en as brand_en')
            ->inRandomOrder()
            ->get();

        return view('front.Products' , compact('products' , 'categories'));
    }

    public function department_products($id){
        $categories = Category::where('department_id' , '=' , $id) -> get() ;

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('departments', 'products.department_id', '=', 'departments.id')
            ->select('products.*', 'categories.name_ar as category_ar' , 'categories.name_en as category_en' ,
                'departments.name_ar as department_ar' , 'departments.name_en as department_en' ,
                'brands.name_ar as brand_ar' , 'brands.name_en as brand_en')
            ->inRandomOrder()
            ->where('products.department_id' , '=' , $id)
            ->get();

        $department =  Department::find($id);

        return view('front.departmentProducts' , compact('products' , 'categories' , 'department'));
    }

    public function category_products($id){

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('departments', 'products.department_id', '=', 'departments.id')
            ->select('products.*', 'categories.name_ar as category_ar' , 'categories.name_en as category_en' ,
                'departments.name_ar as department_ar' , 'departments.name_en as department_en' ,
                'brands.name_ar as brand_ar' , 'brands.name_en as brand_en')
            ->inRandomOrder()
            ->where('products.category_id' , '=' , $id)
            ->get();

        $category = Category::find($id);
        $department =  Department::find($category -> department_id);
        $categories = Category::all();
        return view('front.categoryProducts' , compact('products' , 'category' , 'department' , 'categories'));
    }

    public function front_news()
    {
        $categories = Category::all();
        $news = News::where('isVisible' , '=' , 1) -> get();
        return view('front.news' , compact('categories' , 'news'));
    }

    public function front_ads()
    {
        $ads = Ads::all()->filter(function ($ad) {
            return $ad->created_at->addDays($ad->duration)->isAfter(now());
        });
    }

    public function product_search(Request $request){
        $products  = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('departments', 'products.department_id', '=', 'departments.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->where(function($query) use ($request) {
                $query->where('products.name_ar', 'LIKE', "%{$request -> search}%")
                    ->orWhere('products.name_en', 'LIKE', "%{$request -> search}%")
                    ->orWhere('products.tag', 'LIKE', "%{$request -> search}%")
                ;
            })
            ->select('products.*', 'categories.name_ar as category_ar', 'categories.name_en as category_en' ,
            'departments.name_ar as department_ar' , 'departments.name_en as department_en' ,
            'brands.name_ar as brand_ar' , 'brands.name_en as brand_en')
            ->get();

        $categories = Category::all();

        return view('front.search' , compact('products' , 'categories'));

    }

    public function product_view($id)
    {
        $categories = Category::all();

        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('departments', 'products.department_id', '=', 'departments.id')
            ->select(
                'products.*',
                'categories.name_ar as category_ar',
                'categories.name_en as category_en',
                'departments.name_ar as department_ar',
                'departments.name_en as department_en',
                'brands.name_ar as brand_ar',
                'brands.name_en as brand_en'
            )
            ->where('products.id', '=', $id)
            ->first(); // use ->first() instead of ->get() if you're fetching a single product

        // Check if the request is AJAX
        if (request()->ajax()) {
            return response()->json($product);
        }

        return view('front.productView', compact('product', 'categories'));
        }

        public function newsletter(Request $request)
        {

            $newsletter = Newsletter::where('email' , '=' , $request -> email) -> get();
            if(count($newsletter) == 0){
                Newsletter::create([
                    'email' => $request -> email ,
                    'user_ins' => Auth::user() -> id ,
                    'user_upd' => 0
                ]);
            }
            return redirect()->route('front')->with('success', __('main.subscribed'));


        }

        public function  RequestQuotationsView($request_id)
        {

            $categories = Category::all();
            $request = QuotationRequest::find($request_id);

            $quotations = DB::table('quotations')
                -> join('clients' , 'clients.id' , '=' , 'quotations.client_id')
                -> leftJoin('suppliers' , 'suppliers.id' , '=' , 'quotations.supplier_id')
                -> select('quotations.*' , 'clients.name as client' , 'suppliers.name as supplier')
                -> where('quotations.request_id', '=', $request_id)
                -> get();

            foreach ($quotations as $quotation) {
                $details = DB::table('quotation_details')
                    -> join('products' , 'products.id' , '=' , 'quotation_details.item_id')
                    -> select('quotation_details.*' , 'products.name_ar as product_ar' ,
                        'products.name_en as product_en' , 'products.mainImg as mainImg')
                    -> where('quotation_details.quotation_id' , '=' , $quotation -> id) -> get();

                $quotation -> details = $details;
            }



            return view('front.Quotations', compact('quotations' , 'categories' , 'request'));
        }

        public function RequestQuotationAccept($quotation_id)
        {
            $quotation = Quotation::find($quotation_id);
            if($quotation){
                $request =  QuotationRequest::find($quotation->request_id);

                $quotation -> update([
                    'state' => 1 ,
                ]);

                $request -> update([
                    'state' => 2 ,
                    'supplier_id' => $quotation -> supplier_id ,
                ]);

                $supplier = Supplier::find($quotation -> supplier_id);
                if($supplier){
                    sendWhatsAppMessage($supplier -> mobile);
                }
                return redirect() -> route('front') -> with('success', __('main.quotation_accepted'));

            }
        }

        public function RequestCancel($request_id){
           $request = QuotationRequest::find($request_id);
           if($request){
               $request -> update([
                   'state' => 3 ,
               ]);
           }
           return redirect() -> route('front') -> with('success', __('main.quotation_request_cancel'));
        }

    public function sendWhatsAppMessage($phone)
    {
        $accountSid = env('TWILIO_SID');
        $authToken = env('TWILIO_AUTH_TOKEN');

        // Get phone numbers as a simple array


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

        $message = 'مرحباً عزيزي المورد،

نود إعلامكم بأنه تم تلقي تحديثات جديدة على منصة شونة. يُرجى الدخول إلى حسابكم على المنصة لمتابعة التحديثات الجديدة واتخاذ الإجراءات المناسبة في أقرب وقت.

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
}
