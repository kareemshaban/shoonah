<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Department;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\SupplierProducts;


class ProductController extends Controller
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
        $suppliers = Supplier::all();
        if (Auth::user() -> type == 0){
            $products = DB::table("products")
                -> join('brands' , 'brands.id', '=', 'products.brand_id')
                -> join('categories' , 'categories.id', '=', 'products.category_id')
                -> join('departments' , 'departments.id', '=', 'products.department_id')
                -> select('products.*' , 'brands.name_ar as brand_ar' , 'brands.name_en as brand_en' ,
                    'categories.name_ar as category_ar' , 'categories.name_en as category_en' ,
                    'departments.name_ar as department_ar' , 'departments.name_en as department_en')
                ->get();
        } else {
            $products = DB::table('products')
                -> join('supplier_products' , 'products.id', '=', 'supplier_products.product_id')
                -> join('brands' , 'brands.id', '=', 'products.brand_id')
                -> join('categories' , 'categories.id', '=', 'products.category_id')
                -> join('departments' , 'departments.id', '=', 'products.department_id')
                -> select('supplier_products.price' , 'supplier_products.quantity' ,
                    'products.user_ins' , 'products.id' , 'products.name_ar' , 'products.name_en' ,
                    'products.mainImg' , 'products.isReviewed',
                    'products.isPrivate' , 'products.isAvailable' ,'brands.name_ar as brand_ar' , 'brands.name_en as brand_en' ,
                    'categories.name_ar as category_ar' , 'categories.name_en as category_en' ,
                    'departments.name_ar as department_ar' , 'departments.name_en as department_en')
                -> where ('supplier_products.supplier_id' , '=' , Auth::user() -> supplier_id)
                -> get();
        }

        return view('cpanel.Products.index', compact('products' , 'suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $departments = Department::all();
        return view('cpanel.Products.create', compact('brands' , 'departments' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mainImg = time() . 'mainImg' . '.' . $request->mainImg->getClientOriginalExtension();
        $request->mainImg->move(('images/products'), $mainImg);

        if($request->img1){
            $img1 = time() . 'img1' .  '.' . $request->img1->getClientOriginalExtension();
            $request->img1->move(('images/products'), $img1);
        } else {
            $img1   = "" ;
        }
        if($request->img2){
            $img2 = time() . 'img2' .  '.' . $request->img2->getClientOriginalExtension();
            $request->img2->move(('images/products'), $img2);
        } else {
            $img2   = "" ;
        }
        if($request->img3){
            $img3 = time() . 'img3' .  '.' . $request->img3->getClientOriginalExtension();
            $request->img3->move(('images/products'), $img3);
        } else {
            $img3   = "" ;
        }
        if($request->img4){
            $img4 = time() . 'img4' .  '.' . $request->img4->getClientOriginalExtension();
            $request->img4->move(('images/products'), $request);
        } else {
            $img4 = "" ;
        }

        $id = Product::create([
            'brand_id' => $request -> brand_id	,
            'department_id' => $request -> department_id,
            'category_id' => $request -> category_id,
            'code' => $request -> code,
            'name_ar' => $request -> name_ar,
            'name_en' => $request -> name_en,
            'description_ar' => $request -> description_ar ?? "",
            'description_en' => $request -> description_en ?? "",
            'short_description_ar' => $request -> short_description_ar ?? "",
            'short_description_en' => $request -> short_description_en ?? "",
            'tag' => $request -> tag ?? "",
            'isPrivate' => $request -> isPrivate,
            'isAvailable' => $request -> isAvailable,
            'type' => 0,
            'mainImg' => $mainImg,
            'img1' => $img1,
            'img2' => $img2,
            'img3' => $img3,
            'img4' => $img4,
            'isReviewed' => Auth::user() -> supplier_id == 0 ? 1 : 0 ,
            'user_ins' => Auth::user() -> id,
            'user_upd' => 0
        ]) -> id;

        if(Auth::user() -> supplier_id> 0){
            // so we should register the product into
            SupplierProducts::create([
                'supplier_id' => Auth::user() -> supplier_id,
                'product_id' => $id,
                'price' => $request -> price ?? 0,
                'quantity' => $request -> quantity ?? 0,
                'discount' => 0,
                'finalPrice' => $request -> price ?? 0,
                'user_ins' => Auth::user() -> id,
                'user_upd' => 0
            ]);
        }


        return redirect()->route('products')->with('success', __('main.saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = DB::table("products")
            -> join('brands' , 'brands.id', '=', 'products.brand_id')
            -> join('categories' , 'categories.id', '=', 'products.category_id')
            -> join('departments' , 'departments.id', '=', 'products.department_id')
            -> select('products.*' , 'brands.name_ar as brand_ar' , 'brands.name_en as brand_en' ,
                'categories.name_ar as category_ar' , 'categories.name_en as category_en' ,
                'departments.name_ar as department_ar' , 'departments.name_en as department_en')
            -> where('products.id', $id)
            ->get();
        echo json_encode($products);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $departments = Department::all();
        if($product -> isPrivate == 1 && Auth::user() -> type == 1){
            $supplierProduct = SupplierProducts::where('product_id', $id)
                -> where('supplier_id' , '=' , Auth::user() -> supplier_id)
                ->get() -> first();
        } else {
            $supplierProduct = null ;
        }

        return view('cpanel.Products.edit', compact('brands' , 'departments' , 'product' , 'supplierProduct' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::find($request -> id);
        if($product){
            if($request->mainImg) {
                $mainImg = time() . 'mainImg' . '.' . $request->mainImg->getClientOriginalExtension();
                $request->mainImg->move(('images/products'), $mainImg);
            } else {
                $mainImg   = $product -> mainImg ;
            }

            if($request->img1){
                $img1 = time() . 'img1' .  '.' . $request->img1->getClientOriginalExtension();
                $request->img1->move(('images/products'), $img1);
            } else {
                if($request -> img1Removed == 1){
                    $img1   = "" ;
                } else {
                    $img1   = $product -> img1 ;
                }

            }
            if($request->img2){
                $img2 = time() . 'img2' .  '.' . $request->img2->getClientOriginalExtension();
                $request->img2->move(('images/products'), $img2);
            } else {
                if($request -> img2Removed == 1){
                    $img2   = "" ;
                } else {
                    $img2   = $product -> img2 ;
                }
            }
            if($request->img3){
                $img3 = time() . 'img3' .  '.' . $request->img3->getClientOriginalExtension();
                $request->img3->move(('images/products'), $img3);
            } else {
                if($request -> img3Removed == 1){
                    $img3   = "" ;
                } else {
                    $img3   = $product -> img3 ;
                }
            }
            if($request->img4){
                $img4 = time() . 'img4' .  '.' . $request->img4->getClientOriginalExtension();
                $request->img4->move(('images/products'), $request);
            } else {
                $img4   = $product -> img4 ;
            }

            $product -> update([
                'brand_id' => $request -> brand_id,
                'department_id' => $request -> department_id,
                'category_id' => $request -> category_id,
                'code' => $request -> code,
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'description_ar' => $request -> description_ar ?? "",
                'description_en' => $request -> description_en ?? "",
                'short_description_ar' => $request -> short_description_ar ?? "",
                'short_description_en' => $request -> short_description_en ?? "",
                'tag' => $request -> tag ?? "",
                'isPrivate' => $request -> isPrivate,
                'isAvailable' => $request -> isAvailable,
                'type' => 0,
                'mainImg' => $mainImg,
                'img1' => $img1,
                'img2' => $img2,
                'img3' => $img3,
                'img4' => $img4,
                'user_ins' => Auth::user() -> id,
                'user_upd' => 0
            ]);

            if(Auth::user() -> supplier_id> 0){
                // so we should register the product into
                $supplierProduct = SupplierProducts::find($request -> sId);
                if($supplierProduct){
                    $supplierProduct -> update([
                        'supplier_id' => Auth::user() -> supplier_id,
                        'product_id' => $product -> id,
                        'price' => $request -> price ?? 0,
                        'quantity' => $request -> quantity ?? 0,
                        'discount' => 0,
                        'finalPrice' => $request -> price ?? 0,
                        'user_upd' => Auth::user() -> id
                    ]);
                }

            }

            return redirect()->route('products')->with('success', __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product){
            $product -> delete();
            if($product -> isPrivate == 1){
                if($product -> user_ins == Auth::user() -> id){
                    $sProduct = SupplierProducts::where('product_id', $id)
                        -> where('supplier_id' , '=' , Auth::user() -> supplier_id) -> get() -> first();
                    if($sProduct){
                        $sProduct -> delete();
                    }
                }
            }
            return redirect()->route('products')->with('success', __('main.deleted'));
        }
    }

    public function getProductCode(){
        $product =  DB::table('products')->latest('created_at')->first();
        if($product){
            $id = $product -> id +1 ;
        } else {
            $id = 1;
        }
     $code = str_pad($id, 6, '0', STR_PAD_LEFT);
        echo json_encode($code) ;
        exit();

    }

    public function add_product_to_supplier()
    {
        $suppliers = Supplier::all();
        $products = DB::table("products")
            -> join('brands' , 'brands.id', '=', 'products.brand_id')
            -> join('categories' , 'categories.id', '=', 'products.category_id')
            -> join('departments' , 'departments.id', '=', 'products.department_id')
            -> select('products.*' , 'brands.name_ar as brand_ar' , 'brands.name_en as brand_en' ,
                'categories.name_ar as category_ar' , 'categories.name_en as category_en' ,
                'departments.name_ar as department_ar' , 'departments.name_en as department_en')
            -> where('products.isPrivate' , 0)
            ->get();


        if(Auth::user() -> type == 0){

            return view('cpanel.Products.addProductToSupplier', compact('products' , 'suppliers' ));

        } else{
            $supplier = Supplier::find(Auth::user() -> supplier_id);
            return view('cpanel.Products.selectProductToSupplier', compact('products' , 'supplier' , 'suppliers'));

        }
    }

    public function store_product_to_supplier(Request $request){
        if($request -> id == 0){
            SupplierProducts::create([
                'supplier_id' => $request -> supplier_id,
                'product_id' => $request -> item_id,
                'price' => $request -> price ?? 0,
                'quantity' => $request -> quantity ?? 0,
                'discount' => 0,
                'finalPrice' => $request -> price ?? 0,
                'user_ins' => Auth::user() -> id,
                'user_upd' => 0
            ]);
            return redirect()->route('add_product_to_supplier')->with('success', __('main.saved'));
        } else {
            $product = SupplierProducts::find($request -> id) ;
            if($product){
                $product -> update([
                    'supplier_id' => $request -> supplier_id,
                    'product_id' => $request -> item_id,
                    'price' => $request -> price ?? 0,
                    'quantity' => $request -> quantity ?? 0,
                    'discount' => 0,
                    'finalPrice' => $request -> price ?? 0,
                    'user_upd' => Auth::user() -> id
                ]);
            }
            if(Auth::user() -> type == 0){
                return redirect()->route('add_product_to_supplier')->with('success', __('main.updated'));

            } else {
                return redirect()->route('products')->with('success', __('main.updated'));

            }
        }
    }

    public function productAutoComplete($name)
    {
        return Product::query()
            -> where("name_ar" , "LIKE" , "%{$name}%")
            -> orWhere("name_en" , "LIKE" , "%{$name}%")
            -> take(10)
            -> get();
    }

    public function add_product_to_supplier_action($item_id , $supplier_id)
    {
        $supplierProduct = SupplierProducts::Where('supplier_id' , '=' , $supplier_id)
            -> where('product_id' , '=' , $item_id) -> get() -> first();
        if($supplierProduct){
            echo json_encode("PRODUCT_EXIST");
        } else {
            $product = null ;
            echo json_encode("PRODUCT_NOT_EXIST");
        }
        exit();

    }

    public function getSupplierProducts($supplier_id){
        $products = DB::table('products')
                -> join('supplier_products' , 'products.id', '=', 'supplier_products.product_id')
                -> join('brands' , 'brands.id', '=', 'products.brand_id')
                -> join('categories' , 'categories.id', '=', 'products.category_id')
                -> join('departments' , 'departments.id', '=', 'products.department_id')
                -> select('supplier_products.*' , 'products.name_ar' , 'products.name_en' , 'products.mainImg' ,
                    'products.isPrivate' , 'products.isAvailable' ,'brands.name_ar as brand_ar' , 'brands.name_en as brand_en' ,
                    'categories.name_ar as category_ar' , 'categories.name_en as category_en' ,
                    'departments.name_ar as department_ar' , 'departments.name_en as department_en')
                -> where ('supplier_products.supplier_id' , '=' , $supplier_id)
                -> get();
       echo json_encode($products);
        exit();
    }


    public function getCats($department){
        $cats = Category::where('department_id', $department) -> get();
        echo json_encode($cats);
        exit();
    }

    public function getCategorySupplier($id)
    {
        $category = Category::find($id);
        echo json_encode($category);
        exit();
    }

    public function getDepartmentSupplier($id)
    {
        $department = Department::find($id);
        echo json_encode($department);
        exit();
    }
}
