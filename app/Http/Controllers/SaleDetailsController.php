<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;

class SaleDetailsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Sales::join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
        ->join('users', 'users.id', '=', 'sales.user_id')
        ->join('products', 'sale_details.product_id', 'products.id')
        ->select('sales.id as saleID', 'sale_details.id', 'total', 'total_discount', 'sales.date', 'amount', 'sale_details.price', 'sub_total', 'sub_discount', 'products.name')
        ->where('sales.date', date("Y-m-d"))
       // ->sum('price')
        ->get();

        return $result;
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
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function getReceiptById(Request $request)
    {
        $result = Sales::join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
            ->join('users', 'users.id', '=', 'sales.user_id')
            ->select('*')
            ->where('sales.id', $request->input('saleID'))
            ->get();

        return $result;
    }

    public function getDailyReport()
    {
        $result = Sales::join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
        ->join('users', 'users.id', '=', 'sales.user_id')
        ->join('products', 'sale_details.product_id', 'products.id')
        ->select('sales.id as sale_id', 'sale_details.id', 'total', 'total_discount', 'sales.date', 'amount', 'sale_details.price', 'sub_total', 'sub_discount', 'products.name')
        ->where('sales.date', date("Y-m-d"))
            ->get();

        return $result;

    }
}
