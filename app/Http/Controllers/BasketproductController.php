<?php

namespace App\Http\Controllers;

use App\Basketproduct;
use Illuminate\Http\Request;

class BasketproductController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $bp=Basketproduct::create($request->all());
    return response()->json($bp,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Basketproduct  $basketproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Basketproduct $basketproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Basketproduct  $basketproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Basketproduct $basketproduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Basketproduct  $basketproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basketproduct $basketproduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Basketproduct  $basketproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basketproduct $basketproduct)
    {
        //
    }
}
