<?php

namespace App\Http\Controllers;

use App\GoodsType;
use Illuminate\Http\Request;

class GoodsTypeController extends Controller
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
        //
        $goodstype= new GoodsType;
     $goodstype->goods_type=   $request->input('other_type');
        $goodstype->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GoodsType  $goodsType
     * @return \Illuminate\Http\Response
     */
    public function show(GoodsType $goodsType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GoodsType  $goodsType
     * @return \Illuminate\Http\Response
     */
    public function edit(GoodsType $goodsType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GoodsType  $goodsType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GoodsType $goodsType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GoodsType  $goodsType
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoodsType $goodsType)
    {
        //
    }
}
