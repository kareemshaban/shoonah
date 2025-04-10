<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('cpanel.News.index' , compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpanel.News.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->mainImg){
            $mainImg = time() . 'mainImg' . '.' . $request->mainImg->getClientOriginalExtension();
            $request->mainImg->move(('images/news'), $mainImg);
        } else {
            $mainImg = '' ;
        }

        if($request->img1){
            $img1 = time() . 'img1' . '.' . $request->img1->getClientOriginalExtension();
            $request->img1->move(('images/news'), $img1);
        } else {
            $img1 = '' ;
        }

        if($request->img2){
            $img2 = time() . 'img2' . '.' . $request->img2->getClientOriginalExtension();
            $request->img2->move(('images/news'), $img2);
        } else {
            $img2 = '' ;
        }

        if($request->img3){
            $img3 = time() . 'img3' . '.' . $request->img3->getClientOriginalExtension();
            $request->img3->move(('images/news'), $img3);
        } else {
            $img3 = '' ;
        }


        News::create([
            'title_ar' => $request -> title_ar ,
            'title_en' => $request -> title_en,
            'publisher' => $request -> publisher ,
            'date' => Carbon::parse($request -> date) ,
            'mainImg' => $mainImg,
            'details_ar' => $request -> details_ar ?? "",
            'details_en' => $request -> details_en ?? "",
            'img1' => $img1,
            'img2' => $img2,
            'img3' => $img3,
            'isVisible' => $request -> isVisible,
            'user_ins' => Auth::user() -> id
        ]);
      return redirect()->route('globalNews')->with('success', __('main.saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('cpanel.News.edit' , compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $new = News::find($request -> id);
        if($new){
            if($request->mainImg){
                $mainImg = time() . 'mainImg' . '.' . $request->mainImg->getClientOriginalExtension();
                $request->mainImg->move(('images/news'), $mainImg);
            } else {
                $mainImg = $new ->  mainImg;
            }

            if($request->img1){
                $img1 = time() . 'img1' . '.' . $request->img1->getClientOriginalExtension();
                $request->img1->move(('images/news'), $img1);
            } else {
                if($request -> img1Removed == 0){
                    $img1 = $new ->  img1;
                } else {
                    $img1 = '' ;
                }

            }

            if($request->img2){
                $img2 = time() . 'img2' . '.' . $request->img2->getClientOriginalExtension();
                $request->img2->move(('images/news'), $img2);
            } else {
                if($request -> img2Removed == 0){
                    $img2 = $new ->  img2;
                } else {
                    $img2 = '' ;
                }
            }

            if($request->img3){
                $img3 = time() . 'img3' . '.' . $request->img3->getClientOriginalExtension();
                $request->img3->move(('images/news'), $img3);
            } else {
                if($request -> img3Removed == 0){
                    $img3 = $new ->  img3;
                } else {
                    $img3 = '' ;
                }
            }

            $new -> update([
                'title_ar' => $request -> title_ar ,
                'title_en' => $request -> title_en,
                'publisher' => $request -> publisher ,
                'date' => Carbon::parse($request -> date) ,
                'mainImg' => $mainImg,
                'details_ar' => $request -> details_ar,
                'details_en' => $request -> details_en,
                'img1' => $img1,
                'img2' => $img2,
                'img3' => $img3,
                'isVisible' => $request -> isVisible,
                'user_upd' => Auth::user() -> id
            ]);
              return redirect()->route('globalNews')->with('success', __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::find($id);
        if($new){
            $new -> delete();
            return redirect()->route('globalNews')->with('success', __('main.deleted'));
        }
    }
}
