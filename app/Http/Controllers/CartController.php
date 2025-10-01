<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use App\Models\QuotationDetails;
use App\Models\QuotationItem;
use App\Models\QuotationRequest;
use App\Models\Supplier;
use App\Services\TwilioService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client as TwilioClient;
use Twilio\Http\CurlClient;


class CartController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {

        $cartItems = session()->get('cart', []);

        $cartIds = collect($cartItems)->pluck('id')->toArray();

        $cartQuantities = collect($cartItems)->pluck('quantity', 'id')->toArray(); // Create an array with product IDs as keys and quantities as values

        $categories = Category::all();
        // Return early if no favorites
        if (empty($cartIds)) {
            $products = [] ;
            return response()->json($products);

        }

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('departments', 'products.department_id', '=', 'departments.id')
            ->whereIn('products.id', $cartIds)
            ->select(
                'products.*',
                'categories.name_ar as category_ar', 'categories.name_en as category_en',
                'departments.name_ar as department_ar', 'departments.name_en as department_en',
                'brands.name_ar as brand_ar', 'brands.name_en as brand_en'
            )
            ->get();

        $products = $products->map(function ($product) use ($cartQuantities) {
            // Add the quantity from the cart items (if it exists)
            $product->quantity = $cartQuantities[$product->id] ?? 0; // Default to 0 if not found
            return $product;
        });

        return response()->json($products);
    }


    public function open()
    {
        $cartItems = session()->get('cart', []);

        $cartIds = collect($cartItems)->pluck('id')->toArray();

        $cartQuantities = collect($cartItems)->pluck('quantity', 'id')->toArray(); // Create an array with product IDs as keys and quantities as values

        $categories = Category::all();
        // Return early if no favorites
        if (empty($cartIds)) {
            $products = [] ;
            return view('front.cart', compact('products', 'categories'));

        }

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('departments', 'products.department_id', '=', 'departments.id')
            ->whereIn('products.id', $cartIds)
            ->select(
                'products.*',
                'categories.name_ar as category_ar', 'categories.name_en as category_en',
                'departments.name_ar as department_ar', 'departments.name_en as department_en',
                'brands.name_ar as brand_ar', 'brands.name_en as brand_en'
            )
            ->get();

        $products = $products->map(function ($product) use ($cartQuantities) {
            // Add the quantity from the cart items (if it exists)
            $product->quantity = $cartQuantities[$product->id] ?? 0; // Default to 0 if not found
            return $product;
        });

        return view('front.cart', compact('products', 'categories'));
    }
    public function add(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Check if wishlist exists in session, if not initialize it
        $cart = session()->get('cart', []);

        // Prevent adding duplicate products to the wishlist
        if (!in_array($productId, array_column($cart, 'id'))) {
            $cart[] = [
                'id' => $productId,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image_url,
                'quantity' => 1,
            ];

            // Store the updated cart in session
            session()->put('cart', $cart);

            return response()->json([
                'success' => true,
                'cartCount' => count($cart),
                'nameProduct' => $product->name,
            ]);

        } else {
            // Item exists — increase quantity
            foreach ($cart as &$item) {
                if ($item['id'] == $productId) {
                    $item['quantity'] += 1;
                    break;
                }
            }

            // Store the updated cart in session
            session()->put('cart', $cart);

            return response()->json([
                'success' => true,
                'cartCount' => count($cart),
                'nameProduct' => $product->name,
            ]);
        }


    }

    public function updateQnt($id , $qnt)
    {
        $product = Product::find($id);
        $cart = session()->get('cart', []);
        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = $qnt;
                break;
            }
        }

        // Store the updated cart in session
        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'cartCount' => count($cart),
            'nameProduct' => $product->name,
        ]);
    }

    public function remove(Request $request, $productId)
    {
        $wishlist = session()->get('wishlist', []);

        // Filter out the product to remove it from the wishlist
        $wishlist = array_filter($wishlist, function($item) use ($productId) {
            return $item['id'] != $productId;
        });

        // Re-index the array after filtering
        $wishlist = array_values($wishlist);

        // Store the updated wishlist in session
        session()->put('wishlist', $wishlist);

        return response()->json([
            'success' => true,
            'wishlistCount' => count($wishlist)
        ]);

        return redirect()->back()->with('success', __('main.removed_from_wish_list'));
    }


    public function empty()
    {
        $cart = [] ;
        session()->put('cart', $cart);

        return redirect() -> route('front') -> with('success', __('main.cart_empty_successfully'));
    }

    public function checkOut()
    {

        $cart = session()->get('cart', []);
        if(count($cart) == 0) {
            return redirect() -> route('open-cart') -> with('warning', __('main.cart_is_empty'));
        } else {
            $user = auth()->user();

            $client = Client::where('hasAccount' , '=' , $user -> id) -> get() -> first();
            if ( $client ){
                if($client -> mobile != ""){
                    $this -> createQuotationRequest($client);
                    $cart = [] ;
                    session()->put('cart', $cart);
                    $this -> sendWhatsAppMessage();
                    return redirect() -> route('front') -> with('success', __('main.ordered_successfully'));


                } else {
                    return redirect() -> route('open-cart') -> with('error', __('main.complete_your_profile'));
                }

            }


        }
    }
    public function createQuotationRequest($client){
        $uniqueId = uniqid('QR_', true);
        $id = QuotationRequest::create([
            'reference_no' => $uniqueId,
            'client_id' => $client -> id,
            'supplier_id' => 0,
            'state' => 0,
            'date' => Carbon::now(),
            'phone' => $client -> phone,
            'address' => $client -> address,
            'notes' => ''
        ]) -> id;
        $this -> createQuotationRequestDetails($id);
    }

    public function createQuotationRequestDetails($id ){
        $cart = session()->get('cart', []);
        foreach($cart as $item){
            QuotationItem::create([
                'quotation_id' => $id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => 0
            ]);
        }

    }


    public function sendWhatsAppMessage()
    {
        $accountSid = env('TWILIO_SID');
        $authToken = env('TWILIO_AUTH_TOKEN');

        // Get phone numbers as a simple array
        $supplierPhones = Supplier::pluck('mobile')->toArray();

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

نود إعلامكم بأنه تم تلقي طلب تسعير جديد على منصة شونة. يُرجى الدخول إلى حسابكم على المنصة لمتابعة الطلبات الجديدة واتخاذ الإجراءات المناسبة في أقرب وقت.

مع تحيات إدارة شونة.';

        $results = [
            'success' => [],
            'failed'  => []
        ];

        foreach ($supplierPhones as $phone) {
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
        }

        return $results;
    }
}
