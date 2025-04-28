<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
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
        $ads = Ads::all();
        $items = Product::all();
        return view('cpanel.Ads.index' , compact('ads' , 'items'));
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
        if($request -> id == 0){
            if($request->banner){
                $bnanner = time() . '.' . $request->banner->getClientOriginalExtension();
                $request->banner->move(('images/banner'), $bnanner);
            } else {
                $bnanner = '' ;
            }
            Ads::create([
                'banner' => $bnanner,
                'type' => $request -> type,
                'order' => $request -> order,
                'url' => $request -> url ?? "",
                'item_id' => $request -> item_id ?? 0,
                'isVisible' => $request -> isVisible,
                'duration' => $request -> duration,
                'user_ins' => Auth::user() -> id,
            ]);
            return redirect()->route('ads')->with('success', __('main.saved'));
        } else {
            return $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ads::find($id);
        echo json_encode($ad);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ad = Ads::find($request -> id);
        if($ad){
            if($request->banner){
                $bnanner = time() . '.' . $request->banner->getClientOriginalExtension();
                $request->flag->move(('images/banner'), $bnanner);
            } else {
                $bnanner  =  $ad -> banner ;
            }

            $ad -> update([
                'banner' => $bnanner,
                'type' => $request -> type,
                'order' => $request -> order,
                'url' => $request -> url ?? "",
                'item_id' => $request -> item_id ?? 0,
                'isVisible' => $request -> isVisible,
                'duration' => $request -> duration,
                'user_upd' => Auth::user() -> id,
            ]);
            return redirect()->route('ads')->with('success', __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ads::find($id);
        if($ad){
            $ad -> delete();
            return redirect()->route('ads')->with('success', __('main.deleted'));
        }
    }
}
