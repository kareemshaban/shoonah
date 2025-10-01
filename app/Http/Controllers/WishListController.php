<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishListController extends Controller
{


    public function index()
    {

        $favoriteItems = session()->get('wishlist', []);

        $favoriteIds = collect($favoriteItems)->pluck('id')->toArray();

       // return $favoriteIds ;
        $categories = Category::all();
        // Return early if no favorites
        if (count($favoriteIds) == 0) {
            $products = [] ;
            return view('front.wishlist', compact('products' , 'categories'));

        }

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('departments', 'products.department_id', '=', 'departments.id')
            ->whereIn('products.id', $favoriteIds)
            ->select(
                'products.*',
                'categories.name_ar as category_ar', 'categories.name_en as category_en',
                'departments.name_ar as department_ar', 'departments.name_en as department_en',
                'brands.name_ar as brand_ar', 'brands.name_en as brand_en'
            )
            ->get();

        return view('front.wishlist', compact('products' , 'categories'));
    }


    public function add(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Check if wishlist exists in session, if not initialize it
        $wishlist = session()->get('wishlist', []);

        // Prevent adding duplicate products to the wishlist
        if (!in_array($productId, array_column($wishlist, 'id'))) {
            $wishlist[] = [
                'id' => $productId,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image_url, // Add image or other necessary fields
            ];

            // Store the updated wishlist in session
            session()->put('wishlist', $wishlist);

            return response()->json([
                'success' => true,
                'wishlistCount' => count($wishlist)
            ]);

        }

        return redirect()->back()->with('error', __('main.item_is_already_in_wish_list'));
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
}
