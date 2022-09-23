<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\reservation;
use App\Models\fee;
use App\Models\discount;
use App\Models\orders;
use App\Models\tables;
use Illuminate\Http\Request;

class InvoicesController extends Controller
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
    public function create(request $request)
    {
        $tabl_id = $request->tabl_id;
        $total =  $request->total;
        $voucher =  $request->voucher;
        $invoice_number= $request->invoice_number;
        $discount = $request->discount;
        $fee = $request->fee;
        $table_products = reservation::all()->where('table_id',$tabl_id);
        //$fees = fee::all()->sum('percent');
        //$discount = discount::all();

       return view('invoices.invoice',compact('tabl_id','table_products','fee','discount','total','voucher'));
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
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(invoices $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $order= orders::create([
            'table_id' => $request->tabl_id,
            'fee'      =>  $request->fee,
            'discount' => $request->discount,
            'voucher'  => $request->voucher,
            'total'    => $request->total,

        ]);

        $order->id;
        $table_products = reservation::all()->where('table_id', $request->tabl_id);

        foreach($table_products as $table_product){
          //echo $table_product->product_id;
          $order->product()->syncWithoutDetaching([$table_product->product_id => ['quantity' => $table_product->quanlity]]);
         }

         foreach($table_products as $table_product){
            $table_product->delete();
           }

           $tabl = tables::find($request->tabl_id);
           $tabl->update([
               'status'=> 1,
           ]);

         return redirect()->route('home');
    }
}
