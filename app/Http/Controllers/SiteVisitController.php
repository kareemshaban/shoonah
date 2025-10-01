<?php

namespace App\Http\Controllers;

use App\Models\SiteVisit;
use Illuminate\Http\Request;

class SiteVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = SiteVisit::orderByDesc('last_visit_at')->get();

        return view('cpanel.Reports.visits.index', compact('visits'));
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
     * @param  \App\Models\SiteVisit  $siteVisit
     * @return \Illuminate\Http\Response
     */
    public function show(SiteVisit $siteVisit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteVisit  $siteVisit
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteVisit $siteVisit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteVisit  $siteVisit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteVisit $siteVisit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteVisit  $siteVisit
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteVisit $siteVisit)
    {
        //
    }
}
