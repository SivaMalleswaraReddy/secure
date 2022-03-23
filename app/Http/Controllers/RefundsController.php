<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorerefundsRequest;
use App\Http\Requests\UpdaterefundsRequest;
use App\Models\refunds;

class RefundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorerefundsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorerefundsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\refunds  $refunds
     * @return \Illuminate\Http\Response
     */
    public function show(refunds $refunds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\refunds  $refunds
     * @return \Illuminate\Http\Response
     */
    public function edit(refunds $refunds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdaterefundsRequest  $request
     * @param  \App\Models\refunds  $refunds
     * @return \Illuminate\Http\Response
     */
    public function update(UpdaterefundsRequest $request, refunds $refunds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\refunds  $refunds
     * @return \Illuminate\Http\Response
     */
    public function destroy(refunds $refunds)
    {
        //
    }
}
